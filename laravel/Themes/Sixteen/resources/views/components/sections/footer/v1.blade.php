<<<<<<< HEAD
@php
    $footerBlock = Arr::first($blocks ?? [], fn($item) => $item->slug == 'footer');
    $data = $footerBlock->data ?? [];
    $brand = $data['brand'] ?? [];
    $social = $data['social'] ?? [];
    $normative = $data['normative'] ?? [];
    $services = $data['services'] ?? [];
    $contact = $data['contact'] ?? [];
    $legal = $data['legal'] ?? [];
@endphp

<footer class="text-white" style="background-color: var(--agid-primary-dark);" role="contentinfo">
    <div class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Branding & About --}}
            <div>
                <h2 class="text-2xl font-bold block mb-2">{{ $brand['name'] ?? 'Marco Sottana' }}</h2>
                <p class="text-gray-300 block mb-4">{{ $brand['subtitle'] ?? 'Consulenza Sicurezza' }}</p>
                <p class="text-gray-300 mb-4 text-sm leading-relaxed">
                    {{ $brand['description'] ?? 'Esperto di radioprotezione e sicurezza radiologica per studi dentistici e veterinari.' }}
                </p>
                <div class="flex space-x-4" role="list" aria-label="Link ai social media">
                    @if($social['linkedin'] ?? null)
                        <a href="{{ $social['linkedin'] ?? '#' }}" class="p-2 bg-white/10 rounded-lg hover:bg-white/20 agid-transition agid-focus focus:outline-2 focus:outline-white focus:outline-offset-2" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn - si apre in una nuova finestra">
                            <x-heroicon-o-briefcase class="w-5 h-5 text-current" aria-hidden="true" />
                        </a>
                    @endif
                    @if($social['facebook'] ?? null)
                        <a href="{{ $social['facebook'] ?? '#' }}" class="p-2 bg-white/10 rounded-lg hover:bg-white/20 agid-transition agid-focus focus:outline-2 focus:outline-white focus:outline-offset-2" target="_blank" rel="noopener noreferrer" aria-label="Facebook - si apre in una nuova finestra">
                            <x-heroicon-o-facebook class="w-5 h-5 text-current" aria-hidden="true" />
                        </a>
                    @endif
                    @if($social['instagram'] ?? null)
                        <a href="{{ $social['instagram'] ?? '#' }}" class="p-2 bg-white/10 rounded-lg hover:bg-white/20 agid-transition agid-focus focus:outline-2 focus:outline-white focus:outline-offset-2" target="_blank" rel="noopener noreferrer" aria-label="Instagram - si apre in una nuova finestra">
                            <x-heroicon-o-camera class="w-5 h-5 text-current" aria-hidden="true" />
                        </a>
                    @endif
                </div>
            </div>

            {{-- Normative --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 block flex items-center">
                    <x-heroicon-o-shield-check class="w-5 h-5 mr-2" aria-hidden="true" />
                    {{ $normative['title'] ?? 'Normative & Certificazioni' }}
                </h3>
                <ul class="space-y-3 text-sm text-gray-300" role="list">
                    @foreach($normative['items'] ?? [] as $item)
                        <li class="border-b border-white/10 pb-2 last:border-0">
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Services Links --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 block">{{ $services['title'] ?? 'Servizi' }}</h3>
                <ul class="space-y-2 text-gray-300 text-sm" role="list">
                    @foreach($services['items'] ?? [] as $item)
                        <li><a class="hover:text-opacity-80 agid-transition agid-focus focus:outline-2 focus:outline-white focus:outline-offset-2" href="/it/servizi" aria-label="Vai ai servizi - {{ $item }}">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h3 class="text-lg font-semibold mb-4 block">{{ $contact['title'] ?? 'Contatti' }}</h3>
                <address class="space-y-3 text-sm not-italic">
                    @if($contact['address'] ?? null)
                        <div class="flex items-start space-x-3">
                            <x-heroicon-o-map-pin class="w-5 h-5 flex-shrink-0 mt-1" aria-hidden="true" />
                            <span class="text-gray-300">{{ $contact['address'] }}<br>{{ $contact['city'] ?? '' }}</span>
                        </div>
                    @endif
                    @if($contact['email'] ?? null)
                        <div class="flex items-start space-x-3">
                            <x-heroicon-o-envelope class="w-5 h-5 flex-shrink-0 mt-1" aria-hidden="true" />
                            <a href="mailto:{{ $contact['email'] }}" class="text-gray-300 hover:text-opacity-80 agid-transition agid-focus focus:outline-2 focus:outline-white focus:outline-offset-2" aria-label="Invia email a {{ $contact['email'] }}">{{ $contact['email'] }}</a>
                        </div>
                    @endif
                    @if($contact['phone'] ?? null)
                        <div class="flex items-start space-x-3">
                            <x-heroicon-o-phone class="w-5 h-5 flex-shrink-0 mt-1" aria-hidden="true" />
                            <a href="tel:{{ $contact['phone'] }}" class="text-gray-300 hover:text-opacity-80 agid-transition agid-focus focus:outline-2 focus:outline-white focus:outline-offset-2" aria-label="Chiama {{ $contact['phone'] }}">{{ $contact['phone'] }}</a>
                        </div>
                    @endif
                </address>
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

        <!-- Bottom Footer -->
        <div class="mt-12 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-400 text-sm">{{ $legal['copyright'] ?? '© ' . date('Y') . ' Marco Sottana – Consulenza Sicurezza. Tutti i diritti riservati.' }}</p>
                <nav aria-label="Link legali del footer">
                    <div class="flex space-x-6 text-sm">
                        @foreach($legal['links'] ?? [] as $link)
                            <a class="text-gray-400 hover:text-opacity-80 agid-transition agid-focus focus:outline-2 focus:outline-white focus:outline-offset-2" href="{{ $link['url'] ?? '#' }}" aria-label="Vai a {{ $link['label'] ?? '' }}">{{ $link['label'] ?? '' }}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
=======
<footer class="it-footer" id="footer" role="contentinfo">
    <div class="it-footer-main">
        <div class="container">

            {{-- Logo Row --}}
            <div class="row">
                <div class="col-12 footer-items-wrapper logo-wrapper">
                    <img class="ue-logo" src="/themes/Sixteen/images/logo-eu-inverted.svg" alt="logo Unione Europea">
                    <div class="it-brand-wrapper">
                        <a href="/">
                            <svg class="icon" aria-hidden="true">
                                <use href="/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-pa"></use>
                            </svg>
                            <div class="it-brand-text">
                                <h2 class="no_toc">Nome del Comune</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Main Links Row --}}
            <div class="row">

                {{-- Amministrazione --}}
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">Amministrazione</h4>
                    <ul class="footer-list">
                        <li><a href="#">Organi di governo</a></li>
                        <li><a href="#">Aree amministrative</a></li>
                        <li><a href="#">Uffici</a></li>
                        <li><a href="#">Enti e fondazioni</a></li>
                        <li><a href="#">Politici</a></li>
                        <li><a href="#">Personale amministrativo</a></li>
                        <li><a href="#">Documenti e dati</a></li>
                    </ul>
                </div>

                {{-- Categorie di servizio --}}
                <div class="col-md-6 footer-items-wrapper">
                    <h4 class="footer-heading-title">Categorie di servizio</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="footer-list">
                                <li><a href="#">Anagrafe e stato civile</a></li>
                                <li><a href="#">Cultura e tempo libero</a></li>
                                <li><a href="#">Vita lavorativa</a></li>
                                <li><a href="#">Imprese e commercio</a></li>
                                <li><a href="#">Appalti pubblici</a></li>
                                <li><a href="#">Catasto e urbanistica</a></li>
                                <li><a href="#">Turismo</a></li>
                                <li><a href="#">Mobilità e trasporti</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-list">
                                <li><a href="#">Educazione e formazione</a></li>
                                <li><a href="#">Giustizia e sicurezza pubblica</a></li>
                                <li><a href="#">Tributi, finanze e contravvenzioni</a></li>
                                <li><a href="#">Ambiente</a></li>
                                <li><a href="#">Salute, benessere e assistenza</a></li>
                                <li><a href="#">Autorizzazioni</a></li>
                                <li><a href="#">Agricoltura e pesca</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Novità + Vivere il comune --}}
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">Novità</h4>
                    <ul class="footer-list">
                        <li><a href="#">Notizie</a></li>
                        <li><a href="#">Comunicati</a></li>
                        <li><a href="#">Avvisi</a></li>
                    </ul>
                    <h4 class="footer-heading-title">Vivere il comune16</h4>
                    <ul class="footer-list">
                        <li><a href="#">Luoghi</a></li>
                        <li><a href="#">Eventi</a></li>
                    </ul>
                </div>

                {{-- Contatti --}}
                <div class="col-md-9 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">Contatti</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="footer-info">
                                Comune di Nome Comune<br>
                                Via Roma 123 - 00100 Comune<br>
                                Codice fiscale / P. IVA: 00123456789<br><br>
                                <a href="#">Ufficio Relazioni con il Pubblico</a><br>
                                Numero verde: 800 016 123<br>
                                SMS e WhatsApp: +39 320 1234567<br>
                                Posta Elettronica Certificata<br>
                                Centralino unico: 012 3456
                            </p>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                <li><a href="#" data-element="faq">Leggi le FAQ</a></li>
                                <li><a href="#">Prenotazione appuntamento</a></li>
                                <li><a href="#" data-element="report-inefficiency">Segnalazione disservizio</a></li>
                                <li><a href="#">Richiesta d'assistenza</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="footer-list">
                                <li><a href="#">Amministrazione trasparente</a></li>
                                <li><a href="#" data-element="privacy-policy-link">Informativa privacy</a></li>
                                <li><a href="#" data-element="legal-notes">Note legali</a></li>
                                <li><a href="#" data-element="accessibility-link">Dichiarazione di accessibilità</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Seguici su --}}
                <div class="col-md-3 mt-md-4 footer-items-wrapper">
                    <h4 class="footer-heading-title">Seguici su</h4>
                    <ul class="list-inline text-start social">
                        <li class="list-inline-item">
                            <a class="p-1 text-white" href="#" target="_blank">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use href="/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use>
                                </svg>
                                <span class="visually-hidden">Twitter</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="p-1 text-white" href="#" target="_blank">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use href="/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use>
                                </svg>
                                <span class="visually-hidden">Facebook</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="p-1 text-white" href="#" target="_blank">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use href="/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-youtube"></use>
                                </svg>
                                <span class="visually-hidden">YouTube</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="p-1 text-white" href="#" target="_blank">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use href="/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-telegram"></use>
                                </svg>
                                <span class="visually-hidden">Telegram</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="p-1 text-white" href="#" target="_blank">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use href="/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-whatsapp"></use>
                                </svg>
                                <span class="visually-hidden">Whatsapp</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="p-1 text-white" href="#" target="_blank">
                                <svg class="icon icon-sm icon-white align-top">
                                    <use href="/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg#it-rss"></use>
                                </svg>
                                <span class="visually-hidden">RSS</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- Bottom Row --}}
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <div class="footer-bottom">
                        <a href="#">Media policy</a>
                        <a href="#">Mappa del sito</a>
                    </div>
                </div>
            </div>

>>>>>>> dev
        </div>
    </div>
</footer>
