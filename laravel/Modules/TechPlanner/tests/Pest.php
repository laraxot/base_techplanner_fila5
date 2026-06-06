<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\TechPlanner\Models\Project;
use Modules\TechPlanner\Models\Resource;
use Modules\TechPlanner\Models\Task;
use Modules\TechPlanner\Tests\TestCase;

uses(TestCase::class, DatabaseTransactions::class)->in('Feature', 'Unit');

expect()->extend('toBeProject', fn () => $this->toBeInstanceOf(Project::class));

expect()->extend('toBeTask', fn () => $this->toBeInstanceOf(Task::class));

expect()->extend('toBeResource', fn () => $this->toBeInstanceOf(Resource::class));

function createProject(array $attributes = []): Project
{
    return Project::factory()->create($attributes);
}

function makeProject(array $attributes = []): Project
{
    return Project::factory()->make($attributes);
}

function createTask(array $attributes = []): Task
{
    return Task::factory()->create($attributes);
}

function makeTask(array $attributes = []): Task
{
    return Task::factory()->make($attributes);
}

function createResource(array $attributes = []): Resource
{
    return Resource::factory()->create($attributes);
}

function makeResource(array $attributes = []): Resource
{
    return Resource::factory()->make($attributes);
}
