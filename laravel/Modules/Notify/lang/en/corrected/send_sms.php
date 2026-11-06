<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Send SMS',
        'group' => 'Test'],
    'fields' => [
        'to' => [
            'label' => 'Recipient',
            'placeholder' => 'Enter phone number',
            'helper_text' => 'Enter phone number with international prefix (e.g. +1)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_9KIPwa
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_wSyJ0U
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter message text',
            'helper_text' => 'Message cannot exceed 160 characters',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_9KIPwa
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_wSyJ0U
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
<<<<<<< .merge_file_9KIPwa
                'netfun' => 'Netfun'],
            'tooltip' => '',
            'description' => '']],
=======
                'netfun' => 'Netfun',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_wSyJ0U
    'actions' => [
        'send' => [
            'label' => 'Send SMS',
            'tooltip' => 'Send an SMS message to the recipient']],
    'messages' => [
        'success' => 'SMS sent successfully',
<<<<<<< .merge_file_9KIPwa
        'error' => 'Error sending SMS: :error'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'error' => 'Error sending SMS: :error',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_wSyJ0U
