<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from opening_hours_field.php for maintainability (<500 LOC).
// Canon: Modules/UI/docs/wiki/concepts/claude-audit-static.md
// File: lang/it/opening_hours_field_loader.php
return merge_translation_files(__DIR__.'/opening_hours_field_fields.php', __DIR__.'/opening_hours_field_sections.php', __DIR__.'/opening_hours_field_actions.php', __DIR__.'/opening_hours_field_messages.php', __DIR__.'/opening_hours_field_steps.php', __DIR__.'/opening_hours_field_time_pickers.php', __DIR__.'/opening_hours_field_label.php', __DIR__.'/opening_hours_field_plural_label.php', __DIR__.'/opening_hours_field_navigation.php'
);
