<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/pt_PT/filament-navigation.php
return [
    'attributes' => [
        'external-link' => 'Link externo',
        'url' => 'URL',
        'target' => 'Abrir em',
        'name' => 'Nome',
        'items' => 'Itens',
        'handle' => 'Referência',
        'created_at' => 'Criado em',
        'updated_at' => 'Editado em',
    ],
    'select-options' => [
        'same-tab' => 'Mesmo separador',
        'new-tab' => 'Novo separador',
    ],
    'items' => [
        'empty' => 'Nenhum item',
        'add-item' => 'Adicionar item',
        'add-child' => 'Adicionar subitem',
        'move-up' => 'Mover para cima',
        'move-down' => 'Mover para baixo',
        'indent' => 'Avançar',
        'dedent' => 'Recuar',
        'remove' => 'Remover',
    ],
    'items-modal' => [
        'title' => 'Item',
        'label' => 'Nome',
        'type' => 'Tipo',
        'btn' => 'Guardar',
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
