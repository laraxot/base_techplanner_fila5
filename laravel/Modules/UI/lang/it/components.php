<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/components.php
=======
>>>>>>> laraxot/dev
return [
    'state_icons' => [
        'no_transitions' => 'Nessuna transizione disponibile',
    ],
    'label' => 'Components',
    'plural_label' => 'Components (Plurale)',
    'navigation' => [
        'name' => 'Components',
        'plural' => 'Components',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Components',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Components',
        ],
        'edit' => [
            'label' => 'Modifica Components',
        ],
        'delete' => [
            'label' => 'Elimina Components',
        ],
    ],
];
