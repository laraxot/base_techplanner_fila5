@props([
    'logoUrl' => '/',
    'showAuth' => true,
    'showSearch' => true,
])

<header class="header-main bg-white shadow-md sticky top-0 z-50" role="banner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ $logoUrl }}" class="flex items-center space-x-3" aria-label="{{ __('pub_theme::a11y_labels.header_main.home.label', ['name' => config('app.name')]) }}">
                    <x-pub_theme::ui.logo class="h-10 w-auto" />
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8" role="navigation" aria-label="{{ __('pub_theme::navigation.main') }}">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                    {{ __('pub_theme::navigation.home') }}
                </a>
                <a href="{{ route('container0', ['container0' => 'services']) }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                    {{ __('pub_theme::navigation.services') }}
                </a>
                <a href="{{ route('container0', ['container0' => 'about']) }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                    {{ __('pub_theme::navigation.about') }}
                </a>
                <a href="{{ route('blog') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                    {{ __('pub_theme::navigation.blog') }}
                </a>
                <a href="{{ route('container0', ['container0' => 'contatti']) }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                    {{ __('pub_theme::navigation.contact') }}
                </a>
            </nav>
            
            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                @if($showSearch)
                    <button type="button" class="p-2 text-gray-700 hover:text-primary-600 transition-colors" aria-label="{{ __('pub_theme::navigation.actions.search.label') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                @endif
                
                <!-- Auth Links -->
                @if($showAuth)
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">
                            {{ __('pub_theme::navigation.actions.login.label') }}
                        </a>
                        @if(Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-primary-700 transition-colors">
                                {{ __('pub_theme::navigation.actions.register.label') }}
                            </a>
                        @endif
                    @else
                        <a href="{{ route('container0', ['container0' => 'profile']) }}" class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="hidden md:inline">{{ __('pub_theme::navigation.sections.profile.label') }}</span>
                        </a>
                    @endguest
                @endif
                
                <!-- Mobile Menu Button -->
                <button type="button" class="lg:hidden p-2 text-gray-700 hover:text-primary-600 transition-colors" aria-label="{{ __('pub_theme::navigation.actions.open_menu.label') }}" aria-expanded="false">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
