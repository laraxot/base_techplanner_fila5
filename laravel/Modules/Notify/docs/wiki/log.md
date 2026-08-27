## [2026-06-10] schema | notifications owner Notify — XotBaseMigration

- Canonico: `2026_06_10_133000_create_notifications_table.php`
- Vietato `create_notifications_table` in User/
- Doc: [concepts/notifications-database-contract.md](concepts/notifications-database-contract.md)

## [2026-06-05] docs | HackerNoon harness — tips 001-022 in wiki locale

<<<<<<< .merge_file_fdz2zZ
- Stub/checklist: second-brain → canon Xot, ai-harness, [hackernoon map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md), [llm-wiki.txt](../../../../../bashscripts/tools/prompts/llm-wiki.txt)
- GitHub: [#272](https://github.com/laraxot/base_fixcity_fila5/issues/272) / [D#273](https://github.com/laraxot/base_fixcity_fila5/discussions/273)
=======
<<<<<<< .merge_file_npTnSq
- Stub/checklist: second-brain → canon Xot, ai-harness, [hackernoon map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md), [llm-wiki.txt](../../../../../bashscripts/tools/prompts/llm-wiki.txt)
- GitHub: [#272](https://github.com/laraxot/base_fixcity_fila5/issues/272) / [D#273](https://github.com/laraxot/base_fixcity_fila5/discussions/273)
=======
>>>>>>> .merge_file_as3XwS
- Stub/checklist: second-brain → canon Xot, ai-harness, [hackernoon map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-laraxot-map.md), [llm-wiki.txt](../../../../../bashscripts/tools/prompts/llm-wiki.txt)
- GitHub: [#272](https://github.com/laraxot/platform/issues/272) / [D#273](https://github.com/laraxot/platform/discussions/273)
>>>>>>> .merge_file_cjF1Yl

---
title: "Notify Wiki Activity Log"
module: "Notify"
---

# Notify - Wiki Activity Log

## [2026-05-11] Wiki Structure Created

- Created wiki structure: rules/, skills/, commands/, memories/, concepts/
<<<<<<< .merge_file_fdz2zZ
- Created INDEX.md for each section
=======
<<<<<<< .merge_file_npTnSq
- Created INDEX.md for each section
=======
>>>>>>> .merge_file_as3XwS
- Created index.md for each section
>>>>>>> .merge_file_cjF1Yl
- Created module index.md
- Ready for on-demand loading via QMD


- 2026-06-10: boundary Notify schema / User runtime — vietato create_notifications in User (XotBaseMigration only)

## 2026-06-10 — notifications schema owner

- Unica `create_notifications_table` in Notify; `model_class` = `User\Models\Notification`
- Solo `XotBaseMigration` — mai `extends Migration`
- Vietato duplicato in User/ (es. pattern `2026_07_02_*` con bigint morphs)
