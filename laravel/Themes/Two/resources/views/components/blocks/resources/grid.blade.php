@props([
    'title' => '',
    'subtitle' => '',
    'resources' => [],
])

<section class="py-20">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-br from-[#1E5A96] to-[#164575] rounded-2xl p-8 md:p-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $title }}</h2>
                <p class="text-lg text-white/80 max-w-3xl mx-auto">{{ $subtitle }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach ($resources as $resource)
                <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-8 text-center hover:bg-white/15 transition-all duration-300">
                    {{-- Icon --}}
                    <div class="w-14 h-14 bg-[#E67E22]/20 rounded-xl flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-[#E67E22]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                    </div>

                    <h4 class="text-lg font-bold text-white mb-2">{{ $resource['title'] ?? '' }}</h4>
                    <p class="text-white/70 text-sm leading-relaxed mb-6">{{ $resource['description'] ?? '' }}</p>

                    <a href="{{ $resource['download_url'] ?? '#' }}"
                       class="inline-flex items-center justify-center w-full bg-[#E67E22] hover:bg-[#d35400] text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                        Scarica Guida PDF
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>