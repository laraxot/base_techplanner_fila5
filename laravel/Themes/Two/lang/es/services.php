<?php

declare(strict_types=1);

return [
    'auth' => [
        'required' => [
            'label' => 'Autenticación requerida',
        ],
        'with' => [
            'label' => 'Con autenticación',
        ],
        'without' => [
            'label' => 'Sin autenticación',
        ],
    ],
    'grid_search' => [
        'field' => [
            'label' => 'Buscar servicios',
            'placeholder' => 'Buscar servicios...',
        ],
        'field_description' => [
            'label' => 'Buscar servicios por nombre o descripción',
        ],
    ],
    'grid_filter' => [
        'category' => [
            'label' => 'Filtrar por categoría',
        ],
        'category_description' => [
            'label' => 'Filtrar servicios por categoría',
        ],
    ],
    'grid_sort' => [
        'field' => [
            'label' => 'Ordenar servicios',
        ],
        'name_asc' => [
            'label' => 'Nombre (A-Z)',
        ],
        'name_desc' => [
            'label' => 'Nombre (Z-A)',
        ],
        'popular' => [
            'label' => 'Más populares',
        ],
        'recent' => [
            'label' => 'Recientes',
        ],
    ],
    'grid_view' => [
        'grid' => [
            'label' => 'Mostrar servicios en vista de cuadrícula',
        ],
        'list' => [
            'label' => 'Mostrar servicios en vista de lista',
        ],
    ],
    'grid_active' => [
        'title' => [
            'label' => 'Filtros activos:',
        ],
        'clear_description' => [
            'label' => 'Quitar todos los filtros activos',
        ],
        'clear' => [
            'label' => 'Quitar todos',
        ],
    ],
    'grid_summary' => [
        'showing' => [
            'label' => 'Mostrando',
        ],
        'services' => [
            'label' => 'servicios',
        ],
    ],
    'grid_item' => [
        'featured' => [
            'label' => 'Destacado',
        ],
        'access' => [
            'label' => 'Acceder',
        ],
    ],
    'grid_empty' => [
        'title' => [
            'title' => 'No se han encontrado servicios',
        ],
        'hint' => [
            'message' => 'Prueba a modificar los filtros o la búsqueda',
        ],
        'reset_description' => [
            'label' => 'Quitar todos los filtros y mostrar todos los servicios',
        ],
        'reset' => [
            'label' => 'Quitar filtros',
        ],
    ],
    'search_box' => [
        'clear' => [
            'label' => 'Borrar texto de búsqueda',
        ],
        'submit_description' => [
            'label' => 'Ejecutar búsqueda de servicios',
        ],
        'hint' => [
            'help' => 'Introduce el nombre del servicio o palabras clave para encontrar lo que buscas',
        ],
        'popular' => [
            'title' => 'Categorías populares:',
        ],
        'toggle' => [
            'label' => 'Mostrar/Ocultar filtros avanzados de búsqueda',
        ],
    ],
    'advanced' => [
        'title' => [
            'title' => 'Filtros avanzados',
        ],
    ],
    'advanced_status' => [
        'field' => [
            'label' => 'Estado del servicio',
        ],
        'all' => [
            'label' => 'Todos los estados',
        ],
        'active' => [
            'label' => 'Activo',
        ],
        'maintenance' => [
            'label' => 'En mantenimiento',
        ],
        'coming_soon' => [
            'label' => 'Próximamente',
        ],
    ],
    'advanced_availability' => [
        'field' => [
            'label' => 'Disponibilidad',
        ],
        'all' => [
            'label' => 'Todas las disponibilidades',
        ],
        'business_hours' => [
            'label' => 'Horario laboral',
        ],
        'appointment' => [
            'label' => 'Con cita previa',
        ],
    ],
    'advanced_audience' => [
        'field' => [
            'label' => 'Destinatarios',
        ],
        'citizens' => [
            'label' => 'Ciudadanos',
        ],
        'businesses' => [
            'label' => 'Empresas',
        ],
        'associations' => [
            'label' => 'Asociaciones',
        ],
        'professionals' => [
            'label' => 'Profesionales',
        ],
    ],
    'advanced_priority' => [
        'field' => [
            'label' => 'Prioridad',
        ],
        'all' => [
            'label' => 'Todas las prioridades',
        ],
        'high' => [
            'label' => 'Alta',
        ],
        'medium' => [
            'label' => 'Media',
        ],
        'low' => [
            'label' => 'Baja',
        ],
    ],
    'advanced_actions' => [
        'reset_description' => [
            'label' => 'Restablecer todos los filtros a sus valores predeterminados',
        ],
        'reset' => [
            'label' => 'Restablecer filtros',
        ],
        'apply_description' => [
            'label' => 'Aplicar los filtros seleccionados',
        ],
        'apply' => [
            'label' => 'Aplicar filtros',
        ],
    ],
    'results' => [
        'title' => [
            'title' => 'Resultados de la búsqueda',
        ],
    ],
    'js_results' => [
        'loading' => [
            'message' => 'Buscando...',
        ],
        'empty' => [
            'message' => 'No se han encontrado resultados',
        ],
        'count' => [
            'label' => 'resultados encontrados',
        ],
        'access' => [
            'label' => 'Acceder al servicio',
        ],
    ],
];
