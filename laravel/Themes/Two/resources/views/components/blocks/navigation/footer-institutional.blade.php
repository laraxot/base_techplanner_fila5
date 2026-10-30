@props([
    'companyName' => config('app.name'),
    'address' => '',
    'email' => '',
    'phone' => '',
    'vatNumber' => '',
    'showPrivacy' => true,
    'showTerms' => true,
    'showCookie' => true,
])

<footer class="footer-institutional bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">{{ $companyName }}</h3>
                @if($address)
                    <p class="text-gray-400 text-sm">{{ $address }}</p>
                @endif
                
                @if($email || $phone)
                    <div class="space-y-2 text-sm">
                        @if($email)
                            <a href="mailto:{{ $email }}" class="text-gray-400 hover:text-white transition-colors">
                                {{ $email }}
                            </a>
                        @endif
                        
                        @if($phone)
                            <a href="tel:{{ $phone }}" class="text-gray-400 hover:text-white transition-colors">
                                {{ $phone }}
                            </a>
                        @endif
                    </div>
                @endif
                
                @if($vatNumber)
                    <p class="text-gray-400 text-sm">
                        {{ __('pub_theme::footer.contact.vat.abbr') }}: {{ $vatNumber }}
                    </p>
                @endif
            </div>
            
            <!-- Quick Links -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">{{ __('pub_theme::footer.useful_links') }}</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">
                            {{ __('pub_theme::navigation.home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('container0', ['container0' => 'services']) }}" class="text-gray-400 hover:text-white transition-colors">
                            {{ __('pub_theme::navigation.services') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('container0', ['container0' => 'about']) }}" class="text-gray-400 hover:text-white transition-colors">
                            {{ __('pub_theme::navigation.about') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('container0', ['container0' => 'contatti']) }}" class="text-gray-400 hover:text-white transition-colors">
                            {{ __('pub_theme::navigation.contact') }}
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Legal Links -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">{{ __('pub_theme::footer.sections.legal_info.label') }}</h3>
                <ul class="space-y-2 text-sm">
                    @if($showPrivacy && Route::has('pages.view'))
                        <li>
                            <a href="{{ route('container0', ['container0' => 'privacy']) }}" class="text-gray-400 hover:text-white transition-colors">
                                {{ __('pub_theme::footer.legal.privacy.label') }}
                            </a>
                        </li>
                    @endif
                    
                    @if($showTerms && Route::has('pages.view'))
                        <li>
                            <a href="{{ route('container0', ['container0' => 'terms']) }}" class="text-gray-400 hover:text-white transition-colors">
                                {{ __('pub_theme::footer.legal.terms.label') }}
                            </a>
                        </li>
                    @endif
                    
                    @if($showCookie && Route::has('pages.view'))
                        <li>
                            <a href="{{ route('container0', ['container0' => 'cookies']) }}" class="text-gray-400 hover:text-white transition-colors">
                                {{ __('pub_theme::footer.sections.cookie_policy.label') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
            <p>
                &copy; {{ date('Y') }} {{ $companyName }}. 
                {{ __('pub_theme::footer.all_rights_reserved') }}
            </p>
        </div>
    </div>
</footer>
