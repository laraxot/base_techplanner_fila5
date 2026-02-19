@props([
    'title' => 'Dove Siamo',
    'address' => '',
    'coordinates' => [],
])

@php
    $displayAddress = $address ?: 'Via Vanzo 86, 31021 Mogliano Veneto TV';
    $lat = $coordinates['lat'] ?? 45.5633;
    $lng = $coordinates['lng'] ?? 12.2506;
    $offset = 0.010;

    // OpenStreetMap embed (gratuito, nessuna API key, funziona sempre)
    $bboxMin = ($lng - $offset) . '%2C' . ($lat - $offset);
    $bboxMax = ($lng + $offset) . '%2C' . ($lat + $offset);
    $osmSrc = "https://www.openstreetmap.org/export/embed.html?bbox={$bboxMin}%2C{$bboxMax}&layer=mapnik&marker={$lat}%2C{$lng}";

    // Link Google Maps per navigazione (gratuito - non è una chiamata API)
    $encodedAddress = urlencode($displayAddress);
    $mapsUrl = "https://www.google.com/maps/search/?api=1&query={$encodedAddress}";
@endphp

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $title }}</h2>
            @if(!empty($address))
                <p class="text-lg text-gray-600">{{ $address }}</p>
            @endif
        </div>

        <div class="max-w-4xl mx-auto">
            {{-- Mappa OpenStreetMap - gratuita, precisa, sempre disponibile --}}
            <div class="rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <iframe
                    src="{{ $osmSrc }}"
                    width="100%"
                    height="450"
                    frameborder="0"
                    style="border:0; display:block;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Mappa: {{ $displayAddress }}"
                    aria-label="Mappa ubicazione - {{ $displayAddress }}"
                ></iframe>
            </div>

            {{-- Call to action: apri Google Maps per navigazione --}}
            <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a
                    href="{{ $mapsUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow-md"
                    style="color:#fff;"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Apri su Google Maps
                </a>
                <span class="text-sm text-gray-500">{{ $displayAddress }}</span>
            </div>
        </div>
    </div>
</section>
