@php
    /**
     * Footer Component v1
     * 
     * Receives $blocks as DataCollection<BlockData> from Section component.
     * Each BlockData has: type, slug, data (array), view
     */
    
    // Extract footer data from DataCollection
    $footerBlock = null;
    
    // $blocks is a DataCollection<BlockData>
    foreach ($blocks as $block) {
        // BlockData properties: type, slug, data, view
        if ($block->type === 'footer' && $block->slug === 'main-footer') {
            $footerBlock = $block->data;
            break;
        }
    }
    
    // Fallback: if no block found, use empty array
    if (!is_array($footerBlock)) {
        $footerBlock = [];
    }
    
    // Extract sections with defaults
    $brand = $footerBlock['brand'] ?? [
        'name' => 'Marco Sottana',
        'subtitle' => 'Consulenza Sicurezza',
        'description' => 'Specialisti in radioprotezione e sicurezza.'
    ];
    
    $social = $footerBlock['social'] ?? [];
    
    $normative = $footerBlock['normative'] ?? [
        'title' => 'Normative & Certificazioni',
        'items' => []
    ];
    
    $services = $footerBlock['services'] ?? [
        'title' => 'Servizi',
        'items' => []
    ];
    
    // Extract contact data from items array structure
    $contactRaw = $footerBlock['contact'] ?? [];
    $contactItems = $contactRaw['items'] ?? [];
    
    // Convert items array to simple address/email/phone format
    $address = null;
    $email = null;
    $phone = null;
    
    foreach ($contactItems as $item) {
        if (isset($item['type']) && isset($item['value'])) {
            switch ($item['type']) {
                case 'address':
                    $address = $item['value'];
                    break;
                case 'email':
                    $email = $item['value'];
                    break;
                case 'phone':
                    $phone = $item['value'];
                    break;
            }
        }
    }
    
    $contact = [
        'title' => $contactRaw['title'] ?? 'Contatti',
        'address' => $address,
        'city' => $contactRaw['city'] ?? null,
        'email' => $email,
        'phone' => $phone,
        'piva' => $contactRaw['piva'] ?? null,
        'rea' => $contactRaw['rea'] ?? null,
        'items' => $contactItems  // Keep original items for rendering
    ];
    
    $legal = $footerBlock['legal'] ?? [
        'copyright' => '© 2026 Marco Sottana',
        'links' => []
    ];

    // Extract certifications
    $certifications = $footerBlock['certifications'] ?? [
        'title' => 'Certificazioni',
        'items' => []
    ];

    // Extract testimonials
    $testimonials = $footerBlock['testimonials'] ?? [
        'title' => 'Dicono di Noi',
        'items' => []
    ];

    // Extract quick actions
    $quickActions = $footerBlock['quick_actions'] ?? [
        'call' => ['phone' => '+39 XXX XXX XXXX', 'label' => 'Chiama Ora'],
        'whatsapp' => ['number' => '+39 XXX XXX XXXX', 'label' => 'WhatsApp'],
        'appointment' => ['url' => '/it/pages/contacts', 'label' => 'Prenota']
    ];
@endphp

<footer class="bg-gradient-to-br from-[#1e3a8a] via-[#2c5282] to-[#1a365d] text-white relative overflow-hidden">
    <div class="container mx-auto px-6 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            
            {{-- Column 1: Brand --}}
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-white">{{ $brand['name'] ?? 'Marco Sottana' }}</h2>
                <p class="text-sm text-blue-100 font-medium">{{ $brand['subtitle'] ?? 'Consulenza Sicurezza' }}</p>
                <p class="text-sm text-blue-50 leading-relaxed">{{ $brand['description'] ?? '' }}</p>
                
                {{-- Social Icons --}}
                @if(!empty($social))
                 <div class="flex gap-3 pt-2">
                     @if(!empty($social['linkedin']))
                     <a href="{{ $social['linkedin'] }}" target="_blank" rel="noopener" 
                        class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    @endif
                    @if(!empty($social['facebook']))
                     <a href="{{ $social['facebook'] }}" target="_blank" rel="noopener"
                        class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    @endif
                    @if(!empty($social['instagram']))
                     <a href="{{ $social['instagram'] }}" target="_blank" rel="noopener"
                        class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-pink-600 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    @endif
                </div>
                @endif
            </div>
            
            {{-- Column 2: Normative & Certificazioni --}}
            <div>
                <h3 class="text-lg font-bold mb-5 text-cyan-400 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    {{ $normative['title'] ?? 'Normative' }}
                </h3>
                <div class="space-y-4">
                    @foreach($normative['items'] ?? [] as $item)
                    <div class="group">
                        @if(is_array($item))
