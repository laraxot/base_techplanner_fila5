<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Template Notifiche',
        'plural' => 'Template Notifiche',
    ],
    'navigation' => [
        'name' => 'Template Notifiche',
        'plural' => 'Template Notifiche',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione dei modelli per le notifiche',
        ],
        'label' => 'Template Notifiche',
        'icon' => 'notify-template-animated',
        'sort' => 48,
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome identificativo del template',
            'placeholder' => 'es: Notifica Scadenza',
            'helper_text' => 'Inserisci un nome descrittivo per il template',
            'help' => 'Inserisci un nome descrittivo per il template',
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'description' => '',
>>>>>>> dev
        ],
        'description' => [
            'label' => 'Descrizione',
            'tooltip' => 'Descrizione del template',
            'placeholder' => 'es: Template per le notifiche di scadenza',
            'helper_text' => 'Breve descrizione dello scopo del template',
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'description' => '',
>>>>>>> dev
        ],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Tipologia di notifica',
            'placeholder' => 'Seleziona il tipo di notifica',
            'helper_text' => 'Il tipo determina il canale di invio della notifica',
            'options' => [
                'email' => 'Email',
                'sms' => 'SMS',
                'push' => 'Notifica Push',
                'telegram' => 'Telegram',
                'whatsapp' => 'WhatsApp',
            ],
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'description' => '',
>>>>>>> dev
        ],
        'subject' => [
            'label' => 'Oggetto',
            'tooltip' => 'Oggetto della notifica',
            'placeholder' => 'es: Promemoria appuntamento',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => 'Oggetto visualizzato nella notifica (es. oggetto email]',
            'description' => '',
=======
            'helper_text' => 'Oggetto visualizzato nella notifica (es. oggetto email)',
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => 'Oggetto visualizzato nella notifica (es. oggetto email]',
            'description' => '',
>>>>>>> dev
        ],
        'content' => [
            'label' => 'Contenuto',
            'tooltip' => 'Corpo del messaggio',
            'placeholder' => 'Inserisci il testo del messaggio',
            'helper_text' => 'Contenuto principale della notifica',
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'description' => '',
>>>>>>> dev
        ],
        'variables' => [
            'label' => 'Variabili',
            'tooltip' => 'Variabili disponibili',
            'placeholder' => '{{nome}}, {{email}}, ecc.',
            'helper_text' => 'Variabili che possono essere utilizzate nel template',
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'description' => '',
>>>>>>> dev
        ],
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato del template',
            'helper_text' => 'Se attivo, il template può essere utilizzato per l\'invio di notifiche',
<<<<<<< HEAD
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'description' => '',
>>>>>>> dev
        ],
        'created_at' => [
            'label' => 'Data creazione',
            'tooltip' => 'Data di creazione del template',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'updated_at' => [
            'label' => 'Ultima modifica',
            'tooltip' => 'Data dell\'ultima modifica del template',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
    ],
    'actions' => [
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Visualizza anteprima del template',
            'icon' => 'heroicon-o-eye',
            'success_message' => 'Anteprima generata con successo',
            'error_message' => 'Errore nella generazione dell\'anteprima',
        ],
        'duplicate' => [
            'label' => 'Duplica',
            'tooltip' => 'Crea una copia del template',
            'icon' => 'heroicon-o-document-duplicate',
            'success_message' => 'Template duplicato con successo',
            'error_message' => 'Errore nella duplicazione del template',
        ],
        'test' => [
            'label' => 'Test',
            'tooltip' => 'Invia una notifica di test',
            'icon' => 'heroicon-o-paper-airplane',
            'success_message' => 'Notifica di test inviata con successo',
            'error_message' => 'Errore nell\'invio della notifica di test',
        ],
    ],
    'messages' => [
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore durante l\'operazione',
        'confirmation' => 'Sei sicuro di voler procedere con questa operazione?',
        'template_created' => 'Il template è stato creato con successo',
        'template_updated' => 'Il template è stato aggiornato con successo',
        'template_deleted' => 'Il template è stato eliminato con successo',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Template',
    'plural_label' => 'Template (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Template',
    'plural_label' => 'Template (Plurale)',
>>>>>>> dev
];
