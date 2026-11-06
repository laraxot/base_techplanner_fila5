---
title: "architecture rules"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "architecture rules"
issues: []
discussions: []
status: draft
---

# Architectural Rules & Guidelines

This module adheres to the **Laraxot Architecture** and **Super Cow Methodology**.

For strict coding standards, Filament extension rules, and PHPStan guidelines, please refer to the central documentation in the **Xot Module**:

<<<<<<< .merge_file_OFZSyw
=======
-   [Super Cow Methodology](../../Xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../Xot/docs/php_quality_guide.md)
-   [Filament Extension Rules](../../Xot/docs/filament_extension_rules.md)
<<<<<<< HEAD
>>>>>>> .merge_file_tZmFZX
-   [Super Cow Methodology](../../xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../xot/docs/php_quality_guide.md)
-   [Filament Extension Rules](../../xot/docs/filament_extension_rules.md)
=======
>>>>>>> 6ed19256f (.)

**Key Principles:**
1.  **DRY & KISS**: Don't repeat yourself, keep it simple.
2.  **Zero Errors**: PHPStan Level 10 compliance is mandatory.
3.  **XotBase**: Always extend `XotBase` classes, never Filament classes directly.
<<<<<<< .merge_file_OFZSyw
4.  **Translations**: Use `LangServiceProvider` for automatic label resolution.
=======
<<<<<<< HEAD
4.  **Translations**: Use `LangServiceProvider` for automatic label resolution.
=======
4.  **Translations**: Use `LangServiceProvider` for automatic label resolution.
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_tZmFZX
