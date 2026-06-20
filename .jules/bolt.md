## 2024-06-20 - Cache Directory Resolution in DataConst.php
**Learning:** Nextcloud AIO uses statically mounted volumes for data and session directories that do not change during a single PHP request. This makes caching the paths determined by `is_dir` and `realpath` in static variables a very safe optimization, reducing redundant filesystem I/O operations without any risk of stale data.
**Action:** Always look for opportunities to memoize pure operations or filesystem lookups that are guaranteed to remain constant during the request lifecycle.
