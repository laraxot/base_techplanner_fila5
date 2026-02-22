<x-layouts.app>
    <section class="relative bg-gradient-to-br from-[#1E5A96] via-[#164575] to-[#0d2d4d] text-white">
        <div class="absolute inset-0">
            <div class="h-full w-full bg-[radial-gradient(rgba(255,255,255,0.08)_1px,transparent_1px)] [background-size:22px_22px] opacity-50"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-black/10"></div>
        </div>

        <div class="relative mx-auto flex min-h-[calc(100vh-6rem)] max-w-6xl flex-col items-center justify-center px-6 py-16 lg:flex-row lg:items-stretch lg:gap-16">
            <div class="max-w-xl space-y-6 text-center lg:text-left">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-white/80">
                    {{ __('user::auth.login.title') }}
                </span>
                <h1 class="text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">
                    {{ __('user::auth.login.heading', ['brand' => config('app.name')]) }}
                </h1>
                <p class="text-base md:text-lg text-white/80 leading-relaxed">
                    {{ __('user::auth.login.support_copy') }}
                </p>
                <ul class="space-y-3 text-left text-sm text-white/85">
                    <li class="flex items-start gap-3">
                        <span class="mt-1 h-2 w-2 rounded-full bg-brand-green" aria-hidden="true"></span>
                        <span>{{ __('user::auth.login.benefits.quick_support') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1 h-2 w-2 rounded-full bg-brand-orange" aria-hidden="true"></span>
                        <span>{{ __('user::auth.login.benefits.secure_area') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1 h-2 w-2 rounded-full bg-white/80" aria-hidden="true"></span>
                        <span>{{ __('user::auth.login.benefits.documents_ready') }}</span>
                    </li>
                </ul>
                <div class="space-x-0 space-y-3 pt-6 sm:flex sm:items-center sm:gap-4 sm:space-y-0">
                    <a href="/it" class="inline-flex items-center justify-center rounded-lg border border-white/30 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white hover:text-brand-blue focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-transparent">
                        {{ __('user::auth.login.back_to_site') }}
                    </a>
                    <a href="/it/contatti" class="inline-flex items-center justify-center rounded-lg bg-brand-green px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-green/90 focus:outline-none focus:ring-2 focus:ring-brand-green focus:ring-offset-2 focus:ring-offset-transparent">
                        {{ __('user::auth.login.need_help') }}
                    </a>
                </div>
            </div>

            <div class="relative mt-12 w-full max-w-lg lg:mt-0">
                <div class="absolute -inset-1 rounded-3xl bg-gradient-to-br from-white/40 via-white/10 to-white/40 blur-2xl"></div>
                <div class="relative rounded-3xl bg-white px-6 py-8 text-gray-900 shadow-2xl shadow-black/15 ring-1 ring-white/50 sm:px-10">
                    @livewire('user::filament.widgets.auth.login-widget')
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
