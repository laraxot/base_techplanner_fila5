<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => 'Sistema',
<<<<<<< HEAD
        'label' => 'Temi Notifiche',
        'icon' => 'notify-theme-animated',
        'sort' => '50',
        'description' => 'Gestione dei temi per le notifiche'],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del tema',
            'placeholder' => 'es: Tema Aziendale',
            'help' => 'Inserisci un nome descrittivo per il tema',
=======
        'label' => 'Notification Themes',
        'icon' => 'notify-theme-animated',
        'sort' => '50',
        'description' => 'Manage notification themes'],
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
                    'placeholder' => 'es: #F5A623'],
                'success' => [
                    'label' => 'Successo',
                    'tooltip' => 'Colore per messaggi di successo',
                    'placeholder' => 'es: #7CBD5C'],
                'warning' => [
                    'label' => 'Attenzione',
                    'tooltip' => 'Colore per messaggi di avviso',
                    'placeholder' => 'es: #F5A623'],
                'error' => [
                    'label' => 'Errore',
                    'tooltip' => 'Colore per messaggi di errore',
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
                    'placeholder' => 'es: #F5A623'],
                'success' => [
                    'label' => 'Successo',
                    'tooltip' => 'Color for success messages',
                    'placeholder' => 'es: #7CBD5C'],
                'warning' => [
                    'label' => 'Attenzione',
                    'tooltip' => 'Color for warning messages',
                    'placeholder' => 'es: #F5A623'],
                'error' => [
                    'label' => 'Error',
                    'tooltip' => 'Color for error messages',
>>>>>>> laraxot/dev
                    'placeholder' => 'es: #D0021B']],
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
                    'placeholder' => 'es: Helvetica, Arial, sans-serif'],
                'font_sizes' => [
                    'label' => 'Dimensioni font',
                    'tooltip' => 'Dimensioni dei caratteri',
                    'options' => [
                        'small' => [
                            'label' => 'Piccolo',
                            'tooltip' => 'Testo piccolo (es: note)'],
                        'normal' => [
                            'label' => 'Normale',
                            'tooltip' => 'Testo normale'],
                        'large' => [
                            'label' => 'Grande',
                            'tooltip' => 'Testo grande (es: titoli)']]]],
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
                    'placeholder' => 'es: Helvetica, Arial, sans-serif'],
                'font_sizes' => [
                    'label' => 'Dimensioni font',
                    'tooltip' => 'Font sizes',
                    'options' => [
                        'small' => [
                            'label' => 'Piccolo',
                            'tooltip' => 'Small text (e.g. notes)'],
                        'normal' => [
                            'label' => 'Normale',
                            'tooltip' => 'Normal text'],
                        'large' => [
                            'label' => 'Grande',
                            'tooltip' => 'Large text (e.g. headings)']]]],
>>>>>>> laraxot/dev
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
                    'tooltip' => 'Stile del piè di pagina'],
=======
                    'label' => 'Footer',
                    'tooltip' => 'Footer style'],
>>>>>>> laraxot/dev
                'spacing' => [
                    'label' => 'Spaziatura',
                    'tooltip' => 'Spaziatura tra gli elementi']],
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
                    'tooltip' => 'Immagine di sfondo'],
                'icons' => [
                    'label' => 'Icone',
                    'tooltip' => 'Set di icone del tema']],
=======
                    'tooltip' => 'Background image'],
                'icons' => [
                    'label' => 'Icone',
                    'tooltip' => 'Theme icon set']],
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
                'cancel' => 'No, annulla']],
        'export' => [
            'label' => 'Esporta',
            'tooltip' => 'Esporta configurazione del tema',
=======
                'message' => 'Do you want to create a copy of this theme?',
                'confirm' => 'Yes, duplicate',
                'cancel' => 'No, annulla']],
        'export' => [
            'label' => 'Esporta',
            'tooltip' => 'Export theme configuration',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-arrow-down-tray',
            'color' => 'success'],
        'import' => [
            'label' => 'Importa',
<<<<<<< HEAD
            'tooltip' => 'Importa configurazione del tema',
=======
            'tooltip' => 'Import theme configuration',
>>>>>>> laraxot/dev
            'icon' => 'heroicon-o-arrow-up-tray',
            'color' => 'warning'],
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
        'preview_title' => [
            'title' => 'Anteprima Tema',
            'message' => 'Questa è un\'anteprima di come apparirà il tema'],
        'duplicated' => [
            'title' => 'Tema Duplicato',
            'message' => 'Il tema è stato duplicato con successo'],
        'export_success' => [
            'title' => 'Esportazione Completata',
            'message' => 'La configurazione del tema è stata esportata con successo'],
        'import_success' => [
            'title' => 'Importazione Completata',
            'message' => 'La configurazione del tema è stata importata con successo'],
        'set_default_success' => [
            'title' => 'Tema Predefinito',
            'message' => 'Il tema è stato impostato come predefinito']],
    'filters' => [
        'status' => [
            'label' => 'Stato',
            'tooltip' => 'Filtra per stato di attivazione'],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Filtra per tipo di tema']],
=======
                'message' => 'Do you want to set this theme as the default?',
                'confirm' => 'Yes, set',
                'cancel' => 'No, annulla']]],
    'messages' => [
        'preview_title' => [
            'title' => 'Theme Preview',
            'message' => 'This is a preview of how the theme will look'],
        'duplicated' => [
            'title' => 'Theme Duplicated',
            'message' => 'The theme was duplicated successfully'],
        'export_success' => [
            'title' => 'Esportazione Completata',
            'message' => 'The theme configuration was exported successfully'],
        'import_success' => [
            'title' => 'Importazione Completata',
            'message' => 'The theme configuration was imported successfully'],
        'set_default_success' => [
            'title' => 'Default Theme',
            'message' => 'The theme was set as the default']],
    'filters' => [
        'status' => [
            'label' => 'Status',
            'tooltip' => 'Filter by activation status'],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Filter by theme type']],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
