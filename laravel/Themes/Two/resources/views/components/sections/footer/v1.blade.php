@php
    use Illuminate\Support\Str;
    
    // Enhanced Footer Data Processing - Trust Hub Architecture
    $locale = app()->getLocale();
    
    // Primary data source with fallback chain
    $footerData = null;
    
    // 1. Try passed blocks first
    if (isset($blocks) && !empty($blocks)) {
        $footerData = $blocks;
    }
    
    // 2. Fallback to config if no blocks passed
    if (!$footerData) {
        $configData = \Illuminate\Support\Facades\Config::get('local.techplanner.database.content.sections.footer');
        $footerData = $configData['blocks'][$locale] ?? [];
    }
    
    // Convert DataCollection to array if needed
    if ($footerData instanceof \Spatie\LaravelData\DataCollection) {
        $footerData = $footerData->toArray();
    } elseif (!is_array($footerData)) {
        $footerData = [];
    }
    
    // Extract main footer block with enhanced error handling
    $footerBlock = null;
    foreach ($footerData as $block) {
        $blockType = is_array($block) ? ($block['type'] ?? '') : ($block->type ?? '');
        $blockSlug = is_array($block) ? ($block['slug'] ?? '') : ($block->slug ?? '');
        
        if ($blockType === 'footer' && $blockSlug === 'main-footer') {
            $footerBlock = is_array($block) ? ($block['data'] ?? []) : ($block->data ?? []);
            break;
        }
    }
    
    // Final fallback with comprehensive defaults
    $footerBlock = $footerBlock ?? [];
    
    // Enhanced data extraction with null safety
    $brand = array_merge([
        'name' => 'Marco Sottana',
        'subtitle' => 'Consulenza Sicurezza', 
        'description' => 'Esperto qualificato in radioprotezione e sicurezza radiologica per studi dentistici e veterinari. Conformità normativa D.Lgs 101/2020.'
    ], $footerBlock['brand'] ?? []);
    
    $social = array_merge([
        'linkedin' => null,
        'facebook' => null, 
        'instagram' => null
    ], $footerBlock['social'] ?? []);
    
    $normative = array_merge([
        'title' => 'Normative & Certificazioni',
        'items' => []
    ], $footerBlock['normative'] ?? []);
    
    $services = array_merge([
        'title' => 'Servizi',
        'items' => []
    ], $footerBlock['services'] ?? []);
    
    $contact = array_merge([
        'title' => 'Contatti',
        'address' => null,
        'city' => null,
        'email' => null,
        'phone' => null,
        'piva' => null,
        'rea' => null
    ], $footerBlock['contact'] ?? []);
    
    $newsletter = array_merge([
        'title' => 'Rimani Aggiornato',
        'description' => 'Ricevi consigli esclusivi su sicurezza e radioprotezione',
        'placeholder' => 'La tua email',
        'button' => 'Iscriviti',
        'privacy_note' => 'Acconsento al trattamento dei dati secondo la privacy policy'
    ], $footerBlock['newsletter'] ?? []);
    
    $certifications = array_merge([
        'title' => 'Certificazioni & Badge',
        'items' => []
    ], $footerBlock['certifications'] ?? []);
    
    $testimonials = array_merge([
        'title' => 'Dicono di Noi',
        'items' => []
    ], $footerBlock['testimonials'] ?? []);
    
    $quickActions = array_merge([
        'title' => 'Contatti Rapidi',
        'call_us' => ['phone' => null, 'label' => 'Chiama Ora', 'description' => 'Lun-Ven 9:00-18:00'],
        'whatsapp' => ['number' => null, 'label' => 'WhatsApp', 'description' => 'Risposta immediata'],
        'appointment' => ['url' => null, 'label' => 'Prenota Consultazione', 'description' => 'Valutazione gratuita']
    ], $footerBlock['quick_actions'] ?? []);
    
    $trustSeals = array_merge([
        'title' => 'Garanzie e Sicurezza',
        'seals' => []
    ], $footerBlock['trust_seals'] ?? []);
    
    $legal = array_merge([
        'copyright' => '© 2026 Marco Sottana – Consulenza Sicurezza. Tutti i diritti riservati.',
        'links' => []
    ], $footerBlock['legal'] ?? []);
    
    // Generate unique IDs for Alpine.js components
    $newsletterId = 'newsletter-' . Str::random(8);
    $backToTopId = 'backtotop-' . Str::random(8);
@endphp

