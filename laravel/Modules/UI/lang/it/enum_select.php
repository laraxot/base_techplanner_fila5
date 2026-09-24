<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/enum_select.php
return [
    'fields' => [
        'type_id' => [
            'label' => 'Tipo',
            'placeholder' => 'Seleziona un tipo',
            'helper_text' => 'Seleziona il tipo dall\'elenco disponibile',
            'description' => 'Tipo associato all\'elemento',
        ],
        'enum' => [
            'label' => 'Valore',
            'placeholder' => 'Seleziona un valore',
            'helper_text' => 'Seleziona un valore dall\'enumerazione',
            'description' => 'Valore enumerato selezionato',
        ],
        'x' => [
            'label' => 'x',
            'placeholder' => 'x',
            'helper_text' => 'x',
            'description' => 'x',
        ],
    ],
];
