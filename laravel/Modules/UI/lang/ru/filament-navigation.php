<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/ru/filament-navigation.php
return [
    'attributes' => [
        'external-link' => 'Внешняя ссылка',
        'url' => 'URL',
        'target' => 'Открыть в',
        'name' => 'Название',
        'items' => 'Элементы',
        'handle' => 'Идентификатор',
        'created_at' => 'Создано в',
        'updated_at' => 'Изменено в',
    ],
    'select-options' => [
        'same-tab' => 'Этой вкладке',
        'new-tab' => 'Новой вкладке',
    ],
    'items' => [
        'empty' => 'Нет элементов',
        'add-item' => 'Добавить элемент',
        'add-child' => 'Добавить дочерний',
        'move-up' => 'Переместить выше',
        'move-down' => 'Переместить ниже',
        'indent' => 'Indent',
        'dedent' => 'Dedent',
        'remove' => 'Удалить',
    ],
    'items-modal' => [
        'title' => 'Элемент',
        'label' => 'Название',
        'type' => 'Тип',
        'btn' => 'Сохранить',
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
