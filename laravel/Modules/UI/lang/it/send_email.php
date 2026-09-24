<?php

declare(strict_types=1);

<<<<<<< HEAD
// UI translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/UI/docs/wiki — domain i18n only.
// File: lang/it/send_email.php
=======
>>>>>>> laraxot/dev
return [
    'fields' => [
        'to' => [
            'label' => 'to',
            'placeholder' => 'to',
            'helper_text' => 'to',
            'description' => 'to',
            'tooltip' => '',
        ],
        'subject' => [
            'label' => 'subject',
            'placeholder' => 'subject',
            'helper_text' => 'subject',
            'description' => 'subject',
            'tooltip' => '',
        ],
        'body_html' => [
            'label' => 'body_html',
            'placeholder' => 'body_html',
            'helper_text' => 'body_html',
            'description' => 'body_html',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'emailFormActions' => [
            'label' => 'emailFormActions',
        ],
    ],
    'label' => 'Send Email',
    'plural_label' => 'Send Email (Plurale)',
    'navigation' => [
        'name' => 'Send Email',
        'plural' => 'Send Email',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Send Email',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
];
