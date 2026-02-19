@props([
    'title' => 'Dove Siamo',
    'address' => '',
    'coordinates' => [],
])

@php
    // REGOLA CRITICA: Usare SOLO servizi gratuiti
    // Google Maps iframe embed è gratuito (NON API), permesso come fallback
    
    $displayAddress = $address ?: 'Via Vanzo 86/A, 31021 Mogliano Veneto TV';
    $encodedAddress = urlencode($displayAddress);
    
    // Path immagine PNG statica (preferita se disponibile)
    $imagePath = public_path('modules/techplanner/images/map-via-vanzo.png');
    $imageUrl = asset('modules/techplanner/images/map-via-vanzo.png');
    $hasLocalImage = file_exists($imagePath) && filesize($imagePath) > 1000;
    
    // Google Maps iframe embed (gratuito, senza API key) - fallback quando manca PNG
    $lat = $coordinates['lat'] ?? 45.5633;
    $lng = $coordinates['lng'] ?? 12.2506;
    $iframeSrc = "https://maps.google.com/maps?q={$lat},{$lng}&z=17&ie=UTF8&iwloc=&output=embed";
    
    // Link navigazione Google Maps
    if (!empty($coordinates['lat']) && !empty($coordinates['lng'])) {
        $mapsUrl = "https://www.google.com/maps?q={$lat},{$lng}";
    } else {
        $mapsUrl = "https://www.google.com/maps/search/?api=1&query={$encodedAddress}";
    }
    
    $altText = $displayAddress ? "Mappa ubicazione: {$displayAddress}" : 'Mappa ubicazione';
@endphp

{{-- Mappa Statica PNG o Google Maps iframe (gratuito) --}}
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <a
        href="{{ $mapsUrl }}"
        target="_blank"
        rel="noopener noreferrer"
        class="block relative group cursor-pointer"
        aria-label="Apri {{ $displayAddress }} su Google Maps per navigazione"
    >
        @if($hasLocalImage)
            {{-- Mappa Statica PNG --}}
            <img
                src="{{ $imageUrl }}"
                alt="{{ $altText }}"
                class="w-full h-auto transition-opacity duration-200 group-hover:opacity-90"
                loading="lazy"
            />
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-200 flex items-center justify-center">
                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-white/90 backdrop-blur-sm px-6 py-3 rounded-lg shadow-lg">
                    <div class="flex items-center space-x-2 text-gray-900 font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Clicca per aprire la navigazione</span>
                    </div>
                </div>
            </div>
        @else
            {{-- Fallback: Google Maps iframe embed (gratuito) --}}
            <div class="relative" style="height: 450px;">
                <iframe
                    src="{{ $iframeSrc }}"
                    width="100%"
                    height="450"
                    frameborder="0"
                    style="border:0; display:block;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Mappa: {{ $displayAddress }}"
                    aria-label="Google Maps - {{ $displayAddress }}"
                ></iframe>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-200 flex items-center justify-center pointer-events-none">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-white/90 backdrop-blur-sm px-6 py-3 rounded-lg shadow-lg pointer-events-none">
                        <div class="flex items-center space-x-2 text-gray-900 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Clicca per aprire la navigazione</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </a>
</div>

{{-- Pulsante apertura Google Maps navigazione --}}
<div class="mt-6 text-center">
    <a
        href="{{ $mapsUrl }}"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-md"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Ottieni Indicazioni su Google Maps
    </a>
</div>
