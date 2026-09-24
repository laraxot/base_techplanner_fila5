<?php

declare(strict_types=1);

// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/ar/filament-navigation.php
return [
    'attributes' => [
        'external-link' => 'رابط خارجي',
        'url' => 'الرابط',
        'target' => 'الهدف',
        'name' => 'الاسم',
        'items' => 'العناصر',
        'handle' => 'المقبض',
        'created_at' => 'تم الإنشاء في',
        'updated_at' => 'تم التحديث في',
    ],
    'select-options' => [
        'same-tab' => 'نفس علامة التبويب',
        'new-tab' => 'علامة تبويب جديدة',
    ],
    'items' => [
        'empty' => 'لا يوجد عناصر.',
        'add-item' => 'إضافة عنصر',
        'add-child' => 'إضافة فرع',
        'move-up' => 'تحريك للأعلى',
        'move-down' => 'تحريك للأسفل',
        'indent' => 'إزاحة للداخل',
        'dedent' => 'إزاحة للخارج',
        'remove' => 'إزالة',
    ],
    'items-modal' => [
        'title' => 'العنوان',
        'label' => 'التسمية',
        'type' => 'النوع',
        'btn' => 'الزر',
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
