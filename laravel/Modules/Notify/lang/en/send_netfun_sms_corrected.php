<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Invio SMS Netfun',
        'plural' => 'Invio SMS Netfun'],
    'navigation' => [
        'name' => 'Invio SMS (Netfun)',
        'plural' => 'Invio SMS (Netfun)',
        'group' => [
<<<<<<< HEAD
            'name' => 'Notifiche',
            'description' => 'Gestione dell\'invio di notifiche SMS tramite Netfun'],
=======
            'name' => 'Notifications',
            'description' => 'Manage sending SMS notifications via Netfun'],
>>>>>>> laraxot/dev
        'label' => 'Invio SMS (Netfun)',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => '15'],
    'fields' => [
        'to' => [
<<<<<<< HEAD
            'label' => 'Destinatario',
            'placeholder' => 'Inserisci il numero di telefono',
            'helper_text' => 'Numero di telefono del destinatario',
            'tooltip' => '',
            'description' => ''],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Scrivi il testo del messaggio',
            'helper_text' => 'Contenuto del messaggio SMS',
=======
            'label' => 'Recipient',
            'placeholder' => 'Enter the phone number',
            'helper_text' => 'Recipient phone number',
            'tooltip' => '',
            'description' => ''],
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Write the message text',
            'helper_text' => 'SMS message content',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '']],
    'actions' => [
        'send' => [
<<<<<<< HEAD
            'label' => 'Invia',
            'tooltip' => 'Invia un messaggio SMS tramite Netfun',
            'success_message' => 'Messaggio SMS inviato con successo',
            'error_message' => 'Errore nell\'invio del messaggio SMS']],
    'messages' => [
        'success' => 'Messaggio SMS inviato con successo tramite Netfun',
        'error' => 'Si è verificato un errore durante l\'invio del messaggio SMS',
        'confirmation' => 'Sei sicuro di voler inviare questo messaggio SMS?'],
=======
            'label' => 'Send',
            'tooltip' => 'Send an SMS message via Netfun',
            'success_message' => 'SMS message sent successfully',
            'error_message' => 'Error sending the SMS message']],
    'messages' => [
        'success' => 'SMS message sent successfully via Netfun',
        'error' => 'An error occurred while sending the SMS message',
        'confirmation' => 'Are you sure you want to send this SMS message?'],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
