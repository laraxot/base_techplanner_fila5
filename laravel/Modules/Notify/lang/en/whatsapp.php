<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'WhatsApp',
        'plural' => 'WhatsApp'],
    'navigation' => [
        'name' => 'Send WhatsApp',
        'plural' => 'Send WhatsApp',
        'group' => [
            'name' => 'Notifications',
            'description' => 'WhatsApp notification management'],
        'label' => 'Send WhatsApp',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => '20'],
    'fields' => [
        'to' => [
            'label' => 'Phone Number',
            'placeholder' => 'Enter phone number',
            'helper_text' => 'Enter phone number with international prefix (e.g. +1)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_kbd8Oy
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_LkVq03
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter message',
            'helper_text' => 'Message cannot exceed 4096 characters',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_kbd8Oy
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_LkVq03
        'driver' => [
            'label' => 'WhatsApp Provider',
            'placeholder' => 'Select WhatsApp provider',
            'helper_text' => 'Select the WhatsApp provider to use',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_kbd8Oy
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_LkVq03
        'template' => [
            'label' => 'Template',
            'placeholder' => 'Enter template name',
            'helper_text' => 'Template name (optional)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_kbd8Oy
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_LkVq03
        'parameters' => [
            'label' => 'Parameters',
            'placeholder' => 'Enter parameters',
            'helper_text' => 'Parameters for the template (optional)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_kbd8Oy
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_LkVq03
        'media_url' => [
            'label' => 'Media URL',
            'placeholder' => 'Enter media URL',
            'helper_text' => 'Media URL (optional)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_kbd8Oy
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_LkVq03
        'media_type' => [
            'label' => 'Media Type',
            'placeholder' => 'Select media type',
            'helper_text' => 'Select the media type',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_kbd8Oy
            'description' => '']],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_LkVq03
    'drivers' => [
        'twilio' => 'Twilio',
        'messagebird' => 'MessageBird',
        'vonage' => 'Vonage',
        'infobip' => 'Infobip'],
    'media_types' => [
        'image' => 'Image',
        'video' => 'Video',
        'document' => 'Document',
        'audio' => 'Audio'],
    'actions' => [
        'send' => 'Send WhatsApp',
        'cancel' => 'Cancel'],
    'messages' => [
        'success' => 'WhatsApp sent successfully',
<<<<<<< .merge_file_kbd8Oy
        'error' => 'An error occurred while sending the WhatsApp'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'error' => 'An error occurred while sending the WhatsApp',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_LkVq03
