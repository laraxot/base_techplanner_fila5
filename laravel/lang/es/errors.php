<?php

declare(strict_types=1);

return [
    'http' => [
        401 => [
            'title' => 'No autorizado',
            'message' => 'No autorizado',
        ],
        402 => [
            'title' => 'Pago requerido',
            'message' => 'Pago requerido',
        ],
        403 => [
            'title' => 'Acceso denegado',
            'message' => 'Acceso denegado',
        ],
        404 => [
            'title' => 'No encontrado',
            'message' => 'No encontrado',
        ],
        419 => [
            'title' => 'Página caducada',
            'message' => 'Página caducada',
        ],
        429 => [
            'title' => 'Demasiadas solicitudes',
            'message' => 'Demasiadas solicitudes',
        ],
        500 => [
            'title' => 'Error del servidor',
            'message' => 'Error del servidor',
        ],
        503 => [
            'title' => 'Servicio no disponible',
            'message' => 'Servicio no disponible',
        ],
    ],
];
