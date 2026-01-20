<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Prueba SMTP',
        'group' => 'Notificaciones',
        'icon' => 'heroicon-o-envelope-open',
        'sort' => 47,
    ],
    'label' => 'Prueba SMTP',
    'plural_label' => 'Pruebas SMTP',
    'fields' => [
        'id' => [
            'label' => 'ID',
        ],
        'name' => [
            'label' => 'Nombre',
        ],
        'host' => [
            'label' => 'Host',
        ],
        'port' => [
            'label' => 'Puerto',
        ],
        'username' => [
            'label' => 'Nombre de Usuario',
        ],
        'password' => [
            'label' => 'Contraseña',
        ],
        'encryption' => [
            'label' => 'Cifrado',
        ],
        'from_address' => [
            'label' => 'Dirección Remitente',
        ],
        'from_name' => [
            'label' => 'Nombre Remitente',
        ],
        'status' => [
            'label' => 'Estado',
        ],
        'last_tested_at' => [
            'label' => 'Última Prueba En',
        ],
        'created_at' => [
            'label' => 'Creado En',
        ],
        'body_html' => [
            'description' => 'Cuerpo HTML',
            'helper_text' => 'Contenido HTML del correo',
        ],
    ],
    'actions' => [
        'logout' => [
            'tooltip' => 'Cerrar sesión',
            'icon' => 'logout',
            'label' => 'Cerrar sesión',
        ],
        'emailFormActions' => [
            'tooltip' => 'Acciones del Formulario de Correo',
            'icon' => 'emailFormActions',
            'label' => 'Acciones del Formulario de Correo',
        ],
        'profile' => [
            'tooltip' => 'Perfil',
            'icon' => 'profile',
        ],
        'send_test_email' => [
            'label' => 'Enviar Correo de Prueba',
        ],
        'test_connection' => [
            'label' => 'Probar Conexión',
        ],
    ],
];
