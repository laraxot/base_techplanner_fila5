<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => [
            'label' => 'Nome paese',
            'placeholder' => 'Inserisci il nome del paese',
            'help' => 'Nome ufficiale del paese',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'code' => [
            'label' => 'Codice',
            'placeholder' => 'Inserisci il codice ISO',
<<<<<<< HEAD
            'help' => 'Codice ISO del paese (es. IT, US, DE]',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
            'help' => 'Codice ISO del paese (es. IT, US, DE)',
>>>>>>> 6ed19256f (.)
        ],
        'phone_code' => [
            'label' => 'Prefisso telefonico',
            'placeholder' => 'Inserisci il prefisso telefonico',
            'help' => 'Prefisso telefonico internazionale',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'currency' => [
            'label' => 'Valuta',
            'placeholder' => 'Seleziona la valuta',
            'help' => 'Valuta ufficiale del paese',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'language' => [
            'label' => 'Lingua',
            'placeholder' => 'Seleziona la lingua',
            'help' => 'Lingua ufficiale del paese',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'timezone' => [
            'label' => 'Fuso orario',
            'placeholder' => 'Seleziona il fuso orario',
            'help' => 'Fuso orario principale del paese',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'capital' => [
            'label' => 'Capitale',
            'placeholder' => 'Inserisci la capitale',
            'help' => 'Capitale del paese',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'population' => [
            'label' => 'Popolazione',
            'placeholder' => 'Inserisci il numero di abitanti',
            'help' => 'Numero di abitanti del paese',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'area' => [
            'label' => 'Superficie',
            'placeholder' => 'Inserisci la superficie in km²',
            'help' => 'Superficie del paese in chilometri quadrati',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'is_active' => [
            'label' => 'Attivo',
            'help' => 'Indica se il paese è attivo nel sistema',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
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
=======
>>>>>>> 6ed19256f (.)
];
