<?php

<<<<<<< HEAD
use Modules\User\Models\User;
use Illuminate\Auth\Events\Login;
use function Laravel\Folio\{middleware, name};
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;


name('logout');


new class extends Component
{


    public function logout(): never
    {
        dd('a');
        app(LogoutUserAction::class)->execute(auth()->user());
=======
use function Laravel\Folio\{middleware, name};
use Livewire\Volt\Component;

name('logout');

new class extends Component
{
    public function logout(): void
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->redirect('/'.app()->getLocale().'/auth/login', navigate: false);
>>>>>>> dev
    }
}

?>

<<<<<<< HEAD
<h1 wire:init="logout">goodbye</h1>
=======
<div wire:init="logout" class="d-flex align-items-center justify-content-center min-vh-100">
    <p class="text-muted">Disconnessione in corso…</p>
</div>
>>>>>>> dev
