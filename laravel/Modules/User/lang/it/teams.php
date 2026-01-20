<?php

declare(strict_types=1);

return [
    'name' => 'Teams',
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome del team',
            'helper_text' => 'Nome identificativo del team',
            'description' => 'Il nome che identifica questo team',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'personal_team' => [
            'label' => 'Team Personale',
            'helper_text' => 'Indica se questo è un team personale',
            'description' => 'Un team personale è associato a un singolo utente',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'owner' => [
            'label' => 'Proprietario',
            'helper_text' => 'Utente proprietario del team',
            'description' => 'L\'utente che ha creato e gestisce questo team',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'helper_text' => 'Data di creazione del team',
            'description' => 'Data e ora in cui è stato creato il team',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'helper_text' => 'Data dell\'ultima modifica',
            'description' => 'Data e ora dell\'ultima modifica al team',
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Nuovo Team',
            'tooltip' => 'Crea un nuovo team',
        ],
        'edit' => [
            'label' => 'Modifica',
            'tooltip' => 'Modifica i dati del team',
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina il team',
        ],
        'view' => [
            'label' => 'Visualizza',
            'tooltip' => 'Visualizza i dettagli del team',
        ],
    ],
    'messages' => [
        'success' => [
            'created' => 'Team creato con successo',
            'updated' => 'Team aggiornato con successo',
            'deleted' => 'Team eliminato con successo',
        ],
        'error' => [
            'create' => 'Errore durante la creazione del team',
            'update' => 'Errore durante l\'aggiornamento del team',
            'delete' => 'Errore durante l\'eliminazione del team',
        ],
        'confirm' => [
            'delete' => 'Sei sicuro di voler eliminare questo team?',
        ],
    ],
    'relationships' => [
        'members' => [
            'label' => 'Membri',
            'description' => 'Utenti che fanno parte di questo team',
        ],
        'owner' => [
            'label' => 'Proprietario',
            'description' => 'Utente che ha creato questo team',
        ],
    ],
<<<<<<< HEAD
    'navigation' => [
        'name' => 'Teams',
        'plural' => 'Teams',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Teams',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Teams',
    'plural_label' => 'Teams (Plurale)',
=======
    'navigation' => [],
    'label' => '',
    'plural_label' => '',
>>>>>>> 4b6b99016 (first commit)
];
