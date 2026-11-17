<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Notifica',
        'plural' => 'Notifiche',
    ],
    'navigation' => [
<<<<<<< HEAD
        'name' => 'Gestione Notifiche',
        'plural' => 'Gestione Notifiche',
=======
        'name' => 'Notification Management',
        'plural' => 'Notification Management',
>>>>>>> laraxot/dev
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione centralizzata delle notifiche di sistema',
        ],
        'label' => 'Gestione Notifiche',
        'icon' => 'notify-notification-animated',
        'sort' => '46',
    ],
    'fields' => [
        'title' => [
            'label' => 'Titolo',
<<<<<<< HEAD
            'helper_text' => 'Titolo della notifica',
            'placeholder' => 'Inserisci il titolo',
=======
            'helper_text' => 'Notification title',
            'placeholder' => 'Enter the title',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'message' => [
<<<<<<< HEAD
            'label' => 'Messaggio',
            'helper_text' => 'Contenuto della notifica',
            'placeholder' => 'Inserisci il messaggio',
=======
            'label' => 'Message',
            'helper_text' => 'Notification content',
            'placeholder' => 'Enter the message',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'type' => [
            'label' => 'Tipo',
<<<<<<< HEAD
            'helper_text' => 'Tipologia di notifica',
            'placeholder' => 'Seleziona il tipo',
=======
            'helper_text' => 'Notification type',
            'placeholder' => 'Select the type',
>>>>>>> laraxot/dev
            'options' => [
                'system' => 'Sistema',
                'alert' => 'Avviso',
                'info' => 'Informazione',
                'success' => 'Successo',
                'warning' => 'Attenzione',
                'error' => 'Errore',
            ],
            'tooltip' => '',
            'description' => '',
        ],
        'status' => [
<<<<<<< HEAD
            'label' => 'Stato',
            'helper_text' => 'Stato corrente della notifica',
=======
            'label' => 'Status',
            'helper_text' => 'Current notification status',
>>>>>>> laraxot/dev
            'placeholder' => 'Seleziona lo stato',
            'options' => [
                'unread' => 'Non letta',
                'read' => 'Letta',
                'archived' => 'Archiviata',
            ],
            'tooltip' => '',
            'description' => '',
        ],
        'recipient' => [
<<<<<<< HEAD
            'label' => 'Destinatario',
            'helper_text' => 'Utente destinatario della notifica',
            'placeholder' => 'Seleziona il destinatario',
=======
            'label' => 'Recipient',
            'helper_text' => 'User receiving the notification',
            'placeholder' => 'Select the recipient',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'sent_at' => [
<<<<<<< HEAD
            'label' => 'Inviata il',
            'helper_text' => 'Data e ora di invio della notifica',
=======
            'label' => 'Sent at',
            'helper_text' => 'Notification send date and time',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'read_at' => [
<<<<<<< HEAD
            'label' => 'Letta il',
            'helper_text' => 'Data e ora di lettura della notifica',
=======
            'label' => 'Read at',
            'helper_text' => 'Notification read date and time',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'archived_at' => [
<<<<<<< HEAD
            'label' => 'Archiviata il',
            'helper_text' => 'Data e ora di archiviazione della notifica',
=======
            'label' => 'Archived at',
            'helper_text' => 'Notification archive date and time',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'channel' => [
<<<<<<< HEAD
            'label' => 'Canale',
            'tooltip' => 'Canale di invio della notifica',
            'helper_text' => 'Seleziona il canale attraverso cui inviare la notifica',
=======
            'label' => 'Channel',
            'tooltip' => 'Channel used to send the notification',
            'helper_text' => 'Select the channel to send the notification through',
>>>>>>> laraxot/dev
            'placeholder' => 'Seleziona un canale',
            'options' => [
                'email' => [
                    'label' => 'Email',
                    'tooltip' => 'Invia tramite email',
                ],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Invia tramite SMS',
                ],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Invia come notifica push',
                ],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Invia tramite Telegram',
                ],
            ],
            'description' => '',
        ],
        'template' => [
            'label' => 'Template',
<<<<<<< HEAD
            'tooltip' => 'Template da utilizzare per la notifica',
            'helper_text' => 'Scegli il modello predefinito per questa notifica',
=======
            'tooltip' => 'Template to use for the notification',
            'helper_text' => 'Choose the default template for this notification',
>>>>>>> laraxot/dev
            'placeholder' => 'Seleziona un template',
            'options' => [
                'subject' => [
                    'label' => 'Oggetto',
                    'tooltip' => 'Oggetto della notifica',
                    'placeholder' => 'es: Notifica importante',
                ],
                'body' => [
                    'label' => 'Corpo',
                    'tooltip' => 'Contenuto principale della notifica',
                    'placeholder' => 'Inserisci il testo della notifica...',
                ],
                'variables' => [
                    'label' => 'Variabili disponibili',
                    'tooltip' => 'Variabili che possono essere utilizzate nel template',
                    'helper_text' => 'Usa {variable} per inserire valori dinamici',
                ],
            ],
            'description' => '',
        ],
        'schedule' => [
            'label' => 'Programmazione',
<<<<<<< HEAD
            'tooltip' => 'Quando inviare la notifica',
            'helper_text' => 'Imposta quando la notifica deve essere inviata',
            'placeholder' => 'Seleziona l\'opzione di programmazione',
=======
            'tooltip' => 'When to send the notification',
            'helper_text' => 'Set when the notification should be sent',
            'placeholder' => 'Select the scheduling option',
>>>>>>> laraxot/dev
            'options' => [
                'immediate' => [
                    'label' => 'Immediata',
                    'tooltip' => 'Invia subito la notifica',
                ],
                'scheduled' => [
                    'label' => 'Programmata',
                    'tooltip' => 'Programma l\'invio per una data specifica',
                ],
                'date' => [
                    'label' => 'Data',
                    'tooltip' => 'Data di invio programmato',
                    'placeholder' => 'es: 01/01/2024',
                ],
                'time' => [
                    'label' => 'Ora',
                    'tooltip' => 'Ora di invio programmato',
                    'placeholder' => 'es: 14:30',
                ],
            ],
            'description' => '',
        ],
        'applyFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'mark_as_read' => [
            'label' => 'Segna come letta',
            'tooltip' => 'Marca la notifica come letta',
            'success_message' => 'Notifica segnata come letta',
            'error_message' => 'Errore nel segnare la notifica come letta',
        ],
        'mark_as_unread' => [
            'label' => 'Segna come non letta',
            'tooltip' => 'Marca la notifica come non letta',
            'success_message' => 'Notifica segnata come non letta',
            'error_message' => 'Errore nel segnare la notifica come non letta',
        ],
        'archive' => [
            'label' => 'Archivia',
            'tooltip' => 'Archivia la notifica',
            'success_message' => 'Notifica archiviata con successo',
            'error_message' => 'Errore nell\'archiviazione della notifica',
        ],
        'unarchive' => [
            'label' => 'Ripristina',
            'tooltip' => 'Ripristina la notifica archiviata',
            'success_message' => 'Notifica ripristinata con successo',
            'error_message' => 'Errore nel ripristino della notifica',
        ],
        'send' => [
            'label' => 'Invia',
            'tooltip' => 'Invia la notifica',
            'success_message' => 'Notifica inviata con successo',
            'error_message' => 'Errore nell\'invio della notifica',
        ],
        'resend' => [
            'label' => 'Invia nuovamente',
            'tooltip' => 'Invia nuovamente la notifica',
            'success_message' => 'Notifica inviata nuovamente con successo',
            'error_message' => 'Errore nell\'invio della notifica',
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina definitivamente la notifica',
            'success_message' => 'Notifica eliminata con successo',
            'error_message' => 'Errore nell\'eliminazione della notifica',
            'confirmation' => 'Sei sicuro di voler eliminare questa notifica? Questa azione non può essere annullata.',
        ],
    ],
    'messages' => [
        'no_notifications' => 'Non hai notifiche',
<<<<<<< HEAD
        'all_read' => 'Tutte le notifiche sono state lette',
=======
        'all_read' => 'All notifications have been read',
>>>>>>> laraxot/dev
        'mark_all_read' => 'Segna tutte come lette',
        'notification_sent' => 'Notifica inviata con successo',
        'notification_error' => 'Si è verificato un errore durante l\'invio della notifica',
        'delete_confirmation' => 'Sei sicuro di voler eliminare questa notifica?',
        'batch_action_confirmation' => 'Sei sicuro di voler eseguire questa azione su tutte le notifiche selezionate?',
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore durante l\'operazione',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
