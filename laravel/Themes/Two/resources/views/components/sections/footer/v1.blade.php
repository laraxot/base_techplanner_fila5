@php
    $footerData = Config::get('local.techplanner.database.content.sections.footer');
    $locale = app()->getLocale();
    $blocks = $footerData['blocks'][$locale] ?? [];
@endphp

<footer class="bg-gradient-to-br from-[#0f2b46] via-[#1a3a5c] to-[#0d1f35] text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Brand Section --}}
            @foreach($blocks as $block)
                @if($block['type'] === 'footer' && isset($block['data']['brand']))
                    <div>
                        <span class="text-2xl font-bold block mb-2">{{ $block['data']['brand']['name'] ?? 'Marco Sottana' }}</span>
                        <span class="text-gray-300 block mb-4">{{ $block['data']['brand']['subtitle'] ?? 'Consulenza Sicurezza' }}</span>
                        <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                            {{ $block['data']['brand']['description'] ?? 'Esperto qualificato in radioprotezione e sicurezza radiologica.' }}
                        </p>
                        
                        {{-- Social Links --}}
                        @if(isset($block['data']['social']))
                            <div class="flex space-x-4">
                                @if(!empty($block['data']['social']['linkedin']))
                                    <a href="{{ $block['data']['social']['linkedin'] }}" class="p-2 bg-white/10 rounded-lg hover:bg-[#2D8659] transition-colors" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                        <x-filament::icon icon="techplanner-linkedin" class="w-5 h-5 text-current" />
                                    </a>
                                @endif
                                @if(!empty($block['data']['social']['facebook']))
                                    <a href="{{ $block['data']['social']['facebook'] }}" class="p-2 bg-white/10 rounded-lg hover:bg-[#2D8659] transition-colors" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                        <x-filament::icon icon="techplanner-facebook" class="w-5 h-5 text-current" />
                                    </a>
                                @endif
                                @if(!empty($block['data']['social']['instagram']))
                                    <a href="{{ $block['data']['social']['instagram'] }}" class="p-2 bg-white/10 rounded-lg hover:bg-[#2D8659] transition-colors" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069 3.205 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.204-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach

            {{-- Normative Section --}}
            @foreach($blocks as $block)
                @if($block['type'] === 'footer' && isset($block['data']['normative']))
                    <div>
                        <span class="text-lg font-semibold mb-4 block text-[#FFA500] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            {{ $block['data']['normative']['title'] ?? 'Normative & Certificazioni' }}
                        </span>
                        <ul class="space-y-3 text-sm text-gray-300">
                            @foreach($block['data']['normative']['items'] ?? [] as $item)
                                <li class="border-b border-white/10 pb-2 last:border-0">
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach

            {{-- Services Section --}}
            @foreach($blocks as $block)
                @if($block['type'] === 'footer' && isset($block['data']['services']))
                    <div>
                        <span class="text-lg font-semibold mb-4 block">{{ $block['data']['services']['title'] ?? 'Servizi' }}</span>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            @foreach($block['data']['services']['items'] ?? [] as $item)
                                <li><a class="hover:text-[#2D8659] transition-colors" href="#services">{{ $item }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach

            {{-- Contact Section --}}
            @foreach($blocks as $block)
                @if($block['type'] === 'footer' && isset($block['data']['contact']))
                    <div>
                        <span class="text-lg font-semibold mb-4 block">{{ $block['data']['contact']['title'] ?? 'Contatti' }}</span>
                        <ul class="space-y-3 text-sm">
                            @if(!empty($block['data']['contact']['address']))
                                <li class="flex items-start space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#2D8659] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-gray-300">{{ $block['data']['contact']['address'] }}<br>{{ $block['data']['contact']['city'] ?? '' }}</span>
                                </li>
                            @endif
                            @if(!empty($block['data']['contact']['email']))
                                <li class="flex items-start space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#2D8659] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <a href="mailto:{{ $block['data']['contact']['email'] }}" class="text-gray-300 hover:text-[#2D8659] transition-colors">{{ $block['data']['contact']['email'] }}</a>
                                </li>
                            @endif
                            @if(!empty($block['data']['contact']['phone']))
                                <li class="flex items-start space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#2D8659] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <a href="tel:{{ $block['data']['contact']['phone'] }}" class="text-gray-300 hover:text-[#2D8659] transition-colors">{{ $block['data']['contact']['phone'] }}</a>
                                </li>
                            @endif
                        </ul>
                        
                        {{-- P.IVA and REA --}}
                        @if(!empty($block['data']['contact']['piva']) || !empty($block['data']['contact']['rea']))
                            <div class="mt-4 pt-4 border-t border-white/10">
                                @if(!empty($block['data']['contact']['piva']))
                                    <p class="text-xs text-gray-400">P.IVA: {{ $block['data']['contact']['piva'] }}</p>
                                @endif
                                @if(!empty($block['data']['contact']['rea']))
                                    <p class="text-xs text-gray-400">REA: {{ $block['data']['contact']['rea'] }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>

        {{-- Bottom Footer with Legal Links --}}
        @foreach($blocks as $block)
            @if($block['type'] === 'footer' && isset($block['data']['legal']))
                <div class="mt-12 pt-8 border-t border-white/10">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <p class="text-gray-400 text-sm">{{ $block['data']['legal']['copyright'] ?? '© ' . date('Y') . ' Marco Sottana – Consulenza Sicurezza. Tutti i diritti riservati.' }}</p>
                        <div class="flex space-x-6 text-sm">
                            @foreach($block['data']['legal']['links'] ?? [] as $link)
                                <a class="text-gray-400 hover:text-[#2D8659] transition-colors" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</footer>