<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Log',
        'plural' => 'Log',
        'group' => [
            'name' => 'Monitoring',
            'description' => 'System log management',
        ],
        'label' => 'Log',
        'sort' => '61',
        'icon' => 'activity-log-animated',
    ],
    'fields' => [
        'level' => [
            'label' => 'Level',
            'emergency' => 'Emergency',
            'alert' => 'Alert',
            'critical' => 'Critical',
            'error' => 'Error',
            'warning' => 'Warning',
            'notice' => 'Notice',
            'info' => 'Info',
            'debug' => 'Debug',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'message' => [
            'label' => 'Message',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
=======
        ],
        'message' => 'Message',
>>>>>>> 4b6b99016 (first commit)
        'context' => [
            'label' => 'Context',
            'exception' => 'Exception',
            'stack_trace' => 'Stack Trace',
            'additional' => 'Additional Info',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'channel' => [
            'label' => 'Channel',
            'system' => 'System',
            'application' => 'Application',
            'security' => 'Security',
            'database' => 'Database',
            'queue' => 'Queues',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'datetime' => [
            'label' => 'Date and Time',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'environment' => [
            'label' => 'Environment',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
=======
        ],
        'datetime' => 'Date and Time',
        'environment' => 'Environment',
>>>>>>> 4b6b99016 (first commit)
    ],
    'filters' => [
        'level' => 'Level',
        'channel' => 'Channel',
        'date_range' => 'Date Range',
        'environment' => 'Environment',
        'search' => 'Search in message',
    ],
    'actions' => [
        'view_details' => 'View Details',
        'download' => 'Download',
        'clear' => 'Clear',
        'archive' => 'Archive',
    ],
    'messages' => [
        'no_logs' => 'No logs found',
        'cleared' => 'Logs cleared successfully',
        'archived' => 'Logs archived successfully',
        'downloaded' => 'Log file downloaded successfully',
    ],
    'badges' => [
        'level' => [
            'emergency' => 'Emergency',
            'alert' => 'Alert',
            'critical' => 'Critical',
            'error' => 'Error',
            'warning' => 'Warning',
            'notice' => 'Notice',
            'info' => 'Info',
            'debug' => 'Debug',
        ],
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
];
