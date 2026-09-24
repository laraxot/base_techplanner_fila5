<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/blocks.php
return [
    'navigation' => [
        'fields' => [
            'items' => [
                'label' => 'Voci di navigazione',
            ],
            'text' => [
                'label' => 'Testo link',
            ],
            'url' => [
                'label' => 'URL link',
            ],
        ],
    ],
    'category' => [
        'fields' => [
            'name' => [
                'label' => 'Nome',
            ],
            'slug' => [
                'label' => 'Slug',
            ],
            'parent' => [
                'label' => 'Categoria padre',
            ],
        ],
    ],
    'post' => [
        'fields' => [
            'title' => [
                'label' => 'Titolo',
            ],
            'content' => [
                'label' => 'Contenuto',
            ],
            'image' => [
                'label' => 'Immagine',
            ],
        ],
    ],
    'contact' => [
        'fields' => [
            'name' => [
                'label' => 'Nome',
            ],
            'email' => [
                'label' => 'Email',
            ],
            'phone' => [
                'label' => 'Telefono',
            ],
        ],
    ],
    'label' => 'Blocks',
    'plural_label' => 'Blocks (Plurale)',
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
            'label' => 'Crea Blocks',
        ],
        'edit' => [
            'label' => 'Modifica Blocks',
        ],
        'delete' => [
            'label' => 'Elimina Blocks',
        ],
    ],
];
