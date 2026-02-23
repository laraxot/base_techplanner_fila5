{{--
    SocialLoginWidget: pulsanti OAuth riutilizzabili (Google, Microsoft, GitHub).
    CRITICO: Livewire richiede SEMPRE un root tag HTML con contenuto.
    REGOLA: gli SVG non sono hardcoded nelle blade ma creati come file in Modules/UI/resources/svg
--}}
@php
    $hasGoogle = (bool) config('services.google.client_id');
    $hasMicrosoft = (bool) config('services.microsoft.client_id');
    $hasGithub = (bool) config('services.github.client_id');
    $hasAny = $hasGoogle || $hasMicrosoft || $hasGithub;
@endphp

<div class="social-login-widget">
    @if ($hasAny)
        <div class="social-login-buttons grid grid-cols-1 sm:grid-cols-3 gap-4">
            @if ($hasGoogle)
                <a href="{{ route('socialite.oauth.redirect', ['provider' => 'google']) }}"
                    class="flex items-center justify-center gap-3 py-2.5 px-4 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 hover:shadow-sm transition-all duration-200 group focus:outline-none focus:ring-2 focus:ring-[#1E5A96]/30"
                >
                    <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    <span class="font-medium text-gray-700 group-hover:text-gray-900 transition-colors">
                        {{ __('user::auth.social.google') }}
                    </span>
                </a>
            @endif

            @if ($hasMicrosoft)
                <a href="{{ route('socialite.oauth.redirect', ['provider' => 'microsoft']) }}"
                    class="flex items-center justify-center gap-3 py-2.5 px-4 bg-[#00A4EF] border border-[#00A4EF] rounded-xl hover:bg-[#0088cc] hover:border-[#0088cc] hover:shadow-sm transition-all duration-200 group focus:outline-none focus:ring-2 focus:ring-[#00A4EF]/30"
                >
                    <svg class="w-5 h-5 flex-shrink-0 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.4 24H0V12.6h11.4V24zM24 24H12.6V12.6H24V24zM11.4 11.4H0V0h11.4v11.4zM24 11.4H12.6V0H24v11.4z" fill="#f35325"/>
                        <path d="M11.4 11.4H0V0h11.4v11.4z" fill="#81bc06"/>
                        <path d="M24 11.4H12.6V0H24v11.4z" fill="#05a6f0"/>
                        <path d="M24 24H12.6V12.6H24V24z" fill="#ffba08"/>
                    </svg>
                    <span class="font-medium text-white transition-colors">
                        {{ __('user::auth.social.microsoft') }}
                    </span>
                </a>
            @endif

            @if ($hasGithub)
                <a href="{{ route('socialite.oauth.redirect', ['provider' => 'github']) }}"
                    class="flex items-center justify-center gap-3 py-2.5 px-4 bg-[#24292F] border border-[#24292F] rounded-xl hover:bg-[#1c2126] hover:shadow-sm transition-all duration-200 group focus:outline-none focus:ring-2 focus:ring-gray-500/20"
                >
                    <svg class="w-5 h-5 flex-shrink-0 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    <span class="font-medium text-white transition-colors">
                        {{ __('user::auth.social.github') }}
                    </span>
                </a>
            @endif
        </div>
    @else
        <div class="hidden" aria-hidden="true"></div>
    @endif
</div>
