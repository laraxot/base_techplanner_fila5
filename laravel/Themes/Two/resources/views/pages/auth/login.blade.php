@if (auth()->check())
    <?php return redirect()->intended('/dashboard'); ?>
@endif

@extends('pub_theme::layouts.guest')

@section('title', 'Accedi - Sottana Service')

@section('content')
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Accedi al tuo account</h2>
        <p class="mt-2 text-sm text-gray-600">Inserisci le tue credenziali per continuare</p>
    </div>

    @livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)
@endsection
