<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Enter template name',
            'help' => 'The identifying name of the template',
            'tooltip' => 'This field is required',
<<<<<<< HEAD
            'helper_text' => 'Inserisci un nome descrittivo per il template',
=======
            'helper_text' => 'Enter a descriptive name for the template',
>>>>>>> laraxot/dev
            'description' => ''],
        'subject' => [
            'label' => 'Subject',
            'placeholder' => 'Enter notification subject',
            'help' => 'The subject that will appear in the notification',
            'tooltip' => 'This field is required',
<<<<<<< HEAD
            'helper_text' => 'Oggetto visualizzato nella notifica (es. oggetto email)',
=======
            'helper_text' => 'Subject shown in the notification (e.g. email subject)',
>>>>>>> laraxot/dev
            'description' => ''],
        'body_text' => [
            'label' => 'Text',
            'placeholder' => 'Enter notification text',
            'help' => 'The text content of the notification',
            'tooltip' => 'This field is required',
            'helper_text' => '',
            'description' => ''],
        'body_html' => [
            'label' => 'HTML',
            'placeholder' => 'Enter notification HTML content',
            'help' => 'The HTML content of the notification',
            'tooltip' => 'This field is required',
            'helper_text' => '',
            'description' => ''],
        'preview_data' => [
            'label' => 'Preview Data',
            'placeholder' => 'Enter preview data',
            'help' => 'The data used to display the preview',
            'tooltip' => 'JSON format',
            'helper_text' => '',
            'description' => ''],
        'description' => [
            'label' => 'Descrizione',
<<<<<<< HEAD
            'tooltip' => 'Descrizione del template',
            'placeholder' => 'es: Template per le notifiche di scadenza',
            'helper_text' => 'Breve descrizione dello scopo del template',
            'description' => ''],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Tipologia di notifica',
            'placeholder' => 'Seleziona il tipo di notifica',
            'helper_text' => 'Il tipo determina il canale di invio della notifica',
            'options' => [
                'email' => 'Email',
                'sms' => 'SMS',
                'push' => 'Notifica Push',
=======
            'tooltip' => 'Template description',
            'placeholder' => 'e.g. Template for expiry notifications',
            'helper_text' => 'Short description of the template\'s purpose',
            'description' => ''],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Notification type',
            'placeholder' => 'Select the notification type',
            'helper_text' => 'The type determines the channel used to send the notification',
            'options' => [
                'email' => 'Email',
                'sms' => 'SMS',
                'push' => 'Push Notification',
>>>>>>> laraxot/dev
                'telegram' => 'Telegram',
                'whatsapp' => 'WhatsApp'],
            'description' => ''],
        'content' => [
            'label' => 'Contenuto',
<<<<<<< HEAD
            'tooltip' => 'Corpo del messaggio',
            'placeholder' => 'Inserisci il testo del messaggio',
            'helper_text' => 'Contenuto principale della notifica',
=======
            'tooltip' => 'Message body',
            'placeholder' => 'Enter the message text',
            'helper_text' => 'Main notification content',
>>>>>>> laraxot/dev
            'description' => ''],
        'variables' => [
            'label' => 'Variabili',
            'tooltip' => 'Variabili disponibili',
            'placeholder' => '{{nome}}, {{email}}, ecc.',
<<<<<<< HEAD
            'helper_text' => 'Variabili che possono essere utilizzate nel template',
            'description' => ''],
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato del template',
            'helper_text' => 'Se attivo, il template può essere utilizzato per l\'invio di notifiche',
            'description' => ''],
        'created_at' => [
            'label' => 'Data creazione',
            'tooltip' => 'Data di creazione del template',
=======
            'helper_text' => 'Variables that can be used in the template',
            'description' => ''],
        'is_active' => [
            'label' => 'Active',
            'tooltip' => 'Template status',
            'helper_text' => 'If active, the template can be used to send notifications',
            'description' => ''],
        'created_at' => [
            'label' => 'Created at',
            'tooltip' => 'Template creation date',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'updated_at' => [
            'label' => 'Ultima modifica',
<<<<<<< HEAD
            'tooltip' => 'Data dell\'ultima modifica del template',
=======
            'tooltip' => 'Template last modified date',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '']],
    'navigation' => [
        'label' => 'Notification Templates',
        'group' => [
            'name' => 'Sistema',
<<<<<<< HEAD
            'description' => 'Gestione dei modelli per le notifiche'],
        'icon' => 'heroicon-o-bell',
        'name' => 'Template Notifiche',
        'plural' => 'Template Notifiche',
=======
            'description' => 'Manage notification templates'],
        'icon' => 'heroicon-o-bell',
        'name' => 'Notification Templates',
        'plural' => 'Notification Templates',
>>>>>>> laraxot/dev
        'sort' => '48'],
    'messages' => [
        'success' => [
            'created' => 'Template created successfully',
            'updated' => 'Template updated successfully',
            'deleted' => 'Template deleted successfully'],
        'errors' => [
            'not_found' => 'Template not found',
            'unauthorized' => 'Unauthorized'],
<<<<<<< HEAD
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
            'error_message' => 'Errore nell\'invio della notifica di test']],
=======
        'error' => 'An error occurred during the operation',
        'confirmation' => 'Are you sure you want to proceed with this operation?',
        'template_created' => 'The template was created successfully',
        'template_updated' => 'The template was updated successfully',
        'template_deleted' => 'The template was deleted successfully'],
    'resource' => [
        'name' => 'Notification Templates',
        'plural' => 'Notification Templates'],
    'actions' => [
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Preview the template',
            'icon' => 'heroicon-o-eye',
            'success_message' => 'Preview generated successfully',
            'error_message' => 'Error generating the preview'],
        'duplicate' => [
            'label' => 'Duplica',
            'tooltip' => 'Create a copy of the template',
            'icon' => 'heroicon-o-document-duplicate',
            'success_message' => 'Template duplicated successfully',
            'error_message' => 'Error duplicating the template'],
        'test' => [
            'label' => 'Test',
            'tooltip' => 'Send a test notification',
            'icon' => 'heroicon-o-paper-airplane',
            'success_message' => 'Test notification sent successfully',
            'error_message' => 'Error sending the test notification']],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
