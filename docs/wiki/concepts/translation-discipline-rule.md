---
title: Translation Discipline Rule
type: rule
tags: [translations, i18n, quality, laraxot]
created: 2026-04-27
updated: 2026-04-27
---

# Translation Discipline Rule

This rule ensures high-quality internationalization across all Laraxot modules and themes.

## 1. Never Remove Values
When improving a translation file, **never delete existing keys or values** unless they are proven to be unreachable/dead code. If a value is poor, improve it; do not remove it.

## 2. No Placeholders as Values
Values that match their keys (e.g., `'label' => 'model.label'`) or end in `.navigation` are considered placeholders and must be improved with human-readable, context-aware text.

## 3. Language Integrity
- `lang/en/` files must contain **only English text**.
- `lang/it/` files must contain **only Italian text**.
- Avoid mixing languages within a single file.

## 4. Navigation Standards
The `navigation` key in translation files should always define:
- `label`: Human readable name for the menu.
- `icon`: A valid Heroicon (e.g., `heroicon-o-document-text`).
- `sort`: A numerical value for ordering.
- `group`: (Optional) The navigation group name.

## 5. Zen of Translations
Translations should be concise, professional, and consistent with the platform's terminology.
- Use "Segnalazione" for tickets/reports in Italian.
- Use "Profilo" for user profiles.
- Ensure plural labels are correctly translated.

---
*Enforced by Gemini CLI. Integrated into LLM Wiki.*
