@php
    $footerBlock = Arr::first($blocks, fn($item) => $item->slug == 'footer');
    $data = $footerBlock->data ?? [];
    $brand = $data['brand'] ?? [];
    $social = $data['social'] ?? [];
    $normative = $data['normative'] ?? [];
    $services = $data['services'] ?? [];
    $contact = $data['contact'] ?? [];
    $legal = $data['legal'] ?? [];
@endphp

<footer class="bg-gradient-to-br from-brand-blue via-brand-blue/90 to-black text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Branding & About --}}
            <div>
                <span class="text-2xl font-bold block mb-2">{{ $brand['name'] ?? 'Marco Sottana' }}</span>
                <span class="text-gray-300 block mb-4">{{ $brand['subtitle'] ?? 'Consulenza Sicurezza' }}</span>
                <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                    {{ $brand['description'] ?? 'Esperto qualificato in radioprotezione e sicurezza radiologica per studi dentistici e veterinari.' }}
                </p>
                <div class="flex space-x-4">
                    @if($social['linkedin'] ?? null)
                        <a href="{{ $social['linkedin'] ?? '#' }}" class="p-2 bg-white/10 rounded-lg hover:bg-brand-green transition-colors" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <x-filament::icon icon="techplanner-linkedin" class="w-5 h-5 text-current" />
                        </a>
                    @endif
                    @if($social['facebook'] ?? null)
                        <a href="{{ $social['facebook'] ?? '#' }}" class="p-2 bg-white/10 rounded-lg hover:bg-brand-green transition-colors" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <x-filament::icon icon="techplanner-facebook" class="w-5 h-5 text-current" />
                        </a>
                    @endif
                    @if($social['instagram'] ?? null)
                        <a href="{{ $social['instagram'] ?? '#' }}" class="p-2 bg-white/10 rounded-lg hover:bg-brand-green transition-colors" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <x-heroicon-o-camera class="w-5 h-5 text-current" />
                        </a>
                    @endif
                </div>
            </div>

            {{-- Normative --}}
            <div>
                <span class="text-lg font-semibold mb-4 block text-brand-orange flex items-center">
                    <x-heroicon-o-shield-check class="w-5 h-5 mr-2" />
                    {{ $normative['title'] ?? 'Normative & Certificazioni' }}
                </span>
                <ul class="space-y-3 text-sm text-gray-300">
                    @foreach($normative['items'] ?? [] as $item)
                        <li class="border-b border-white/10 pb-2 last:border-0">
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Services Links --}}
            <div>
                <span class="text-lg font-semibold mb-4 block">{{ $services['title'] ?? 'Servizi' }}</span>
                <ul class="space-y-2 text-gray-300 text-sm">
                    @foreach($services['items'] ?? [] as $item)
                        <li><a class="hover:text-brand-green transition-colors" href="/it/servizi">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <span class="text-lg font-semibold mb-4 block">{{ $contact['title'] ?? 'Contatti' }}</span>
                <ul class="space-y-3 text-sm">
                    @if($contact['address'] ?? null)
                        <li class="flex items-start space-x-3">
                            <x-heroicon-o-map-pin class="w-5 h-5 text-brand-green flex-shrink-0 mt-1" />
                            <span class="text-gray-300">{{ $contact['address'] }}<br>{{ $contact['city'] ?? '' }}</span>
                        </li>
                    @endif
                    @if($contact['email'] ?? null)
                        <li class="flex items-start space-x-3">
                            <x-heroicon-o-envelope class="w-5 h-5 text-[#2D8659] flex-shrink-0 mt-1" />
                            <a href="mailto:{{ $contact['email'] }}" class="text-gray-300 hover:text-[#2D8659] transition-colors">{{ $contact['email'] }}</a>
                        </li>
                    @endif
                    @if($contact['phone'] ?? null)
                        <li class="flex items-start space-x-3">
                            <x-heroicon-o-phone class="w-5 h-5 text-[#2D8659] flex-shrink-0 mt-1" />
                            <a href="tel:{{ $contact['phone'] }}" class="text-gray-300 hover:text-[#2D8659] transition-colors">{{ $contact['phone'] }}</a>
                        </li>
                    @endif
                </ul>
                @php
                    $hasPiva = isset($contact['piva']) && $contact['piva'];
                    $hasRea = isset($contact['rea']) && $contact['rea'];
                @endphp
                @if($hasPiva || $hasRea)
                    <div class="mt-4 pt-4 border-t border-white/10">
                        @if($hasPiva)
                            <p class="text-xs text-gray-400">P.IVA: {{ $contact['piva'] }}</p>
                        @endif
                        @if($hasRea)
                            <p class="text-xs text-gray-400">REA: {{ $contact['rea'] }}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="mt-12 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-400 text-sm">{{ $legal['copyright'] ?? '© ' . date('Y') . ' Marco Sottana – Consulenza Sicurezza. Tutti i diritti riservati.' }}</p>
                <div class="flex space-x-6 text-sm">
                    @foreach($legal['links'] ?? [] as $link)
                        <a class="text-gray-400 hover:text-[#2D8659] transition-colors" href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>