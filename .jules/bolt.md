## 2024-06-13 - Cached ConfigurationManager->GetConfig
**Learning:** Found a recurring pattern where `ConfigurationManager->GetConfig` continuously loads and decodes the configuration JSON file for every single settings check (e.g. `isTalkEnabled()`, `isClamavEnabled()`, `GetToken()`). This incurs a significant disk I/O and CPU penalty (JSON parsing) on repeated checks across the codebase lifecycle.
**Action:** Implemented an instance-level cache `private ?array $configCache`. Ensures reads stay fast while still keeping sync via immediate cache updates on `WriteConfig`. Next time watch for `json_decode(file_get_contents(...))` calls wrapped in getter functions called repeatedly in a loop (like `ContainerDefinitionFetcher->GetDefinition()`).
## 2024-06-26 - Static Mounts Enable Memory Caching
**Learning:** In Nextcloud AIO, data and session directories (e.g., `/mnt/docker-aio-config/`) are statically mounted Docker volumes that do not change paths during a single request lifecycle.
**Action:** We can safely cache these directory paths in memory using static properties to avoid repeated redundant `is_dir()` filesystem checks, which improves performance on heavy IO operations.
