<?php

declare(strict_types=1);

use Livewire\Volt\Component;
use Modules\User\Actions\Socialite\ProcessCallbackAction;

use function Laravel\Folio\name;

name('oauth.callback');

new class extends Component {
    public function mount(string $provider): void
    {
        if (! in_array($provider, ['google', 'microsoft', 'github'], true)) {
            abort(404);
        }

        $lang = request()->route('lang');
        $response = app(ProcessCallbackAction::class)->execute(
            is_string($lang) ? $lang : (string) app()->getLocale(),
            $provider,
        );

        $this->redirect($response->getTargetUrl());
    }
};
?>

{{-- Redirect-only Folio+Volt callback: OAuth policy belongs to Modules/User; Two owns the route shell (copia della pagina di Sixteen: senza, il pulsante «Accedi con Google» dava 500 per la route oauth.callback mancante). --}}
@volt('auth.login.oauth-callback')
    <div aria-hidden="true"></div>
@endvolt
