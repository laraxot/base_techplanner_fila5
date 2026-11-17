<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Teste SMTP',
        'group' => 'Notificações',
        'icon' => 'heroicon-o-envelope-open',
        'sort' => 47,
    ],
    'label' => 'Teste SMTP',
    'plural_label' => 'Testes SMTP',
    'fields' => [
        'id' => [
            'label' => 'ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'host' => [
            'label' => 'Host',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'port' => [
            'label' => 'Porta',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'username' => [
            'label' => 'Nome de Usuário',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password' => [
            'label' => 'Senha',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'encryption' => [
            'label' => 'Criptografia',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'from_address' => [
            'label' => 'Endereço Remetente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'from_name' => [
            'label' => 'Nome Remetente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'status' => [
            'label' => 'Status',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_tested_at' => [
            'label' => 'Último Teste Em',
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
        'name' => [
            'label' => 'Nome',
        ],
        'host' => [
            'label' => 'Host',
        ],
        'port' => [
            'label' => 'Porta',
        ],
        'username' => [
            'label' => 'Nome de Usuário',
        ],
        'password' => [
            'label' => 'Senha',
        ],
        'encryption' => [
            'label' => 'Criptografia',
        ],
        'from_address' => [
            'label' => 'Endereço Remetente',
        ],
        'from_name' => [
            'label' => 'Nome Remetente',
        ],
        'status' => [
            'label' => 'Status',
        ],
        'last_tested_at' => [
            'label' => 'Último Teste Em',
        ],
        'created_at' => [
            'label' => 'Criado Em',
>>>>>>> 6ed19256f (.)
        ],
        'body_html' => [
            'description' => 'Corpo HTML',
            'helper_text' => 'Conteúdo HTML do email',
<<<<<<< HEAD
            'label' => '',
            'tooltip' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'logout' => [
            'tooltip' => 'Sair',
            'icon' => 'logout',
            'label' => 'Sair',
        ],
        'emailFormActions' => [
            'tooltip' => 'Ações do Formulário de Email',
            'icon' => 'emailFormActions',
            'label' => 'Ações do Formulário de Email',
        ],
        'profile' => [
            'tooltip' => 'Perfil',
            'icon' => 'profile',
        ],
        'send_test_email' => [
            'label' => 'Enviar Email de Teste',
        ],
        'test_connection' => [
            'label' => 'Testar Conexão',
        ],
    ],
];
