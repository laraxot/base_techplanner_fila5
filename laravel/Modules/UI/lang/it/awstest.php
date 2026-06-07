<?php

declare(strict_types=1);

return [
    'page' => [
        'title' => 'Test AWS Diagnostico',
        'heading' => 'Diagnostica Configurazione AWS',
        'description' => 'Pagina per testare e diagnosticare la configurazione AWS completa',
    ],
    'fields' => [
        'cloudfront_url' => [
            'label' => 'URL Distribuzione CloudFront',
            'placeholder' => 'Inserisci URL CloudFront',
            'helper_text' => 'URL della distribuzione CloudFront configurata',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'iam_user' => [
            'label' => 'Utente/Ruolo IAM',
            'placeholder' => 'Inserisci utente IAM',
            'helper_text' => 'Utente o ruolo IAM utilizzato per l\'accesso AWS',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'aws_config' => [
            'label' => 'Configurazione AWS',
            'placeholder' => 'Configurazione AWS corrente',
            'helper_text' => 'Panoramica della configurazione AWS attuale',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
    ],
    'actions' => [
        'test_s3_connection' => [
            'label' => 'Test Connessione Base',
            'tooltip' => 'Testa la connessione base al bucket S3',
            'success' => 'Connessione S3 testata con successo',
            'error' => 'Errore nel test della connessione S3',
        ],
        'test_s3_permissions' => [
            'label' => 'Test Permessi',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => 'Testa i permessi S3 (ListBucket, PutObject, GetObject, DeleteObject]',
=======
            'tooltip' => 'Testa i permessi S3 (ListBucket, PutObject, GetObject, DeleteObject)',
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => 'Testa i permessi S3 (ListBucket, PutObject, GetObject, DeleteObject]',
>>>>>>> dev
            'success' => 'Permessi S3 testati con successo',
            'error' => 'Errore nel test dei permessi S3',
        ],
        'test_file_operations' => [
            'label' => 'Test Operazioni File',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => 'Testa le operazioni sui file S3 (upload, download, delete]',
=======
            'tooltip' => 'Testa le operazioni sui file S3 (upload, download, delete)',
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => 'Testa le operazioni sui file S3 (upload, download, delete]',
>>>>>>> dev
            'success' => 'Operazioni file testate con successo',
            'error' => 'Errore nel test delle operazioni file',
        ],
        'test_cloudfront_config' => [
            'label' => 'Test Configurazione',
            'tooltip' => 'Testa la configurazione CloudFront',
            'success' => 'Configurazione CloudFront testata con successo',
            'error' => 'Errore nel test della configurazione CloudFront',
        ],
        'test_signed_urls' => [
            'label' => 'Test URL Firmati',
            'tooltip' => 'Testa la generazione di URL firmati CloudFront',
            'success' => 'URL firmati testati con successo',
            'error' => 'Errore nel test degli URL firmati',
        ],
        'test_iam_credentials' => [
            'label' => 'Test Credenziali',
            'tooltip' => 'Testa le credenziali IAM',
            'success' => 'Credenziali IAM testate con successo',
            'error' => 'Errore nel test delle credenziali IAM',
        ],
        'test_iam_policies' => [
            'label' => 'Test Policy',
            'tooltip' => 'Testa le policy IAM',
            'success' => 'Policy IAM testate con successo',
            'error' => 'Errore nel test delle policy IAM',
        ],
        'run_full_diagnostic' => [
            'label' => 'Esegui Diagnostica Completa',
            'tooltip' => 'Esegue tutti i test diagnostici AWS',
            'success' => 'Diagnostica completa eseguita con successo',
            'error' => 'Errore durante la diagnostica completa',
        ],
    ],
    'sections' => [
        's3_connection_test' => [
            'label' => 'Test Connessione S3',
            'description' => 'Verifica accesso al bucket S3 e permessi',
        ],
        'cloudfront_test' => [
            'label' => 'Test CloudFront',
            'description' => 'Verifica configurazione CloudFront e URL firmati',
        ],
        'iam_permissions_test' => [
            'label' => 'Test Permessi IAM',
            'description' => 'Verifica credenziali e policy IAM',
        ],
        'complete_diagnostic' => [
            'label' => 'Diagnostica Completa',
            'description' => 'Esegue tutti i test diagnostici AWS',
        ],
    ],
    'tabs' => [
        'tests' => [
            'label' => 'Test',
        ],
        's3' => [
            'label' => 'S3',
        ],
        'cloudfront' => [
            'label' => 'CloudFront',
        ],
        'iam' => [
            'label' => 'IAM',
        ],
        'diagnostics' => [
            'label' => 'Diagnostica',
        ],
    ],
    'notifications' => [
        's3_connection_successful' => 'Connessione S3 riuscita',
        's3_connection_failed' => 'Connessione S3 fallita',
        'cloudfront_config_valid' => 'Configurazione CloudFront valida',
        'cloudfront_config_error' => 'Errore configurazione CloudFront',
        'full_diagnostic_completed' => 'Diagnostica completa completata',
    ],
    'test_results' => [
        'status_success' => 'successo',
        'status_error' => 'errore',
        'status_completed' => 'completato',
        'successfully_connected' => 'Connesso con successo al bucket S3',
        'cloudfront_config_valid' => 'Configurazione CloudFront valida',
        'cloudfront_config_error' => 'Errore configurazione CloudFront',
        'full_diagnostic_completed' => 'Diagnostica completa completata',
        'check_cloudfront_settings' => 'Controlla le impostazioni CloudFront nella configurazione',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'label' => 'Awstest',
    'plural_label' => 'Awstest (Plurale)',
    'navigation' => [
        'name' => 'Awstest',
        'plural' => 'Awstest',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Awstest',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
