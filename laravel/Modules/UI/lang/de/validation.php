<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/validation.php
return [
    'opening_hours' => [
        'morning' => 'Vormittag',
        'afternoon' => 'Nachmittag',
        'morning_before_afternoon' => 'Für :day muss die Vormittags-Schließzeit vor der Nachmittags-Öffnungszeit liegen.',
        'missing_closing_time' => 'Wenn Sie :session Öffnungszeit für :day angeben, müssen Sie auch die Schließzeit angeben.',
        'missing_opening_time' => 'Wenn Sie :session Schließzeit für :day angeben, müssen Sie auch die Öffnungszeit angeben.',
        'opening_before_closing' => 'Die :session Öffnungszeit für :day muss vor der Schließzeit liegen.',
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
