<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/ru/table_layout_toggle_table.php
return [
    'actions' => [
        'toggle' => [
            'label' => 'Переключить макет таблицы',
        ],
    ],
    'table_layout' => [
        'actions' => [
            'toggle' => [
                'label' => 'Переключить макет',
                'tooltip' => 'Переключение между списочным и сеточным представлением',
                'helper_text' => 'Изменить тип отображения',
            ],
        ],
    ],
    'fields' => [
        'layout' => [
            'label' => 'Макет',
            'placeholder' => 'Выбрать тип макета',
            'tooltip' => 'Выбрать между списочным и сеточным представлением',
            'help' => 'Выберите подходящий тип макета для отображения данных',
            'helper_text' => '',
            'description' => '',
        ],
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
];
