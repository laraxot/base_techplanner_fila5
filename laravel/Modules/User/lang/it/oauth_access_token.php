<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Token Accesso OAuth',
        'plural_label' => 'Token Accesso OAuth',
        'group' => 'OAuth',
        'icon' => 'heroicon-o-key',
        'sort' => 33,
    ],
    'label' => 'Token Accesso OAuth',
    'plural_label' => 'Token Accesso OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo univoco',
            'helper_text' => 'Identificativo numerico del token',
            'description' => 'ID del token',
        ],
        'user_id' => [
            'label' => 'Utente',
            'tooltip' => 'Utente associato',
            'placeholder' => 'Seleziona l\'utente',
            'helper_text' => 'Utente proprietario del token',
            'description' => 'ID dell\'utente',
        ],
        'client_id' => [
            'label' => 'Client',
            'tooltip' => 'Client OAuth',
            'placeholder' => 'Seleziona il client',
            'helper_text' => 'Client che ha generato il token',
            'description' => 'ID del client OAuth',
        ],
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del token',
            'placeholder' => 'Inserisci il nome',
            'helper_text' => 'Nome identificativo del token',
            'description' => 'Nome del token',
        ],
        'scopes' => [
            'label' => 'Ambiti',
            'tooltip' => 'Permessi del token',
            'placeholder' => 'Seleziona gli ambiti',
            'helper_text' => 'Ambiti di permesso del token',
            'description' => 'Permessi associati al token',
        ],
        'revoked' => [
            'label' => 'Revocato',
            'tooltip' => 'Stato di revoca',
            'helper_text' => 'Indica se il token è stato revocato',
            'description' => 'Stato di revoca del token',
        ],
        'expires_at' => [
            'label' => 'Scade il',
            'tooltip' => 'Data di scadenza',
            'placeholder' => 'Seleziona la data',
            'helper_text' => 'Data e ora di scadenza del token',
            'description' => 'Data di scadenza',
        ],
        'user' => [
            'name' => [
                'label' => 'Nome Utente',
                'tooltip' => 'Nome dell\'utente',
                'helper_text' => 'Nome dell\'utente proprietario',
                'description' => 'Nome utente',
            ],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'client' => [
            'name' => [
                'label' => 'Nome Client',
                'tooltip' => 'Nome del client',
                'helper_text' => 'Nome del client OAuth',
                'description' => 'Nome client',
            ],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Creato il',
            'tooltip' => 'Data di creazione',
            'helper_text' => 'Data e ora di creazione del token',
            'description' => 'Data di creazione',
        ],
        'expired' => [
            'label' => 'Scaduto',
            'tooltip' => 'Stato di scadenza',
            'helper_text' => 'Indica se il token è scaduto',
            'description' => 'Stato di scadenza',
        ],
        'valid' => [
            'label' => 'Valido',
            'tooltip' => 'Validità del token',
            'helper_text' => 'Indica se il token è valido',
            'description' => 'Stato di validità',
=======
        'label' => 'Token di accesso OAuth',
        'group' => '',
        'icon' => 'heroicon-o-key',
        'sort' => 33,
    ],
    'label' => 'Token di accesso OAuth',
    'plural_label' => 'Token di accesso OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
        ],
        'user_id' => [
            'label' => 'Utente',
        ],
        'client_id' => [
            'label' => 'Client',
        ],
        'name' => [
            'label' => 'Nome',
        ],
        'scopes' => [
            'label' => 'Ambiti',
        ],
        'revoked' => [
            'label' => 'Revocato',
        ],
        'expires_at' => [
            'label' => 'Scade il',
        ],
        'user' => [
            'name' => [
                'label' => 'user.name',
            ],
        ],
        'client' => [
            'name' => [
                'label' => 'client.name',
            ],
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'expired' => [
            'label' => 'expired',
        ],
        'valid' => [
            'label' => 'valid',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Revoca',
<<<<<<< HEAD
            'tooltip' => 'Revoca il token',
            'helper_text' => 'Revoca questo token',
            'description' => 'Azione per revocare il token',
        ],
        'refresh' => [
            'label' => 'Aggiorna',
            'tooltip' => 'Aggiorna il token',
            'helper_text' => 'Aggiorna questo token',
            'description' => 'Azione per aggiornare il token',
        ],
        'revoke_all_for_user' => [
            'label' => 'Revoca Tutti',
            'tooltip' => 'Revoca tutti i token per questo utente',
            'helper_text' => 'Revoca tutti i token dell\'utente',
            'description' => 'Revoca tutti i token per utente',
            'success' => ':count token revocati con successo.',
        ],
        'logout' => [
            'label' => 'Logout',
            'tooltip' => 'Disconnettiti',
            'helper_text' => 'Esci dall\'account',
            'description' => 'Azione di logout',
            'icon' => 'heroicon-o-arrow-right-on-rectangle',
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina il token',
            'helper_text' => 'Elimina definitivamente il token',
            'description' => 'Azione per eliminare',
            'icon' => 'heroicon-o-trash',
        ],
        'create' => [
            'label' => 'Crea',
            'tooltip' => 'Crea un nuovo token',
            'helper_text' => 'Crea un nuovo token',
            'description' => 'Azione per creare',
            'icon' => 'heroicon-o-plus',
        ],
    ],
    'messages' => [
        'created' => 'Token creato con successo',
        'revoked' => 'Token revocato con successo',
        'deleted' => 'Token eliminato con successo',
    ],
=======
        ],
        'refresh' => [
            'label' => 'Aggiorna',
        ],
        'revoke_all_for_user' => [
            'label' => 'Revoca tutti per utente',
            'success' => ':count token revocati con successo.',
        ],
        'logout' => [
            'tooltip' => 'logout',
            'icon' => 'logout',
            'label' => 'logout',
        ],
        'delete' => [
            'label' => 'delete',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'create' => [
            'label' => 'create',
            'icon' => 'create',
            'tooltip' => 'create',
        ],
        'layout' => [
            'label' => 'layout',
            'icon' => 'layout',
            'tooltip' => 'layout',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'icon' => 'applyFilters',
            'tooltip' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'icon' => 'openFilters',
            'tooltip' => 'openFilters',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'icon' => 'resetFilters',
            'tooltip' => 'resetFilters',
        ],
        'applyTableColumnManager' => [
            'label' => 'applyTableColumnManager',
            'icon' => 'applyTableColumnManager',
            'tooltip' => 'applyTableColumnManager',
        ],
        'openColumnManager' => [
            'label' => 'openColumnManager',
            'icon' => 'openColumnManager',
            'tooltip' => 'openColumnManager',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'icon' => 'reorderRecords',
            'tooltip' => 'reorderRecords',
        ],
        'profile' => [
            'label' => 'profile',
            'icon' => 'profile',
            'tooltip' => 'profile',
        ],
    ],
>>>>>>> 4b6b99016 (first commit)
];
