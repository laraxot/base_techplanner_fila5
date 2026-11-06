<?php

declare(strict_types=1);

return [
    'defaults' => [
        'service' => [
            'label' => 'Servicio',
        ],
    ],
    'header' => [
        'title' => [
            'title' => 'Reservar :service',
        ],
        'subtitle' => [
            'message' => 'Elige la fecha y la hora de tu cita',
        ],
    ],
    'steps' => [
        'date_time' => [
            'label' => 'Elige fecha y hora',
        ],
        'personal_data' => [
            'label' => 'Datos personales',
        ],
        'confirm' => [
            'label' => 'Confirmar',
        ],
    ],
    'date' => [
        'select' => [
            'label' => 'Selecciona la fecha',
        ],
    ],
    'time' => [
        'select' => [
            'label' => 'Selecciona la hora',
        ],
        'unavailable' => [
            'label' => 'No disp.',
        ],
    ],
    'summary' => [
        'selected' => [
            'title' => 'Cita seleccionada:',
        ],
        'at' => [
            'label' => 'a las',
        ],
    ],
    'actions' => [
        'confirm' => [
            'label' => 'Confirmar reserva',
        ],
    ],
    'form' => [
        'first_name' => [
            'label' => 'Nombre *',
        ],
        'last_name' => [
            'label' => 'Apellidos *',
        ],
        'email' => [
            'label' => 'Correo electrónico *',
        ],
        'phone' => [
            'label' => 'Teléfono *',
        ],
        'fiscal_code' => [
            'label' => 'Código fiscal',
        ],
        'notes' => [
            'label' => 'Notas adicionales',
            'placeholder' => 'Introduce notas o solicitudes específicas...',
        ],
    ],
    'recap' => [
        'title' => [
            'title' => 'Resumen de la reserva',
        ],
        'appointment' => [
            'title' => 'Detalles de la cita',
        ],
        'service' => [
            'label' => 'Servicio:',
        ],
        'datetime' => [
            'label' => 'Fecha y hora:',
        ],
        'name' => [
            'label' => 'Nombre:',
        ],
        'email' => [
            'label' => 'Correo electrónico:',
        ],
        'phone' => [
            'label' => 'Teléfono:',
        ],
        'cost' => [
            'label' => 'Coste:',
        ],
    ],
    'consent' => [
        'prefix' => [
            'label' => 'Acepto los',
        ],
        'terms' => [
            'label' => 'términos del servicio',
        ],
        'conjunction' => [
            'label' => 'y la ',
        ],
        'privacy' => [
            'label' => 'política de privacidad',
        ],
    ],
    'notice' => [
        'note' => [
            'label' => 'Nota:',
        ],
        'confirmation' => [
            'message' => 'Recibirás una confirmación por correo electrónico y SMS. Puedes cancelar la reserva hasta 24 horas antes de la cita.',
        ],
    ],
    'loading' => [
        'progress' => [
            'title' => 'Reserva en curso...',
            'message' => 'Estamos procesando tu solicitud',
        ],
    ],
    'success' => [
        'confirmed' => [
            'title' => '¡Reserva confirmada!',
            'message' => 'Te hemos enviado un correo electrónico con todos los detalles de la cita.',
        ],
    ],
    'validation' => [
        'email' => [
            'message' => 'Introduce un correo electrónico válido',
        ],
        'fiscal_code' => [
            'message' => 'El código fiscal debe tener 16 caracteres',
        ],
    ],
];
