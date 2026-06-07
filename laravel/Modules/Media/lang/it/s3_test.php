<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => 'Media',
    ],
    'fields' => [
        'debug_output' => [
            'description' => 'Output di debug per test S3',
            'label' => 'Output Debug',
            'placeholder' => 'Risultati del test verranno mostrati qui',
            'helper_text' => 'Informazioni di debug per la connessione S3',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'attachment' => [
            'label' => 'Allegato',
            'placeholder' => 'Seleziona file da caricare',
            'helper_text' => 'File da utilizzare per il test di caricamento',
            'description' => 'File di test per verificare il caricamento su S3',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
    ],
    'actions' => [
        'sendEmail' => [
            'label' => 'Invia Email',
        ],
        'clearResults' => [
            'label' => 'Cancella Risultati',
        ],
        'debugConfig' => [
            'label' => 'Debug Configurazione',
        ],
        'testFileOperations' => [
            'label' => 'Test Operazioni File',
        ],
        'testCredentials' => [
            'label' => 'Test Credenziali',
        ],
        'testS3Connection' => [
            'label' => 'Test Connessione S3',
        ],
        'testPermissions' => [
            'label' => 'Test Permessi',
        ],
        'testBucketPolicy' => [
            'label' => 'Test Policy Bucket',
        ],
        'testCloudFront' => [
            'label' => 'Test CloudFront',
        ],
        'test01' => [
            'label' => 'Test 01',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'S3 Test',
    'plural_label' => 'S3 Test (Plurale)',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'S3 Test',
    'plural_label' => 'S3 Test (Plurale)',
>>>>>>> dev
];
