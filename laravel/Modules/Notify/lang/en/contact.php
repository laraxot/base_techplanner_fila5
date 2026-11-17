<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Contact'],
    'navigation' => [
        'name' => 'contatto',
        'plural' => 'contatti',
        'group' => 'Sistema',
<<<<<<< HEAD
        'label' => 'Contatto',
        'sort' => '49',
        'icon' => 'notify-contact-animated',
        'description' => 'Gestione del singolo contatto per le notifiche'],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del contatto',
            'placeholder' => 'es: Mario Rossi',
            'help' => 'Inserisci il nome completo del contatto',
=======
        'label' => 'Contact',
        'sort' => '49',
        'icon' => 'notify-contact-animated',
        'description' => 'Manage a single contact for notifications'],
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
            'help' => 'Seleziona il gruppo di appartenenza',
=======
            'tooltip' => 'Group the contact belongs to',
            'placeholder' => 'es: Amministrazione',
            'help' => 'Select the group',
>>>>>>> laraxot/dev
            'options' => [
                'admin' => [
                    'label' => 'Amministratore',
                    'tooltip' => 'Staff amministrativo'],
                'user' => [
                    'label' => 'Utente',
                    'tooltip' => 'Utente standard'],
                'support' => [
                    'label' => 'Supporto',
<<<<<<< HEAD
                    'tooltip' => 'Team di supporto']],
            'helper_text' => '',
            'description' => ''],
        'channels' => [
            'label' => 'Canali',
            'tooltip' => 'Canali di notifica preferiti',
            'help' => 'Seleziona i canali per l\'invio delle notifiche',
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
                    'tooltip' => 'Support team']],
            'helper_text' => '',
            'description' => ''],
        'channels' => [
            'label' => 'Channels',
            'tooltip' => 'Preferred notification channels',
            'help' => 'Select the channels used to send notifications',
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
            'help' => 'Configura le preferenze personali',
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
                    'help' => 'Le notifiche verranno inviate al termine del periodo']],
            'helper_text' => '',
            'description' => ''],
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato di attivazione del contatto',
            'help' => 'Disattiva temporaneamente le notifiche',
=======
            'tooltip' => 'Notification preferences',
            'help' => 'Configure personal preferences',
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
                    'help' => 'Notifications will be sent when the period ends']],
            'helper_text' => '',
            'description' => ''],
        'is_active' => [
            'label' => 'Active',
            'tooltip' => 'Contact activation status',
            'help' => 'Temporarily disable notifications',
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
        'import' => [
            'name' => 'Importa da file',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare']],
        'export' => [
            'name' => 'Esporta dati',
            'filename_prefix' => 'Aree al',
            'columns' => [
<<<<<<< HEAD
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore']],
        'test_notification' => [
            'label' => 'Invia test',
            'tooltip' => 'Invia una notifica di test',
=======
                'name' => 'Area name',
                'parent_name' => 'Top-level area name']],
        'test_notification' => [
            'label' => 'Send test',
            'tooltip' => 'Send a test notification',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'primary',
            'confirmation' => [
                'title' => 'Conferma invio test',
<<<<<<< HEAD
                'message' => 'Vuoi inviare una notifica di test?',
                'confirm' => 'Sì, invia',
                'cancel' => 'No, annulla']],
        'verify' => [
            'label' => 'Verifica contatto',
            'tooltip' => 'Verifica la validità del contatto',
=======
                'message' => 'Do you want to send a test notification?',
                'confirm' => 'Yes, send',
                'cancel' => 'No, annulla']],
        'verify' => [
            'label' => 'Verifica contatto',
            'tooltip' => 'Verify the contact is valid',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-check-circle',
            'color' => 'warning']],
    'messages' => [
        'created' => [
<<<<<<< HEAD
            'title' => 'Contatto Creato',
            'message' => 'Il contatto è stato creato con successo'],
        'updated' => [
            'title' => 'Contatto Aggiornato',
            'message' => 'Il contatto è stato aggiornato con successo'],
        'deleted' => [
            'title' => 'Contatto Eliminato',
            'message' => 'Il contatto è stato eliminato con successo'],
        'test_sent' => [
            'title' => 'Test Inviato',
            'message' => 'La notifica di test è stata inviata con successo'],
        'test_failed' => [
            'title' => 'Errore Test',
            'message' => 'Impossibile inviare la notifica di test: :error'],
        'verified' => [
            'title' => 'Verifica Completata',
            'message' => 'Il contatto è stato verificato con successo'],
        'verification_failed' => [
            'title' => 'Errore Verifica',
            'message' => 'Impossibile verificare il contatto: :error']],
=======
            'title' => 'Contact Created',
            'message' => 'The contact was created successfully'],
        'updated' => [
            'title' => 'Contact Updated',
            'message' => 'The contact was updated successfully'],
        'deleted' => [
            'title' => 'Contact Deleted',
            'message' => 'The contact was deleted successfully'],
        'test_sent' => [
            'title' => 'Test Sent',
            'message' => 'The test notification was sent successfully'],
        'test_failed' => [
            'title' => 'Test Error',
            'message' => 'Unable to send the test notification: :error'],
        'verified' => [
            'title' => 'Verifica Completata',
            'message' => 'The contact was verified successfully'],
        'verification_failed' => [
            'title' => 'Verification Error',
            'message' => 'Unable to verify the contact: :error']],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
