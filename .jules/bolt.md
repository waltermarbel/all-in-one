## 2024-05-18 - [Cache Directory Paths]
**Learning:** In Nextcloud AIO, data and session directories are statically mounted Docker volumes that do not change paths during a single request lifecycle. Redundant `is_dir` and `realpath` filesystem checks inside static resolution methods (`DataConst::GetDataDirectory` and `DataConst::GetSessionDirectory`) cause unnecessary I/O overhead.
**Action:** Cache directory resolution paths via static variables once resolved per request lifecycle, eliminating redundant disk queries while preserving functionality exactly.
