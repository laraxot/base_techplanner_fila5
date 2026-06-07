{{-- Social Links ufficiali PA - Conforme linee guida AGID --}}
@props([
    'links' => [],
    'variant' => 'default', // default, header, footer
    'size' => 'md', // sm, md, lg
])

@php
    $socialPlatforms = [
        'facebook' => [
            'name' => 'Facebook',
<<<<<<< HEAD
            'icon' => 'heroicon-o-facebook',
=======
            'icon' => 'ui-brands.facebook',
>>>>>>> dev
            'color' => 'text-blue-600 hover:text-blue-700',
            'bg' => 'hover:bg-blue-50',
        ],
        'twitter' => [
<<<<<<< HEAD
            'name' => 'X (Twitter)', 
            'icon' => 'heroicon-o-chat-bubble-left-right',
=======
            'name' => 'X (Twitter)',
            'icon' => 'ui-brands.twitter',
>>>>>>> dev
            'color' => 'text-gray-900 hover:text-gray-700',
            'bg' => 'hover:bg-gray-50',
        ],
        'instagram' => [
            'name' => 'Instagram',
<<<<<<< HEAD
            'icon' => 'heroicon-o-camera',
=======
            'icon' => 'ui-brands.instagram',
>>>>>>> dev
            'color' => 'text-pink-600 hover:text-pink-700',
            'bg' => 'hover:bg-pink-50',
        ],
        'linkedin' => [
            'name' => 'LinkedIn',
<<<<<<< HEAD
            'icon' => 'heroicon-o-briefcase',
=======
            'icon' => 'ui-brands.linkedin',
>>>>>>> dev
            'color' => 'text-blue-700 hover:text-blue-800',
            'bg' => 'hover:bg-blue-50',
        ],
        'youtube' => [
            'name' => 'YouTube',
<<<<<<< HEAD
            'icon' => 'heroicon-o-play',
=======
            'icon' => 'ui-brands.youtube',
>>>>>>> dev
            'color' => 'text-red-600 hover:text-red-700',
            'bg' => 'hover:bg-red-50',
        ],
        'telegram' => [
            'name' => 'Telegram',
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'text-blue-500 hover:text-blue-600',
            'bg' => 'hover:bg-blue-50',
        ],
    ];
    
    $sizeClasses = [
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-12 h-12',
    ];
    
    $variantClasses = [
        'default' => 'flex space-x-3',
        'header' => 'flex space-x-2',
        'footer' => 'flex space-x-4 justify-center',
    ];
@endphp

<nav 
    class="{{ $variantClasses[$variant] }}" 
    aria-label="{{ __('pub_theme::social.follow_us') }}"
>
    @foreach($links as $platform => $url)
        @if(isset($socialPlatforms[$platform]) && $url)
            @php $platformConfig = $socialPlatforms[$platform]; @endphp
            
            <a
                href="{{ $url }}"
                target="_blank"
                rel="noopener noreferrer"
                class="{{ $sizeClasses[$size] }} {{ $platformConfig['bg'] }} {{ $platformConfig['color'] }} rounded-full flex items-center justify-center transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-current focus:ring-offset-2"
                :aria-label="__('pub_theme::social.follow_on', ['platform' => $platformConfig['name']])"
            >
<<<<<<< HEAD
                <x-filament::icon 
                    :name="$platformConfig['icon']" 
                    class="w-5 h-5"
                />
                
=======
                <x-icon
                    :name="$platformConfig['icon']"
                    class="w-5 h-5"
                />

>>>>>>> dev
                <span class="sr-only">
                    {{ __('pub_theme::social.follow_on', ['platform' => $platformConfig['name']]) }}
                </span>
            </a>
        @endif
    @endforeach
</nav>