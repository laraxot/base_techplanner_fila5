<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id'],
        'name' => ['label' => 'name'],
        'total_jobs' => ['label' => 'total_jobs'],
        'pending_jobs' => ['label' => 'pending_jobs'],
        'failed_jobs' => ['label' => 'failed_jobs'],
        'created_at' => ['label' => 'created_at'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'prune_batches' => ['label' => 'prune_batches', 'icon' => 'prune_batches', 'tooltip' => 'prune_batches'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
    ],
];
