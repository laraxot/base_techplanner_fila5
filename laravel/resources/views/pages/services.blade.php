<?php

use function Laravel\Folio\{name};

name('pages.services');

?>

<x-layouts.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative container mx-auto px-4 py-24 lg:py-32">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                        {{ $content['title'][app()->getLocale()] ?? 'I Nostri Servizi' }}
                    </h1>
                    <p class="text-xl lg:text-2xl mb-8 text-blue-100 leading-relaxed">
                        Soluzioni complete per la radioprotezione e sicurezza elettrica nel settore sanitario
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/contacts" class="inline-flex items-center px-8 py-4 bg-white text-blue-700 rounded-lg font-semibold hover:bg-blue-50 transition-colors shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Richiedi Consulenza
                        </a>
                        <a href="#services" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-blue-700 transition-colors">
                            Scopri i Servizi
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search and Filters -->
        <section class="bg-white border-b sticky top-0 z-40 shadow-sm">
            <div class="container mx-auto px-4 py-4">
                <div class="flex flex-col lg:flex-row gap-4 items-center">
                    <div class="flex-1 w-full">
                        <div class="relative">
                            <input type="text" 
                                   id="service-search"
                                   placeholder="Cerca servizi..." 
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <svg class="absolute left-4 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex gap-2 flex-wrap justify-center">
                        <button class="filter-btn px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors" data-category="all">
                            Tutti
                        </button>
                        <button class="filter-btn px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors" data-category="radioprotezione">
                            Radioprotezione
                        </button>
                        <button class="filter-btn px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors" data-category="elettromedicali">
                            Elettromedicali
                        </button>
                        <button class="filter-btn px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors" data-category="documentazione">
                            Documentazione
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Grid -->
        <section id="services" class="py-20">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="services-grid">
                    <!-- Service Card 1 -->
                    <div class="service-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-category="radioprotezione">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6">
                            <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white">Controllo Radioprotezione</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 mb-6">
                                Verifiche periodiche e straordinarie per apparecchiature radiologiche in ambito odontoiatrico e veterinario. Garanzia di conformità al D.Lgs 101/2020.
                            </p>
                            <ul class="space-y-3 mb-6">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Controllo tubi radiogeni</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Verifica schermature</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Dosimetria personale</span>
                                </li>
                            </ul>
                            <div class="flex items-center justify-between pt-4 border-t">
                                <span class="text-2xl font-bold text-blue-600">A partire da €250</span>
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    Dettagli
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Service Card 2 -->
                    <div class="service-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-category="elettromedicali">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 p-6">
                            <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white">Controllo Elettromedicali</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 mb-6">
                                Manutenzione preventiva e verifiche di sicurezza elettrica su tutti i dispositivi medici (IEC 62353), assicurando funzionalità e sicurezza.
                            </p>
                            <ul class="space-y-3 mb-6">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Test sicurezza elettrica</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Calibrazione strumentazione</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Manutenzione preventiva</span>
                                </li>
                            </ul>
                            <div class="flex items-center justify-between pt-4 border-t">
                                <span class="text-2xl font-bold text-green-600">A partire da €180</span>
                                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                    Dettagli
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Service Card 3 -->
                    <div class="service-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-category="documentazione">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6">
                            <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white">Documentazione e Conformità</h3>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 mb-6">
                                Gestione completa della documentazione obbligatoria: registri di controllo, nomine esperti qualificati, relazioni tecniche e comunicazioni.
                            </p>
                            <ul class="space-y-3 mb-6">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Registro apparecchiature</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Relazioni tecniche</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-gray-700">Comunicazioni organi competenti</span>
                                </li>
                            </ul>
                            <div class="flex items-center justify-between pt-4 border-t">
                                <span class="text-2xl font-bold text-purple-600">A partire da €350</span>
                                <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                                    Dettagli
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl lg:text-4xl font-bold mb-6">Hai bisogno di una consulenza personalizzata?</h2>
                <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto">
                    I nostri esperti sono a tua disposizione per analizzare le tue esigenze e proporti la soluzione migliore per la tua attività.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contacts" class="inline-flex items-center px-8 py-4 bg-white text-blue-700 rounded-lg font-semibold hover:bg-blue-50 transition-colors shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Contatta un Esperto
                    </a>
                    <a href="/faq" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-blue-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        FAQ
                    </a>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('service-search');
            const serviceCards = document.querySelectorAll('.service-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                serviceCards.forEach(card => {
                    const text = card.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Filter functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.dataset.category;
                    
                    // Update button states
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-700');
                    });
                    this.classList.remove('bg-gray-200', 'text-gray-700');
                    this.classList.add('bg-blue-600', 'text-white');
                    
                    // Filter cards
                    serviceCards.forEach(card => {
                        if (category === 'all' || card.dataset.category === category) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</x-layouts.app>