{{-- TOP BAR: Newsletter + Trust Seals --}}
@if(!empty($newsletter) || !empty($trustSeals['seals']))
<div class="bg-gradient-to-r from-[#2D8659] to-[#1e6b47] text-white py-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
            
            {{-- Newsletter Section --}}
            @if(!empty($newsletter))
            <div class="flex-1 max-w-2xl">
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <div class="text-center sm:text-left">
                        <h4 class="font-bold text-sm">{{ $newsletter['title'] }}</h4>
                        <p class="text-xs text-green-100">{{ $newsletter['description'] }}</p>
                    </div>
                    <form class="flex gap-2 w-full sm:w-auto" 
                          x-data="{ submitted: false }" 
                          @submit.prevent="
                              submitted = true; 
                              setTimeout(() => submitted = false, 3000);
                              $event.target.submit();
                          ">
                        <input 
                            type="email" 
                            placeholder="{{ $newsletter['placeholder'] }}" 
                            class="flex-1 px-3 py-2 rounded-lg text-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white/50"
                            required
                        >
                        <button 
                            type="submit" 
                            class="px-4 py-2 bg-white text-[#2D8659] rounded-lg font-semibold text-sm hover:bg-green-50 transition-colors"
                            :disabled="submitted"
                        >
                            <span x-show="!submitted">{{ $newsletter['button'] }}</span>
                            <span x-show="submitted" class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                OK!
                            </span>
                        </button>
                    </form>
                </div>
                @if(!empty($newsletter['privacy_note']))
                <p class="text-xs text-green-100 mt-2 text-center sm:text-left">{{ $newsletter['privacy_note'] }}</p>
                @endif
            </div>
            @endif
            
            {{-- Trust Seals --}}
            @if(!empty($trustSeals['seals']))
            <div class="flex items-center gap-4">
                @foreach($trustSeals['seals'] as $seal)
                <div class="flex items-center gap-2 text-xs group cursor-pointer">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        @switch($seal['icon'])
                            @case('shield-check')
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                @break
                            @case('certificate')
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 100 4h2a2 2 0 100 4h2a1 1 0 100 2 2 2 0 01-2 2H6a2 2 0 01-2-2V5z" clip-rule="evenodd"/>
                                </svg>
                                @break
                            @case('umbrella')
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1z" clip-rule="evenodd"/>
                                </svg>
                                @break
                        @endswitch
                    </div>
                    <div>
                        <div class="font-semibold">{{ $seal['name'] }}</div>
                        <div class="text-xs text-green-100">{{ $seal['description'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endif

<footer class="bg-gradient-to-br from-[#0f2b46] via-[#1a3a5c] to-[#0d1f35] text-white relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="container mx-auto px-4 py-12 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
            
            {{-- Brand Column --}}
            <div class="lg:col-span-2">
                <span class="text-3xl font-bold block mb-2 bg-gradient-to-r from-white to-[#2D8659] bg-clip-text text-transparent">{{ $brand['name'] }}</span>
                <span class="text-[#2D8659] font-semibold block mb-4 text-lg">{{ $brand['subtitle'] }}</span>
                <p class="text-gray-300 mb-6 text-sm leading-relaxed">{{ $brand['description'] }}</p>
                
                {{-- Social Links --}}
                @if(!empty($social))
                <div class="flex space-x-3 mb-6">
                    @if(!empty($social['linkedin']))
                        <a href="{{ $social['linkedin'] }}" target="_blank" class="p-3 bg-white/10 rounded-xl hover:bg-[#2D8659] transition-all duration-300 hover:scale-110 group">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.14-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/>
                            </svg>
                        </a>
                    @endif
                    @if(!empty($social['facebook']))
                        <a href="{{ $social['facebook'] }}" target="_blank" class="p-3 bg-white/10 rounded-xl hover:bg-[#2D8659] transition-all duration-300 hover:scale-110 group">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    @endif
                    @if(!empty($social['instagram']))
                        <a href="{{ $social['instagram'] }}" target="_blank" class="p-3 bg-white/10 rounded-xl hover:bg-[#2D8659] transition-all duration-300 hover:scale-110 group">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/>
                            </svg>
                        </a>
                    @endif
                </div>
                @endif
                
                {{-- Quick Actions --}}
                @if(!empty($quickActions))
                <div class="border-t border-white/10 pt-4">
                    <h4 class="font-bold text-sm mb-3">{{ $quickActions['title'] }}</h4>
                    <div class="space-y-2">
                        @if(!empty($quickActions['call_us']['phone']))
                        <a href="tel:{{ $quickActions['call_us']['phone'] }}" class="flex items-center gap-3 p-3 bg-white/5 rounded-lg hover:bg-white/10 transition-colors group">
                            <div class="w-8 h-8 bg-[#2D8659] rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-sm">{{ $quickActions['call_us']['label'] }}</div>
                                <div class="text-xs text-gray-400">{{ $quickActions['call_us']['description'] }}</div>
                            </div>
                        </a>
                        @endif
                        
                        @if(!empty($quickActions['whatsapp']['number']))
                        <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', $quickActions['whatsapp']['number']) }}" target="_blank" class="flex items-center gap-3 p-3 bg-white/5 rounded-lg hover:bg-white/10 transition-colors group">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.149-.67.149-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-sm">{{ $quickActions['whatsapp']['label'] }}</div>
                                <div class="text-xs text-gray-400">{{ $quickActions['whatsapp']['description'] }}</div>
                            </div>
                        </a>
                        @endif
                        
                        @if(!empty($quickActions['appointment']['url']))
                        <a href="{{ $quickActions['appointment']['url'] }}" class="flex items-center gap-3 p-3 bg-white/5 rounded-lg hover:bg-white/10 transition-colors group">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-sm">{{ $quickActions['appointment']['label'] }}</div>
                                <div class="text-xs text-gray-400">{{ $quickActions['appointment']['description'] }}</div>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            
            {{-- Normative Column --}}
            <div>
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#2D8659]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    {{ $normative['title'] }}
                </h3>
                <div class="space-y-4">
                    @foreach($normative['items'] ?? [] as $item)
                        <div>
                            <h4 class="font-bold text-sm text-white">{{ $item['label'] ?? '' }}</h4>
                            <p class="text-gray-400 text-xs">{{ $item['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                </ul>
            </div>
            
            {{-- Services Column --}}
            <div>
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#2D8659]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ $services['title'] }}
                </h3>
                <ul class="space-y-2">
                    @foreach($services['items'] ?? [] as $item)
                        <li>
                            <a href="#services" class="text-gray-300 text-sm hover:text-[#2D8659] transition-colors flex items-center group">
                                <span class="w-1.5 h-1.5 bg-[#2D8659] rounded-full mr-2 group-hover:scale-150 transition-transform"></span>
                                {{ $item }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            {{-- Contact Column --}}
            <div>
                <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#2D8659]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    {{ $contact['title'] }}
                </h3>
                <ul class="space-y-3 text-gray-300 text-sm">
                    @if(!empty($contact['address']))
                        <li class="flex items-start group">
                            <svg class="w-5 h-5 text-[#2D8659] mr-3 mt-0.5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span class="group-hover:text-white transition-colors">{{ $contact['address'] }}<br>{{ $contact['city'] }}</span>
                        </li>
                    @endif
                    @if(!empty($contact['phone']))
                        <li class="flex items-center group">
                            <svg class="w-5 h-5 text-[#2D8659] mr-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="tel:{{ $contact['phone'] }}" class="hover:text-white transition-colors">{{ $contact['phone'] }}</a>
                        </li>
                    @endif
                    @if(!empty($contact['email']))
                        <li class="flex items-center group">
                            <svg class="w-5 h-5 text-[#2D8659] mr-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:{{ $contact['email'] }}" class="hover:text-white transition-colors">{{ $contact['email'] }}</a>
                        </li>
                    @endif
                </ul>
                @if(!empty($contact['piva']) || !empty($contact['rea']))
                    <div class="mt-4 pt-4 border-t border-white/10 text-xs text-gray-400">
                        @if(!empty($contact['piva']))
                            <p>P.IVA: {{ $contact['piva'] }}</p>
                        @endif
                        @if(!empty($contact['rea']))
                            <p>REA: {{ $contact['rea'] }}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        
        {{-- CERTIFICATIONS ROW --}}
        @if(!empty($certifications['items']))
        <div class="border-t border-white/10 pt-8 mb-8">
            <h3 class="text-lg font-bold mb-6 text-center">{{ $certifications['title'] }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($certifications['items'] as $cert)
                <div class="bg-white/5 rounded-lg p-4 text-center hover:bg-white/10 transition-colors group">
                    <div class="w-16 h-16 bg-[#2D8659] rounded-full mx-auto mb-3 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-sm mb-1">{{ $cert['name'] }}</h4>
                    <p class="text-xs text-gray-400 mb-1">{{ $cert['issuer'] }}</p>
                    <p class="text-xs text-[#2D8659]">Valid until: {{ $cert['valid_until'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        {{-- TESTIMONIALS ROW --}}
        @if(!empty($testimonials['items']))
        <div class="border-t border-white/10 pt-8 mb-8">
            <h3 class="text-lg font-bold mb-6 text-center">{{ $testimonials['title'] }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($testimonials['items'] as $testimonial)
                <div class="bg-gradient-to-r from-white/5 to-white/10 rounded-lg p-4 relative">
                    <svg class="w-8 h-8 text-[#2D8659]/20 absolute top-2 right-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                    <p class="text-sm text-gray-300 mb-3 italic">{{ $testimonial['text'] }}</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#2D8659] rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">{{ substr($testimonial['author'], 0, 1) }}</span>
                        </div>
                        <div>
                            <div class="font-semibold text-sm">{{ $testimonial['author'] }}</div>
                            <div class="text-xs text-gray-400">{{ $testimonial['role'] }}</div>
                            <div class="text-xs text-[#2D8659]">{{ $testimonial['location'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        {{-- Bottom Bar --}}
        <div class="border-t border-white/10 pt-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                <p class="text-gray-400 text-sm">{{ $legal['copyright'] }}</p>
                <div class="flex items-center gap-6">
                    @foreach($legal['links'] ?? [] as $link)
                        <a href="{{ $link['url'] }}" class="text-gray-400 text-sm hover:text-[#2D8659] transition-colors">{{ $link['label'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    {{-- Back to Top Button --}}
    <button 
        x-data="{ visible: false }" 
        x-show="visible" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        x-on:scroll.window="visible = (window.pageYOffset > 300)"
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-6 right-6 w-12 h-12 bg-[#2D8659] text-white rounded-full shadow-lg hover:bg-[#236b47] transition-all duration-300 hover:scale-110 z-50 flex items-center justify-center group"
    >
        <svg class="w-5 h-5 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>
</footer>