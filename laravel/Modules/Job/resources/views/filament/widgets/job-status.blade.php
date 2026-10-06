<?php

declare(strict_types=1);

?>
<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Job status</x-slot>

        <pre>{!! $out !!}</pre>

        <x-filament::input.wrapper label="Connessione queue">
            <x-filament::input.select wire:model.lazy="form_data.conn">
                <option value="sync">sync</option>
                <option value="database">database</option>
            </x-filament::input.select>
        </x-filament::input.wrapper>

        <div class="flex flex-wrap gap-2">
            <x-filament::button wire:click="dummyAction" color="gray">
                1000 Dummy Action
            </x-filament::button>

            @foreach ($this->getAllowedCommands() as $cmd)
                <x-filament::button wire:click="artisan('{{ $cmd }}')">
                    queue:{{ $cmd }}
                </x-filament::button>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
