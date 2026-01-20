<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Linha de Importação Falhada',
        'group' => 'Linhas de Importação',
        'icon' => 'heroicon-o-exclamation-circle',
        'sort' => 28,
    ],
    'label' => 'Linha de Importação Falhada',
    'plural_label' => 'Linhas de Importação Falhadas',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'import_batch_id' => [
            'label' => 'ID do Lote de Importação',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'row_index' => [
            'label' => 'Índice da Linha',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'errors' => [
            'label' => 'Erros',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'data' => [
            'label' => 'Dados',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Criado Em',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'import_batch_id' => [
            'label' => 'ID do Lote de Importação',
        ],
        'row_index' => [
            'label' => 'Índice da Linha',
        ],
        'errors' => [
            'label' => 'Erros',
        ],
        'data' => [
            'label' => 'Dados',
        ],
        'created_at' => [
            'label' => 'Criado Em',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'view_errors' => [
            'label' => 'Ver Erros',
        ],
        'fix_row' => [
            'label' => 'Corrigir Linha',
        ],
    ],
];
