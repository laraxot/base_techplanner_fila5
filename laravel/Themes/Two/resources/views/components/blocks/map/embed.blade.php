@props([
    'title' => 'Dove Siamo',
    'address' => '',
    'coordinates' => [],
])

@php
    $lat = $coordinates['lat'] ?? 45.5648;
    $lng = $coordinates['lng'] ?? 12.2347;

    // OpenStreetMap bbox: ~1km intorno al punto
    $offset = 0.015;
    $bboxMin = ($lng - $offset) . '%2C' . ($lat - $offset);
    $bboxMax = ($lng + $offset) . '%2C' . ($lat + $offset);
    $osmUrl = "https://www.openstreetmap.org/export/embed.html?bbox={$bboxMin}%2C{$bboxMax}&layer=mapnik&marker={$lat}%2C{$lng}";
    $directionsUrl = $address
        ? "https://www.openstreetmap.org/directions?engine=graphhopper_foot&route=%3F%3F%3F%3D" . urlencode($address)
        : "https://www.openstreetmap.org/directions?engine=graphhopper_foot&route=%3F%3F%3F%3D{$lat}%2C{$lng}";
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

        {{-- Map Embed (OpenStreetMap — nessuna API key richiesta) --}}
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <iframe
                    width="100%"
                    height="450"
                    frameborder="0"
                    style="border:0"
                    src="{{ $osmUrl }}"
                    allowfullscreen
                    loading="lazy"
                    title="{{ $title }}"
                    class="w-full"
                ></iframe>
            </div>

            {{-- Directions Link (OpenStreetMap) --}}
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
