@php
    $navBlock = Arr::first($blocks, fn($item) => $item->slug == 'nav-main');
    $brand = $navBlock->data['brand'] ?? 'Marco Sottana';
    $subtitle = $navBlock->data['subtitle'] ?? 'Consulenza Sicurezza';
@endphp

<footer class="bg-gradient-to-br from-[#1E5A96] via-[#164575] to-[#0d2d4d] text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Branding & About --}}
            <div>
                <span class="text-2xl font-bold block mb-2">{{ $brand }}</span>
                <span class="text-gray-300 block mb-4">{{ $subtitle }}</span>
                <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                    Specialisti in radioprotezione e sicurezza per studi dentistici e cliniche veterinarie. Partner di fiducia per la conformità normativa.
                </p>
                <div class="flex space-x-4">
                    {{-- Social Links - Using Heroicons or placeholder SVG --}}
                    <a href="#" class="p-2 bg-white/10 rounded-lg hover:bg-[#2D8659] transition-colors">
                        <x-heroicon-o-users class="w-5 h-5" />
                    </a>
                </div>
            </div>

            {{-- Normative --}}
            <div>
                <span class="text-lg font-semibold mb-4 block text-[#E67E22] flex items-center">
                    <x-heroicon-o-shield-check class="w-5 h-5 mr-2" />
                    Normative & Certificazioni
                </span>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="border-b border-white/10 pb-2">
                        <strong class="block text-white mb-1">D.Lgs 101/2020</strong>
                        Attuazione della direttiva 2013/59/Euratom per la sicurezza radiologica.
                    </li>
                    <li class="border-b border-white/10 pb-2">
                        <strong class="block text-white mb-1">Esperti Qualificati</strong>
                        Professionisti iscritti negli elenchi nominativi autorizzati.
                    </li>
                    <li>
                        <strong class="block text-white mb-1">IEC 62353</strong>
                        Verifiche periodiche di sicurezza elettrica per apparecchi elettromedicali.
                    </li>
                </ul>
            </div>

            {{-- Services Links --}}
            <div>
                <span class="text-lg font-semibold mb-4 block">Servizi</span>
                <ul class="space-y-2 text-gray-300 text-sm">
                    <li><a class="hover:text-[#2D8659]" href="/it/servizi">Controllo Radioprotezione</a></li>
                    <li><a class="hover:text-[#2D8659]" href="/it/servizi">Verifiche Elettromedicali</a></li>
                    <li><a class="hover:text-[#2D8659]" href="/it/servizi">Biosicurezza Veterinaria</a></li>
                    <li><a class="hover:text-[#2D8659]" href="/it/servizi">Formazione Personale</a></li>
                    <li><a class="hover:text-[#2D8659]" href="/it/servizi">Gestione Documentale</a></li>
                    <li><a class="hover:text-[#2D8659]" href="/it/servizi">Consulenza Tecnica</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <span class="text-lg font-semibold mb-4 block">Contatti</span>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-map-pin class="w-5 h-5 text-[#2D8659] flex-shrink-0 mt-1" />
                        <span class="text-gray-300">Via Vanzo 86/A, 31021 Mogliano Veneto TV</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-envelope class="w-5 h-5 text-[#2D8659] flex-shrink-0 mt-1" />
                        <a href="mailto:sottanamarco@pec.it" class="text-gray-300 hover:text-[#2D8659] transition-colors">sottanamarco@pec.it</a>
                    </li>
                </ul>
                <div class="mt-4 pt-4 border-t border-white/10">
                    <p class="text-xs text-gray-400">P.IVA: 05532540266</p>
                    <p class="text-xs text-gray-400">REA: TV - 451911</p>
                </div>
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="mt-12 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-400 text-sm">© {{ date('Y') }} Marco Sottana - Consulenza Sicurezza. Tutti i diritti riservati.</p>
                <div class="flex space-x-6 text-sm">
                    <a class="text-gray-400 hover:text-[#2D8659] transition-colors" href="/it/privacy">Privacy Policy</a>
                    <a class="text-gray-400 hover:text-[#2D8659] transition-colors" href="/it/termini">Termini e Condizioni</a>
                </div>
            </div>
        </div>
    </div>
</footer>
