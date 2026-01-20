<?php

declare(strict_types=1);

return [
    'pages' => 'Pages',
    'widgets' => 'Widgets',
    'navigation' => [
        'name' => 'Job',
        'plural' => 'Jobs',
        'group' => [
            'name' => 'Jobs',
            'description' => 'Background process management',
        ],
        'label' => 'jobs',
        'sort' => 30,
        'icon' => 'heroicon-o-cog',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Unique job identifier',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'queue' => [
            'label' => 'Queue',
            'tooltip' => 'The queue this job belongs to',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'payload' => [
            'label' => 'Payload',
            'tooltip' => 'Data associated with the job',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'attempts' => [
            'label' => 'Attempts',
            'tooltip' => 'Number of attempts to execute the job',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'reserved_at' => [
            'label' => 'Reserved at',
            'tooltip' => 'Date and time when the job was reserved',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'available_at' => [
            'label' => 'Available at',
            'tooltip' => 'Date and time when the job became available',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'created_at' => [
            'label' => 'Created at',
            'tooltip' => 'Job creation date',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'status' => [
            'label' => 'Status',
            'tooltip' => 'Current job status',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'progress' => [
            'label' => 'Progress',
            'tooltip' => 'Job completion percentage',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'type' => [
            'label' => 'Type',
            'tooltip' => 'Job type (e.g., import, export)',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'name' => [
            'label' => 'Name',
            'tooltip' => 'Job name',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'description' => [
            'label' => 'Description',
            'tooltip' => 'Job description',
            'placeholder' => 'Enter a description',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Job guardian',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'permissions' => [
            'label' => 'Permissions',
            'tooltip' => 'Permissions associated with the job',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'updated_at' => [
            'label' => 'Updated at',
            'tooltip' => 'Date of last job update',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'first_name' => [
            'label' => 'First Name',
            'tooltip' => 'Responsible person\'s first name',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'last_name' => [
            'label' => 'Last Name',
            'tooltip' => 'Responsible person\'s last name',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'select_all' => [
            'label' => 'Select All',
            'tooltip' => 'Select all available items',
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'value' => [
            'label' => 'value',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'value' => [
            'label' => 'value',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'import' => [
            'label' => 'Import',
            'tooltip' => 'Import data from a file',
            'icon' => 'import-icon',
            'color' => 'blue',
            'fields' => [
                'import_file' => [
                    'label' => 'Select an XLS or CSV file to upload',
                    'placeholder' => 'Select the file to upload',
                ],
            ],
        ],
        'export' => [
            'label' => 'Export',
            'tooltip' => 'Export data to a file',
            'icon' => 'export-icon',
            'color' => 'green',
            'filename_prefix' => 'Areas as of',
            'columns' => [
                'name' => [
                    'label' => 'Area name',
                    'tooltip' => 'Name of the area to export',
                ],
                'parent_name' => [
                    'label' => 'Parent area name',
                    'tooltip' => 'Name of the parent area',
                ],
            ],
        ],
        'run' => [
            'label' => 'Run',
            'icon' => 'play',
            'color' => 'green',
            'modal' => [
                'heading' => 'Run Job',
                'description' => 'Do you want to run this job?',
            ],
            'messages' => [
                'success' => 'Job started successfully',
            ],
        ],
        'stop' => [
            'label' => 'Stop',
            'icon' => 'pause',
            'color' => 'red',
            'modal' => [
                'heading' => 'Stop Job',
                'description' => 'Do you want to stop this job?',
            ],
            'messages' => [
                'success' => 'Job stopped successfully',
            ],
        ],
        'delete' => [
            'label' => 'Delete',
            'icon' => 'trash',
            'color' => 'red',
            'modal' => [
                'heading' => 'Delete Job',
                'description' => 'Are you sure you want to delete this job?',
            ],
            'messages' => [
                'success' => 'Job deleted successfully',
            ],
        ],
    ],
    'messages' => [
        'no_jobs' => 'No jobs present',
        'job_started' => 'Job started',
        'job_stopped' => 'Job stopped',
        'job_completed' => 'Job completed',
        'job_failed' => 'Job failed',
    ],
    'statuses' => [
        'pending' => 'Pending',
        'processing' => 'Processing',
        'completed' => 'Completed',
        'failed' => 'Failed',
        'stopped' => 'Stopped',
    ],
    'types' => [
        'import' => 'Import',
        'export' => 'Export',
        'process' => 'Process',
        'notification' => 'Notification',
        'cleanup' => 'Cleanup',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
];
