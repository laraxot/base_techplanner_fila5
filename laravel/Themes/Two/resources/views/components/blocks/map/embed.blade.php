@props([
    'title' => 'Dove Siamo',
    'address' => '',
    'coordinates' => [],
])

@php
    $lat = $coordinates['lat'] ?? 45.5648;
    $lng = $coordinates['lng'] ?? 12.2347;
    $address = $address ?: 'Via Vanzo 86/A, 31021 Mogliano Veneto TV';

    // Google Maps static image (usa API key esistente)
    $googleMapsApiKey = 'AIzaSyDH_mjxDeYAeHV_ocThsU_CIvyGEq-vLYc';
    $staticMapUrl = "https://maps.googleapis.com/maps/api/staticmap?center=" . urlencode($address) . "&zoom=16&size=800x450&markers=color:red%7C" . $lat . "," . $lng . "&key=" . $googleMapsApiKey;

    // Google Maps iframe embed (fallback gratuito)
    $iframeSrc = "https://maps.google.com/maps?q={$lat},{$lng}&z=17&ie=UTF8&iwloc=&output=embed";

    // Google Maps directions (solo per navigazione)
    $directionsUrl = "https://www.google.com/maps/dir/?api=1&destination=" . urlencode($address);
@endphp

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        {{-- Section Title --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            @if(!empty($address))
                <p class="text-lg text-gray-600">{{ $address }}</p>
            @endif
        </div>

        {{-- Map Container --}}
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                {{-- Clickable Static Map Image with fallback to iframe --}}
                <a
                    href="{{ $directionsUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block relative group"
                    title="Clicca per aprire su Google Maps"
                >
                    <img
                        src="{{ $staticMapUrl }}"
                        alt="{{ $title }} - {{ $address }}"
                        class="w-full h-auto"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                    />
                    {{-- Fallback iframe if image fails --}}
                    <iframe
                        src="{{ $iframeSrc }}"
                        width="100%"
                        height="450"
                        frameborder="0"
                        style="border:0; display:none;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Mappa: {{ $address }}"
                        class="fallback-iframe"
                    ></iframe>

                    {{-- Overlay with pointer --}}
                    <div class="absolute inset-0 bg-transparent group-hover:bg-black/5 transition-colors"></div>

                    {{-- Click indicator --}}
                    <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Apri in Google Maps</span>
                    </div>
                </a>
            </div>

            {{-- Directions Link --}}
            <div class="mt-6 text-center">
                <a
                    href="{{ $directionsUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ottieni Indicazioni
                </a>
            </div>
        </div>
    </div>
</section>
