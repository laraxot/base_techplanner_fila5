<?php

declare(strict_types=1);

return [
    'auth' => [
        'required' => [
            'label' => 'Authentication required',
        ],
        'with' => [
            'label' => 'With authentication',
        ],
        'without' => [
            'label' => 'Without authentication',
        ],
    ],
    'grid_search' => [
        'field' => [
            'label' => 'Search services',
            'placeholder' => 'Search services...',
        ],
        'field_description' => [
            'label' => 'Search services by name or description',
        ],
    ],
    'grid_filter' => [
        'category' => [
            'label' => 'Filter by category',
        ],
        'category_description' => [
            'label' => 'Filter services by category',
        ],
    ],
    'grid_sort' => [
        'field' => [
            'label' => 'Sort services',
        ],
        'name_asc' => [
            'label' => 'Name (A-Z)',
        ],
        'name_desc' => [
            'label' => 'Name (Z-A)',
        ],
        'popular' => [
            'label' => 'Most popular',
        ],
        'recent' => [
            'label' => 'Recent',
        ],
    ],
    'grid_view' => [
        'grid' => [
            'label' => 'Show services in grid view',
        ],
        'list' => [
            'label' => 'Show services in list view',
        ],
    ],
    'grid_active' => [
        'title' => [
            'label' => 'Active filters:',
        ],
        'clear_description' => [
            'label' => 'Remove all active filters',
        ],
        'clear' => [
            'label' => 'Remove all',
        ],
    ],
    'grid_summary' => [
        'showing' => [
            'label' => 'Showing',
        ],
        'services' => [
            'label' => 'services',
        ],
    ],
    'grid_item' => [
        'featured' => [
            'label' => 'Featured',
        ],
        'access' => [
            'label' => 'Access',
        ],
    ],
    'grid_empty' => [
        'title' => [
            'title' => 'No services found',
        ],
        'hint' => [
            'message' => 'Try changing the filters or the search',
        ],
        'reset_description' => [
            'label' => 'Remove all filters and show all services',
        ],
        'reset' => [
            'label' => 'Remove filters',
        ],
    ],
    'search_box' => [
        'clear' => [
            'label' => 'Clear search text',
        ],
        'submit_description' => [
            'label' => 'Run services search',
        ],
        'hint' => [
            'help' => 'Enter the service name or keywords to find what you are looking for',
        ],
        'popular' => [
            'title' => 'Popular categories:',
        ],
        'toggle' => [
            'label' => 'Show/Hide advanced search filters',
        ],
    ],
    'advanced' => [
        'title' => [
            'title' => 'Advanced filters',
        ],
    ],
    'advanced_status' => [
        'field' => [
            'label' => 'Service status',
        ],
        'all' => [
            'label' => 'All statuses',
        ],
        'active' => [
            'label' => 'Active',
        ],
        'maintenance' => [
            'label' => 'Under maintenance',
        ],
        'coming_soon' => [
            'label' => 'Coming soon',
        ],
    ],
    'advanced_availability' => [
        'field' => [
            'label' => 'Availability',
        ],
        'all' => [
            'label' => 'All availabilities',
        ],
        'business_hours' => [
            'label' => 'Business hours',
        ],
        'appointment' => [
            'label' => 'By appointment',
        ],
    ],
    'advanced_audience' => [
        'field' => [
            'label' => 'Recipients',
        ],
        'citizens' => [
            'label' => 'Citizens',
        ],
        'businesses' => [
            'label' => 'Businesses',
        ],
        'associations' => [
            'label' => 'Associations',
        ],
        'professionals' => [
            'label' => 'Professionals',
        ],
    ],
    'advanced_priority' => [
        'field' => [
            'label' => 'Priority',
        ],
        'all' => [
            'label' => 'All priorities',
        ],
        'high' => [
            'label' => 'High',
        ],
        'medium' => [
            'label' => 'Medium',
        ],
        'low' => [
            'label' => 'Low',
        ],
    ],
    'advanced_actions' => [
        'reset_description' => [
            'label' => 'Restore all filters to their default values',
        ],
        'reset' => [
            'label' => 'Reset filters',
        ],
        'apply_description' => [
            'label' => 'Apply the selected filters',
        ],
        'apply' => [
            'label' => 'Apply filters',
        ],
    ],
    'results' => [
        'title' => [
            'title' => 'Search results',
        ],
    ],
    'js_results' => [
        'loading' => [
            'message' => 'Searching...',
        ],
        'empty' => [
            'message' => 'No results found',
        ],
        'count' => [
            'label' => 'results found',
        ],
        'access' => [
            'label' => 'Access the service',
        ],
    ],
];
