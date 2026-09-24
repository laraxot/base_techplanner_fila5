<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/ar/table_layout_toggle_table.php
return [
    'actions' => [
        'toggle' => [
            'label' => 'تبديل تخطيط الجدول',
        ],
    ],
    'table_layout' => [
        'actions' => [
            'toggle' => [
                'label' => 'تبديل التخطيط',
                'tooltip' => 'التبديل بين عرض القائمة وعرض الشبكة',
                'helper_text' => 'تغيير نوع العرض',
            ],
        ],
    ],
    'fields' => [
        'layout' => [
            'label' => 'التخطيط',
            'placeholder' => 'اختر نوع التخطيط',
            'tooltip' => 'اختر بين عرض القائمة وعرض الشبكة',
            'help' => 'اختر نوع التخطيط المناسب لعرض البيانات',
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