<h4 class="font-semibold text-sm text-white group-hover:text-cyan-300 transition-colors">{{ $item['label'] ?? '' }}</h4>
                            @if(!empty($item['description']))
                            <p class="text-xs text-blue-200 mt-1 leading-relaxed">{{ $item['description'] }}</p>
                            @endif
                        @else
                            <p class="text-sm text-blue-100 group-hover:text-white transition-colors">{{ $item }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            
            {{-- Column 3: Servizi --}}
            <div>
                <h3 class="text-lg font-bold mb-5 text-white">{{ $services['title'] ?? 'Servizi' }}</h3>
                <ul class="space-y-3">
                    @foreach($services['items'] ?? [] as $item)
                    <li class="flex items-center gap-2 group">
                        <span class="w-1.5 h-1.5 bg-cyan-400 rounded-full group-hover:scale-150 transition-transform"></span>
                        <span class="text-sm text-blue-100 group-hover:text-white transition-colors">{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            {{-- Column 4: Contatti --}}
            <div>
                <h3 class="text-lg font-bold mb-5 text-white">{{ $contact['title'] ?? 'Contatti' }}</h3>
                <ul class="space-y-4">
                    @foreach($contact['items'] ?? [] as $item)
                    <li class="flex items-start gap-3">
                        @php $itemType = is_array($item) ? ($item['type'] ?? '') : ''; @endphp
                        @switch($itemType)
                            @case('address')
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                @break
                            @case('email')
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                @break
                            @case('phone')
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                @break
                            @default
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                        @endswitch
                        <span class="text-sm text-blue-100">{{ is_array($item) ? ($item['value'] ?? '') : $item }}</span>
                    </li>
                    @endforeach
                </ul>
                
                {{-- P.IVA & REA --}}
                @if(!empty($contact['piva']) || !empty($contact['rea']))
                <div class="mt-6 pt-4 border-t border-blue-300/20 text-xs text-blue-200">
                    @if(!empty($contact['piva']))<p class="text-blue-100">P.IVA: {{ $contact['piva'] }}</p>@endif
                    @if(!empty($contact['rea']))<p class="text-blue-100">REA: {{ $contact['rea'] }}</p>@endif
                </div>
                @endif
                            </div>
                
                        </div>
                    </div>
                
                    {{-- Quick Actions Section --}}
                        <div class="border-t border-white/10 bg-gradient-to-r from-[#0d2a4a] to-[#122a48]">                        <div class="container mx-auto px-6 py-6">
                            <div class="flex flex-wrap justify-center items-center gap-4">
                                @if(!empty($quickActions['call']['phone']))
                                <a href="tel:{{ $quickActions['call']['phone'] }}" 
                                   class="flex items-center gap-2 px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>{{ $quickActions['call']['label'] ?? 'Chiama Ora' }}</span>
                                </a>
                                @endif
                                @if(!empty($quickActions['whatsapp']['number']))
                                <a href="https://wa.me/{{ str_replace([' ', '+'], '', $quickActions['whatsapp']['number']) }}" 
                                   target="_blank"
                                   class="flex items-center gap-2 px-5 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                    <span>{{ $quickActions['whatsapp']['label'] ?? 'WhatsApp' }}</span>
                                </a>
                                @endif
                                @if(!empty($quickActions['appointment']['url']))
                                <a href="{{ $quickActions['appointment']['url'] }}" 
                                   class="flex items-center gap-2 px-5 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $quickActions['appointment']['label'] ?? 'Prenota' }}</span>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                
                    {{-- Testimonials Section --}}
                        @if(!empty($testimonials['items']) && count($testimonials['items']) > 0)
                        <div class="border-t border-blue-300/20 bg-[0b2540]">                        <div class="container mx-auto px-6 py-8">
                            <h3 class="text-center text-xl font-bold mb-6 text-white">{{ $testimonials['title'] ?? 'Dicono di Noi' }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                                @foreach($testimonials['items'] as $testimonial)
                                                <div class="bg-[#0f3460]/80 backdrop-blur-md p-6 rounded-xl border border-white/15 hover:bg-[#0f3460] transition-all duration-300">                                    <svg class="w-8 h-8 text-orange-400 mb-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                    </svg>
                                    <p class="text-blue-200 mb-4 italic leading-relaxed">{{ $testimonial['text'] ?? '' }}</p>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-cyan-500 flex items-center justify-center text-white font-bold">
                                            {{ strtoupper(substr($testimonial['author'] ?? '?', 0, 1)) }}
                                        </div>
                                        <div>
<p class="text-white font-semibold text-sm">{{ $testimonial['author'] ?? '' }}</p>
                                             <p class="text-blue-300 text-xs">{{ $testimonial['role'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                
                    {{-- Certifications Section --}}
                        @if(!empty($certifications['items']) && count($certifications['items']) > 0)
                        <div class="border-t border-white/10 bg-[#0c2744]">                        <div class="container mx-auto px-6 py-6">
                            <h3 class="text-center text-lg font-bold mb-4 text-white">{{ $certifications['title'] ?? 'Certificazioni' }}</h3>
                            <div class="flex flex-wrap justify-center items-center gap-6">
                                @foreach($certifications['items'] as $cert)
                                                <div class="flex flex-col items-center gap-1 bg-[#0f3460]/60 px-4 py-3 rounded-lg border border-white/15">                                    <div class="flex items-center gap-2 text-orange-400">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="font-semibold text-sm text-white">{{ $cert['name'] ?? '' }}</span>
                                    </div>
                                    <p class="text-xs text-gray-400">{{ $cert['issuer'] ?? '' }}</p>
                                    @if(!empty($cert['validity']))
                                    <p class="text-xs text-gray-500">Valido fino a: {{ $cert['validity'] }}</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                
                    {{-- Newsletter Section --}}
    <div class="border-t border-blue-300/20 bg-[0b2540]">
        <div class="container mx-auto px-6 py-8">
            <div class="max-w-2xl mx-auto text-center">
                <h3 class="text-xl font-bold mb-4 text-white">Rimani aggiornato</h3>
                <p class="text-blue-200 mb-6">Ricevi novità su normative, sicurezza e consulenza tecnica</p>
                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto" x-data="{ submitted: false }" @submit.prevent="submitted = true; setTimeout(() => submitted = false, 3000)">
                    <input type="email" placeholder="La tua email" required
                           class="flex-1 px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                    <button type="submit" 
                            class="px-6 py-3 bg-cyan-600 text-white rounded-lg font-semibold hover:bg-cyan-700 transition-colors focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            :class="submitted ? 'bg-green-600 hover:bg-green-700' : ''">
                        <span x-show="!submitted" x-transition>Iscriviti</span>
                        <span x-show="submitted" x-transition>Iscritto!</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    {{-- Trust Seals Section --}}
    <div class="border-t border-white/10 bg-[#0a2342]">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-wrap justify-center items-center gap-8">
                <div class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors cursor-pointer group">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                    </svg>
                    <span class="text-sm font-medium group-hover:text-white">GDPR Compliant</span>
                </div>
                <div class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors cursor-pointer group">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-medium group-hover:text-white">ISO 9001</span>
                </div>
                <div class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors cursor-pointer group">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="text-sm font-medium group-hover:text-white">Assicurato</span>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Bottom Bar --}}
    <div class="border-t border-white/10 bg-[#081e38]">
        <div class="container mx-auto px-6 py-5">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-400">
                <p>{{ $legal['copyright'] ?? '© 2026' }}</p>
                @if(!empty($legal['links']))
                <div class="flex items-center gap-6">
                    @foreach($legal['links'] as $link)
                    <a href="{{ $link['url'] ?? '#' }}" class="hover:text-white transition-colors">{{ $link['label'] ?? '' }}</a>
                    @endforeach
                </div>
                @endif
                
                {{-- Back to Top Button --}}
                <button @click="window.scrollTo({top: 0, behavior: 'smooth'})" 
                        class="p-2 rounded-full bg-white/10 hover:bg-white/20 transition-colors group"
                        aria-label="Back to top">
                    <svg class="w-4 h-4 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</footer>