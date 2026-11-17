<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Invio Email (AWS)',
<<<<<<< HEAD
        'group' => 'Notifiche',
=======
        'group' => 'Notifications',
>>>>>>> laraxot/dev
        'icon' => 'heroicon-o-envelope',
        'color' => 'primary',
        'sort' => '10'],
    'model' => [
        'label' => 'Email AWS',
        'plural' => 'Email AWS',
<<<<<<< HEAD
        'description' => 'Gestione invio email tramite servizio Amazon SES'],
    'fields' => [
        'to' => [
            'label' => 'Destinatario Email',
            'placeholder' => 'Inserisci indirizzo email destinatario',
            'help' => 'Indirizzo email del destinatario principale del messaggio',
=======
        'description' => 'Manage sending email via Amazon SES'],
    'fields' => [
        'to' => [
            'label' => 'Email Recipient',
            'placeholder' => 'Enter the recipient email address',
            'help' => 'Email address of the main recipient of the message',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'subject' => [
<<<<<<< HEAD
            'label' => 'Oggetto Email',
            'placeholder' => 'Inserisci l\'oggetto del messaggio',
            'help' => 'Testo che apparirà come oggetto dell\'email ricevuta',
=======
            'label' => 'Email Subject',
            'placeholder' => 'Enter the message subject',
            'help' => 'Text shown as the subject of the received email',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'body_html' => [
            'label' => 'Corpo HTML',
<<<<<<< HEAD
            'placeholder' => 'Inserisci il contenuto HTML dell\'email',
            'help' => 'Contenuto formattato in HTML per email con layout avanzato',
=======
            'placeholder' => 'Enter the HTML content of the email',
            'help' => 'HTML-formatted content for emails with an advanced layout',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'template' => [
            'label' => 'Template Email',
            'placeholder' => 'Seleziona un template predefinito',
<<<<<<< HEAD
            'help' => 'Template predefinito da utilizzare per la formattazione dell\'email',
=======
            'help' => 'Default template used to format the email',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'add_attachments' => [
            'label' => 'Allegati Email',
            'placeholder' => 'Carica file da allegare al messaggio',
<<<<<<< HEAD
            'help' => 'File allegati che verranno inviati insieme all\'email',
=======
            'help' => 'Attached files that will be sent with the email',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => '']],
    'actions' => [
        'send_email' => [
<<<<<<< HEAD
            'label' => 'Invia Email',
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'success',
            'modal_heading' => 'Conferma invio email',
            'modal_description' => 'Sei sicuro di voler inviare questa email?',
            'success' => 'Email inviata con successo tramite AWS SES',
            'error' => 'Errore durante l\'invio dell\'email',
            'confirmation' => 'L\'email verrà inviata immediatamente']],
    'messages' => [
        'loading' => 'Preparazione email in corso...',
        'sent' => 'Email inviata correttamente',
        'queue' => 'Email aggiunta alla coda di invio',
=======
            'label' => 'Send Email',
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'success',
            'modal_heading' => 'Conferma invio email',
            'modal_description' => 'Are you sure you want to send this email?',
            'success' => 'Email sent successfully via AWS SES',
            'error' => 'Error while sending the email',
            'confirmation' => 'The email will be sent immediately']],
    'messages' => [
        'loading' => 'Preparazione email in corso...',
        'sent' => 'Email inviata correttamente',
        'queue' => 'Email added to the sending queue',
>>>>>>> laraxot/dev
        'failed' => 'Invio email fallito'],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
