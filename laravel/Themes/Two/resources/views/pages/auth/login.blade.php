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
                    <?php
                    use function Livewire\Volt\rules;
                    use function Livewire\Volt\state;
                    
                    state(['email' => '', 'password' => '', 'remember' => false]);
                    rules(['email' => 'required|email', 'password' => 'required']);
                    
                    $login = function () {
                        $this->validate();
                        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
                            session()->regenerate();
                            return redirect()->intended('/dashboard');
                        }
                        $this->addError('email', __('auth.failed'));
                    };
                    ?>
                    
                    <form wire:submit.prevent="$login" class="space-y-5">
                        @csrf
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('user::auth.login.email') }}</label>
                            <input wire:model="email" type="email" id="email" autocomplete="email" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1E5A96] focus:ring-[#1E5A96] sm:text-sm">
                            @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('user::auth.login.password') }}</label>
                            <input wire:model="password" type="password" id="password" autocomplete="current-password" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1E5A96] focus:ring-[#1E5A96] sm:text-sm">
                            @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input wire:model="remember" type="checkbox" id="remember" class="h-4 w-4 rounded border-gray-300 text-[#1E5A96] focus:ring-[#1E5A96]">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">{{ __('user::auth.login.remember_me') }}</label>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#1E5A96] to-[#164575] text-white font-semibold hover:from-[#164575] hover:to-[#0d2d4d] focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:ring-offset-2">
                            {{ __('user::auth.login.submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
