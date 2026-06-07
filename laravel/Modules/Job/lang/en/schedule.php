<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Scheduler',
        'plural' => 'Schedulers',
        'group' => [
            'name' => 'Jobs',
            'description' => 'Scheduled jobs management',
        ],
        'label' => 'Scheduler',
        'sort' => '55',
        'icon' => 'job-schedule-animated',
    ],
    'resource' => [
        'single' => 'Schedule',
        'plural' => 'Schedules',
        'navigation' => 'Settings',
        'history' => 'Show run history',
    ],
    'fields' => [
        'name' => [
            'label' => 'Name',
            'tooltip' => 'Enter the scheduled job name',
            'placeholder' => 'Job name',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Select the guard for the job',
            'placeholder' => 'Guard name',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'permissions' => [
            'label' => 'Permissions',
            'tooltip' => 'Assign necessary permissions to the job',
            'placeholder' => 'Permissions',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'first_name' => [
            'label' => 'First Name',
            'tooltip' => 'Responsible person first name',
            'placeholder' => 'Responsible first name',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'last_name' => [
            'label' => 'Last Name',
            'tooltip' => 'Responsible person last name',
            'placeholder' => 'Responsible last name',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'command' => [
            'label' => 'Command',
            'tooltip' => 'Enter the command to execute',
            'placeholder' => 'Command',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'arguments' => [
            'label' => 'Arguments',
            'tooltip' => 'Specify any arguments for the command',
            'placeholder' => 'Arguments',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'options' => [
            'label' => 'Options',
            'tooltip' => 'Enter any options for the command',
            'placeholder' => 'Options',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'expression' => [
            'label' => 'Cron Expression',
            'tooltip' => 'Set the cron expression for scheduling',
            'placeholder' => 'Cron Expression',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'log_filename' => [
            'label' => 'Log Filename',
            'tooltip' => 'Log file name',
            'placeholder' => 'Log filename',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'status' => [
            'label' => 'Status',
            'tooltip' => 'Current job status',
            'placeholder' => 'Status',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'actions' => [
            'label' => 'Actions',
            'tooltip' => 'Available actions for the job',
            'icon' => 'action-icon',
            'color' => 'blue',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'run_in_background' => [
            'label' => 'Run in Background',
            'tooltip' => 'Run the job in background',
            'placeholder' => 'Run in background',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => 'Job creation date',
            'placeholder' => 'Creation date',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'updated_at' => [
            'label' => 'Updated At',
            'tooltip' => 'Last update date',
            'placeholder' => 'Update date',
<<<<<<< HEAD
<<<<<<< HEAD
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'timezone' => [
            'label' => 'Timezone',
            'tooltip' => 'Set the timezone for the job',
            'placeholder' => 'Timezone',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
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
<<<<<<< HEAD
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
    ],
    'messages' => [
        'no-records-found' => 'No records found.',
        'save-success' => 'Data saved successfully.',
        'save-error' => 'Error saving data.',
        'timezone' => 'All schedules will be executed in the timezone: ',
        'select' => 'Select a command',
        'custom' => 'Custom Command',
        'custom-command-here' => 'Custom Command here (e.g. `cat /proc/cpuinfo` or `artisan db:migrate`)',
    ],
    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'trashed' => 'Trashed',
        'running' => 'Running',
        'failed' => 'Failed',
    ],
    'buttons' => [
        'inactivate' => [
            'label' => 'Inactivate',
            'icon' => 'icon-inactivate',
            'color' => 'gray',
        ],
        'activate' => [
            'label' => 'Activate',
            'icon' => 'icon-activate',
            'color' => 'green',
        ],
        'history' => [
            'label' => 'History',
            'icon' => 'icon-history',
            'color' => 'purple',
        ],
        'run' => [
            'label' => 'Run Now',
            'modal' => [
                'heading' => 'Run Schedule',
                'description' => 'Do you want to run this schedule now?',
            ],
            'messages' => [
                'success' => 'Schedule executed successfully',
            ],
            'icon' => 'icon-run',
            'color' => 'blue',
        ],
        'toggle' => [
            'label' => 'Activate/Deactivate',
            'modal' => [
                'heading' => 'Modify Status',
                'description' => 'Do you want to modify the status of this schedule?',
            ],
            'messages' => [
                'success' => 'Status modified successfully',
            ],
            'icon' => 'icon-toggle',
            'color' => 'orange',
        ],
        'delete' => [
            'label' => 'Delete',
            'modal' => [
                'heading' => 'Delete Schedule',
                'description' => 'Are you sure you want to delete this schedule?',
            ],
            'messages' => [
                'success' => 'Schedule deleted successfully',
            ],
            'icon' => 'icon-delete',
            'color' => 'red',
        ],
    ],
    'validation' => [
        'cron' => 'The field must be filled in the cron expression format.',
        'regex' => 'The :attribute field must only contain letters, numbers, dashes, and underscores. Comma is also allowed.',
    ],
    'frequencies' => [
        'everyMinute' => 'Every Minute',
        'everyFiveMinutes' => 'Every 5 Minutes',
        'everyTenMinutes' => 'Every 10 Minutes',
        'everyFifteenMinutes' => 'Every 15 Minutes',
        'everyThirtyMinutes' => 'Every 30 Minutes',
        'hourly' => 'Every Hour',
        'daily' => 'Every Day',
        'weekly' => 'Every Week',
        'monthly' => 'Every Month',
        'quarterly' => 'Every Quarter',
        'yearly' => 'Every Year',
    ],
    'days' => [
        'sunday' => 'Sunday',
        'monday' => 'Monday',
        'tuesday' => 'Tuesday',
        'wednesday' => 'Wednesday',
        'thursday' => 'Thursday',
        'friday' => 'Friday',
        'saturday' => 'Saturday',
    ],
    'cron' => [
        'help' => [
            'title' => 'Cron Expressions Help',
            'minute' => 'Minute (0-59)',
            'hour' => 'Hour (0-23)',
            'day_of_month' => 'Day of Month (1-31)',
            'month' => 'Month (1-12)',
            'day_of_week' => 'Day of Week (0-6)',
            'examples' => [
                'every_minute' => '* * * * * - Every minute',
                'every_hour' => '0 * * * * - Every hour',
                'every_day' => '0 0 * * * - Every day at midnight',
                'every_monday' => '0 0 * * 1 - Every Monday at midnight',
            ],
        ],
    ],
    'model' => [
        'label' => 'schedule.model',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
<<<<<<< HEAD
=======
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
];
