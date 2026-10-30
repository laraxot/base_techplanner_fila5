<?php

declare(strict_types=1);

return [
    'contact' => [
        'form' => [
            'title' => 'Solicita una consulta',
            'subtitle' => 'Rellena el formulario y te contactaremos en un plazo de 24 horas',
            'submit_label' => 'Enviar solicitud',
            'privacy_text' => 'Al enviar este formulario aceptas nuestra Política de privacidad.',
            'required_note' => 'Los campos marcados con * son obligatorios.',
            'submit_aria' => 'Enviar el formulario de contacto',
            'privacy_help' => 'Debes aceptar la política de privacidad para enviar el formulario',
            'fields' => [
                'name' => [
                    'label' => 'Nombre y apellidos',
                    'placeholder' => 'Introduce tu nombre completo',
                    'help' => 'Introduce tu nombre y apellidos',
                ],
                'email' => [
                    'label' => 'Correo electrónico',
                    'help' => 'Introduce tu dirección de correo electrónico',
                ],
                'phone' => [
                    'label' => 'Teléfono',
                    'help' => 'Introduce tu número de teléfono',
                ],
                'studio' => [
                    'label' => 'Nombre de la consulta',
                    'placeholder' => 'Nombre de tu consulta',
                    'help' => 'Introduce el nombre de tu consulta profesional',
                ],
                'type' => [
                    'label' => 'Tipo de consulta',
                    'placeholder' => 'Selecciona el tipo de consulta',
                    'help' => 'Selecciona el tipo de consulta profesional',
                ],
                'message' => [
                    'label' => 'Mensaje',
                    'placeholder' => 'Describe tu solicitud...',
                    'help' => 'Describe tu solicitud de asesoramiento',
                ],
            ],
        ],
        'info' => [
            'title' => 'Cómo contactarnos',
            'subtitle' => 'Elige la forma más cómoda de ponerte en contacto con nosotros',
            'phone' => 'Teléfono',
            'mobile' => 'Móvil / WhatsApp',
            'email' => 'Correo electrónico',
            'address' => 'Dirección',
            'hours' => 'Horario',
            'follow_social' => 'Síguenos en redes sociales',
            'linkedin_aria' => 'LinkedIn - Perfil de LinkedIn de Marco Sottana',
            'facebook_aria' => 'Facebook - Página de Facebook de Marco Sottana',
        ],
    ],
    'sections' => [
        'map' => [
            'title' => 'Dónde estamos',
        ],
        'team' => [
            'title' => 'Nuestro equipo',
            'description' => 'Expertos cualificados a tu servicio para garantizar la máxima seguridad.',
        ],
        'values' => [
            'title' => 'Nuestros valores',
            'description' => 'Los principios fundamentales que guían todo lo que hacemos y cada asesoramiento.',
        ],
        'benefits' => [
            'title' => 'Por qué elegirnos',
            'description' => 'Las ventajas concretas de confiar en nuestra experiencia.',
        ],
        'company' => [
            'title' => 'Datos de la empresa',
        ],
    ],
    'map' => [
        'open_sr' => [
            'label' => 'Abrir :address en Google Maps',
        ],
        'open' => [
            'helper_text' => 'Abrir la ubicación en Google Maps',
        ],
        'directions' => [
            'label' => 'Cómo llegar en Google Maps',
        ],
        'open_in_google' => [
            'label' => 'Abrir en Google Maps',
        ],
        'directions_short' => [
            'label' => 'Cómo llegar',
        ],
        'attribution' => [
            'label' => 'Mapa © colaboradores de :link',
        ],
    ],
    'fields' => [
        'map' => [
            'alt' => 'Mapa: :address',
        ],
    ],
    'sectors' => [
        'badge' => [
            'label' => 'Sector especializado',
        ],
        'focus_areas' => [
            'label' => 'Áreas de enfoque:',
        ],
        'compliance' => [
            'label' => 'Cumplimiento normativo:',
        ],
    ],
    'cta' => [
        'banner' => [
            'primary' => 'Empieza',
            'secondary' => 'Descubre',
        ],
    ],
    'blog' => [
        'recent_articles' => [
            'label' => 'Artículos recientes',
        ],
        'all_articles' => [
            'label' => 'Todos los artículos',
        ],
        'featured_articles' => [
            'label' => 'Artículos destacados',
        ],
        'read' => [
            'label' => 'Leer',
        ],
        'read_article' => [
            'label' => 'Leer artículo',
        ],
        'view_all' => [
            'label' => 'Ver todos los artículos',
        ],
    ],
    'company' => [
        'pec' => [
            'label' => 'PEC (correo certificado)',
        ],
        'registered_office' => [
            'label' => 'Domicilio social',
        ],
    ],
    'resources' => [
        'download_pdf' => [
            'label' => 'Descargar PDF',
        ],
    ],
    'newsletter' => [
        'blog' => [
            'title' => 'Mantente al día',
            'description' => 'Suscríbete para recibir los últimos artículos y novedades normativas directamente en tu correo electrónico.',
            'cta_label' => 'Suscríbete al boletín',
            'email_placeholder' => 'Tu correo electrónico',
            'privacy_note' => 'Nada de spam, solo contenido de calidad. Puedes darte de baja cuando quieras.',
        ],
        'form' => [
            'cta_label' => 'Suscribirse',
            'email_placeholder' => 'Tu correo electrónico profesional',
        ],
    ],
    'sidebar' => [
        'system_active' => [
            'label' => 'Sistema activo',
        ],
    ],
    'service_card' => [
        'status' => [
            'active' => 'Activo',
            'inactive' => 'No disponible',
            'maintenance' => 'En mantenimiento',
        ],
        'featured' => [
            'label' => 'Destacado',
        ],
        'access' => [
            'label' => 'Acceder',
            'aria_label' => 'Acceder al servicio: :title',
        ],
    ],
];
