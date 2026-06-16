## 2024-05-30 - Type mismatch comparison bug discovery
**Learning:** In PHP 8, `MyClass::class` returns a string. If the codebase compares an object instance to a class name string using `===`, it evaluates to `false` and might be a latent bug. However, as a performance agent, trying to unprompted refactor this to `instanceof MyClass` changes the behavior and might break systems relying on the bug or have side-effects.
**Action:** Never change correctness or conditional logic in performance tasks, even if it looks like a clear bug. Keep PR scope strictly to safe performance optimizations.
