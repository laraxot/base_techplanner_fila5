<?php

declare(strict_types=1);

return [
    'resource' => [
<<<<<<< HEAD
        'name' => 'Notifica',
    ],
    'navigation' => [
        'name' => 'Notifica',
        'plural' => 'Notifiche',
        'group' => 'Sistema',
        'label' => 'Notifiche',
=======
        'name' => 'Notification',
    ],
    'navigation' => [
        'name' => 'Notification',
        'plural' => 'Notifications',
        'group' => 'Sistema',
        'label' => 'Notifications',
>>>>>>> laraxot/dev
        'icon' => 'notify-bell-animated',
        'sort' => '45',
    ],
    'fields' => [
        'title' => [
            'label' => 'Titolo',
<<<<<<< HEAD
            'tooltip' => 'Titolo della notifica',
            'placeholder' => 'es: Aggiornamento sistema',
            'help' => 'Inserisci un titolo chiaro e conciso',
=======
            'tooltip' => 'Notification title',
            'placeholder' => 'e.g. System update',
            'help' => 'Enter a clear, concise title',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '',
        ],
        'message' => [
<<<<<<< HEAD
            'label' => 'Messaggio',
            'tooltip' => 'Contenuto della notifica',
            'placeholder' => 'es: Il sistema verrà aggiornato alle ore...',
            'help' => 'Inserisci il messaggio completo della notifica',
=======
            'label' => 'Message',
            'tooltip' => 'Notification content',
            'placeholder' => 'e.g. The system will be updated at...',
            'help' => 'Enter the full notification message',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '',
        ],
        'type' => [
            'label' => 'Tipo',
<<<<<<< HEAD
            'tooltip' => 'Tipo di notifica',
            'options' => [
                'system' => [
                    'label' => 'Sistema',
                    'tooltip' => 'Notifiche di sistema e manutenzione',
=======
            'tooltip' => 'Notification type',
            'options' => [
                'system' => [
                    'label' => 'Sistema',
                    'tooltip' => 'System and maintenance notifications',
>>>>>>> laraxot/dev
                ],
                'alert' => [
                    'label' => 'Avviso',
                    'tooltip' => 'Avvisi importanti',
                ],
                'info' => [
                    'label' => 'Informazione',
                    'tooltip' => 'Informazioni generali',
                ],
                'success' => [
                    'label' => 'Successo',
<<<<<<< HEAD
                    'tooltip' => 'Operazioni completate con successo',
                ],
                'warning' => [
                    'label' => 'Attenzione',
                    'tooltip' => 'Avvisi che richiedono attenzione',
                ],
                'error' => [
                    'label' => 'Errore',
=======
                    'tooltip' => 'Operations completed successfully',
                ],
                'warning' => [
                    'label' => 'Attenzione',
                    'tooltip' => 'Warnings that need attention',
                ],
                'error' => [
                    'label' => 'Error',
>>>>>>> laraxot/dev
                    'tooltip' => 'Errori e problemi',
                ],
            ],
            'helper_text' => '',
            'description' => '',
        ],
        'status' => [
<<<<<<< HEAD
            'label' => 'Stato',
            'tooltip' => 'Stato corrente della notifica',
            'options' => [
                'unread' => [
                    'label' => 'Non letta',
                    'tooltip' => 'Notifica non ancora visualizzata',
                ],
                'read' => [
                    'label' => 'Letta',
                    'tooltip' => 'Notifica già visualizzata',
                ],
                'archived' => [
                    'label' => 'Archiviata',
                    'tooltip' => 'Notifica spostata nell\'archivio',
=======
            'label' => 'Status',
            'tooltip' => 'Current notification status',
            'options' => [
                'unread' => [
                    'label' => 'Non letta',
                    'tooltip' => 'Notification not yet viewed',
                ],
                'read' => [
                    'label' => 'Letta',
                    'tooltip' => 'Notification already viewed',
                ],
                'archived' => [
                    'label' => 'Archiviata',
                    'tooltip' => 'Notification moved to the archive',
>>>>>>> laraxot/dev
                ],
            ],
            'helper_text' => '',
            'description' => '',
        ],
        'recipient' => [
<<<<<<< HEAD
            'label' => 'Destinatario',
            'tooltip' => 'Utente o gruppo destinatario della notifica',
            'placeholder' => 'es: mario.rossi@example.com',
            'help' => 'Seleziona uno o più destinatari',
=======
            'label' => 'Recipient',
            'tooltip' => 'User or group receiving the notification',
            'placeholder' => 'es: mario.rossi@example.com',
            'help' => 'Select one or more recipients',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '',
        ],
        'sent_at' => [
<<<<<<< HEAD
            'label' => 'Inviata il',
            'tooltip' => 'Data e ora di invio della notifica',
=======
            'label' => 'Sent at',
            'tooltip' => 'Notification send date and time',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '',
        ],
        'read_at' => [
<<<<<<< HEAD
            'label' => 'Letta il',
            'tooltip' => 'Data e ora di lettura della notifica',
=======
            'label' => 'Read at',
            'tooltip' => 'Notification read date and time',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '',
        ],
        'archived_at' => [
<<<<<<< HEAD
            'label' => 'Archiviata il',
            'tooltip' => 'Data e ora di archiviazione della notifica',
=======
            'label' => 'Archived at',
            'tooltip' => 'Notification archive date and time',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'mark_as_read' => [
            'label' => 'Segna come letta',
            'tooltip' => 'Segna questa notifica come letta',
            'icon' => 'heroicon-o-check',
            'color' => 'success',
        ],
        'mark_as_unread' => [
<<<<<<< HEAD
            'label' => 'Segna come non letta',
            'tooltip' => 'Segna questa notifica come non letta',
=======
            'label' => 'Mark as unread',
            'tooltip' => 'Mark this notification as unread',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-x-circle',
            'color' => 'warning',
        ],
        'archive' => [
            'label' => 'Archivia',
            'tooltip' => 'Sposta questa notifica nell\'archivio',
            'icon' => 'heroicon-o-archive-box',
            'color' => 'info',
        ],
        'unarchive' => [
            'label' => 'Ripristina',
            'tooltip' => 'Ripristina questa notifica dall\'archivio',
            'icon' => 'heroicon-o-archive-box-arrow-down',
            'color' => 'primary',
        ],
        'delete' => [
<<<<<<< HEAD
            'label' => 'Elimina',
            'tooltip' => 'Elimina definitivamente questa notifica',
=======
            'label' => 'Delete',
            'tooltip' => 'Permanently delete this notification',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-trash',
            'color' => 'danger',
            'confirmation' => [
                'title' => 'Conferma eliminazione',
<<<<<<< HEAD
                'message' => 'Sei sicuro di voler eliminare questa notifica?',
                'confirm' => 'Sì, elimina',
=======
                'message' => 'Are you sure you want to delete this notification?',
                'confirm' => 'Yes, delete',
>>>>>>> laraxot/dev
                'cancel' => 'No, annulla',
            ],
        ],
        'mark_all_read' => [
            'label' => 'Segna tutte come lette',
<<<<<<< HEAD
            'tooltip' => 'Segna tutte le notifiche come lette',
=======
            'tooltip' => 'Mark all notifications as read',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-check-circle',
            'color' => 'success',
        ],
        'archive_all' => [
            'label' => 'Archivia tutte',
<<<<<<< HEAD
            'tooltip' => 'Sposta tutte le notifiche nell\'archivio',
=======
            'tooltip' => 'Move all notifications to the archive',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-archive-box-arrow-down',
            'color' => 'info',
            'confirmation' => [
                'title' => 'Conferma archiviazione',
<<<<<<< HEAD
                'message' => 'Sei sicuro di voler archiviare tutte le notifiche?',
                'confirm' => 'Sì, archivia tutte',
=======
                'message' => 'Are you sure you want to archive all notifications?',
                'confirm' => 'Yes, archive all',
>>>>>>> laraxot/dev
                'cancel' => 'No, annulla',
            ],
        ],
        'delete_all' => [
<<<<<<< HEAD
            'label' => 'Elimina tutte',
            'tooltip' => 'Elimina definitivamente tutte le notifiche',
=======
            'label' => 'Delete all',
            'tooltip' => 'Permanently delete all notifications',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-trash',
            'color' => 'danger',
            'confirmation' => [
                'title' => 'Conferma eliminazione',
<<<<<<< HEAD
                'message' => 'Sei sicuro di voler eliminare tutte le notifiche?',
                'confirm' => 'Sì, elimina tutte',
=======
                'message' => 'Are you sure you want to delete all notifications?',
                'confirm' => 'Yes, delete all',
>>>>>>> laraxot/dev
                'cancel' => 'No, annulla',
            ],
        ],
    ],
    'messages' => [
<<<<<<< HEAD
        'no_notifications' => 'Nessuna notifica',
        'success_sent' => 'Notifica inviata con successo',
        'error_sent' => 'Errore nell\'invio della notifica',
    ],
    'filters' => [
        'all' => [
            'label' => 'Tutte',
            'tooltip' => 'Mostra tutte le notifiche',
        ],
        'unread' => [
            'label' => 'Non lette',
            'tooltip' => 'Mostra solo le notifiche non lette',
        ],
        'read' => [
            'label' => 'Lette',
            'tooltip' => 'Mostra solo le notifiche lette',
        ],
        'archived' => [
            'label' => 'Archiviate',
            'tooltip' => 'Mostra solo le notifiche archiviate',
        ],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Filtra per tipo di notifica',
        ],
        'date' => [
            'label' => 'Data',
            'tooltip' => 'Filtra per data',
=======
        'no_notifications' => 'No notifications',
        'success_sent' => 'Notification sent successfully',
        'error_sent' => 'Error sending the notification',
    ],
    'filters' => [
        'all' => [
            'label' => 'All',
            'tooltip' => 'Show all notifications',
        ],
        'unread' => [
            'label' => 'Non lette',
            'tooltip' => 'Show only unread notifications',
        ],
        'read' => [
            'label' => 'Lette',
            'tooltip' => 'Show only read notifications',
        ],
        'archived' => [
            'label' => 'Archiviate',
            'tooltip' => 'Show only archived notifications',
        ],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Filter by notification type',
        ],
        'date' => [
            'label' => 'Date',
            'tooltip' => 'Filter by date',
>>>>>>> laraxot/dev
        ],
    ],
    'badges' => [
        'unread' => [
            'label' => 'Non letta',
<<<<<<< HEAD
            'tooltip' => 'Questa notifica non è ancora stata letta',
        ],
        'priority' => [
            'label' => 'Priorità',
            'tooltip' => 'Livello di priorità della notifica',
            'options' => [
                'high' => [
                    'label' => 'Alta priorità',
                    'tooltip' => 'Richiede attenzione immediata',
                ],
                'medium' => [
                    'label' => 'Media priorità',
                    'tooltip' => 'Richiede attenzione in giornata',
                ],
                'low' => [
                    'label' => 'Bassa priorità',
                    'tooltip' => 'Può essere gestita in seguito',
=======
            'tooltip' => 'This notification has not been read yet',
        ],
        'priority' => [
            'label' => 'Priority',
            'tooltip' => 'Notification priority level',
            'options' => [
                'high' => [
                    'label' => 'High priority',
                    'tooltip' => 'Richiede attenzione immediata',
                ],
                'medium' => [
                    'label' => 'Medium priority',
                    'tooltip' => 'Richiede attenzione in giornata',
                ],
                'low' => [
                    'label' => 'Low priority',
                    'tooltip' => 'Can be handled later',
>>>>>>> laraxot/dev
                ],
            ],
        ],
    ],
    'template' => [
        'navigation' => [
<<<<<<< HEAD
            'label' => 'Template Notifiche',
            'plural' => 'Template Notifiche',
=======
            'label' => 'Notification Templates',
            'plural' => 'Notification Templates',
>>>>>>> laraxot/dev
            'group' => 'Sistema',
        ],
        'form' => [
            'name' => [
<<<<<<< HEAD
                'label' => 'Nome',
                'helper' => 'Nome univoco del template',
            ],
            'subject' => [
                'label' => 'Oggetto',
                'helper' => 'Oggetto della notifica',
            ],
            'type' => [
                'label' => 'Tipo',
                'helper' => 'Tipo di notifica',
            ],
            'body_text' => [
                'label' => 'Testo',
                'helper' => 'Versione testuale della notifica',
            ],
            'body_html' => [
                'label' => 'HTML',
                'helper' => 'Versione HTML della notifica',
            ],
            'preview_data' => [
                'label' => 'Dati Preview',
                'helper' => 'Dati JSON per il preview',
=======
                'label' => 'Name',
                'helper' => 'Unique template name',
            ],
            'subject' => [
                'label' => 'Subject',
                'helper' => 'Notification subject',
            ],
            'type' => [
                'label' => 'Tipo',
                'helper' => 'Notification type',
            ],
            'body_text' => [
                'label' => 'Text',
                'helper' => 'Plain-text version of the notification',
            ],
            'body_html' => [
                'label' => 'HTML',
                'helper' => 'HTML version of the notification',
            ],
            'preview_data' => [
                'label' => 'Dati Preview',
                'helper' => 'JSON data for the preview',
>>>>>>> laraxot/dev
            ],
            'attachments' => [
                'label' => 'Allegati',
                'helper' => 'Allegati alla notifica (max 5 file, 5MB ciascuno)',
            ],
        ],
        'preview' => [
            'title' => 'Anteprima Template',
<<<<<<< HEAD
            'subheading' => 'Visualizza come apparirà la notifica',
=======
            'subheading' => 'Show how the notification will look',
>>>>>>> laraxot/dev
            'text_version' => 'Versione Testuale',
            'html_version' => 'Versione HTML',
        ],
    ],
    'enums' => [
        'notification_type' => [
            'email' => 'Email',
            'sms' => 'SMS',
<<<<<<< HEAD
            'push' => 'Notifica Push',
=======
            'push' => 'Push Notification',
>>>>>>> laraxot/dev
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'alert' => [
        'sent' => [
            'message' => 'Alert Sent',
        ],
    ],
];
