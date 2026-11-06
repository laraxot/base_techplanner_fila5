<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'SMS senden',
        'group' => 'Test'],
    'fields' => [
        'to' => [
            'label' => 'Empfänger',
            'placeholder' => 'Telefonnummer eingeben',
            'helper_text' => 'Telefonnummer mit internationaler Vorwahl eingeben (z.B. +49)',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_yowQ1L
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_swPxyY
        'message' => [
            'label' => 'Nachricht',
            'placeholder' => 'Nachrichtentext eingeben',
            'helper_text' => 'Nachricht darf 160 Zeichen nicht überschreiten',
<<<<<<< HEAD
            'tooltip' => '',
<<<<<<< .merge_file_yowQ1L
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_swPxyY
        'driver' => [
            'label' => 'Anbieter',
            'placeholder' => 'SMS-Anbieter auswählen',
            'helper_text' => 'Wählen Sie den Anbieter für den Versand',
            'options' => [
                'smsfactor' => 'SMSFactor',
                'twilio' => 'Twilio',
                'nexmo' => 'Nexmo',
                'plivo' => 'Plivo',
                'gammu' => 'Gammu',
<<<<<<< .merge_file_yowQ1L
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
>>>>>>> .merge_file_swPxyY
    'actions' => [
        'send' => [
            'label' => 'SMS senden',
            'tooltip' => 'SMS-Nachricht an den Empfänger senden']],
    'messages' => [
        'success' => 'SMS erfolgreich gesendet',
<<<<<<< .merge_file_yowQ1L
        'error' => 'Fehler beim Senden der SMS: :error'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
        'error' => 'Fehler beim Senden der SMS: :error',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_swPxyY
