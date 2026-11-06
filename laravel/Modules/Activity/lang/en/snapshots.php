<?php

declare(strict_types=1);

return [
    'name' => 'Snapshots',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'placeholder' => 'Snapshot ID',
            'helper_text' => 'Unique identifier of the snapshot',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'aggregate_uuid' => [
            'label' => 'Aggregate UUID',
            'placeholder' => 'Aggregate UUID',
            'helper_text' => 'Unique identifier of the aggregate',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'aggregate_version' => [
            'label' => 'Version',
            'placeholder' => 'Aggregate version',
            'helper_text' => 'Version number of the aggregate',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'state' => [
            'label' => 'State',
            'placeholder' => 'Snapshot state',
            'helper_text' => 'Current state of the snapshot',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'created_at' => [
            'label' => 'Created At',
            'helper_text' => 'Creation date of the snapshot',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
        'updated_at' => [
            'label' => 'Last Modified',
            'helper_text' => 'Last modification date',
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 6ed19256f (.)
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'New Snapshot',
            'tooltip' => 'Create a new snapshot',
        ],
        'edit' => [
            'label' => 'Edit',
            'tooltip' => 'Edit snapshot',
        ],
        'delete' => [
            'label' => 'Delete',
            'tooltip' => 'Delete snapshot',
        ],
        'view' => [
            'label' => 'View',
            'tooltip' => 'View snapshot details',
        ],
    ],
    'messages' => [
        'success' => [
            'created' => 'Snapshot created successfully',
            'updated' => 'Snapshot updated successfully',
            'deleted' => 'Snapshot deleted successfully',
        ],
        'error' => [
            'create' => 'Error while creating snapshot',
            'update' => 'Error while updating snapshot',
            'delete' => 'Error while deleting snapshot',
        ],
        'confirm' => [
            'delete' => 'Are you sure you want to delete this snapshot?',
        ],
    ],
    'filters' => [
        'aggregate_type' => [
            'label' => 'Aggregate Type',
            'options' => [
                'user' => 'User',
                'profile' => 'Profile',
                'role' => 'Role',
            ],
        ],
    ],
<<<<<<< HEAD
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 6ed19256f (.)
];
