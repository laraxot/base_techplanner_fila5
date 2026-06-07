<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        'label' => 'Personal Access Client',
        'plural_label' => 'Personal Access Client',
        'group' => 'OAuth',
        'icon' => 'heroicon-o-key',
        'sort' => 6,
    ],
    'label' => 'Personal Access Client',
    'plural_label' => 'Personal Access Client',
    'fields' => [
        'client_id' => [
            'label' => 'Client OAuth',
            'tooltip' => 'Client OAuth associato',
            'placeholder' => 'Seleziona un client OAuth',
            'helper_text' => 'Il client OAuth associato a questo personal access client',
            'description' => 'Client OAuth per personal access',
        ],
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo univoco',
            'helper_text' => 'Identificativo univoco del personal access client',
            'description' => 'ID del personal access client',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => 'Data di creazione',
            'helper_text' => 'Data e ora di creazione del personal access client',
            'description' => 'Timestamp di creazione',
        ],
        'updated_at' => [
            'label' => 'Data Aggiornamento',
            'tooltip' => 'Data di ultimo aggiornamento',
            'helper_text' => 'Data e ora dell\'ultimo aggiornamento',
            'description' => 'Timestamp di aggiornamento',
<<<<<<< HEAD
=======
        'name' => 'Personal Access Client',
        'plural' => 'Personal Access Clients',
        'label' => 'Personal Access Client',
        'group' => '',
        'sort' => 6,
        'icon' => 'heroicon-o-key',
    ],
    'fields' => [
        'client_id' => [
            'label' => 'Client OAuth',
            'placeholder' => 'Seleziona un client OAuth',
            'help' => 'Il client OAuth associato a questo personal access client',
        ],
        'id' => [
            'label' => 'ID',
            'help' => 'Identificativo univoco del personal access client',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'help' => 'Data e ora di creazione del personal access client',
        ],
        'updated_at' => [
            'label' => 'Data Aggiornamento',
            'help' => 'Data e ora dell\'ultimo aggiornamento',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Personal Access Client',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => 'Crea un nuovo personal access client',
            'helper_text' => 'Crea un nuovo personal access client',
            'description' => 'Azione per creare',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => 'Crea un nuovo personal access client',
            'helper_text' => 'Crea un nuovo personal access client',
            'description' => 'Azione per creare',
>>>>>>> dev
            'success' => 'Personal Access Client creato con successo',
            'error' => 'Errore durante la creazione del Personal Access Client',
        ],
        'edit' => [
            'label' => 'Modifica Personal Access Client',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => 'Modifica il personal access client',
            'helper_text' => 'Modifica il personal access client',
            'description' => 'Azione per modificare',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => 'Modifica il personal access client',
            'helper_text' => 'Modifica il personal access client',
            'description' => 'Azione per modificare',
>>>>>>> dev
            'success' => 'Personal Access Client aggiornato con successo',
            'error' => 'Errore durante l\'aggiornamento del Personal Access Client',
        ],
        'delete' => [
            'label' => 'Elimina Personal Access Client',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => 'Elimina il personal access client',
            'helper_text' => 'Elimina il personal access client',
            'description' => 'Azione per eliminare',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => 'Elimina il personal access client',
            'helper_text' => 'Elimina il personal access client',
            'description' => 'Azione per eliminare',
>>>>>>> dev
            'success' => 'Personal Access Client eliminato con successo',
            'error' => 'Errore durante l\'eliminazione del Personal Access Client',
            'confirmation' => 'Sei sicuro di voler eliminare questo Personal Access Client?',
        ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        'logout' => [
            'label' => 'Logout',
            'tooltip' => 'Disconnettiti',
            'helper_text' => 'Esci dall\'account',
            'description' => 'Azione di logout',
            'icon' => 'heroicon-o-arrow-right-on-rectangle',
        ],
    ],
    'messages' => [
        'created' => 'Personal Access Client creato con successo',
        'updated' => 'Personal Access Client aggiornato con successo',
        'deleted' => 'Personal Access Client eliminato con successo',
    ],
<<<<<<< HEAD
=======
        'openColumnManager' => [
            'tooltip' => 'openColumnManager',
        ],
        'logout' => [
            'tooltip' => 'logout',
            'icon' => 'logout',
        ],
    ],
    'label' => '',
    'plural_label' => '',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
