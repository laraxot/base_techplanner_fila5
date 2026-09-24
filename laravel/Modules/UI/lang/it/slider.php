<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/slider.php
=======
>>>>>>> laraxot/dev
return [
    'fields' => [
        'method' => ['label' => 'method', 'description' => 'method', 'helper_text' => 'method', 'placeholder' => 'method', 'tooltip' => ''],
        '_tpl' => ['label' => '_tpl', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'view' => ['label' => 'view', 'tooltip' => '', 'helper_text' => '', 'description' => '', 'placeholder' => 'view'],
        'layout' => ['label' => 'layout', 'placeholder' => 'layout', 'helper_text' => 'layout', 'description' => 'layout'],
    ],
    'label' => 'Slider',
    'plural_label' => 'Slider (Plurale)',
    'navigation' => [
        'name' => 'Slider',
        'plural' => 'Slider',
        'group' => ['name' => 'General', 'description' => 'General Settings'],
        'label' => 'Slider',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'actions' => [
        'create' => ['label' => 'Crea Slider'],
        'edit' => ['label' => 'Modifica Slider'],
        'delete' => ['label' => 'Elimina Slider'],
    ],
];
