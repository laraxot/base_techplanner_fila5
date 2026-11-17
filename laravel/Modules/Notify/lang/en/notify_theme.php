<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => 'Sistema',
<<<<<<< HEAD
        'label' => 'Tema Notifica',
        'icon' => 'notify-theme-animated',
        'sort' => '50',
        'description' => 'Gestione del tema per le notifiche'],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del tema',
            'placeholder' => 'es: Tema Aziendale',
            'help' => 'Inserisci un nome descrittivo per il tema',
=======
        'label' => 'Notification Theme',
        'icon' => 'notify-theme-animated',
        'sort' => '50',
        'description' => 'Manage the notification theme'],
    'fields' => [
        'name' => [
            'label' => 'Name',
            'tooltip' => 'Theme name',
            'placeholder' => 'e.g. Corporate Theme',
            'help' => 'Enter a descriptive name for the theme',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'description' => [
            'label' => 'Descrizione',
<<<<<<< HEAD
            'tooltip' => 'Descrizione del tema',
            'placeholder' => 'es: Tema standard per le comunicazioni aziendali',
            'help' => 'Breve descrizione dello scopo del tema',
=======
            'tooltip' => 'Theme description',
            'placeholder' => 'e.g. Standard theme for business communications',
            'help' => 'Short description of the theme\'s purpose',
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'colors' => [
            'label' => 'Colori',
<<<<<<< HEAD
            'tooltip' => 'Schema colori del tema',
            'help' => 'Definisci i colori principali del tema',
            'options' => [
                'primary' => [
                    'label' => 'Primario',
                    'tooltip' => 'Colore principale del tema',
                    'placeholder' => 'es: #4A90E2'],
                'secondary' => [
                    'label' => 'Secondario',
                    'tooltip' => 'Colore secondario del tema',
                    'placeholder' => 'es: #5C6AC4'],
                'accent' => [
                    'label' => 'Accento',
                    'tooltip' => 'Colore di accento per elementi in evidenza',
=======
            'tooltip' => 'Theme color scheme',
            'help' => 'Define the main theme colors',
            'options' => [
                'primary' => [
                    'label' => 'Primario',
                    'tooltip' => 'Theme primary color',
                    'placeholder' => 'es: #4A90E2'],
                'secondary' => [
                    'label' => 'Secondario',
                    'tooltip' => 'Theme secondary color',
                    'placeholder' => 'es: #5C6AC4'],
                'accent' => [
                    'label' => 'Accento',
                    'tooltip' => 'Accent color for highlighted elements',
>>>>>>> laraxot/dev
                    'placeholder' => 'es: #F5A623']],
            'helper_text' => '',
            'description' => ''],
        'typography' => [
            'label' => 'Tipografia',
<<<<<<< HEAD
            'tooltip' => 'Impostazioni tipografiche',
            'help' => 'Configura i font e le dimensioni del testo',
            'options' => [
                'font_family' => [
                    'label' => 'Font principale',
                    'tooltip' => 'Font utilizzato per il testo principale',
                    'placeholder' => 'es: Arial, sans-serif'],
                'heading_font' => [
                    'label' => 'Font titoli',
                    'tooltip' => 'Font utilizzato per i titoli',
=======
            'tooltip' => 'Typography settings',
            'help' => 'Configure fonts and text sizes',
            'options' => [
                'font_family' => [
                    'label' => 'Font principale',
                    'tooltip' => 'Font used for the main text',
                    'placeholder' => 'es: Arial, sans-serif'],
                'heading_font' => [
                    'label' => 'Font titoli',
                    'tooltip' => 'Font used for headings',
>>>>>>> laraxot/dev
                    'placeholder' => 'es: Helvetica, Arial, sans-serif']],
            'helper_text' => '',
            'description' => ''],
        'layout' => [
            'label' => 'Layout',
<<<<<<< HEAD
            'tooltip' => 'Impostazioni del layout',
            'help' => 'Configura la struttura del template',
=======
            'tooltip' => 'Layout settings',
            'help' => 'Configure the template structure',
>>>>>>> laraxot/dev
            'options' => [
                'header' => [
                    'label' => 'Intestazione',
                    'tooltip' => 'Stile dell\'intestazione'],
                'footer' => [
<<<<<<< HEAD
                    'label' => 'Piè di pagina',
                    'tooltip' => 'Stile del piè di pagina']],
=======
                    'label' => 'Footer',
                    'tooltip' => 'Footer style']],
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'assets' => [
            'label' => 'Risorse',
<<<<<<< HEAD
            'tooltip' => 'Risorse del tema',
            'help' => 'Gestisci le risorse associate al tema',
=======
            'tooltip' => 'Theme resources',
            'help' => 'Manage the resources associated with the theme',
>>>>>>> laraxot/dev
            'options' => [
                'logo' => [
                    'label' => 'Logo',
                    'tooltip' => 'Logo da utilizzare nelle notifiche'],
                'background' => [
                    'label' => 'Sfondo',
<<<<<<< HEAD
                    'tooltip' => 'Immagine di sfondo']],
=======
                    'tooltip' => 'Background image']],
>>>>>>> laraxot/dev
            'helper_text' => '',
            'description' => ''],
        'is_default' => [
            'label' => 'Predefinito',
            'tooltip' => 'Imposta come tema predefinito',
<<<<<<< HEAD
            'help' => 'Il tema predefinito verrà utilizzato per tutte le notifiche senza tema specifico',
            'helper_text' => '',
            'description' => ''],
        'is_active' => [
            'label' => 'Attivo',
            'tooltip' => 'Stato di attivazione del tema',
=======
            'help' => 'The default theme is used for all notifications without a specific theme',
            'helper_text' => '',
            'description' => ''],
        'is_active' => [
            'label' => 'Active',
            'tooltip' => 'Theme activation status',
>>>>>>> laraxot/dev
            'help' => 'Solo i temi attivi possono essere utilizzati',
            'helper_text' => '',
            'description' => '']],
    'actions' => [
        'preview' => [
            'label' => 'Anteprima',
<<<<<<< HEAD
            'tooltip' => 'Visualizza anteprima del tema',
=======
            'tooltip' => 'Preview the theme',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-eye',
            'color' => 'primary'],
        'duplicate' => [
            'label' => 'Duplica',
<<<<<<< HEAD
            'tooltip' => 'Crea una copia del tema',
=======
            'tooltip' => 'Create a copy of the theme',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-document-duplicate',
            'color' => 'info',
            'confirmation' => [
                'title' => 'Conferma duplicazione',
<<<<<<< HEAD
                'message' => 'Vuoi creare una copia di questo tema?',
                'confirm' => 'Sì, duplica',
=======
                'message' => 'Do you want to create a copy of this theme?',
                'confirm' => 'Yes, duplicate',
>>>>>>> laraxot/dev
                'cancel' => 'No, annulla']],
        'set_default' => [
            'label' => 'Imposta predefinito',
            'tooltip' => 'Imposta questo tema come predefinito',
            'icon' => 'heroicon-o-star',
            'color' => 'primary',
            'confirmation' => [
                'title' => 'Conferma impostazione predefinito',
<<<<<<< HEAD
                'message' => 'Vuoi impostare questo tema come predefinito?',
                'confirm' => 'Sì, imposta',
                'cancel' => 'No, annulla']]],
    'messages' => [
        'created' => [
            'title' => 'Tema Creato',
            'message' => 'Il tema è stato creato con successo'],
        'updated' => [
            'title' => 'Tema Aggiornato',
            'message' => 'Il tema è stato aggiornato con successo'],
        'deleted' => [
            'title' => 'Tema Eliminato',
            'message' => 'Il tema è stato eliminato con successo'],
        'duplicated' => [
            'title' => 'Tema Duplicato',
            'message' => 'Il tema è stato duplicato con successo'],
        'preview' => [
            'title' => 'Anteprima Tema',
            'message' => 'Questa è un\'anteprima di come apparirà il tema'],
        'set_default' => [
            'title' => 'Tema Predefinito',
            'message' => 'Il tema è stato impostato come predefinito']],
    'model' => [
        'label' => 'Tema Notifica'],
=======
                'message' => 'Do you want to set this theme as the default?',
                'confirm' => 'Yes, set',
                'cancel' => 'No, annulla']]],
    'messages' => [
        'created' => [
            'title' => 'Theme Created',
            'message' => 'The theme was created successfully'],
        'updated' => [
            'title' => 'Theme Updated',
            'message' => 'The theme was updated successfully'],
        'deleted' => [
            'title' => 'Theme Deleted',
            'message' => 'The theme was deleted successfully'],
        'duplicated' => [
            'title' => 'Theme Duplicated',
            'message' => 'The theme was duplicated successfully'],
        'preview' => [
            'title' => 'Theme Preview',
            'message' => 'This is a preview of how the theme will look'],
        'set_default' => [
            'title' => 'Default Theme',
            'message' => 'The theme was set as the default']],
    'model' => [
        'label' => 'Notification Theme'],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
