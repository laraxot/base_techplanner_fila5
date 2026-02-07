@php
    // Usa i blocks passati dal layout (può essere array o DataCollection)
    if (!isset($blocks) || empty($blocks)) {
        $footerData = \Illuminate\Support\Facades\Config::get('local.techplanner.database.content.sections.footer');
        $locale = app()->getLocale();
        $blocks = $footerData['blocks'][$locale] ?? [];
    }
    
    // Converti DataCollection in array se necessario
    if ($blocks instanceof \Spatie\LaravelData\DataCollection) {
        $blocks = $blocks->toArray();
    } elseif (!is_array($blocks)) {
        $blocks = [];
    }
    
    // Estrai i dati dal primo blocco footer
    $footerBlock = null;
    foreach ($blocks as $block) {
        // Gestisci sia array che oggetti
        $blockType = is_array($block) ? ($block['type'] ?? '') : ($block->type ?? '');
        $blockSlug = is_array($block) ? ($block['slug'] ?? '') : ($block->slug ?? '');
        
        if ($blockType === 'footer' && $blockSlug === 'main-footer') {
            $footerBlock = is_array($block) ? ($block['data'] ?? []) : ($block->data ?? []);
            break;
        }
    }
    
    // Se non trovato nei blocks, prova a leggere direttamente da config
    if (empty($footerBlock)) {
        $footerData = \Illuminate\Support\Facades\Config::get('local.techplanner.database.content.sections.footer');
        $locale = app()->getLocale();
        $blocksFromConfig = $footerData['blocks'][$locale] ?? [];
        foreach ($blocksFromConfig as $block) {
            if (($block['type'] ?? '') === 'footer' && ($block['slug'] ?? '') === 'main-footer') {
                $footerBlock = $block['data'] ?? [];
                break;
            }
        }
    }
    
    // Fallback defaults
    $brand = $footerBlock['brand'] ?? ['name' => 'Marco Sottana', 'subtitle' => 'Consulenza Sicurezza', 'description' => 'Esperto qualificato in radioprotezione.'];
    $social = $footerBlock['social'] ?? [];
    $normative = $footerBlock['normative'] ?? ['title' => 'Normative', 'items' => []];
    $services = $footerBlock['services'] ?? ['title' => 'Servizi', 'items' => []];
    $contact = $footerBlock['contact'] ?? ['title' => 'Contatti'];
    $legal = $footerBlock['legal'] ?? ['copyright' => '© 2026 Marco Sottana', 'links' => []];
@endphp

<footer class="bg-gradient-to-br from-[#0f2b46] via-[#1a3a5c] to-[#0d1f35] text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            
            {{-- Brand Column --}}
            <div>
                <span class="text-2xl font-bold block mb-2">{{ $brand['name'] }}</span>
                <span class="text-[#2D8659] font-semibold block mb-4">{{ $brand['subtitle'] }}</span>
                <p class="text-gray-300 mb-6 text-sm leading-relaxed">{{ $brand['description'] }}</p>
                
                @if(!empty($social))
                <div class="flex space-x-3">
                    @if(!empty($social['linkedin']))
                        <a href="{{ $social['linkedin'] }}" target="_blank" class="p-2 bg-white/10 rounded-lg hover:bg-[#2D8659] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.14-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/></svg>
                        </a>
                    @endif
                    @if(!empty($social['facebook']))
                        <a href="{{ $social['facebook'] }}" target="_blank" class="p-2 bg-white/10 rounded-lg hover:bg-[#2D8659] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if(!empty($social['instagram']))
                        <a href="{{ $social['instagram'] }}" target="_blank" class="p-2 bg-white/10 rounded-lg hover:bg-[#2D8659] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
                        </a>
                    @endif
                </div>
                @endif
            </div>
            
            {{-- Normative Column --}}
            <div>
                <h3 class="text-lg font-bold mb-4">{{ $normative['title'] }}</h3>
                <ul class="space-y-2">
                    @foreach($normative['items'] ?? [] as $item)
                        <li class="text-gray-300 text-sm flex items-start">
                            <svg class="w-4 h-4 text-[#2D8659] mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
            
            {{-- Services Column --}}
            <div>
                <h3 class="text-lg font-bold mb-4">{{ $services['title'] }}</h3>
                <ul class="space-y-2">
                    @foreach($services['items'] ?? [] as $item)
                        <li>
                            <a href="#" class="text-gray-300 text-sm hover:text-[#2D8659] transition-colors flex items-center">
                                <span class="w-1.5 h-1.5 bg-[#2D8659] rounded-full mr-2"></span>
                                {{ $item }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            {{-- Contact Column --}}
            <div>
                <h3 class="text-lg font-bold mb-4">{{ $contact['title'] }}</h3>
                <ul class="space-y-3 text-gray-300 text-sm">
                    @if(!empty($contact['address']))
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#2D8659] mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span>{{ $contact['address'] }}<br>{{ $contact['city'] }}</span>
                        </li>
                    @endif
                    @if(!empty($contact['phone']))
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-[#2D8659] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="tel:{{ $contact['phone'] }}" class="hover:text-white">{{ $contact['phone'] }}</a>
                        </li>
                    @endif
                    @if(!empty($contact['email']))
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-[#2D8659] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:{{ $contact['email'] }}" class="hover:text-white">{{ $contact['email'] }}</a>
                        </li>
                    @endif
                </ul>
                @if(!empty($contact['piva']))
                    <div class="mt-4 pt-4 border-t border-white/10 text-xs text-gray-400">
                        <p>P.IVA: {{ $contact['piva'] }}</p>
                        <p>REA: {{ $contact['rea'] }}</p>
                    </div>
                @endif
            </div>
        </div>
        
        {{-- Bottom Bar --}}
        <div class="border-t border-white/10 pt-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">{{ $legal['copyright'] }}</p>
                <div class="flex items-center gap-6">
                    @foreach($legal['links'] ?? [] as $link)
                        <a href="{{ $link['url'] }}" class="text-gray-400 text-sm hover:text-[#2D8659] transition-colors">{{ $link['label'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>