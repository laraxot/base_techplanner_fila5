@props([
    'title' => 'Dove Siamo',
    'address' => '',
    'coordinates' => [],
])

@php
    $lat = $coordinates['lat'] ?? null;
    $lng = $coordinates['lng'] ?? null;
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

        {{-- Map Embed --}}
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                @if(!empty($address))
                    <iframe
                        width="100%"
                        height="450"
                        frameborder="0"
                        style="border:0"
                        src="https://www.google.com/maps?q={{ urlencode($address) }}&output=embed"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full"
                    ></iframe>
                @elseif(!empty($lat) && !empty($lng))
                    <iframe
                        width="100%"
                        height="450"
                        frameborder="0"
                        style="border:0"
                        src="https://www.google.com/maps?q={{ $lat }},{{ $lng }}&output=embed"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full"
                    ></iframe>
                @else
                    <div class="h-96 flex items-center justify-center bg-gray-200">
                        <div class="text-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                            <p>Mappa non disponibile</p>
                            <p class="text-sm mt-2">Indirizzo o coordinate non specificati</p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Directions Link --}}
            @if(!empty($address))
                <div class="mt-6 text-center">
                    <a
                        href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($address) }}"
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
            @endif
        </div>
    </div>
</section>
