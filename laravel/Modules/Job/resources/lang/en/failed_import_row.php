<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Failed Import Row',
        'group' => 'Imports',
        'icon' => 'heroicon-o-exclamation-circle',
        'sort' => 28,
    ],
    'label' => 'Failed Import Row',
    'plural_label' => 'Failed Import Rows',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'import_batch_id' => [
            'label' => 'Import Batch ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'row_index' => [
            'label' => 'Row Index',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'errors' => [
            'label' => 'Errors',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'data' => [
            'label' => 'Data',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'import_batch_id' => [
            'label' => 'Import Batch ID',
        ],
        'row_index' => [
            'label' => 'Row Index',
        ],
        'errors' => [
            'label' => 'Errors',
        ],
        'data' => [
            'label' => 'Data',
        ],
        'created_at' => [
            'label' => 'Created At',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'view_errors' => [
            'label' => 'View Errors',
        ],
        'fix_row' => [
            'label' => 'Fix Row',
        ],
    ],
];
