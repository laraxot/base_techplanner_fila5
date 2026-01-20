<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Send SMS',
        'group' => 'Test',
    ],
    'fields' => [
        'to' => [
            'label' => 'Recipient',
            'placeholder' => 'Enter phone number',
            'helper_text' => 'Enter phone number with international prefix (e.g. +1)',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter message text',
            'helper_text' => 'Message cannot exceed 160 characters',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'driver' => [
            'label' => 'Provider',
            'placeholder' => 'Select SMS provider',
            'helper_text' => 'Select the provider to use for sending',
            'options' => [
                'smsfactor' => 'SMSFactor',
                'twilio' => 'Twilio',
                'nexmo' => 'Nexmo',
                'plivo' => 'Plivo',
                'gammu' => 'Gammu',
                'netfun' => 'Netfun',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'send' => [
            'label' => 'Send SMS',
            'tooltip' => 'Send an SMS message to the recipient',
        ],
    ],
    'messages' => [
        'success' => 'SMS sent successfully',
        'error' => 'Error sending SMS: :error',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
];
