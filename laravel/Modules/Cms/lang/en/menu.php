<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Menu',
        'plural' => 'Menus',
        'group' => [
            'name' => 'Menu Management',
            'description' => 'Manage website menus',
        ],
        'label' => 'Menus',
        'sort' => '57',
        'icon' => 'heroicon-o-bars-3',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'placeholder' => 'Menu ID',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Menu name',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'slug' => [
            'label' => 'Slug',
            'placeholder' => 'Menu slug',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'description' => [
            'label' => 'Description',
            'placeholder' => 'Menu description',
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'type' => [
            'label' => 'Type',
            'placeholder' => 'Menu type',
            'options' => [
                'main' => 'Main',
                'footer' => 'Footer',
                'sidebar' => 'Sidebar',
            ],
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'Menu status',
            'options' => [
                'active' => 'Active',
                'inactive' => 'Inactive',
                'draft' => 'Draft',
            ],
<<<<<<< HEAD
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
        'message' => [
            'label' => 'message',
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
        'applyFilters' => [
            'label' => 'applyFilters',
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
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'title' => [
            'label' => 'title',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'message' => [
            'label' => 'message',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'title' => [
            'label' => 'title',
>>>>>>> 4b6b99016 (first commit)
        ],
    ],
    'actions' => [
        'create' => 'Create Menu',
        'edit' => 'Edit Menu',
        'delete' => 'Delete Menu',
        'sort' => 'Sort Items',
        'add_item' => 'Add Item',
    ],
    'messages' => [
        'created' => 'Menu created successfully',
        'updated' => 'Menu updated successfully',
        'deleted' => 'Menu deleted successfully',
        'sorted' => 'Menu items sorted successfully',
        'item_added' => 'Item added successfully',
    ],
    'validation' => [
        'name_required' => 'The name is required',
        'slug_unique' => 'The slug must be unique',
        'type_in' => 'The type must be one of: main, footer, sidebar',
    ],
    'model' => [
        'label' => 'menu.model',
    ],
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
];
