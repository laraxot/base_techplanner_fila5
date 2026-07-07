<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

abstract class BaseAuthWidget extends XotBaseWidget
{
    public ?array $data = [];

    /**
     * @return array<string, mixed>
     */
    abstract public function getFormSchema(): array;

=======
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

abstract class BaseAuthWidget extends Widget
{
    public ?array $data = [];

>>>>>>> 6ed19256f (.)
    public function mount(): void
    {
        if (Auth::check()) {
            redirect()->intended(route('dashboard'));
        }
    }

    /**
     * Restituisce i dati per la view.
     * In Filament v3/Xot, il form va gestito tramite getFormSchema().
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'form' => $this->getFormSchema(),
        ];
    }
<<<<<<< HEAD
=======

    /**
     * Restituisce lo schema del form per l'autenticazione.
     * Deve essere implementato dalle classi concrete.
     *
     * @return array<mixed>
     */
    abstract protected function getFormSchema(): array;
>>>>>>> 6ed19256f (.)
}
