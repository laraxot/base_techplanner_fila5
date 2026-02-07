<?php

use function Laravel\Folio\{name};

name('pages.faq');

?>

<x-layouts.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-teal-600 via-cyan-600 to-blue-700 text-white">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative container mx-auto px-4 py-24 lg:py-32">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                        Domande Frequenti
                    </h1>
                    <p class="text-xl lg:text-2xl mb-8 text-cyan-100 leading-relaxed">
                        Trova risposte alle domande più comuni su radioprotezione, elettromedicali e conformità normativa
                    </p>
                    <div class="relative max-w-2xl mx-auto">
                        <input type="text" 
                               id="faq-search"
                               placeholder="Cerca una domanda..." 
                               class="w-full px-12 py-4 rounded-full text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-cyan-300 shadow-lg">
                        <svg class="absolute left-5 top-4 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="bg-white py-12 border-b">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-3xl font-bold text-teal-600 mb-2">150+</div>
                        <div class="text-gray-600">Domande Risposte</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-blue-600 mb-2">98%</div>
                        <div class="text-gray-600">Clienti Soddisfatti</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-cyan-600 mb-2">24/48h</div>
                        <div class="text-gray-600">Risposta Rapida</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-indigo-600 mb-2">10+</div>
                        <div class="text-gray-600">Anni di Esperienza</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Navigation -->
        <section class="bg-gray-100 border-b sticky top-0 z-40 shadow-sm">
            <div class="container mx-auto px-4 py-4">
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <button class="category-btn px-6 py-2 bg-teal-600 text-white rounded-full hover:bg-teal-700 transition-colors font-medium" data-category="all">
                        Tutte le Categorie
                    </button>
                    <button class="category-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-50 transition-colors font-medium shadow-sm" data-category="generali">
                        Generali
                    </button>
                    <button class="category-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-50 transition-colors font-medium shadow-sm" data-category="radioprotezione">
                        Radioprotezione
                    </button>
                    <button class="category-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-50 transition-colors font-medium shadow-sm" data-category="elettromedicali">
                        Elettromedicali
                    </button>
                    <button class="category-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-50 transition-colors font-medium shadow-sm" data-category="normativa">
                        Normativa
                    </button>
                    <button class="category-btn px-6 py-2 bg-white text-gray-700 rounded-full hover:bg-gray-50 transition-colors font-medium shadow-sm" data-category="documentazione">
                        Documentazione
                    </button>
                </div>
            </div>
        </section>

        <!-- FAQ Content -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-4xl mx-auto">
                <!-- Popular Questions -->
                <section class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Domande più Popolari</h2>
                    
                    <div class="space-y-4" id="faq-items">
                        <!-- FAQ Item 1 -->
                        <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-category="radioprotezione">
                            <button class="faq-question w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <span class="font-medium text-gray-900 text-lg">Qual è la frequenza obbligatoria per i controlli di radioprotezione?</span>
                                <svg class="faq-icon w-5 h-5 text-teal-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <div class="pt-4 border-t text-gray-600 leading-relaxed">
                                    <p class="mb-3">La frequenza dei controlli dipende dal tipo di apparecchiatura e dall'utilizzo:</p>
                                    <ul class="list-disc list-inside space-y-2 ml-4">
                                        <li><strong>Controlli di costanza:</strong> Annuali per apparecchiature radiologiche fisse</li>
                                        <li><strong>Verifiche straordinarie:</strong> Dopo riparazioni o modifiche tecniche</li>
                                        <li><strong>Controlli dosimetrici:</strong> Trimestrali per personale esposto</li>
                                        <li><strong>Verifica schermature:</strong> Ogni 5 anni o dopo modifiche strutturali</li>
                                    </ul>
                                    <p class="mt-3">Il D.Lgs 101/2020 richiede che tutti i controlli siano documentati nel registro macchine.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-category="generali">
                            <button class="faq-question w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <span class="font-medium text-gray-900 text-lg">Chi è l'Esperto Qualificato e quando è obbligatorio nominarlo?</span>
                                <svg class="faq-icon w-5 h-5 text-teal-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <div class="pt-4 border-t text-gray-600 leading-relaxed">
                                    <p class="mb-3">L'Esperto Qualificato (EQ) è un professionista con competenze specifiche in radioprotezione, iscritto nell'elenco nazionale del Ministero della Salute.</p>
                                    <p class="mb-3"><strong>È obbligatorio nominare un EQ quando:</strong></p>
                                    <ul class="list-disc list-inside space-y-2 ml-4">
                                        <li>Sono presenti apparecchiature radiologiche (RX, OPT, CBCT)</li>
                                        <li>L'attività implica rischio di esposizione a radiazioni ionizzanti</li>
                                        <li>Sono richiesti controlli di radioprotezione periodici</li>
                                    </ul>
                                    <p class="mt-3">L'EQ sovrintende a tutte le attività di radioprotezione e firma la documentazione tecnica obbligatoria.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-category="elettromedicali">
                            <button class="faq-question w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <span class="font-medium text-gray-900 text-lg">Cosa prevede la norma IEC 62353 per la sicurezza elettrica?</span>
                                <svg class="faq-icon w-5 h-5 text-teal-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <div class="pt-4 border-t text-gray-600 leading-relaxed">
                                    <p class="mb-3">La norma IEC 62353 definisce le procedure per la verifica della sicurezza elettrica delle apparecchiature elettromedicali:</p>
                                    <ul class="list-disc list-inside space-y-2 ml-4">
                                        <li><strong>Test di corrente di dispersione:</strong> Verifica della corrente che può attraversare il paziente</li>
                                        <li><strong>Misura della resistenza di terra:</strong> Controllo dell'efficacia del collegamento a terra</li>
                                        <li><strong>Test di isolamento:</strong> Verifica della resistenza tra parti conduttive</li>
                                        <li><strong>Controlli funzionali:</strong> Verifica del corretto funzionamento dei dispositivi di sicurezza</li>
                                    </ul>
                                    <p class="mt-3">I controlli devono essere eseguiti da personale qualificato con strumentazione certificata.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-category="normativa">
                            <button class="faq-question w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <span class="font-medium text-gray-900 text-lg">Quali sono le sanzioni previste in caso di mancata conformità?</span>
                                <svg class="faq-icon w-5 h-5 text-teal-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <div class="pt-4 border-t text-gray-600 leading-relaxed">
                                    <p class="mb-3">Il D.Lgs 101/2020 prevede diverse tipologie di sanzioni:</p>
                                    <div class="space-y-3">
                                        <div>
                                            <strong class="text-gray-900">Sanzioni Amministrative:</strong>
                                            <ul class="list-disc list-inside ml-4 mt-1">
                                                <li>Da €5.000 a €100.000 per mancata documentazione</li>
                                                <li>Da €10.000 a €200.000 per assenza di controlli periodici</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <strong class="text-gray-900">Sanzioni Penali:</strong>
                                            <ul class="list-disc list-inside ml-4 mt-1">
                                                <li>Reclusione fino a 3 anni per rischio grave per la salute</li>
                                                <li>Arresto fino a 2 anni per omissione di controlli obbligatori</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <strong class="text-gray-900">Altre Conseguenze:</strong>
                                            <ul class="list-disc list-inside ml-4 mt-1">
                                                <li>Sospensione dell'attività sanitaria</li>
                                                <li>Revoca di autorizzazioni e licenze</li>
                                                <li>Responsabilità civile per danni a terzi</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-category="documentazione">
                            <button class="faq-question w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <span class="font-medium text-gray-900 text-lg">Quali documenti sono obbligatori per la radioprotezione?</span>
                                <svg class="faq-icon w-5 h-5 text-teal-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <div class="pt-4 border-t text-gray-600 leading-relaxed">
                                    <p class="mb-3">La documentazione obbligatoria include:</p>
                                    <ul class="list-disc list-inside space-y-2 ml-4">
                                        <li><strong>Registro delle apparecchiature radiologiche</strong> con schede tecniche e certificazioni</li>
                                        <li><strong>Nomeina dell'Esperto Qualificato</strong> con curriculum e attestazioni</li>
                                        <li><strong>Documentazione dosimetrica</strong> del personale esposto (ultimi 5 anni)</li>
                                        <li><strong>Relazioni tecniche dei controlli</strong> periodici e straordinari</li>
                                        <li><strong>Documento di valutazione del rischio</strong> da radiazioni ionizzanti</li>
                                        <li><strong>Piano di emergenza radiologica</strong> e prove di evacuazione</li>
                                        <li><strong>Registri di formazione</strong> del personale addetto</li>
                                    </ul>
                                    <p class="mt-3">Tutta la documentazione deve essere conservata per almeno 5 anni e resa disponibile agli organi di controllo.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-category="elettromedicali">
                            <button class="faq-question w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <span class="font-medium text-gray-900 text-lg">Ogni quanto si devono controllare gli elettromedicali?</span>
                                <svg class="faq-icon w-5 h-5 text-teal-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="faq-answer hidden px-6 pb-4">
                                <div class="pt-4 border-t text-gray-600 leading-relaxed">
                                    <p class="mb-3">La frequenza dei controlli dipende dalla classe e dall'utilizzo del dispositivo:</p>
                                    <div class="space-y-3">
                                        <div>
                                            <strong class="text-gray-900">Dispositivi Critici (Classe III e IIb):</strong>
                                            <ul class="list-disc list-inside ml-4 mt-1">
                                                <li>Semestrali per apparecchiature elettrochirurgiche</li>
                                                <li>Annuali per defibrillatori e monitor pazienti</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <strong class="text-gray-900">Dispositivi Standard (Classe IIa):</strong>
                                            <ul class="list-disc list-inside ml-4 mt-1">
                                                <li>Biennali per siringhe pompe e infusioni</li>
                                                <li>Triennali per altri dispositivi non invasivi</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <strong class="text-gray-900">Controlli Straordinari:</strong>
                                            <ul class="list-disc list-inside ml-4 mt-1">
                                                <li>Dopo riparazioni o manutenzione straordinaria</li>
                                                <li>In caso di malfunzionamento o segnalazioni</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Categories Sections -->
                <section class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Esplora per Categoria</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Radioprotezione Category -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Radioprotezione</h3>
                                    <p class="text-gray-600">Domande su controlli, sicurezza e normative</p>
                                </div>
                            </div>
                            <ul class="space-y-2">
                                <li class="text-gray-600">• Controlli periodici e documentazione</li>
                                <li class="text-gray-600">• Schermature e DPI</li>
                                <li class="text-gray-600">• Formazione del personale</li>
                            </ul>
                            <button class="mt-4 text-teal-600 hover:text-teal-700 font-medium flex items-center">
                                Vedi tutte (25 domande)
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Elettromedicali Category -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Elettromedicali</h3>
                                    <p class="text-gray-600">Manutenzione e sicurezza dei dispositivi</p>
                                </div>
                            </div>
                            <ul class="space-y-2">
                                <li class="text-gray-600">• Normativa IEC 62353</li>
                                <li class="text-gray-600">• Frequenza controlli</li>
                                <li class="text-gray-600">• Calibrazione strumentazione</li>
                            </ul>
                            <button class="mt-4 text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                Vedi tutte (18 domande)
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Normativa Category -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Normativa</h3>
                                    <p class="text-gray-600">Obblighi di legge e conformità</p>
                                </div>
                            </div>
                            <ul class="space-y-2">
                                <li class="text-gray-600">• D.Lgs 101/2020</li>
                                <li class="text-gray-600">• Direttiva 2013/59/Euratom</li>
                                <li class="text-gray-600">• Sanzioni e responsabilità</li>
                            </ul>
                            <button class="mt-4 text-purple-600 hover:text-purple-700 font-medium flex items-center">
                                Vedi tutte (22 domande)
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Documentazione Category -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">Documentazione</h3>
                                    <p class="text-gray-600">Gestione documentale e registri</p>
                                </div>
                            </div>
                            <ul class="space-y-2">
                                <li class="text-gray-600">• Registro macchine</li>
                                <li class="text-gray-600">• Relazioni tecniche</li>
                                <li class="text-gray-600">• Conservazione documenti</li>
                            </ul>
                            <button class="mt-4 text-orange-600 hover:text-orange-700 font-medium flex items-center">
                                Vedi tutte (15 domande)
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </section>

                <!-- Contact CTA -->
                <section class="bg-gradient-to-r from-teal-600 to-cyan-600 rounded-xl p-8 text-center text-white">
                    <h2 class="text-3xl font-bold mb-4">Non hai trovato la risposta che cercavi?</h2>
                    <p class="text-xl text-cyan-100 mb-6 max-w-2xl mx-auto">
                        I nostri esperti sono a tua disposizione per rispondere a qualsiasi domanda sulla radioprotezione e sicurezza sanitaria.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/contacts" class="inline-flex items-center px-8 py-4 bg-white text-teal-600 rounded-lg font-semibold hover:bg-cyan-50 transition-colors shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Contatta un Esperto
                        </a>
                        <a href="mailto:info@techplanner.it" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-teal-600 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Invia Email
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion functionality
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const faqItem = this.parentElement;
                    const answer = faqItem.querySelector('.faq-answer');
                    const icon = this.querySelector('.faq-icon');
                    
                    // Close other open items
                    document.querySelectorAll('.faq-item').forEach(item => {
                        if (item !== faqItem) {
                            item.querySelector('.faq-answer').classList.add('hidden');
                            item.querySelector('.faq-icon').classList.remove('rotate-180');
                        }
                    });
                    
                    // Toggle current item
                    answer.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });

            // Search functionality
            const searchInput = document.getElementById('faq-search');
            const faqItems = document.querySelectorAll('.faq-item');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                faqItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // Category filter functionality
            const categoryButtons = document.querySelectorAll('.category-btn');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.dataset.category;
                    
                    // Update button states
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('bg-teal-600', 'text-white');
                        btn.classList.add('bg-white', 'text-gray-700', 'shadow-sm');
                    });
                    this.classList.remove('bg-white', 'text-gray-700', 'shadow-sm');
                    this.classList.add('bg-teal-600', 'text-white');
                    
                    // Filter FAQ items
                    faqItems.forEach(item => {
                        if (category === 'all' || item.dataset.category === category) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</x-layouts.app>