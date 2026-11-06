<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Enter template name',
            'help' => 'The identifying name of the template',
            'tooltip' => 'This field is required',
            'helper_text' => 'Inserisci un nome descrittivo per il template',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'subject' => [
            'label' => 'Subject',
            'placeholder' => 'Enter notification subject',
            'help' => 'The subject that will appear in the notification',
            'tooltip' => 'This field is required',
            'helper_text' => 'Oggetto visualizzato nella notifica (es. oggetto email)',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'body_text' => [
            'label' => 'Text',
            'placeholder' => 'Enter notification text',
            'help' => 'The text content of the notification',
            'tooltip' => 'This field is required',
<<<<<<< HEAD
            'helper_text' => '',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'body_html' => [
            'label' => 'HTML',
            'placeholder' => 'Enter notification HTML content',
            'help' => 'The HTML content of the notification',
            'tooltip' => 'This field is required',
<<<<<<< HEAD
            'helper_text' => '',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'preview_data' => [
            'label' => 'Preview Data',
            'placeholder' => 'Enter preview data',
            'help' => 'The data used to display the preview',
            'tooltip' => 'JSON format',
<<<<<<< HEAD
            'helper_text' => '',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'description' => [
            'label' => 'Descrizione',
            'tooltip' => 'Descrizione del template',
            'placeholder' => 'es: Template per le notifiche di scadenza',
            'helper_text' => 'Breve descrizione dello scopo del template',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
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
<<<<<<< .merge_file_Oe8bBp
                'whatsapp' => 'WhatsApp'],
            'description' => ''],
=======
                'whatsapp' => 'WhatsApp',
            ],
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'content' => [
            'label' => 'Contenuto',
            'tooltip' => 'Corpo del messaggio',
            'placeholder' => 'Inserisci il testo del messaggio',
            'helper_text' => 'Contenuto principale della notifica',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'variables' => [
            'label' => 'Variabili',
            'tooltip' => 'Variabili disponibili',
            'placeholder' => '{{nome}}, {{email}}, ecc.',
            'helper_text' => 'Variabili che possono essere utilizzate nel template',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato del template',
            'helper_text' => 'Se attivo, il template può essere utilizzato per l\'invio di notifiche',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
<<<<<<< HEAD
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'created_at' => [
            'label' => 'Data creazione',
            'tooltip' => 'Data di creazione del template',
<<<<<<< HEAD
            'helper_text' => '',
<<<<<<< .merge_file_Oe8bBp
            'description' => ''],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
>>>>>>> .merge_file_HSkxbH
        'updated_at' => [
            'label' => 'Ultima modifica',
            'tooltip' => 'Data dell\'ultima modifica del template',
<<<<<<< HEAD
            'helper_text' => '',
<<<<<<< .merge_file_Oe8bBp
            'description' => '']],
=======
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
>>>>>>> .merge_file_HSkxbH
    'navigation' => [
        'label' => 'Notification Templates',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione dei modelli per le notifiche'],
        'icon' => 'heroicon-o-bell',
        'name' => 'Template Notifiche',
        'plural' => 'Template Notifiche',
        'sort' => '48'],
    'messages' => [
        'success' => [
            'created' => 'Template created successfully',
            'updated' => 'Template updated successfully',
            'deleted' => 'Template deleted successfully'],
        'errors' => [
            'not_found' => 'Template not found',
            'unauthorized' => 'Unauthorized'],
        'error' => 'Si è verificato un errore durante l\'operazione',
        'confirmation' => 'Sei sicuro di voler procedere con questa operazione?',
        'template_created' => 'Il template è stato creato con successo',
        'template_updated' => 'Il template è stato aggiornato con successo',
        'template_deleted' => 'Il template è stato eliminato con successo'],
    'resource' => [
        'name' => 'Template Notifiche',
        'plural' => 'Template Notifiche'],
    'actions' => [
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Visualizza anteprima del template',
            'icon' => 'heroicon-o-eye',
            'success_message' => 'Anteprima generata con successo',
            'error_message' => 'Errore nella generazione dell\'anteprima'],
        'duplicate' => [
            'label' => 'Duplica',
            'tooltip' => 'Crea una copia del template',
            'icon' => 'heroicon-o-document-duplicate',
            'success_message' => 'Template duplicato con successo',
            'error_message' => 'Errore nella duplicazione del template'],
        'test' => [
            'label' => 'Test',
            'tooltip' => 'Invia una notifica di test',
            'icon' => 'heroicon-o-paper-airplane',
            'success_message' => 'Notifica di test inviata con successo',
<<<<<<< .merge_file_Oe8bBp
            'error_message' => 'Errore nell\'invio della notifica di test']],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
=======
            'error_message' => 'Errore nell\'invio della notifica di test',
        ],
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
>>>>>>> .merge_file_HSkxbH
