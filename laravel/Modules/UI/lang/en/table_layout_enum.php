<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/en/table_layout_enum.php
return [
    'values' => [
        'list' => [
            'label' => 'List',
            'color' => 'primary',
            'icon' => 'heroicon-o-list-bullet',
            'description' => 'Traditional list layout with table rows',
            'tooltip' => 'Display data in structured table format',
            'helper_text' => 'Ideal for viewing many records in an organized way',
        ],
        'grid' => [
            'label' => 'Grid',
            'color' => 'secondary',
            'icon' => 'heroicon-o-squares-2x2',
            'description' => 'Responsive grid layout with cards',
            'tooltip' => 'Display data in responsive card format',
            'helper_text' => 'Ideal for viewing fewer records with visual focus',
        ],
    ],
    'label' => 'Table Layout Enum',
    'plural_label' => 'Table Layout Enum (Plural)',
    'navigation' => [
        'name' => 'Table Layout Enum',
        'plural' => 'Table Layout Enum',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Table Layout Enum',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Unique record identifier',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Updated At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Create Table Layout Enum',
        ],
        'edit' => [
            'label' => 'Edit Table Layout Enum',
        ],
        'delete' => [
            'label' => 'Delete Table Layout Enum',
        ],
    ],
];
