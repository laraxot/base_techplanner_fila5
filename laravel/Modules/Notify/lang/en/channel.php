<?php

declare(strict_types=1);

return [
    'resource' => [
<<<<<<< HEAD
        'name' => 'Canale di Notifica'],
    'navigation' => [
        'group' => 'Sistema',
        'label' => 'Canali di Notifica',
        'icon' => 'notify-channel-animated',
        'sort' => '47',
        'description' => 'Gestione dei canali di comunicazione per le notifiche'],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome identificativo del canale',
            'placeholder' => 'es: Email Marketing',
            'help' => 'Inserisci un nome univoco per identificare il canale',
=======
        'name' => 'Notification Channel'],
    'navigation' => [
        'group' => 'Sistema',
        'label' => 'Notification Channels',
        'icon' => 'notify-channel-animated',
        'sort' => '47',
        'description' => 'Manage communication channels for notifications'],
    'fields' => [
        'name' => [
            'label' => 'Name',
            'tooltip' => 'Channel identifier name',
            'placeholder' => 'es: Email Marketing',
            'help' => 'Enter a unique name to identify the channel',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'driver' => [
            'label' => 'Driver',
<<<<<<< HEAD
            'tooltip' => 'Tipo di servizio utilizzato per l\'invio',
            'help' => 'Seleziona il driver appropriato per questo canale',
            'options' => [
                'mail' => [
                    'label' => 'Email',
                    'tooltip' => 'Invio tramite server SMTP'],
                'database' => [
                    'label' => 'Database',
                    'tooltip' => 'Salvataggio nel database'],
                'broadcast' => [
                    'label' => 'Broadcast',
                    'tooltip' => 'Invio tramite websocket'],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Invio tramite gateway SMS'],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Invio tramite bot Telegram'],
                'slack' => [
                    'label' => 'Slack',
                    'tooltip' => 'Invio tramite webhook Slack']],
            'helper_text' => '',
            'description' => ''],
        'configuration' => [
            'label' => 'Configurazione',
            'tooltip' => 'Parametri di configurazione del canale',
            'help' => 'Configura i parametri necessari per il funzionamento del canale',
            'options' => [
                'host' => [
                    'label' => 'Host',
                    'tooltip' => 'Indirizzo del server',
                    'placeholder' => 'es: smtp.gmail.com'],
                'port' => [
                    'label' => 'Porta',
                    'tooltip' => 'Porta di connessione',
                    'placeholder' => 'es: 587'],
                'username' => [
                    'label' => 'Username',
                    'tooltip' => 'Nome utente per l\'autenticazione',
                    'placeholder' => 'es: user@example.com'],
                'password' => [
                    'label' => 'Password',
                    'tooltip' => 'Password per l\'autenticazione',
                    'help' => 'La password verrà criptata prima del salvataggio'],
                'encryption' => [
                    'label' => 'Crittografia',
                    'tooltip' => 'Metodo di crittografia',
=======
            'tooltip' => 'Type of service used for sending',
            'help' => 'Select the appropriate driver for this channel',
            'options' => [
                'mail' => [
                    'label' => 'Email',
                    'tooltip' => 'Send via SMTP server'],
                'database' => [
                    'label' => 'Database',
                    'tooltip' => 'Save to the database'],
                'broadcast' => [
                    'label' => 'Broadcast',
                    'tooltip' => 'Send via websocket'],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Send via SMS gateway'],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Send via Telegram bot'],
                'slack' => [
                    'label' => 'Slack',
                    'tooltip' => 'Send via Slack webhook']],
            'helper_text' => '',
            'description' => ''],
        'configuration' => [
            'label' => 'Configuration',
            'tooltip' => 'Channel configuration parameters',
            'help' => 'Configure the parameters required for the channel to work',
            'options' => [
                'host' => [
                    'label' => 'Host',
                    'tooltip' => 'Server address',
                    'placeholder' => 'es: smtp.gmail.com'],
                'port' => [
                    'label' => 'Porta',
                    'tooltip' => 'Connection port',
                    'placeholder' => 'es: 587'],
                'username' => [
                    'label' => 'Username',
                    'tooltip' => 'Username for authentication',
                    'placeholder' => 'es: user@example.com'],
                'password' => [
                    'label' => 'Password',
                    'tooltip' => 'Password for authentication',
                    'help' => 'The password will be encrypted before saving'],
                'encryption' => [
                    'label' => 'Crittografia',
                    'tooltip' => 'Encryption method',
>>>>>>> laraxot/dev
                    'options' => [
                        'tls' => [
                            'label' => 'TLS',
                            'tooltip' => 'Transport Layer Security'],
                        'ssl' => [
                            'label' => 'SSL',
                            'tooltip' => 'Secure Sockets Layer']]],
                'from_address' => [
                    'label' => 'Indirizzo mittente',
<<<<<<< HEAD
                    'tooltip' => 'Indirizzo email del mittente',
                    'placeholder' => 'es: noreply@example.com'],
                'from_name' => [
                    'label' => 'Nome mittente',
                    'tooltip' => 'Nome visualizzato del mittente',
                    'placeholder' => 'es: Sistema Notifiche'],
                'api_key' => [
                    'label' => 'API Key',
                    'tooltip' => 'Chiave API per l\'autenticazione',
                    'help' => 'Chiave fornita dal servizio per l\'autenticazione'],
=======
                    'tooltip' => 'Sender email address',
                    'placeholder' => 'es: noreply@example.com'],
                'from_name' => [
                    'label' => 'Sender name',
                    'tooltip' => 'Sender display name',
                    'placeholder' => 'e.g. Notification System'],
                'api_key' => [
                    'label' => 'API Key',
                    'tooltip' => 'API key for authentication',
                    'help' => 'Key provided by the service for authentication'],
>>>>>>> laraxot/dev
                'api_secret' => [
                    'label' => 'API Secret',
                    'tooltip' => 'Chiave segreta API',
                    'help' => 'Non condividere mai questa chiave'],
                'bot_token' => [
                    'label' => 'Token Bot',
<<<<<<< HEAD
                    'tooltip' => 'Token del bot Telegram',
                    'help' => 'Ottieni il token da @BotFather su Telegram'],
                'chat_id' => [
                    'label' => 'ID Chat',
                    'tooltip' => 'ID della chat Telegram',
                    'help' => 'ID del gruppo o canale Telegram'],
                'webhook_url' => [
                    'label' => 'URL Webhook',
                    'tooltip' => 'URL per le chiamate webhook',
=======
                    'tooltip' => 'Telegram bot token',
                    'help' => 'Get the token from @BotFather on Telegram'],
                'chat_id' => [
                    'label' => 'ID Chat',
                    'tooltip' => 'Telegram chat ID',
                    'help' => 'Telegram group or channel ID'],
                'webhook_url' => [
                    'label' => 'URL Webhook',
                    'tooltip' => 'URL for webhook calls',
>>>>>>> laraxot/dev
                    'placeholder' => 'es: https://hooks.slack.com/services/...']],
            'helper_text' => '',
            'description' => ''],
        'is_default' => [
            'label' => 'Predefinito',
            'tooltip' => 'Imposta come canale predefinito',
<<<<<<< HEAD
            'help' => 'Il canale predefinito verrà utilizzato quando non specificato diversamente',
            'helper_text' => '',
            'description' => ''],
        'is_enabled' => [
            'label' => 'Abilitato',
            'tooltip' => 'Stato di attivazione del canale',
            'help' => 'Disabilita temporaneamente il canale senza eliminarlo',
=======
            'help' => 'The default channel is used when none is specified',
            'helper_text' => '',
            'description' => ''],
        'is_enabled' => [
            'label' => 'Enabled',
            'tooltip' => 'Channel activation status',
            'help' => 'Temporarily disable the channel without deleting it',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '']],
    'actions' => [
        'test_connection' => [
            'label' => 'Testa connessione',
<<<<<<< HEAD
            'tooltip' => 'Verifica la configurazione del canale',
            'icon' => 'heroicon-o-signal',
            'color' => 'info'],
        'send_test' => [
            'label' => 'Invia test',
            'tooltip' => 'Invia un messaggio di test',
=======
            'tooltip' => 'Verify the channel configuration',
            'icon' => 'heroicon-o-signal',
            'color' => 'info'],
        'send_test' => [
            'label' => 'Send test',
            'tooltip' => 'Send a test message',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'primary',
            'confirmation' => [
                'title' => 'Conferma test',
<<<<<<< HEAD
                'message' => 'Vuoi inviare un messaggio di test?',
                'confirm' => 'Sì, invia',
=======
                'message' => 'Do you want to send a test message?',
                'confirm' => 'Yes, send',
>>>>>>> laraxot/dev
                'cancel' => 'No, annulla']]],
    'messages' => [
        'connection_success' => [
            'title' => 'Connessione Riuscita',
<<<<<<< HEAD
            'message' => 'La connessione al canale è stata stabilita con successo'],
        'connection_failed' => [
            'title' => 'Errore di Connessione',
            'message' => 'Impossibile connettersi al canale: :error'],
        'test_sent' => [
            'title' => 'Test Inviato',
            'message' => 'Il messaggio di test è stato inviato con successo'],
        'test_failed' => [
            'title' => 'Errore Test',
            'message' => 'Impossibile inviare il messaggio di test: :error']],
=======
            'message' => 'The connection to the channel was established successfully'],
        'connection_failed' => [
            'title' => 'Connection Error',
            'message' => 'Impossibile connettersi al canale: :error'],
        'test_sent' => [
            'title' => 'Test Sent',
            'message' => 'The test message was sent successfully'],
        'test_failed' => [
            'title' => 'Test Error',
            'message' => 'Unable to send the test message: :error']],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
