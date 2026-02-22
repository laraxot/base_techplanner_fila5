<?php

use function Livewire\Volt\{state, mount};

state([
    'email' => '',
    'password' => '',
    'remember' => false,
]);

$login = function() {
    if (auth()->attempt([
        'email' => $this->email,
        'password' => $this->password,
    ], $this->remember)) {
        return redirect()->intended('/dashboard');
    }

    $this->addError('email', 'Credenziali non valide');
};

?>
<x-layouts.guest>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-brand-blue via-brand-blue/90 to-black py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center space-x-2 mb-6">
                    <svg class="w-12 h-12 text-white" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="50" cy="60" rx="25" ry="20" fill="currentColor" opacity="0.9"></ellipse>
                        <ellipse cx="65" cy="50" rx="18" ry="22" fill="currentColor"></ellipse>
                        <path d="M 83 50 Q 95 45 97 40 Q 98 35 96 30 Q 94 25 90 28 Q 88 30 88 35 Q 88 40 86 45 Q 85 48 83 50 Z" fill="currentColor"></path>
                        <ellipse cx="75" cy="40" rx="12" ry="15" fill="currentColor" opacity="0.7"></ellipse>
                        <circle cx="70" cy="48" r="3" fill="white"></circle>
                        <circle cx="70" cy="48" r="1.5" fill="currentColor"></circle>
                        <path d="M 87 45 L 90 35 L 87 40 Z" fill="currentColor" opacity="0.8"></path>
                        <ellipse cx="60" cy="75" rx="6" ry="8" fill="currentColor"></ellipse>
                        <ellipse cx="40" cy="75" rx="6" ry="8" fill="currentColor"></ellipse>
                        <path d="M 27 60 Q 20 55 17 50" stroke="currentColor" stroke-width="3" stroke-linecap="round" fill="none"></path>
                        <circle cx="17" cy="50" r="2" fill="currentColor"></circle>
                    </svg>
                    <span class="font-bold text-2xl text-white">Sottana Service</span>
                </a>
                <h2 class="text-3xl font-bold text-white">
                    Accedi al tuo account
                </h2>
                <p class="mt-2 text-gray-300">
                    Inserisci le tue credenziali per continuare
                </p>
            </div>

            <form class="mt-8 space-y-6" wire:submit.prevent="$login">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input wire:model="email" id="email" name="email" type="email" autocomplete="email" required
                            class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-brand-blue focus:border-brand-blue focus:z-10 sm:text-sm"
                            placeholder="Email">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input wire:model="password" id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-brand-blue focus:border-brand-blue focus:z-10 sm:text-sm"
                            placeholder="Password">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input wire:model="remember" id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-brand-blue focus:ring-brand-blue border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">
                            Ricordami
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-brand-blue hover:bg-brand-blue/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-blue">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-white/50 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Accedi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.guest>
