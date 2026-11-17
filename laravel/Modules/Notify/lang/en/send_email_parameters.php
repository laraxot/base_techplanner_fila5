<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'send_email_parameters'],
    'navigation' => [
        'name' => 'Email send parameters',
        'plural' => 'Email send parameters',
        'group' => [
<<<<<<< HEAD
            'name' => 'Invia']],
    'fields' => [
        'name' => [
            'label' => 'Nome Area',
=======
            'name' => 'Send']],
    'fields' => [
        'name' => [
            'label' => 'Area Name',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'parent' => [
<<<<<<< HEAD
            'label' => 'Settore di appartenenza',
=======
            'label' => 'Sector',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'parent.name' => [
<<<<<<< HEAD
            'label' => 'Settore di appartenenza',
=======
            'label' => 'Sector',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'parent_name' => [
<<<<<<< HEAD
            'label' => 'Settore di appartenenza',
=======
            'label' => 'Sector',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => ''],
        'assets' => [
<<<<<<< HEAD
            'label' => 'Quantità di asset',
=======
            'label' => 'Asset quantity',
>>>>>>> laraxot/dev
            'tooltip' => '',
            'helper_text' => '',
            'description' => '']],
    'actions' => [
        'import' => [
            'name' => 'Importa da file',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare']],
        'export' => [
            'name' => 'Esporta dati',
            'filename_prefix' => 'Aree al',
            'columns' => [
<<<<<<< HEAD
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore']]],
=======
                'name' => 'Area name',
                'parent_name' => 'Top-level area name']]],
>>>>>>> laraxot/dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label'];
