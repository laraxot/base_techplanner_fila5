<?php

use function Laravel\Folio\{name};

name('pages.contacts');

?>

<x-layouts.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-700 text-white">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative container mx-auto px-4 py-24 lg:py-32">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                        Contattaci
                    </h1>
                    <p class="text-xl lg:text-2xl mb-8 text-teal-100 leading-relaxed">
                        Siamo a tua disposizione per qualsiasi esigenza di radioprotezione, elettromedicali e consulenza tecnica
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="tel:+393480123456" class="inline-flex items-center px-8 py-4 bg-white text-emerald-600 rounded-lg font-semibold hover:bg-teal-50 transition-colors shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Chiama Ora
                        </a>
                        <a href="#contact-form" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-emerald-600 transition-colors">
                            Richiedi Consulenza
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Methods -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Phone -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Telefono</h3>
                        <p class="text-gray-600 mb-4">Chiamaci per assistenza immediata</p>
                        <a href="tel:+393480123456" class="text-2xl font-bold text-emerald-600 hover:text-emerald-700">+39 348 0123 456</a>
                        <p class="text-sm text-gray-500 mt-2">Lun-Ven: 9:00-18:00</p>
                    </div>

                    <!-- Email -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Email</h3>
                        <p class="text-gray-600 mb-4">Invia le tue richieste via email</p>
                        <a href="mailto:info@techplanner.it" class="text-2xl font-bold text-teal-600 hover:text-teal-700">info@techplanner.it</a>
                        <p class="text-sm text-gray-500 mt-2">Risposta entro 24 ore</p>
                    </div>

                    <!-- Address -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Sede Operativa</h3>
                        <p class="text-gray-600 mb-4">Visita la nostra sede</p>
                        <address class="text-lg font-medium text-cyan-600 not-italic">
                            Via Roma 123<br>
                            35131 Padova (PD)
                        </address>
                        <p class="text-sm text-gray-500 mt-2">Su appuntamento</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form and Info -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div id="contact-form" class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Invia una Richiesta</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">Nome *</label>
                                <input type="text" 
                                       id="first_name" 
                                       name="first_name" 
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Cognome *</label>
                                <input type="text" 
                                       id="last_name" 
                                       name="last_name" 
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Telefono</label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                        </div>

                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Azienda/Studio</label>
                            <input type="text" 
                                   id="company" 
                                   name="company"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                        </div>

                        <div>
                            <label for="service_type" class="block text-sm font-medium text-gray-700 mb-2">Tipo di Servizio Richiesto *</label>
                            <select id="service_type" 
                                    name="service_type" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                                <option value="">Seleziona un servizio</option>
                                <option value="radioprotezione">Controllo Radioprotezione</option>
                                <option value="elettromedicali">Controllo Elettromedicali</option>
                                <option value="documentazione">Documentazione e Conformità</option>
                                <option value="consulenza">Consulenza Generale</option>
                                <option value="formazione">Formazione del Personale</option>
                                <option value="altro">Altro</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Messaggio *</label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="5" 
                                      required
                                      placeholder="Descrivi brevemente la tua richiesta..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors resize-none"></textarea>
                        </div>

                        <div class="flex items-start">
                            <input id="privacy" 
                                   name="privacy" 
                                   type="checkbox" 
                                   required
                                   class="mt-1 w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            <label for="privacy" class="ml-3 text-sm text-gray-600">
                                Accetto l'<a href="#" class="text-emerald-600 hover:text-emerald-700 underline">informativa sulla privacy</a> e autorizzo il trattamento dei dati personali *
                            </label>
                        </div>

                        <div class="flex items-start">
                            <input id="newsletter" 
                                   name="newsletter" 
                                   type="checkbox"
                                   class="mt-1 w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            <label for="newsletter" class="ml-3 text-sm text-gray-600">
                                Desidero ricevere newsletter e aggiornamenti su servizi e normative
                            </label>
                        </div>

                        <button type="submit" class="w-full px-6 py-4 bg-emerald-600 text-white rounded-lg font-semibold hover:bg-emerald-700 transition-colors shadow-lg flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Invia Richiesta
                        </button>
                    </form>
                </div>

                <!-- Additional Info -->
                <div class="space-y-8">
                    <!-- Quick Response -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Risposta Rapida Garantita</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Richieste Urgenti</h4>
                                    <p class="text-gray-600">Risposta entro 2 ore per emergenze e controlli non programmati</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-teal-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Consulenza Personalizzata</h4>
                                    <p class="text-gray-600">Analisi delle tue esigenze e proposta su misura entro 24 ore</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Supporto Tecnico</h4>
                                    <p class="text-gray-600">Assistenza continua durante tutto il processo di conformità</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Orari di Lavoro</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-3 border-b">
                                <span class="font-medium text-gray-900">Lunedì - Venerdì</span>
                                <span class="text-gray-600">09:00 - 18:00</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b">
                                <span class="font-medium text-gray-900">Sabato</span>
                                <span class="text-gray-600">09:00 - 12:00</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b">
                                <span class="font-medium text-gray-900">Domenica</span>
                                <span class="text-gray-400">Chiuso</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="font-medium text-emerald-600">Emergenze</span>
                                <span class="text-emerald-600">24/7</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Seguici sui Social</h3>
                        <p class="text-gray-600 mb-6">Rimani aggiornato su normative, novità e consigli pratici</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-sky-500 text-white rounded-lg flex items-center justify-center hover:bg-sky-600 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-blue-700 text-white rounded-lg flex items-center justify-center hover:bg-blue-800 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 bg-red-600 text-white rounded-lg flex items-center justify-center hover:bg-red-700 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <section class="py-20 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Dove Siamo</h2>
                    <p class="text-xl text-gray-600">Visita la nostra sede a Padova</p>
                </div>
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="h-96 bg-gray-300 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <p class="text-gray-600">Mappa interattiva in arrivo</p>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Indicazioni Stradali</h3>
                                <p class="text-gray-600 mb-4">
                                    Siamo facilmente raggiungibili in auto, mezzi pubblici e treno. La nostra sede si trova in centro città, 
                                    a pochi minuti dalla stazione ferroviaria di Padova.
                                </p>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Parcheggio disponibile in zona
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Fermata autobus a 100 metri
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Accessibilità</h3>
                                <p class="text-gray-600 mb-4">
                                    La nostra struttura è completamente accessibile alle persone con disabilità:
                                </p>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Ingresso senza barriere architettoniche
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Ascensore e bagni accessibili
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-emerald-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Parcheggio riservato vicino all'ingresso
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>