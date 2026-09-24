<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from icon_state_group.php for maintainability (<500 LOC).
// Canon: Modules/UI/docs/wiki/concepts/claude-audit-static.md
// File: lang/it/icon_state_group_loader.php
return merge_translation_files(__DIR__.'/icon_state_group_fields.php', __DIR__.'/icon_state_group_label.php', __DIR__.'/icon_state_group_plural_label.php', __DIR__.'/icon_state_group_navigation.php', __DIR__.'/icon_state_group_actions.php'
);
