<?php

use function Laravel\Folio\{name};

name('pages.blog');

?>

<x-layouts.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 text-white">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative container mx-auto px-4 py-24 lg:py-32">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                        Blog TechPlanner
                    </h1>
                    <p class="text-xl lg:text-2xl mb-8 text-purple-100 leading-relaxed">
                        Aggiornamenti, guide e approfondimenti sulla radioprotezione e sicurezza sanitaria
                    </p>
                    <div class="relative max-w-2xl mx-auto">
                        <input type="text" 
                               id="blog-search"
                               placeholder="Cerca articoli..." 
                               class="w-full px-12 py-4 rounded-full text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-purple-300 shadow-lg">
                        <svg class="absolute left-5 top-4 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Filter -->
        <section class="bg-white border-b sticky top-0 z-40 shadow-sm">
            <div class="container mx-auto px-4 py-4">
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <button class="category-btn px-6 py-2 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition-colors font-medium" data-category="all">
                        Tutti gli Articoli
                    </button>
                    <button class="category-btn px-6 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors font-medium" data-category="radioprotezione">
                        Radioprotezione
                    </button>
                    <button class="category-btn px-6 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors font-medium" data-category="normativa">
                        Normativa
                    </button>
                    <button class="category-btn px-6 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors font-medium" data-category="elettromedicali">
                        Elettromedicali
                    </button>
                    <button class="category-btn px-6 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors font-medium" data-category="guide">
                        Guide Pratiche
                    </button>
                    <button class="category-btn px-6 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors font-medium" data-category="novità">
                        Novità
                    </button>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Blog Posts Grid -->
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8" id="articles-grid">
                        <!-- Article 1 -->
                        <article class="article-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-category="radioprotezione">
                            <div class="relative h-48 bg-gradient-to-br from-blue-400 to-blue-600">
                                <img src="/themes/Two/Main_files/images/blog-radioprotezione.jpg" alt="Radioprotezione" class="w-full h-full object-cover opacity-80">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-blue-600 text-white text-sm rounded-full font-medium">Radioprotezione</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    15 Febbraio 2026
                                    <span class="mx-2">•</span>
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    5 min lettura
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">
                                    <a href="#" class="hover:text-blue-600 transition-colors">
                                        Nuove Linee Guida per il Controllo Radioprotezione 2026
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    Scopri le ultime direttive europee e come impattano sulla gestione della radioprotezione negli studi dentistici e veterinari. Aggiornamenti importanti su controlli e documentazione.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t">
                                    <div class="flex items-center">
                                        <img src="/themes/Two/Main_files/images/author-avatar.jpg" alt="Autore" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700 font-medium">Dr. Marco Rossi</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                        Leggi tutto
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- Article 2 -->
                        <article class="article-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-category="normativa">
                            <div class="relative h-48 bg-gradient-to-br from-green-400 to-green-600">
                                <img src="/themes/Two/Main_files/images/blog-normativa.jpg" alt="Normativa" class="w-full h-full object-cover opacity-80">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-green-600 text-white text-sm rounded-full font-medium">Normativa</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    10 Febbraio 2026
                                    <span class="mx-2">•</span>
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    8 min lettura
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">
                                    <a href="#" class="hover:text-blue-600 transition-colors">
                                        D.Lgs 101/2020: Cosa Cambia per la Tua Attività
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    Analisi dettagliata delle modifiche introdotte dal Decreto Legislativo 101/2020 e come adeguare la tua struttura ai nuovi requisiti di radioprotezione.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t">
                                    <div class="flex items-center">
                                        <img src="/themes/Two/Main_files/images/author-avatar-2.jpg" alt="Autore" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700 font-medium">Avv. Laura Bianchi</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                        Leggi tutto
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- Article 3 -->
                        <article class="article-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-category="guide">
                            <div class="relative h-48 bg-gradient-to-br from-purple-400 to-purple-600">
                                <img src="/themes/Two/Main_files/images/blog-guide.jpg" alt="Guide" class="w-full h-full object-cover opacity-80">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-purple-600 text-white text-sm rounded-full font-medium">Guide Pratiche</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    5 Febbraio 2026
                                    <span class="mx-2">•</span>
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    10 min lettura
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">
                                    <a href="#" class="hover:text-blue-600 transition-colors">
                                        Checklist Completa per il Controllo Radioprotezione
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    Guida passo passo con tutti gli elementi da verificare durante il controllo radioprotezione. Documenti necessari, controlli tecnici e scadenze da ricordare.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t">
                                    <div class="flex items-center">
                                        <img src="/themes/Two/Main_files/images/author-avatar.jpg" alt="Autore" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700 font-medium">Dr. Marco Rossi</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                        Leggi tutto
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>

                        <!-- Article 4 -->
                        <article class="article-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-category="elettromedicali">
                            <div class="relative h-48 bg-gradient-to-br from-orange-400 to-orange-600">
                                <img src="/themes/Two/Main_files/images/blog-elettromedicali.jpg" alt="Elettromedicali" class="w-full h-full object-cover opacity-80">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-orange-600 text-white text-sm rounded-full font-medium">Elettromedicali</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    1 Febbraio 2026
                                    <span class="mx-2">•</span>
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    6 min lettura
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">
                                    <a href="#" class="hover:text-blue-600 transition-colors">
                                        Manutenzione Elettromedicali: IEC 62353 Spiegato Semplice
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    Comprendi la normativa IEC 62353 per la sicurezza elettrica dei dispositivi medici. Frequenza dei controlli e documentazione necessaria per rimanere in regola.
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t">
                                    <div class="flex items-center">
                                        <img src="/themes/Two/Main_files/images/author-avatar-3.jpg" alt="Autore" class="w-8 h-8 rounded-full mr-2">
                                        <span class="text-sm text-gray-700 font-medium">Ing. Paolo Verdi</span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                        Leggi tutto
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        <nav class="flex items-center space-x-2">
                            <button class="px-4 py-2 text-gray-500 hover:text-gray-700 disabled:opacity-50" disabled>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg">1</button>
                            <button class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">2</button>
                            <button class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">3</button>
                            <span class="px-2 text-gray-500">...</span>
                            <button class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">12</button>
                            <button class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Newsletter -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Newsletter</h3>
                        <p class="text-gray-600 mb-4">
                            Ricevi aggiornamenti su normativa e consigli pratici direttamente nella tua casella email.
                        </p>
                        <form class="space-y-4">
                            <input type="email" placeholder="La tua email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <button type="submit" class="w-full px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                Iscriviti
                            </button>
                        </form>
                    </div>

                    <!-- Popular Posts -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Articoli Popolari</h3>
                        <div class="space-y-4">
                            <a href="#" class="block group">
                                <h4 class="font-medium text-gray-900 group-hover:text-purple-600 transition-colors mb-1">
                                    Guida Completa alla Radioprotezione Veterinaria
                                </h4>
                                <p class="text-sm text-gray-500">12 gennaio 2026</p>
                            </a>
                            <a href="#" class="block group">
                                <h4 class="font-medium text-gray-900 group-hover:text-purple-600 transition-colors mb-1">
                                    Controllo Periodico: Ogni Quanto Farlo?
                                </h4>
                                <p class="text-sm text-gray-500">28 dicembre 2025</p>
                            </a>
                            <a href="#" class="block group">
                                <h4 class="font-medium text-gray-900 group-hover:text-purple-600 transition-colors mb-1">
                                    Documentazione Obbligatoria: La Checklist
                                </h4>
                                <p class="text-sm text-gray-500">15 dicembre 2025</p>
                            </a>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Categorie</h3>
                        <div class="space-y-2">
                            <a href="#" class="flex justify-between items-center py-2 hover:text-purple-600 transition-colors">
                                <span>Radioprotezione</span>
                                <span class="text-sm text-gray-500">(24)</span>
                            </a>
                            <a href="#" class="flex justify-between items-center py-2 hover:text-purple-600 transition-colors">
                                <span>Normativa</span>
                                <span class="text-sm text-gray-500">(18)</span>
                            </a>
                            <a href="#" class="flex justify-between items-center py-2 hover:text-purple-600 transition-colors">
                                <span>Elettromedicali</span>
                                <span class="text-sm text-gray-500">(15)</span>
                            </a>
                            <a href="#" class="flex justify-between items-center py-2 hover:text-purple-600 transition-colors">
                                <span>Guide Pratiche</span>
                                <span class="text-sm text-gray-500">(32)</span>
                            </a>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Tag</h3>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-purple-100 hover:text-purple-700 transition-colors">D.Lgs 101/2020</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-purple-100 hover:text-purple-700 transition-colors">Radioprotezione</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-purple-100 hover:text-purple-700 transition-colors">IEC 62353</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-purple-100 hover:text-purple-700 transition-colors">Sicurezza</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-purple-100 hover:text-purple-700 transition-colors">Documentazione</a>
                            <a href="#" class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-purple-100 hover:text-purple-700 transition-colors">Controlli</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('blog-search');
            const articleCards = document.querySelectorAll('.article-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                articleCards.forEach(card => {
                    const text = card.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
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
                        btn.classList.remove('bg-purple-600', 'text-white');
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                    });
                    this.classList.remove('bg-gray-100', 'text-gray-700');
                    this.classList.add('bg-purple-600', 'text-white');
                    
                    // Filter articles
                    articleCards.forEach(card => {
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