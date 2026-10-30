

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('pub_theme::coming-soon.description') }}">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ __('pub_theme::coming-soon.title') }} - {{ config('app.name') }}">
    <meta property="og:description" content="{{ __('pub_theme::coming-soon.description') }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('pub_theme::coming-soon.title') }} - {{ config('app.name') }}">
    <meta name="twitter:description" content="{{ __('pub_theme::coming-soon.description') }}">
    
    <title>{{ __('pub_theme::coming-soon.title') }} - {{ config('app.name') }}</title>
    
    <!-- Styles -->
    @vite(['themes/Two/resources/css/app.css'])
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body class="bg-gradient-primary min-h-screen flex items-center justify-center p-4 md:p-8 relative overflow-hidden">
    
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-light/10 rounded-full blur-3xl float-animate"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-primary-dark/10 rounded-full blur-2xl float-animate" style="animation-delay: 1s;"></div>
        <div class="absolute top-3/4 left-1/3 w-48 h-48 bg-primary-light/5 rounded-full blur-xl float-animate" style="animation-delay: 2s;"></div>
    </div>
    
    <!-- Main Content -->
    <main class="relative z-10 w-full max-w-4xl">
        <x-coming-soon.container>
            <!-- Logo/Brand -->
            <div class="mb-8">
                <div class="w-20 h-20 mx-auto mb-4 bg-gradient-primary rounded-2xl flex items-center justify-center text-white text-2xl font-bold">
                    {{ substr(config('app.name'), 0, 2) }}
                </div>
            </div>
            
            <!-- Main Heading -->
            <h1 class="text-4xl md:text-6xl font-bold text-primary mb-6 leading-tight">
                {{ __('pub_theme::coming-soon.title') }}
            </h1>
            
            <!-- Description -->
            <p class="text-lg md:text-xl text-secondary leading-relaxed mb-12 max-w-lg mx-auto">
                {{ __('pub_theme::coming-soon.description') }}
            </p>
            
            <!-- Countdown Timer -->
            <x-coming-soon.countdown 
                targetDate="{{ now()->addDays(30) }}"
                showLabels="true" />
            
            <!-- Additional Information -->
            <div class="mb-8 text-tertiary text-sm">
                <p>{{ __('pub_theme::coming-soon.expected_launch') }} {{ now()->addDays(30)->format('F j, Y') }}</p>
            </div>
        </x-coming-soon.container>
        
        <!-- Footer Information -->
        <footer class="text-center mt-12 text-tertiary text-sm">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('pub_theme::coming-soon.footer.all_rights_reserved') }}</p>
            <div class="mt-4 flex justify-center gap-6">
                <a href="#" class="hover:text-primary-light transition-colors">{{ __('pub_theme::coming-soon.footer.privacy') }}</a>
                <a href="#" class="hover:text-primary-light transition-colors">{{ __('pub_theme::coming-soon.footer.terms') }}</a>
                <a href="mailto:{{ config('app.email') }}" class="hover:text-primary-light transition-colors">{{ __('pub_theme::coming-soon.footer.contact') }}</a>
            </div>
        </footer>
    </main>
    
    <!-- Scripts -->
    @vite(['themes/Two/resources/js/app.js'])
</body>
</html>