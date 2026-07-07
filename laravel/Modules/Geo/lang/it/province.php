<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => [
            'label' => 'Nome provincia',
            'placeholder' => 'Inserisci il nome della provincia',
            'help' => 'Nome ufficiale della provincia',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'code' => [
            'label' => 'Sigla',
            'placeholder' => 'Inserisci la sigla della provincia',
<<<<<<< HEAD
            'help' => 'Sigla della provincia (es. RM, MI, TO]',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
            'help' => 'Sigla della provincia (es. RM, MI, TO)',
>>>>>>> 6ed19256f (.)
        ],
        'region' => [
            'label' => 'Regione',
            'placeholder' => 'Seleziona la regione',
            'help' => 'Regione di appartenenza',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'country' => [
            'label' => 'Paese',
            'placeholder' => 'Seleziona il paese',
            'help' => 'Paese di appartenenza',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'capital' => [
            'label' => 'Capoluogo',
            'placeholder' => 'Inserisci il capoluogo',
            'help' => 'Capoluogo della provincia',
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
            'help' => 'Numero di abitanti della provincia',
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
            'help' => 'Superficie della provincia in chilometri quadrati',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'is_active' => [
            'label' => 'Attiva',
            'help' => 'Indica se la provincia è attiva nel sistema',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
    'validation' => [
        'name_required' => 'Il nome della provincia è obbligatorio',
        'code_required' => 'La sigla della provincia è obbligatoria',
        'code_unique' => 'La sigla della provincia deve essere unica',
        'region_required' => 'La regione è obbligatoria',
        'country_required' => 'Il paese è obbligatorio',
    ],
    'messages' => [
        'province_created' => 'Provincia creata con successo',
        'province_updated' => 'Provincia aggiornata con successo',
        'province_deleted' => 'Provincia eliminata con successo',
        'province_activated' => 'Provincia attivata con successo',
        'province_deactivated' => 'Provincia disattivata con successo',
    ],
<<<<<<< HEAD
    'label' => 'Province',
    'plural_label' => 'Province (Plurale)',
    'navigation' => [
        'name' => 'Province',
        'plural' => 'Province',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Province',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Province',
        ],
        'edit' => [
            'label' => 'Modifica Province',
        ],
        'delete' => [
            'label' => 'Elimina Province',
        ],
    ],
=======
>>>>>>> 6ed19256f (.)
];
