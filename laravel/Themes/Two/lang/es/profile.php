<?php

declare(strict_types=1);

return [
    'sections' => [
        'title' => [
            'title' => 'Perfil',
        ],
        'info' => [
            'title' => 'Información del perfil',
        ],
        'name' => [
            'label' => 'Nombre',
        ],
        'email' => [
            'label' => 'Correo electrónico',
        ],
        'current_password' => [
            'label' => 'Contraseña actual',
        ],
        'new_password' => [
            'label' => 'Nueva contraseña',
        ],
    ],
    'actions' => [
        'update_profile' => [
            'label' => 'Actualizar perfil',
        ],
        'update_password' => [
            'label' => 'Actualizar contraseña',
        ],
        'confirm_new_password' => [
            'label' => 'Confirmar nueva contraseña',
        ],
    ],
    'messages' => [
        'profile_updated' => [
            'message' => '¡Perfil actualizado correctamente!',
        ],
        'password_updated' => [
            'message' => '¡Contraseña actualizada correctamente!',
        ],
    ],
];
