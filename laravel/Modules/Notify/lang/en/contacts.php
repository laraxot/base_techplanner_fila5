<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => 'Sistema',
<<<<<<< HEAD
        'label' => 'Contatti Notifiche',
        'icon' => 'notify-contacts-animated',
        'sort' => '49',
        'description' => 'Gestione dei contatti per l\'invio delle notifiche'],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del contatto',
            'placeholder' => 'es: Mario Rossi',
            'help' => 'Inserisci il nome completo del contatto',
=======
        'label' => 'Notification Contacts',
        'icon' => 'notify-contacts-animated',
        'sort' => '49',
        'description' => 'Manage contacts for sending notifications'],
    'fields' => [
        'name' => [
            'label' => 'Name',
            'tooltip' => 'Contact name',
            'placeholder' => 'es: Mario Rossi',
            'help' => 'Enter the contact\'s full name',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'email' => [
            'label' => 'Email',
<<<<<<< HEAD
            'tooltip' => 'Indirizzo email del contatto',
            'placeholder' => 'es: mario.rossi@example.com',
            'help' => 'Inserisci un indirizzo email valido',
=======
            'tooltip' => 'Contact email address',
            'placeholder' => 'es: mario.rossi@example.com',
            'help' => 'Enter a valid email address',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'phone' => [
            'label' => 'Telefono',
<<<<<<< HEAD
            'tooltip' => 'Numero di telefono del contatto',
            'placeholder' => 'es: +39 123 456 7890',
            'help' => 'Inserisci il numero con prefisso internazionale',
=======
            'tooltip' => 'Contact phone number',
            'placeholder' => 'es: +39 123 456 7890',
            'help' => 'Enter the number with international prefix',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'telegram_chat_id' => [
            'label' => 'Chat ID Telegram',
<<<<<<< HEAD
            'tooltip' => 'ID della chat Telegram del contatto',
=======
            'tooltip' => 'Contact\'s Telegram chat ID',
>>>>>>> laraxot/dev
            'placeholder' => 'es: 123456789',
            'help' => 'ID numerico fornito dal bot Telegram',
            'helper_text' => '',
            'description' => ''],
        'group' => [
            'label' => 'Gruppo',
<<<<<<< HEAD
            'tooltip' => 'Gruppo di appartenenza del contatto',
            'placeholder' => 'es: Amministrazione',
            'help' => 'Organizza i contatti in gruppi per facilitarne la gestione',
=======
            'tooltip' => 'Group the contact belongs to',
            'placeholder' => 'es: Amministrazione',
            'help' => 'Organize contacts into groups to make them easier to manage',
>>>>>>> laraxot/dev
            'options' => [
                'admin' => [
                    'label' => 'Amministratori',
                    'tooltip' => 'Staff amministrativo'],
                'users' => [
<<<<<<< HEAD
                    'label' => 'Utenti',
                    'tooltip' => 'Utenti standard'],
                'support' => [
                    'label' => 'Supporto',
                    'tooltip' => 'Team di supporto']],
            'helper_text' => '',
            'description' => ''],
        'channels' => [
            'label' => 'Canali',
            'tooltip' => 'Canali di notifica preferiti',
            'help' => 'Seleziona i canali attraverso cui il contatto desidera ricevere le notifiche',
            'options' => [
                'email' => [
                    'label' => 'Email',
                    'tooltip' => 'Notifiche via email'],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Notifiche via SMS'],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Notifiche via Telegram'],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Notifiche push sul browser']],
=======
                    'label' => 'Users',
                    'tooltip' => 'Standard users'],
                'support' => [
                    'label' => 'Supporto',
                    'tooltip' => 'Support team']],
            'helper_text' => '',
            'description' => ''],
        'channels' => [
            'label' => 'Channels',
            'tooltip' => 'Preferred notification channels',
            'help' => 'Select the channels through which the contact wants to receive notifications',
            'options' => [
                'email' => [
                    'label' => 'Email',
                    'tooltip' => 'Email notifications'],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'SMS notifications'],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Telegram notifications'],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Browser push notifications']],
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'preferences' => [
            'label' => 'Preferenze',
<<<<<<< HEAD
            'tooltip' => 'Preferenze di notifica',
            'help' => 'Configura le preferenze per le notifiche',
            'options' => [
                'frequency' => [
                    'label' => 'Frequenza',
                    'tooltip' => 'Frequenza di invio delle notifiche',
                    'options' => [
                        'immediate' => [
                            'label' => 'Immediata',
                            'tooltip' => 'Invia le notifiche immediatamente'],
                        'daily' => [
                            'label' => 'Giornaliera',
                            'tooltip' => 'Raggruppa le notifiche in un digest giornaliero'],
                        'weekly' => [
                            'label' => 'Settimanale',
                            'tooltip' => 'Raggruppa le notifiche in un digest settimanale']]],
                'quiet_hours' => [
                    'label' => 'Ore di silenzio',
                    'tooltip' => 'Periodo in cui non inviare notifiche',
                    'help' => 'Le notifiche verranno inviate al termine del periodo di silenzio']],
            'helper_text' => '',
            'description' => ''],
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato di attivazione del contatto',
            'help' => 'Disattiva temporaneamente l\'invio di notifiche a questo contatto',
=======
            'tooltip' => 'Notification preferences',
            'help' => 'Configure notification preferences',
            'options' => [
                'frequency' => [
                    'label' => 'Frequenza',
                    'tooltip' => 'Notification frequency',
                    'options' => [
                        'immediate' => [
                            'label' => 'Immediata',
                            'tooltip' => 'Send notifications immediately'],
                        'daily' => [
                            'label' => 'Giornaliera',
                            'tooltip' => 'Group notifications into a daily digest'],
                        'weekly' => [
                            'label' => 'Settimanale',
                            'tooltip' => 'Group notifications into a weekly digest']]],
                'quiet_hours' => [
                    'label' => 'Quiet hours',
                    'tooltip' => 'Period during which no notifications are sent',
                    'help' => 'Notifications will be sent when the quiet period ends']],
            'helper_text' => '',
            'description' => ''],
        'is_active' => [
            'label' => 'Active',
            'tooltip' => 'Contact activation status',
            'help' => 'Temporarily stop sending notifications to this contact',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'last_notified_at' => [
            'label' => 'Ultima notifica',
<<<<<<< HEAD
            'tooltip' => 'Data e ora dell\'ultima notifica inviata',
=======
            'tooltip' => 'Date and time of the last notification sent',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => '']],
    'actions' => [
        'test_notification' => [
<<<<<<< HEAD
            'label' => 'Invia test',
            'tooltip' => 'Invia una notifica di test al contatto',
=======
            'label' => 'Send test',
            'tooltip' => 'Send a test notification to the contact',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'primary',
            'confirmation' => [
                'title' => 'Conferma invio test',
<<<<<<< HEAD
                'message' => 'Vuoi inviare una notifica di test a questo contatto?',
                'confirm' => 'Sì, invia test',
=======
                'message' => 'Do you want to send a test notification to this contact?',
                'confirm' => 'Yes, send test',
>>>>>>> laraxot/dev
                'cancel' => 'No, annulla']],
        'import' => [
            'label' => 'Importa contatti',
            'tooltip' => 'Importa contatti da file CSV',
            'icon' => 'heroicon-o-arrow-up-tray',
            'color' => 'success'],
        'export' => [
            'label' => 'Esporta contatti',
            'tooltip' => 'Esporta contatti in CSV',
            'icon' => 'heroicon-o-arrow-down-tray',
            'color' => 'info'],
        'verify_contacts' => [
            'label' => 'Verifica contatti',
<<<<<<< HEAD
            'tooltip' => 'Verifica la validità dei contatti',
=======
            'tooltip' => 'Verify the contacts are valid',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-check-circle',
            'color' => 'warning']],
    'messages' => [
        'test_sent' => [
<<<<<<< HEAD
            'title' => 'Test Inviato',
            'message' => 'La notifica di test è stata inviata con successo al contatto'],
        'test_failed' => [
            'title' => 'Errore Test',
            'message' => 'Impossibile inviare la notifica di test: :error'],
        'import_success' => [
            'title' => 'Importazione Completata',
            'message' => ':count contatti importati con successo'],
        'import_failed' => [
            'title' => 'Errore Importazione',
            'message' => 'Errore durante l\'importazione dei contatti: :error'],
        'export_success' => [
            'title' => 'Esportazione Completata',
            'message' => 'I contatti sono stati esportati con successo'],
        'verification_complete' => [
            'title' => 'Verifica Completata',
            'message' => 'La verifica dei contatti è stata completata. :valid validi, :invalid non validi']],
    'filters' => [
        'group' => [
            'label' => 'Gruppo',
            'tooltip' => 'Filtra per gruppo di appartenenza'],
        'channels' => [
            'label' => 'Canali',
            'tooltip' => 'Filtra per canali attivi'],
        'status' => [
            'label' => 'Stato',
            'tooltip' => 'Filtra per stato di attivazione'],
        'last_notified' => [
            'label' => 'Ultima notifica',
            'tooltip' => 'Filtra per data ultima notifica']],
=======
            'title' => 'Test Sent',
            'message' => 'The test notification was sent to the contact successfully'],
        'test_failed' => [
            'title' => 'Test Error',
            'message' => 'Unable to send the test notification: :error'],
        'import_success' => [
            'title' => 'Importazione Completata',
            'message' => ':count contacts imported successfully'],
        'import_failed' => [
            'title' => 'Import Error',
            'message' => 'Error while importing contacts: :error'],
        'export_success' => [
            'title' => 'Esportazione Completata',
            'message' => 'The contacts were exported successfully'],
        'verification_complete' => [
            'title' => 'Verifica Completata',
            'message' => 'Contact verification completed. :valid valid, :invalid invalid']],
    'filters' => [
        'group' => [
            'label' => 'Gruppo',
            'tooltip' => 'Filter by group'],
        'channels' => [
            'label' => 'Channels',
            'tooltip' => 'Filter by active channels'],
        'status' => [
            'label' => 'Status',
            'tooltip' => 'Filter by activation status'],
        'last_notified' => [
            'label' => 'Ultima notifica',
            'tooltip' => 'Filter by last notification date']],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
