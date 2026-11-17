<?php
use function Laravel\Folio\middleware;

middleware(['auth']);
?>

@volt('profile.index')
<?php

use function Livewire\Volt\{state, mount};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

state([
    'name' => '',
    'email' => '',
    'current_password' => '',
    'new_password' => '',
    'new_password_confirmation' => '',
]);

mount(function () {
    $this->name = Auth::user()->name;
    $this->email = Auth::user()->email;
});

$updateProfile = function() {
    $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
    ]);

    Auth::user()->update([
        'name' => $this->name,
        'email' => $this->email,
    ]);

    session()->flash('message', __('pub_theme::profile.messages.profile_updated.message'));
};

$updatePassword = function() {
    $this->validate([
        'current_password' => ['required', 'current_password'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    Auth::user()->update([
        'password' => Hash::make($this->new_password),
    ]);

    $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    session()->flash('message', __('pub_theme::profile.messages.password_updated.message'));
};

?>

<div>
    <x-filament::page>
        <x-slot name="header">
            <h2 class="text-2xl font-bold">
                {{ __('pub_theme::profile.sections.title.title') }}
            </h2>
        </x-slot>

        <div class="space-y-6">
            <x-laraxot::card>
                <x-slot name="title">
                    {{ __('pub_theme::profile.sections.info.title') }}
                </x-slot>

                <form wire:submit="updateProfile">
                    <div class="space-y-4">
                        <div>
                            <x-input-label for="name" :value="__('pub_theme::profile.sections.name.label')" />
                            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('pub_theme::profile.sections.email.label')" />
                            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            <x-primary-button>
                                {{ __('pub_theme::profile.actions.update_profile.label') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </x-laraxot::card>

            <x-laraxot::card>
                <x-slot name="title">
                    {{ __('pub_theme::profile.actions.update_password.label') }}
                </x-slot>

                <form wire:submit="updatePassword">
                    <div class="space-y-4">
                        <div>
                            <x-input-label for="current_password" :value="__('pub_theme::profile.sections.current_password.label')" />
                            <x-text-input wire:model="current_password" id="current_password" class="block mt-1 w-full" type="password" name="current_password" required />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="new_password" :value="__('pub_theme::profile.sections.new_password.label')" />
                            <x-text-input wire:model="new_password" id="new_password" class="block mt-1 w-full" type="password" name="new_password" required />
                            <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="new_password_confirmation" :value="__('pub_theme::profile.actions.confirm_new_password.label')" />
                            <x-text-input wire:model="new_password_confirmation" id="new_password_confirmation" class="block mt-1 w-full" type="password" name="new_password_confirmation" required />
                            <x-input-error :messages="$errors->get('new_password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            <x-primary-button>
                                {{ __('pub_theme::profile.actions.update_password.label') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </x-laraxot::card>
        </div>
    </x-filament::page>
</div>
@endvolt
