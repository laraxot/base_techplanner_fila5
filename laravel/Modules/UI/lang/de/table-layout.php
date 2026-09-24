<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/de/table-layout.php
return [
    'list' => [
        'label' => 'Liste',
        'description' => 'Traditionelle Listenansicht',
        'tooltip' => 'Elemente im Listenformat anzeigen',
        'helper_text' => 'Traditionelles Layout mit Zeilen und Spalten',
        'color' => 'primary',
        'icon' => 'heroicon-o-list-bullet',
    ],
    'grid' => [
        'label' => 'Raster',
        'description' => 'Rasteransicht mit Karten',
        'tooltip' => 'Elemente im Rasterformat anzeigen',
        'helper_text' => 'Rasterlayout mit responsiven Karten',
        'color' => 'secondary',
        'icon' => 'heroicon-o-squares-2x2',
    ],
    'toggle' => [
        'label' => 'Layout Wechseln',
        'tooltip' => 'Zwischen Listen- und Rasteransicht wechseln',
        'helper_text' => 'Anzeigetyp ändern',
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
