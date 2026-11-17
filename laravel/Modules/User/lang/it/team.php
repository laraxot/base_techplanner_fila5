<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Team',
        'plural' => 'Teams',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei team e delle loro autorizzazioni',
        ],
        'label' => 'team',
        'sort' => 18,
        'icon' => 'ui-user-team',
    ],
    'fields' => [
<<<<<<< HEAD
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'detach' => [
            'label' => 'detach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'create' => [
            'label' => 'create',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attach' => [
            'label' => 'attach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'view' => [
            'label' => 'view',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'updated_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'created_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'users_count' => [
            'label' => 'users_count',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'detach' => [
            'label' => 'detach',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'create' => [
            'label' => 'create',
        ],
        'attach' => [
            'label' => 'attach',
        ],
        'view' => [
            'label' => 'view',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'users_count' => [
            'label' => 'users_count',
        ],
        'name' => [
            'label' => 'name',
>>>>>>> 6ed19256f (.)
        ],
        'recordId' => [
            'label' => 'recordId',
            'description' => 'recordId',
            'helper_text' => 'recordId',
            'placeholder' => 'recordId',
<<<<<<< HEAD
            'tooltip' => '',
        ],
        'personal_team' => [
            'label' => 'personal_team',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'personal_team' => [
            'label' => 'personal_team',
>>>>>>> 6ed19256f (.)
        ],
        'role' => [
            'label' => 'role',
            'description' => 'role',
            'helper_text' => 'role',
            'placeholder' => 'role',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'description' => [
            'description' => 'description',
            'helper_text' => 'description',
            'placeholder' => 'description',
<<<<<<< HEAD
            'label' => '',
            'tooltip' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'layout' => [
            'label' => 'layout',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'layout' => [
            'label' => 'layout',
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
        'create' => [
            'label' => 'create',
        ],
        'logout' => [
            'icon' => 'logout',
            'label' => 'logout',
            'tooltip' => 'logout',
        ],
        'reorderRecords' => [
            'icon' => 'reorderRecords',
            'label' => 'reorderRecords',
            'tooltip' => 'reorderRecords',
        ],
        'openColumnManager' => [
            'icon' => 'openColumnManager',
            'label' => 'openColumnManager',
            'tooltip' => 'openColumnManager',
        ],
        'applyTableColumnManager' => [
            'icon' => 'applyTableColumnManager',
            'label' => 'applyTableColumnManager',
            'tooltip' => 'applyTableColumnManager',
        ],
        'resetFilters' => [
            'icon' => 'resetFilters',
            'label' => 'resetFilters',
            'tooltip' => 'resetFilters',
        ],
        'applyFilters' => [
            'icon' => 'applyFilters',
            'label' => 'applyFilters',
            'tooltip' => 'applyFilters',
        ],
        'openFilters' => [
            'icon' => 'openFilters',
            'label' => 'openFilters',
            'tooltip' => 'openFilters',
        ],
        'detach' => [
            'icon' => 'detach',
            'label' => 'detach',
            'tooltip' => 'detach',
        ],
        'cancel' => [
            'icon' => 'cancel',
            'label' => 'cancel',
            'tooltip' => 'cancel',
        ],
        'attachAnother' => [
            'icon' => 'attachAnother',
            'label' => 'attachAnother',
            'tooltip' => 'attachAnother',
        ],
        'attach' => [
            'label' => 'attach',
            'icon' => 'attach',
            'tooltip' => 'attach',
        ],
        'submit' => [
            'label' => 'submit',
            'icon' => 'submit',
            'tooltip' => 'submit',
        ],
        'profile' => [
            'tooltip' => 'profile',
            'icon' => 'profile',
            'label' => 'profile',
        ],
        'delete' => [
            'tooltip' => 'delete',
            'icon' => 'delete',
            'label' => 'delete',
        ],
    ],
    'plural' => [
        'model' => [
            'label' => 'team.plural.model',
        ],
    ],
    'model' => [
        'label' => 'team.model',
    ],
    'label' => 'team',
<<<<<<< HEAD
    'plural_label' => 'Team (Plurale)',
=======
    'plural_label' => '',
>>>>>>> 6ed19256f (.)
];
