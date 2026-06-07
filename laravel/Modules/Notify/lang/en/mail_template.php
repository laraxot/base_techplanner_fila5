<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => [
            'name' => 'Notifiche',
            'description' => 'Gestione delle notifiche email e dei relativi template',
        ],
        'label' => 'Email Templates',
        'plural' => 'Email Templates',
        'singular' => 'Email Template',
        'icon' => 'heroicon-o-envelope',
        'sort' => '1',
        'name' => 'Template Email',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'helper_text' => 'Identificativo univoco del template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'mailable' => [
            'label' => 'Mailable Class',
            'placeholder' => 'Enter the Mailable class name',
            'help' => 'The PHP class that handles email sending',
            'helper_text' => 'Classe PHP che gestisce l\'invio dell\'email',
            'description' => 'mailable',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'subject' => [
            'label' => 'Subject',
            'placeholder' => 'Enter the email subject',
            'help' => 'The subject that will appear in the email',
            'helper_text' => 'Oggetto dell\'email',
            'description' => 'subject',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'html_template' => [
            'label' => 'HTML Content',
            'placeholder' => 'Enter the email HTML content',
            'help' => 'The email content in HTML format',
            'helper_text' => 'Contenuto HTML del template email',
            'description' => 'html_template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'text_template' => [
            'label' => 'Text Content',
            'placeholder' => 'Enter the email text content',
            'help' => 'Text version of the email for clients that don\'t support HTML',
            'helper_text' => 'Versione testuale del template email',
            'description' => 'text_template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'version' => [
            'label' => 'Version',
            'help' => 'Template version number',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'created_at' => [
            'label' => 'Created At',
            'helper_text' => 'Data di creazione del template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'updated_at' => [
            'label' => 'Last Modified',
            'helper_text' => 'Data dell\'ultima modifica del template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'from_email' => [
            'label' => 'Email mittente',
            'helper_text' => 'Indirizzo email del mittente',
            'placeholder' => 'noreply@example.com',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'from_name' => [
            'label' => 'Nome mittente',
            'helper_text' => 'Nome visualizzato del mittente',
            'placeholder' => 'Nome Azienda',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'variables' => [
            'label' => 'Variabili disponibili',
            'helper_text' => 'Elenco delle variabili che possono essere utilizzate nel template',
            'placeholder' => 'es: {{name}}, {{email}}',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'is_markdown' => [
            'label' => 'Usa Markdown',
            'helper_text' => 'Indica se il template utilizza la sintassi Markdown',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'status' => [
            'label' => 'Stato',
            'helper_text' => 'Stato attuale del template',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'layout' => [
            'label' => 'layout',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'layout' => [
            'label' => 'layout',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'slug' => [
            'label' => 'slug',
            'description' => 'slug',
            'helper_text' => 'slug',
            'placeholder' => 'slug',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'name' => [
            'description' => 'Nome del template',
            'helper_text' => 'Nome descrittivo per identificare il template',
            'placeholder' => 'Es: Benvenuto, Conferma ordine, Reset password',
            'label' => 'Nome Template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'params' => [
            'label' => 'Parametri',
            'helper_text' => 'Inserisci i parametri separati da virgola che possono essere utilizzati nel template',
            'placeholder' => 'name, email, date, company',
            'description' => 'Parametri disponibili per il template email',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
    ],
    'filters' => [
        'search_placeholder' => 'Search templates...',
        'version' => [
            'label' => 'Version',
            'placeholder' => 'Select version',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'New Template',
            'modal' => [
                'heading' => 'Create Email Template',
                'description' => 'Enter the details for the new email template',
                'submit' => 'Create',
            ],
        ],
        'edit' => [
            'label' => 'Edit',
            'modal' => [
                'heading' => 'Edit Email Template',
                'description' => 'Modify the email template details',
                'submit' => 'Save',
            ],
        ],
        'delete' => [
            'label' => 'Delete',
            'modal' => [
                'heading' => 'Delete Email Template',
                'description' => 'Are you sure you want to delete this template? This action cannot be undone.',
                'submit' => 'Delete',
            ],
        ],
        'restore' => [
            'label' => 'Restore',
        ],
        'force_delete' => [
            'label' => 'Force Delete',
            'modal' => [
                'heading' => 'Force Delete Email Template',
                'description' => 'Are you sure you want to permanently delete this template? This action cannot be undone.',
                'submit' => 'Force Delete',
            ],
        ],
        'new_version' => [
            'label' => 'New Version',
            'modal' => [
                'heading' => 'Create New Version',
                'description' => 'Create a new version of the email template',
                'submit' => 'Create Version',
            ],
        ],
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Visualizza anteprima dell\'email',
            'success_message' => 'Anteprima generata con successo',
            'error_message' => 'Errore nella generazione dell\'anteprima',
        ],
        'test' => [
            'label' => 'Invia test',
            'tooltip' => 'Invia un\'email di test',
            'success_message' => 'Email di test inviata con successo',
            'error_message' => 'Errore nell\'invio dell\'email di test',
        ],
        'duplicate' => [
            'label' => 'Duplica',
            'tooltip' => 'Crea una copia del template',
            'success_message' => 'Template duplicato con successo',
            'error_message' => 'Errore nella duplicazione del template',
        ],
        'export' => [
            'label' => 'Esporta',
            'tooltip' => 'Esporta il template in formato JSON',
            'success_message' => 'Template esportato con successo',
            'error_message' => 'Errore nell\'esportazione del template',
        ],
        'import' => [
            'label' => 'Importa',
            'tooltip' => 'Importa un template da un file JSON',
            'success_message' => 'Template importato con successo',
            'error_message' => 'Errore nell\'importazione del template',
        ],
    ],
    'messages' => [
        'created' => 'Email template created successfully.',
        'updated' => 'Email template updated successfully.',
        'deleted' => 'Email template deleted successfully.',
        'restored' => 'Email template restored successfully.',
        'force_deleted' => 'Email template permanently deleted.',
        'version_created' => 'New template version created successfully.',
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore durante l\'operazione',
        'confirmation' => 'Sei sicuro di voler procedere con questa operazione?',
        'template_created' => 'Il template email è stato creato con successo',
        'template_updated' => 'Il template email è stato aggiornato con successo',
        'template_deleted' => 'Il template email è stato eliminato con successo',
    ],
    'sections' => [
        'template' => [
            'label' => 'Template',
            'description' => 'Main template information',
        ],
        'versions' => [
            'label' => 'Versions',
            'description' => 'Template version history',
        ],
        'logs' => [
            'label' => 'Logs',
            'description' => 'Template sending history',
        ],
        'main' => 'Informazioni Principali',
        'content' => 'Contenuto',
        'styling' => 'Stile',
        'settings' => 'Impostazioni',
        'variables' => 'Variabili',
    ],
    'resource' => [
        'name' => 'Template Email',
        'plural' => 'Template Email',
    ],
    'status' => [
        'sent' => 'Inviata',
        'delivered' => 'Consegnata',
        'failed' => 'Fallita',
        'opened' => 'Aperta',
        'clicked' => 'Cliccata',
        'bounced' => 'Respinta',
        'spam' => 'Segnalata come spam',
    ],
    'model' => [
        'label' => 'mail template.model',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> dev
];
