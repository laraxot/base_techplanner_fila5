<?php

declare(strict_types=1);

return [
    'navigation' => [
<<<<<<< HEAD
        'label' => 'Refresh Token OAuth',
        'plural_label' => 'Refresh Token OAuth',
        'group' => 'OAuth',
=======
        'name' => 'OAuth Refresh Token',
        'plural' => 'OAuth Refresh Tokens',
        'label' => 'OAuth Refresh Tokens',
        'group' => '',
>>>>>>> 4b6b99016 (first commit)
        'icon' => 'heroicon-o-arrow-path',
        'sort' => 27,
    ],
    'label' => 'Refresh Token OAuth',
    'plural_label' => 'Refresh Token OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => 'Identificativo univoco',
            'helper_text' => 'Identificativo numerico del token',
            'description' => 'ID del refresh token',
        ],
        'access_token_id' => [
            'label' => 'Token Accesso',
            'tooltip' => 'Token di accesso associato',
            'placeholder' => 'Seleziona il token',
            'helper_text' => 'Token di accesso associato a questo refresh token',
            'description' => 'ID del token di accesso',
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
        'created_at' => [
            'label' => 'Creato il',
            'tooltip' => 'Data di creazione',
            'helper_text' => 'Data e ora di creazione del token',
            'description' => 'Timestamp di creazione',
=======
        ],
        'access_token_id' => [
            'label' => 'Token di accesso',
        ],
        'revoked' => [
            'label' => 'Revocato',
        ],
        'expires_at' => [
            'label' => 'Scade il',
        ],
        'created_at' => [
            'label' => 'Creato il',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'revoke' => [
            'label' => 'Revoca',
<<<<<<< HEAD
            'tooltip' => 'Revoca il token',
            'helper_text' => 'Revoca questo refresh token',
            'description' => 'Azione per revocare',
            'success' => 'Refresh token revocato con successo',
        ],
    ],
    'messages' => [
        'revoked' => 'Refresh token revocato con successo',
    ],
=======
            'success' => 'Refresh token revocato con successo',
        ],
    ],
>>>>>>> 4b6b99016 (first commit)
];
