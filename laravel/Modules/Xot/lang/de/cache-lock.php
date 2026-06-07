<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Cache Lock',
        'plural' => 'Cache Locks',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Gestione dei lock di cache',
        ],
        'label' => 'cache-lock',
        'sort' => '20',
        'icon' => 'xot-lock',
    ],
    'fields' => [
        'key' => [
            'label' => 'Chiave',
            'placeholder' => 'Inserisci la chiave del lock',
            'help' => 'Identificativo univoco del lock in cache',
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
        'owner' => [
            'label' => 'Proprietario',
            'placeholder' => 'Identificativo del proprietario',
            'help' => 'Identificativo del processo che detiene il lock',
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
        'expiration' => [
            'label' => 'Scadenza',
            'placeholder' => 'Timestamp di scadenza',
            'help' => 'Momento in cui il lock scadrà automaticamente',
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
    'actions' => [
        'view' => [
            'label' => 'Visualizza',
            'success' => 'Lock visualizzato',
            'error' => 'Impossibile visualizzare il lock',
        ],
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Lock eliminato con successo',
            'error' => 'Impossibile eliminare il lock',
            'confirm' => 'Sei sicuro di voler eliminare questo lock?',
        ],
        'release' => [
            'label' => 'Rilascia',
            'success' => 'Lock rilasciato con successo',
            'error' => 'Impossibile rilasciare il lock',
        ],
        'refresh' => [
            'label' => 'Aggiorna',
            'success' => 'Lock aggiornato',
            'error' => 'Impossibile aggiornare il lock',
        ],
    ],
    'messages' => [
        'status' => [
            'active' => 'Lock attivo',
            'expired' => 'Lock scaduto',
            'released' => 'Lock rilasciato',
        ],
        'errors' => [
            'not_found' => 'Lock non trovato',
            'already_acquired' => 'Lock già acquisito',
            'expired' => 'Lock scaduto',
            'permission' => 'Permessi insufficienti',
        ],
        'warnings' => [
            'expiring_soon' => 'Il lock scadrà a breve',
            'stale_lock' => 'Lock potenzialmente bloccato',
        ],
        'info' => [
            'auto_release' => 'Il lock verrà rilasciato automaticamente alla scadenza',
            'lock_extended' => 'Durata del lock estesa',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> dev
];
