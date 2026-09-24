<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/table_layout_enum.php
=======
>>>>>>> laraxot/dev
return [
    'values' => [
        'list' => [
            'label' => 'Lista',
            'color' => 'primary',
            'icon' => 'heroicon-o-list-bullet',
            'description' => 'Layout a lista tradizionale con righe di tabella',
            'tooltip' => 'Visualizza i dati in formato tabella strutturata',
            'helper_text' => 'Ideale per visualizzare molti dati in modo organizzato',
        ],
        'grid' => [
            'label' => 'Griglia',
            'color' => 'secondary',
            'icon' => 'heroicon-o-squares-2x2',
            'description' => 'Layout a griglia responsive con card',
            'tooltip' => 'Visualizza i dati in formato card responsive',
            'helper_text' => 'Ideale per visualizzare pochi dati con focus visivo',
        ],
    ],
<<<<<<< HEAD
    // Chiavi flat lette da TableLayoutEnum::getTooltip()/getHelperText() ("{value}.tooltip").
    'list' => [
        'label' => 'Lista',
        'color' => 'primary',
        'icon' => 'heroicon-o-list-bullet',
        'description' => 'Layout a lista tradizionale con righe di tabella',
        'tooltip' => 'Visualizza i dati in formato tabella strutturata',
        'helper_text' => 'Ideale per visualizzare molti dati in modo organizzato',
    ],
    'grid' => [
        'label' => 'Griglia',
        'color' => 'secondary',
        'icon' => 'heroicon-o-squares-2x2',
        'description' => 'Layout a griglia responsive con card',
        'tooltip' => 'Visualizza i dati in formato card responsive',
        'helper_text' => 'Ideale per visualizzare pochi dati con focus visivo',
    ],
=======
>>>>>>> laraxot/dev
    'label' => 'Table Layout Enum',
    'plural_label' => 'Table Layout Enum (Plurale)',
    'navigation' => [
        'name' => 'Table Layout Enum',
        'plural' => 'Table Layout Enum',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Table Layout Enum',
        'sort' => 1,
<<<<<<< HEAD
        'icon' => 'heroicon-o-collection',
=======
        'icon' => 'heroicon-o-rectangle-stack',
>>>>>>> laraxot/dev
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
            'label' => 'Crea Table Layout Enum',
        ],
        'edit' => [
            'label' => 'Modifica Table Layout Enum',
        ],
        'delete' => [
            'label' => 'Elimina Table Layout Enum',
        ],
    ],
];
