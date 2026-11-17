<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Telegram',
        'plural' => 'Telegram'],
    'navigation' => [
        'name' => 'Invio Telegram',
        'plural' => 'Invio Telegram',
        'group' => [
<<<<<<< HEAD
            'name' => 'Notifiche',
            'description' => 'Gestione delle notifiche Telegram'],
=======
            'name' => 'Notifications',
            'description' => 'Manage Telegram notifications'],
>>>>>>> laraxot/dev
        'label' => 'Invio Telegram',
        'icon' => 'notify-telegram-animated',
        'sort' => '30'],
    'fields' => [
        'chat_id' => [
            'label' => 'ID Chat',
<<<<<<< HEAD
            'placeholder' => 'Inserisci l\'ID della chat',
            'helper_text' => 'ID della chat Telegram a cui inviare il messaggio',
            'tooltip' => '',
            'description' => ''],
        'message' => [
            'label' => 'Messaggio',
            'placeholder' => 'Inserisci il messaggio',
            'helper_text' => 'Testo del messaggio da inviare',
=======
            'placeholder' => 'Enter the chat ID',
            'helper_text' => 'Telegram chat ID to send the message to',
            'tooltip' => '',
            'description' => ''],
        'message' => [
            'label' => 'Message',
            'placeholder' => 'Enter the message',
            'helper_text' => 'Message text to send',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => ''],
        'parse_mode' => [
            'label' => 'Formato',
<<<<<<< HEAD
            'placeholder' => 'Seleziona il formato',
            'helper_text' => 'Formato di parsing del messaggio',
            'options' => [
                'text' => 'Testo semplice',
=======
            'placeholder' => 'Select the format',
            'helper_text' => 'Message parsing format',
            'options' => [
                'text' => 'Plain text',
>>>>>>> laraxot/dev
                'html' => 'HTML',
                'markdown' => 'Markdown'],
            'tooltip' => '',
            'description' => ''],
        'driver' => [
            'label' => 'Provider Telegram',
<<<<<<< HEAD
            'placeholder' => 'Seleziona il provider Telegram',
            'helper_text' => 'Seleziona il provider Telegram da utilizzare',
=======
            'placeholder' => 'Select the Telegram provider',
            'helper_text' => 'Select the Telegram provider to use',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'description' => '']],
    'drivers' => [
        'telegram' => 'Telegram',
        'botapi' => 'Bot API',
        'laravel_telegram' => 'Laravel Telegram'],
    'actions' => [
        'send' => 'Send Telegram',
<<<<<<< HEAD
        'cancel' => 'Annulla'],
    'messages' => [
        'success' => 'Messaggio Telegram inviato con successo',
        'error' => 'Si è verificato un errore durante l\'invio del messaggio Telegram'],
=======
        'cancel' => 'Cancel'],
    'messages' => [
        'success' => 'Telegram message sent successfully',
        'error' => 'An error occurred while sending the Telegram message'],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
