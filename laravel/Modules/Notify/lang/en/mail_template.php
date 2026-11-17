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
<<<<<<< HEAD
            'helper_text' => 'Identificativo univoco del template',
=======
            'helper_text' => 'Unique template identifier',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'mailable' => [
            'label' => 'Mailable Class',
            'placeholder' => 'Enter the Mailable class name',
            'help' => 'The PHP class that handles email sending',
            'helper_text' => 'Classe PHP che gestisce l\'invio dell\'email',
            'tooltip' => '',
<<<<<<< HEAD
=======
            'description' => 'mailable',
>>>>>>> laraxot/dev
        ],
        'subject' => [
            'label' => 'Subject',
            'placeholder' => 'Enter the email subject',
            'help' => 'The subject that will appear in the email',
            'helper_text' => 'Oggetto dell\'email',
            'tooltip' => '',
<<<<<<< HEAD
=======
            'description' => 'subject',
>>>>>>> laraxot/dev
        ],
        'html_template' => [
            'label' => 'HTML Content',
            'placeholder' => 'Enter the email HTML content',
            'help' => 'The email content in HTML format',
            'helper_text' => 'Contenuto HTML del template email',
            'tooltip' => '',
<<<<<<< HEAD
=======
            'description' => 'html_template',
>>>>>>> laraxot/dev
        ],
        'text_template' => [
            'label' => 'Text Content',
            'placeholder' => 'Enter the email text content',
            'help' => 'Text version of the email for clients that don\'t support HTML',
            'helper_text' => 'Versione testuale del template email',
            'tooltip' => '',
<<<<<<< HEAD
=======
            'description' => 'text_template',
>>>>>>> laraxot/dev
        ],
        'version' => [
            'label' => 'Version',
            'help' => 'Template version number',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
<<<<<<< HEAD
            'helper_text' => 'Data di creazione del template',
=======
            'helper_text' => 'Template creation date',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Last Modified',
<<<<<<< HEAD
            'helper_text' => 'Data dell\'ultima modifica del template',
=======
            'helper_text' => 'Template last modified date',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'from_email' => [
            'label' => 'Email mittente',
<<<<<<< HEAD
            'helper_text' => 'Indirizzo email del mittente',
=======
            'helper_text' => 'Sender email address',
>>>>>>> laraxot/dev
            'placeholder' => 'noreply@example.com',
            'tooltip' => '',
            'description' => '',
        ],
        'from_name' => [
<<<<<<< HEAD
            'label' => 'Nome mittente',
            'helper_text' => 'Nome visualizzato del mittente',
            'placeholder' => 'Nome Azienda',
=======
            'label' => 'Sender name',
            'helper_text' => 'Sender display name',
            'placeholder' => 'Company Name',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'variables' => [
            'label' => 'Variabili disponibili',
<<<<<<< HEAD
            'helper_text' => 'Elenco delle variabili che possono essere utilizzate nel template',
=======
            'helper_text' => 'List of variables that can be used in the template',
>>>>>>> laraxot/dev
            'placeholder' => 'es: {{name}}, {{email}}',
            'tooltip' => '',
            'description' => '',
        ],
        'is_markdown' => [
            'label' => 'Usa Markdown',
<<<<<<< HEAD
            'helper_text' => 'Indica se il template utilizza la sintassi Markdown',
=======
            'helper_text' => 'Whether the template uses Markdown syntax',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'status' => [
<<<<<<< HEAD
            'label' => 'Stato',
            'helper_text' => 'Stato attuale del template',
=======
            'label' => 'Status',
            'helper_text' => 'Current template status',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'layout' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'slug' => [
            'tooltip' => '',
        ],
        'name' => [
<<<<<<< HEAD
            'description' => 'Nome del template',
            'helper_text' => 'Nome descrittivo per identificare il template',
=======
            'description' => 'Template name',
            'helper_text' => 'Descriptive name to identify the template',
>>>>>>> laraxot/dev
            'placeholder' => 'Es: Benvenuto, Conferma ordine, Reset password',
            'label' => 'Nome Template',
            'tooltip' => '',
        ],
        'params' => [
            'label' => 'Parametri',
<<<<<<< HEAD
            'helper_text' => 'Inserisci i parametri separati da virgola che possono essere utilizzati nel template',
=======
            'helper_text' => 'Enter comma-separated parameters that can be used in the template',
>>>>>>> laraxot/dev
            'placeholder' => 'name, email, date, company',
            'description' => 'Parametri disponibili per il template email',
            'tooltip' => '',
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
<<<<<<< HEAD
        'sent' => 'Inviata',
=======
        'sent' => 'Sent',
>>>>>>> laraxot/dev
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
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
