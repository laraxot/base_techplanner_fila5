<?php

declare(strict_types=1);

return [
    'fields' => [
        'recipient' => [
            'label' => 'Recipient',
            'helper_text' => 'Enter the phone number in international format (e.g. +393401234567).',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
            'description' => '',
        ],
        'to' => [
            'label' => 'Recipient',
            'helper_text' => 'Enter the phone number in international format (e.g. +393401234567).',
            'tooltip' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'to' => [
             'label' => 'Recipient',
             'helper_text' => 'Enter the phone number in international format (e.g. +393401234567).',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'message' => [
            'label' => 'Message',
            'helper_text' => 'Enter the message content (max 160 characters for a single SMS).',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'driver' => [
            'label' => 'SMS Driver',
            'helper_text' => 'Select the provider for sending the SMS.',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
    ],
    'actions' => [
        'send' => 'Send SMS',
    ],
    'notifications' => [
        'sent' => [
            'title' => 'SMS Sent',
            'body' => 'The message has been accepted by the provider.',
        ],
        'error' => [
            'title' => 'Sending Error',
            'body' => 'An error occurred while sending the SMS.',
        ],
    ],
    'form' => [
        'to' => [
            'label' => 'Recipient',
            'helper' => 'Phone number with international prefix.',
        ],
        'from' => [
            'label' => 'Sender',
            'helper' => 'Sender name or number (max 11 characters).',
        ],
        'body' => [
            'label' => 'Message Text',
            'helper' => 'Content of the SMS to send.',
        ],
        'provider' => [
            'label' => 'Provider',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
