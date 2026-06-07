<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => [
            'label' => 'Nome paese',
            'placeholder' => 'Inserisci il nome del paese',
            'help' => 'Nome ufficiale del paese',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'code' => [
            'label' => 'Codice',
            'placeholder' => 'Inserisci il codice ISO',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'help' => 'Codice ISO del paese (es. IT, US, DE]',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
            'help' => 'Codice ISO del paese (es. IT, US, DE)',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'phone_code' => [
            'label' => 'Prefisso telefonico',
            'placeholder' => 'Inserisci il prefisso telefonico',
            'help' => 'Prefisso telefonico internazionale',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'currency' => [
            'label' => 'Valuta',
            'placeholder' => 'Seleziona la valuta',
            'help' => 'Valuta ufficiale del paese',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'language' => [
            'label' => 'Lingua',
            'placeholder' => 'Seleziona la lingua',
            'help' => 'Lingua ufficiale del paese',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'timezone' => [
            'label' => 'Fuso orario',
            'placeholder' => 'Seleziona il fuso orario',
            'help' => 'Fuso orario principale del paese',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'capital' => [
            'label' => 'Capitale',
            'placeholder' => 'Inserisci la capitale',
            'help' => 'Capitale del paese',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'population' => [
            'label' => 'Popolazione',
            'placeholder' => 'Inserisci il numero di abitanti',
            'help' => 'Numero di abitanti del paese',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'area' => [
            'label' => 'Superficie',
            'placeholder' => 'Inserisci la superficie in km²',
            'help' => 'Superficie del paese in chilometri quadrati',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'is_active' => [
            'label' => 'Attivo',
            'help' => 'Indica se il paese è attivo nel sistema',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
    ],
    'validation' => [
        'name_required' => 'Il nome del paese è obbligatorio',
        'code_required' => 'Il codice ISO è obbligatorio',
        'code_unique' => 'Il codice ISO deve essere unico',
        'phone_code_required' => 'Il prefisso telefonico è obbligatorio',
    ],
    'messages' => [
        'country_created' => 'Paese creato con successo',
        'country_updated' => 'Paese aggiornato con successo',
        'country_deleted' => 'Paese eliminato con successo',
        'country_activated' => 'Paese attivato con successo',
        'country_deactivated' => 'Paese disattivato con successo',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'label' => 'Country',
    'plural_label' => 'Country (Plurale)',
    'navigation' => [
        'name' => 'Country',
        'plural' => 'Country',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Country',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Country',
        ],
        'edit' => [
            'label' => 'Modifica Country',
        ],
        'delete' => [
            'label' => 'Elimina Country',
        ],
    ],
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
