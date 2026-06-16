## 2024-05-24 - Do not cache Docker state
**Learning:** Caching stateful container definitions without a proven invalidation point is unsafe. `ContainerDefinitionFetcher::FetchDefinition` relies on dynamic properties (such as container states via Docker API), making it a bad candidate for caching across an indeterminate timeframe.
**Action:** When searching for performance improvements, prefer optimizing pure static configurations (e.g., file reads in `ConfigurationManager`) over lifecycle/stateful data.
