<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'SMS',
        'plural' => 'SMS'],
    'navigation' => [
        'name' => 'Send SMS',
        'plural' => 'Send SMS',
        'group' => [
            'name' => 'Notifications',
            'description' => 'SMS notification management'],
        'label' => 'Send SMS',
        'icon' => 'heroicon-o-device-phone-mobile',
        'sort' => '10'],
    'fields' => [
        'to' => [
            'label' => 'Phone Number',
            'placeholder' => 'Enter phone number',
            'helper_text' => 'Enter phone number with international prefix (e.g. +1)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_XQfocM
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_ZrzJYY
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter message',
            'helper_text' => 'Message cannot exceed 160 characters',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_XQfocM
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_ZrzJYY
        'driver' => [
            'label' => 'SMS Provider',
            'placeholder' => 'Select SMS provider',
            'helper_text' => 'Select the SMS provider to use',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_XQfocM
            'description' => '']],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_ZrzJYY
    'drivers' => [
        'smsfactor' => 'SMSFactor',
        'twilio' => 'Twilio',
        'nexmo' => 'Nexmo',
        'plivo' => 'Plivo',
        'gammu' => 'Gammu',
        'netfun' => 'Netfun'],
    'actions' => [
        'send' => 'Send SMS',
        'cancel' => 'Cancel'],
    'messages' => [
        'success' => 'SMS sent successfully',
<<<<<<< .merge_file_XQfocM
        'error' => 'An error occurred while sending the SMS'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'error' => 'An error occurred while sending the SMS',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_ZrzJYY
