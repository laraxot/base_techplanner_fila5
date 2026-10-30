<?php
use function Laravel\Folio\name;
use function Laravel\Folio\middleware;

name('login');
middleware(['guest']);
?>

@if (auth()->check())
    @php
        redirect()->intended('/')->send();
        return;
    @endphp
@endif

{{--
    Layout: usa base direttamente (non guest) perché abbiamo un full-screen split layout.
    Il layout guest avvolge il contenuto in max-w-md, incompatibile con la split layout a due pannelli.
    REGOLA FONDAMENTALE: i form sono SEMPRE gestiti tramite Filament Widget.
    Chiamata widget: @livewire(ClassName::class) — come da docs Filament.
    https://filamentphp.com/docs/widgets/adding-a-widget-to-a-blade-view
--}}
<x-layouts.base :title="__('user::auth.login.title.label')">

    {{-- Full-screen split layout: brand panel sx + form panel dx --}}
    {{-- Mobile: min-h-dvh (non 100vh: la barra URL di iOS/Android non deve coprire il fondo). --}}
    <div class="flex min-h-dvh">

        {{-- Left: brand panel --}}
        <div class="hidden lg:flex lg:w-1/2 xl:w-3/5 relative overflow-hidden"
             style="background: linear-gradient(135deg, #0f2b46 0%, #1E5A96 60%, #2D8659 100%);">
            {{-- decorative blobs --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full opacity-20"
                     style="background: radial-gradient(circle, #2D8659, transparent);"></div>
                <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full opacity-20"
                     style="background: radial-gradient(circle, #E67E22, transparent);"></div>
            </div>

            {{-- particles effect --}}
            @include('pub_theme::components.ui.particles')

            <div class="relative flex flex-col justify-center px-16 xl:px-24 text-white z-10">
                {{-- Logo --}}
                <a href="{{ url('/'.app()->getLocale()) }}"
                   class="inline-flex items-center gap-3 mb-12 group focus:outline-none focus:ring-2 focus:ring-white/50 rounded-lg"
                   aria-label="{{ __('pub_theme::ui.actions.back_to_home.label') }}">
                    <x-pub_theme::ui.logo class="h-14 w-auto" color="white" />
                </a>

                <h1 class="text-4xl xl:text-5xl font-bold leading-tight mb-6">
                    {{ __('user::auth.login.welcome_back.text') }}
                </h1>
                <p class="text-lg leading-relaxed max-w-sm" style="color: rgba(255,255,255,0.8);">
                    {{ __('user::auth.login.welcome_message.text') }}
                </p>

                {{-- Decorative trust badges --}}
                <div class="mt-16 grid grid-cols-2 gap-6">
                    <div class="rounded-2xl px-5 py-4"
                         style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
                        <p class="text-2xl font-bold">ISO 9001</p>
                        <p class="text-sm mt-1" style="color: rgba(255,255,255,0.6);">{{ __('pub_theme::ui.sections.quality_certification.label') }}</p>
                    </div>
                    <div class="rounded-2xl px-5 py-4"
                         style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
                        <p class="text-2xl font-bold">GDPR</p>
                        <p class="text-sm mt-1" style="color: rgba(255,255,255,0.6);">{{ __('pub_theme::ui.sections.regulatory_compliance.label') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right: form panel --}}
        {{-- Mobile (360px): px-4 + card px-5 lasciano ~288px ai campi (prima ~248px). --}}
        <div class="flex w-full lg:w-1/2 xl:w-2/5 items-center justify-center px-4 sm:px-10 py-8 sm:py-12"
             style="background-color: #f9fafb;">
            <div class="w-full max-w-md">

                {{-- Mobile: logo (visible only on small screens) --}}
                <div class="mb-8 flex justify-center lg:hidden">
                    <a href="{{ url('/'.app()->getLocale()) }}"
                       class="focus:outline-none focus:ring-2 rounded-lg" style="outline-color: #1E5A96;">
                        <x-pub_theme::ui.logo class="h-12 w-auto" />
                    </a>
                </div>

                {{-- Card glassmorphism --}}
                <div class="relative">
                    <div class="absolute -inset-1 rounded-3xl blur-2xl opacity-30"
                         style="background: linear-gradient(135deg, #1E5A96, #2D8659);"></div>
                    <div class="relative rounded-3xl bg-white px-5 py-8 sm:px-8 sm:py-10 shadow-2xl"
                         style="ring: 1px solid rgba(229,231,235,0.8);">

                        <h2 id="login-heading" class="text-2xl font-bold mb-2" style="color: #111827;">
                            {{ __('user::auth.login.title.label') }}
                        </h2>
                        <p class="text-sm mb-8" style="color: #6b7280;">
                            {{ __('user::auth.login.subtitle.text') }}
                        </p>

                        @livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)

                        {{-- Back to home link --}}
                        {{-- Mobile: bersaglio >= 44px (min-h-11), contrasto gray-600 su bianco 7:1 (il vecchio #9ca3af era 2,5:1), niente hover via JS inline. --}}
                        <div class="mt-6 text-center">
                            <a href="{{ url('/'.app()->getLocale()) }}"
                               class="inline-flex min-h-11 items-center gap-1.5 px-3 text-sm text-gray-600 transition-colors hover:text-gray-900 focus:outline-none focus:ring-2 rounded">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                {{ __('pub_theme::ui.actions.back_to_home.label') }}
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layouts.base>
