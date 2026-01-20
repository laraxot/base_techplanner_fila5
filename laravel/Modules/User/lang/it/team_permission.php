<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Permesso Team',
        'plural' => 'Permessi Team',
        'label' => 'Permessi Team',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione permessi specifici per team',
        ],
        'sort' => 15,
        'icon' => 'heroicon-o-shield-check',
    ],
    'fields' => [
        'team_id' => [
            'label' => 'Team',
            'placeholder' => 'Seleziona un team',
            'help' => 'Il team a cui appartiene questo permesso',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'user_id' => [
            'label' => 'Utente',
            'placeholder' => 'Seleziona un utente',
            'help' => 'L\'utente a cui è assegnato questo permesso',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'permission' => [
            'label' => 'Permesso',
            'placeholder' => 'Inserisci il nome del permesso',
<<<<<<< HEAD
            'help' => 'Il nome del permesso (es. view-reports, edit-documents]',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
            'help' => 'Il nome del permesso (es. view-reports, edit-documents)',
>>>>>>> 4b6b99016 (first commit)
        ],
        'id' => [
            'label' => 'ID',
            'help' => 'Identificativo univoco del permesso team',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'help' => 'Data e ora di creazione del permesso',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'updated_at' => [
            'label' => 'Data Aggiornamento',
            'help' => 'Data e ora dell\'ultimo aggiornamento',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Permesso Team',
            'success' => 'Permesso team creato con successo',
            'error' => 'Errore durante la creazione del permesso team',
        ],
        'edit' => [
            'label' => 'Modifica Permesso Team',
            'success' => 'Permesso team aggiornato con successo',
            'error' => 'Errore durante l\'aggiornamento del permesso team',
        ],
        'delete' => [
            'label' => 'Elimina Permesso Team',
            'success' => 'Permesso team eliminato con successo',
            'error' => 'Errore durante l\'eliminazione del permesso team',
            'confirmation' => 'Sei sicuro di voler eliminare questo permesso team?',
        ],
    ],
<<<<<<< HEAD
    'label' => 'Team Permission',
    'plural_label' => 'Team Permission (Plurale)',
=======
    'label' => '',
    'plural_label' => '',
>>>>>>> 4b6b99016 (first commit)
];
