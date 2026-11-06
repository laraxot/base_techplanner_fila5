<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< .merge_file_nhEEOY
        'label' => 'Invio Email (AWS)',
=======
<<<<<<< HEAD
        'label' => 'Invio Email (AWS]',
=======
        'label' => 'Invio Email (AWS)',
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_L7lKMs
        'group' => 'Notifiche',
        'icon' => 'heroicon-o-envelope',
        'color' => 'primary',
        'sort' => 10,
    ],
    'model' => [
        'label' => 'Email AWS',
        'plural' => 'Email AWS',
        'description' => 'Gestione invio email tramite servizio Amazon SES',
    ],
    'fields' => [
        'to' => [
            'label' => 'Destinatario Email',
            'placeholder' => 'Inserisci indirizzo email destinatario',
            'help' => 'Indirizzo email del destinatario principale del messaggio',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'subject' => [
            'label' => 'Oggetto Email',
            'placeholder' => 'Inserisci l\'oggetto del messaggio',
            'help' => 'Testo che apparirà come oggetto dell\'email ricevuta',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'body_html' => [
            'label' => 'Corpo HTML',
            'placeholder' => 'Inserisci il contenuto HTML dell\'email',
            'help' => 'Contenuto formattato in HTML per email con layout avanzato',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'template' => [
            'label' => 'Template Email',
            'placeholder' => 'Seleziona un template predefinito',
            'help' => 'Template predefinito da utilizzare per la formattazione dell\'email',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'add_attachments' => [
            'label' => 'Allegati Email',
            'placeholder' => 'Carica file da allegare al messaggio',
            'help' => 'File allegati che verranno inviati insieme all\'email',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'recipient' => [
            'label' => 'recipient',
            'placeholder' => 'recipient',
            'helper_text' => 'recipient',
            'description' => 'recipient']],
    'actions' => [
<<<<<<< .merge_file_nhEEOY
        'send_email' => ['label' => 'Invia Email', 'icon' => 'heroicon-o-paper-airplane', 'color' => 'success', 'modal_heading' => 'Conferma invio email', 'modal_description' => 'Sei sicuro di voler inviare questa email?', 'success' => 'Email inviata con successo tramite AWS SES', 'error' => 'Errore durante l\'invio dell\'email', 'confirmation' => 'L\'email verrà inviata immediatamente'],
        'logout' => ['tooltip' => 'logout', 'icon' => 'logout', 'label' => 'logout'],
        'sendEmail' => ['label' => 'sendEmail', 'icon' => 'sendEmail', 'tooltip' => 'sendEmail'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
        'profile' => ['label' => 'profile', 'icon' => 'profile', 'tooltip' => 'profile']],
    'messages' => ['loading' => 'Preparazione email in corso...', 'sent' => 'Email inviata correttamente', 'queue' => 'Email aggiunta alla coda di invio', 'failed' => 'Invio email fallito'],
=======
        'send_email' => [
            'label' => 'Invia Email',
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'success',
            'modal_heading' => 'Conferma invio email',
            'modal_description' => 'Sei sicuro di voler inviare questa email?',
            'success' => 'Email inviata con successo tramite AWS SES',
            'error' => 'Errore durante l\'invio dell\'email',
            'confirmation' => 'L\'email verrà inviata immediatamente',
        ],
        'logout' => [
            'tooltip' => 'logout',
            'icon' => 'logout',
            'label' => 'logout',
        ],
    ],
    'messages' => [
        'loading' => 'Preparazione email in corso...',
        'sent' => 'Email inviata correttamente',
        'queue' => 'Email aggiunta alla coda di invio',
        'failed' => 'Invio email fallito',
    ],
<<<<<<< HEAD
>>>>>>> .merge_file_L7lKMs
    'label' => 'Send Aws Email',
    'plural_label' => 'Send Aws Email (Plurale)',
=======
>>>>>>> 6ed19256f (.)
];
