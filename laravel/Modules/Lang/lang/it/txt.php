<?php

declare(strict_types=1);

return [
    'fields' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci la tua email',
            'tooltip' => 'Usa un indirizzo email valido',
            'icon' => 'heroicon-o-mail',
            'description' => 'email',
            'helper_text' => '',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la tua password',
            'tooltip' => 'La password deve contenere almeno 8 caratteri',
            'icon' => 'heroicon-o-lock-closed',
            'description' => 'password',
            'helper_text' => '',
        ],
        'remember' => [
            'label' => 'Ricordami',
            'tooltip' => 'Mantieni l\'accesso attivo su questo dispositivo',
            'description' => 'remember',
            'helper_text' => '',
            'placeholder' => 'remember',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
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
<<<<<<< HEAD
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'options' => [
            'prefix-icon-color' => [
                'description' => 'options.prefix-icon-color',
                'helper_text' => 'options.prefix-icon-color',
                'placeholder' => 'options.prefix-icon-color',
                'label' => 'options.prefix-icon-color',
            ],
            'allow_multiple' => [
                'description' => 'options.allow_multiple',
                'label' => 'options.allow_multiple',
                'placeholder' => 'options.allow_multiple',
                'helper_text' => 'options.allow_multiple',
            ],
            'visibility' => [
                'values' => [
                    'description' => 'options.visibility.values',
                    'label' => 'options.visibility.values',
                    'placeholder' => 'options.visibility.values',
                    'helper_text' => 'options.visibility.values',
                ],
                'active' => [
                    'label' => 'options.visibility.active',
                    'placeholder' => 'options.visibility.active',
                    'helper_text' => 'options.visibility.active',
                    'description' => 'options.visibility.active',
                ],
                'fieldID' => [
                    'label' => 'options.visibility.fieldID',
                    'placeholder' => 'options.visibility.fieldID',
                    'helper_text' => 'options.visibility.fieldID',
                    'description' => 'options.visibility.fieldID',
                ],
            ],
            'confirmation-message' => [
                'label' => 'options.confirmation-message',
                'placeholder' => 'options.confirmation-message',
                'helper_text' => 'options.confirmation-message',
                'description' => 'options.confirmation-message',
            ],
            'require-login' => [
                'label' => 'options.require-login',
                'placeholder' => 'options.require-login',
                'helper_text' => 'options.require-login',
                'description' => 'options.require-login',
            ],
            'one-entry-per-user' => [
                'label' => 'options.one-entry-per-user',
                'placeholder' => 'options.one-entry-per-user',
                'helper_text' => 'options.one-entry-per-user',
                'description' => 'options.one-entry-per-user',
            ],
            'show-as' => [
                'label' => 'options.show-as',
                'placeholder' => 'options.show-as',
                'helper_text' => 'options.show-as',
                'description' => 'options.show-as',
            ],
            'emails-notification' => [
                'label' => 'options.emails-notification',
                'placeholder' => 'options.emails-notification',
                'helper_text' => 'options.emails-notification',
                'description' => 'options.emails-notification',
            ],
            'primary_color' => [
                'label' => 'options.primary_color',
                'placeholder' => 'options.primary_color',
                'helper_text' => 'options.primary_color',
                'description' => 'options.primary_color',
            ],
            'logo' => [
                'label' => 'options.logo',
                'placeholder' => 'options.logo',
                'helper_text' => 'options.logo',
                'description' => 'options.logo',
            ],
            'cover' => [
                'label' => 'options.cover',
                'placeholder' => 'options.cover',
                'helper_text' => 'options.cover',
                'description' => 'options.cover',
            ],
            'prefix-icon' => [
                'description' => 'options.prefix-icon',
                'helper_text' => 'options.prefix-icon',
                'placeholder' => 'options.prefix-icon',
                'label' => 'options.prefix-icon',
            ],
            'htmlId' => [
                'label' => 'options.htmlId',
                'placeholder' => 'options.htmlId',
                'helper_text' => 'options.htmlId',
                'description' => 'options.htmlId',
            ],
            'hint' => [
                'text' => [
                    'label' => 'options.hint.text',
                    'placeholder' => 'options.hint.text',
                    'helper_text' => 'options.hint.text',
                    'description' => 'options.hint.text',
                ],
                'icon' => [
                    'label' => 'options.hint.icon',
                    'placeholder' => 'options.hint.icon',
                    'helper_text' => 'options.hint.icon',
                    'description' => 'options.hint.icon',
                ],
                'color' => [
                    'label' => 'options.hint.color',
                    'placeholder' => 'options.hint.color',
                    'helper_text' => 'options.hint.color',
                    'description' => 'options.hint.color',
                ],
                'icon-tooltip' => [
                    'label' => 'options.hint.icon-tooltip',
                    'placeholder' => 'options.hint.icon-tooltip',
                    'helper_text' => 'options.hint.icon-tooltip',
                    'description' => 'options.hint.icon-tooltip',
                ],
            ],
            'is_required' => [
                'label' => 'options.is_required',
                'placeholder' => 'options.is_required',
                'helper_text' => 'options.is_required',
                'description' => 'options.is_required',
            ],
            'column_span_full' => [
                'label' => 'options.column_span_full',
                'placeholder' => 'options.column_span_full',
                'helper_text' => 'options.column_span_full',
                'description' => 'options.column_span_full',
            ],
            'hidden_label' => [
                'label' => 'options.hidden_label',
                'placeholder' => 'options.hidden_label',
                'helper_text' => 'options.hidden_label',
                'description' => 'options.hidden_label',
            ],
            'dataSource' => [
                'label' => 'options.dataSource',
                'placeholder' => 'options.dataSource',
                'helper_text' => 'options.dataSource',
                'description' => 'options.dataSource',
            ],
            'dateType' => [
                'label' => 'options.dateType',
                'placeholder' => 'options.dateType',
                'helper_text' => 'options.dateType',
                'description' => 'options.dateType',
            ],
            'minValue' => [
                'label' => 'options.minValue',
                'placeholder' => 'options.minValue',
                'helper_text' => 'options.minValue',
                'description' => 'options.minValue',
            ],
            'maxValue' => [
                'label' => 'options.maxValue',
                'placeholder' => 'options.maxValue',
                'helper_text' => 'options.maxValue',
                'description' => 'options.maxValue',
            ],
            'suffix' => [
                'label' => 'options.suffix',
                'placeholder' => 'options.suffix',
                'helper_text' => 'options.suffix',
                'description' => 'options.suffix',
            ],
            'suffix-icon' => [
                'label' => 'options.suffix-icon',
                'placeholder' => 'options.suffix-icon',
                'helper_text' => 'options.suffix-icon',
                'description' => 'options.suffix-icon',
            ],
            'suffix-icon-color' => [
                'label' => 'options.suffix-icon-color',
                'placeholder' => 'options.suffix-icon-color',
                'helper_text' => 'options.suffix-icon-color',
                'description' => 'options.suffix-icon-color',
            ],
            'prefix' => [
                'label' => 'options.prefix',
                'placeholder' => 'options.prefix',
                'helper_text' => 'options.prefix',
                'description' => 'options.prefix',
            ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'label' => '',
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
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'value' => [
            'description' => 'value',
            'helper_text' => '',
            'placeholder' => 'value',
            'label' => 'value',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'values-list' => [
            'description' => 'values-list',
            'helper_text' => '',
            'placeholder' => 'values-list',
            'label' => 'values-list',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'user_id' => [
            'label' => 'user_id',
            'placeholder' => 'user_id',
            'helper_text' => '',
            'description' => 'user_id',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'name' => [
            'label' => 'name',
            'placeholder' => 'name',
            'helper_text' => '',
            'description' => 'name',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'slug' => [
            'label' => 'slug',
            'placeholder' => 'slug',
            'helper_text' => '',
            'description' => 'slug',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'category_id' => [
            'label' => 'category_id',
            'placeholder' => 'category_id',
            'helper_text' => '',
            'description' => 'category_id',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'description' => [
            'label' => 'description',
            'placeholder' => 'description',
            'helper_text' => '',
            'description' => 'description',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'details' => [
            'label' => 'details',
            'placeholder' => 'details',
            'helper_text' => '',
            'description' => 'details',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'is_active' => [
            'label' => 'is_active',
            'placeholder' => 'is_active',
            'helper_text' => '',
            'description' => 'is_active',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'ordering' => [
            'label' => 'ordering',
            'placeholder' => 'ordering',
            'helper_text' => '',
            'description' => 'ordering',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'start_date' => [
            'label' => 'start_date',
            'placeholder' => 'start_date',
            'helper_text' => '',
            'description' => 'start_date',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'end_date' => [
            'label' => 'end_date',
            'placeholder' => 'end_date',
            'helper_text' => '',
            'description' => 'end_date',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'extensions' => [
            'label' => 'extensions',
            'placeholder' => 'extensions',
            'helper_text' => '',
            'description' => 'extensions',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'sections' => [
            'label' => 'sections',
            'placeholder' => 'sections',
            'helper_text' => '',
            'description' => 'sections',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'fields' => [
            'label' => 'fields',
            'placeholder' => 'fields',
            'helper_text' => '',
            'description' => 'fields',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'type' => [
            'label' => 'type',
            'placeholder' => 'type',
            'helper_text' => '',
            'description' => 'type',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'compact' => [
            'label' => 'compact',
            'placeholder' => 'compact',
            'helper_text' => '',
            'description' => 'compact',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'aside' => [
            'label' => 'aside',
            'placeholder' => 'aside',
            'helper_text' => '',
            'description' => 'aside',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'borderless' => [
            'label' => 'borderless',
            'placeholder' => 'borderless',
            'helper_text' => '',
            'description' => 'borderless',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'icon' => [
            'label' => 'icon',
            'placeholder' => 'icon',
            'helper_text' => '',
            'description' => 'icon',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'columns' => [
            'label' => 'columns',
            'placeholder' => 'columns',
            'helper_text' => '',
            'description' => 'columns',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'itemIsDefault' => [
            'description' => 'itemIsDefault',
            'helper_text' => '',
            'placeholder' => 'itemIsDefault',
            'label' => 'itemIsDefault',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'edit' => [
            'label' => 'edit',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'isActive' => [
            'description' => 'isActive',
            'helper_text' => '',
            'placeholder' => 'isActive',
            'label' => 'isActive',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
        ],
        'status' => [
            'label' => 'status',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'notes' => [
            'description' => 'notes',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
<<<<<<< HEAD
=======
        ],
        'status' => [
            'label' => 'status',
        ],
        'notes' => [
            'description' => 'notes',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'responses_count' => [
            'description' => 'responses_count',
            'helper_text' => '',
            'placeholder' => 'responses_count',
            'label' => 'responses_count',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'itemKey' => [
            'description' => 'itemKey',
            'helper_text' => '',
            'placeholder' => 'itemKey',
            'label' => 'itemKey',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'forms_count' => [
            'description' => 'forms_count',
            'helper_text' => '',
            'placeholder' => 'forms_count',
            'label' => 'forms_count',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'responses_exists' => [
            'description' => 'responses_exists',
            'helper_text' => '',
            'placeholder' => 'responses_exists',
            'label' => 'responses_exists',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'logo' => [
            'description' => 'logo',
            'helper_text' => '',
<<<<<<< HEAD
<<<<<<< HEAD
            'label' => '',
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'label' => '',
            'tooltip' => '',
>>>>>>> dev
        ],
        'category' => [
            'name' => [
                'description' => 'category.name',
                'helper_text' => '',
            ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'test_date' => [
            'label' => 'test_date',
            'placeholder' => 'test_date',
            'helper_text' => 'test_date',
            'description' => 'test_date',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'test' => [
            'label' => 'test',
            'placeholder' => 'test',
            'helper_text' => 'test',
            'description' => 'test',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'view' => [
            'label' => 'view',
            'placeholder' => 'view',
            'helper_text' => 'view',
            'description' => 'view',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'address' => [
            'label' => 'address',
            'placeholder' => 'address',
            'helper_text' => 'address',
            'description' => 'address',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
        ],
        'address' => [
            'label' => 'address2',
            'placeholder' => 'address',
            'helper_text' => 'address',
            'description' => 'address',
            'tooltip' => '',
        ],
        'display_name' => [
            'label' => 'display_name',
        ],
        'location' => [
            'label' => 'location',
            'placeholder' => 'location',
            'helper_text' => 'location',
            'description' => 'location',
        ],
        'coordinates' => [
            'label' => 'coordinates',
            'placeholder' => 'coordinates',
            'helper_text' => 'coordinates',
            'description' => 'coordinates',
        ],
        'file1' => [
            'jpg' => [
                'label' => 'file1.jpg',
                'placeholder' => 'file1.jpg',
                'helper_text' => 'file1.jpg',
                'description' => 'file1.jpg',
            ],
        ],
        'id' => [
            'label' => 'id',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
        'appointment_date' => [
            'label' => 'appointment_date',
            'placeholder' => 'appointment_date',
            'helper_text' => 'appointment_date',
            'description' => 'appointment_date',
        ],
        'contact' => [
            'label' => 'contact',
>>>>>>> dev
        ],
    ],
    'actions' => [
        'authenticate' => [
            'label' => 'Autentica',
            'tooltip' => 'Effettua il login nel sistema',
            'icon' => 'ui-login',
            'color' => 'primary',
        ],
        'login' => [
            'label' => 'Accedi',
            'tooltip' => 'Accedi con le tue credenziali',
            'icon' => 'heroicon-o-key',
            'color' => 'success',
        ],
        'request' => [
            'label' => 'request',
            'tooltip' => 'request',
            'icon' => 'request',
        ],
        'cancel' => [
            'label' => 'cancel',
        ],
        'save' => [
            'label' => 'save',
        ],
        'activeLocale' => [
            'label' => 'activeLocale',
        ],
        'open' => [
            'label' => 'open',
        ],
        'create' => [
            'label' => 'create',
        ],
        'createAnother' => [
            'label' => 'createAnother',
        ],
        'hidePassword' => [
            'icon' => 'hidePassword',
            'label' => 'hidePassword',
            'tooltip' => 'hidePassword',
        ],
        'showPassword' => [
            'icon' => 'ui-showPassword',
            'label' => 'showPassword',
            'tooltip' => 'showPassword',
        ],
        'list_log_activities' => [
            'label' => 'list_log_activities',
            'icon' => 'list_log_activities',
            'tooltip' => 'list_log_activities',
        ],
        'table_layout_toggle' => [
            'label' => 'table_layout_toggle',
            'icon' => 'table_layout_toggle',
            'tooltip' => 'table_layout_toggle',
        ],
        'update_coordinates' => [
            'label' => 'update_coordinates',
            'icon' => 'update_coordinates',
            'tooltip' => 'update_coordinates',
        ],
<<<<<<< HEAD
=======
        'edit' => [
            'label' => 'edit',
            'icon' => 'edit',
            'tooltip' => 'edit',
        ],
        'delete' => [
            'label' => 'delete',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'SendRecordsNotificationBulkAction' => [
            'label' => 'SendRecordsNotificationBulkAction',
            'icon' => 'SendRecordsNotificationBulkAction',
            'tooltip' => 'SendRecordsNotificationBulkAction',
        ],
>>>>>>> dev
    ],
    'sections' => [
        'address' => [
            'label' => 'address',
            'heading' => 'address',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'label' => 'Txt',
    'plural_label' => 'Txt (Plurale)',
    'navigation' => [
        'name' => 'Txt',
        'plural' => 'Txt',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Txt',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'steps' => [
        'test' => [
            'label' => 'test',
        ],
    ],
>>>>>>> dev
];
