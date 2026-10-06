<?php

declare(strict_types=1);

?>
<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Schedule tasks</x-slot>

        <x-slot name="afterHeader">
            <x-filament::button wire:click="taskCreate" size="sm">
                New task
            </x-filament::button>
        </x-slot>

        @php($tasks = $this->getTasks())

        <table class="w-full text-sm">
            <thead>
                <tr>
                    <th class="text-left">Description</th>
                    <th class="text-left">Average runtime</th>
                    <th class="text-left">Last run</th>
                    <th class="text-left">Next run</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="{{ $task->is_active ? '' : 'text-danger-600' }}">
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->average_runtime }} seconds</td>
                        <td>{{ $task->last_ran_at }}</td>
                        <td>{{ $task->upcoming }}</td>
                        <td class="text-right">
                            <x-filament::icon-button
                                icon="heroicon-o-play"
                                label="Esegui ora"
                                wire:click="executeTask('{{ $task->id }}')"
                            />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $tasks->links() }}
    </x-filament::section>
</x-filament-widgets::widget>
