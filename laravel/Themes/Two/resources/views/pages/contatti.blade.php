@php
use function Laravel\Folio\{name, middleware};

name('contact');
?>

@extends('layouts.base')

@section('title', 'Contatti - Marco Sottana')
@section('description', 'Contatta Marco Sottana per consulenze su radioprotezione, sicurezza radiologica e controlli per studi dentistici e veterinari')

@section('content')
<div>
    <!--[if BLOCK]![endif]-->        <!--[if BLOCK]![endif]-->            <section class="relative h-96 flex items-center justify-center overflow-hidden">
    
    <div class="absolute inset-0 z-0 bg-gradient-to-br from-brand-blue via-brand-blue/90 to-black">
        <div class="absolute inset-0 bg-[radial-gradient(rgba(255,255,255,0.05)_1px,transparent_1px)] [background-size:24px_24px] opacity-30"></div>
        <!--[if BLOCK]![endif]-->            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-40 mix-blend-overlay"
                 style="background-image: url('/themes/Two/resources/images/hero-bg.jpg');"></div>
        <!--[if ENDBLOCK]![endif]-->    </div>

    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Contattaci</h1>
            <p class="text-xl text-gray-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                Richiedi una consulenza personalizzata per la sicurezza del tuo studio
            </p>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]![endif]-->            <!--[if BLOCK]![endif]-->            <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Invia un Messaggio</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Compila il form sottostante per richiedere una consulenza o maggiori informazioni sui nostri servizi.
                </p>

                <form class="space-y-6" method="POST" action="/submit-contact">
                    @csrf
                    
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nome e Cognome *
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-brand-blue outline-none transition-colors"
                               placeholder="Inserisci il tuo nome completo">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email *
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-brand-blue outline-none transition-colors"
                               placeholder="la tuaemail@esempio.com">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Telefono *
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-brand-blue outline-none transition-colors"
                               placeholder="+39 333 1234567">
                    </div>

                    <!-- Service Type -->
                    <div>
                        <label for="service" class="block text-sm font-medium text-gray-700 mb-2">
                            Servizio di Interesse *
                        </label>
                        <select id="service" 
                                name="service" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-brand-blue outline-none transition-colors">
                            <option value="">Seleziona un servizio</option>
                            <option value="radioprotezione">Controllo Radioprotezione</option>
                            <option value="elettromedicali">Controllo Elettromedicali</option>
                            <option value="documentazione">Documentazione e Conformità</option>
                            <option value="consulenza">Consulenza Completa</option>
                            <option value="altro">Altro</option>
                        </select>
                    </div>

                    <!-- Sector -->
                    <div>
                        <label for="sector" class="block text-sm font-medium text-gray-700 mb-2">
                            Il tuo settore *
                        </label>
                        <select id="sector" 
                                name="sector" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-brand-blue outline-none transition-colors">
                            <option value="">Seleziona il settore</option>
                            <option value="odontoiatria">Studio Odontoiatrico</option>
                            <option value="veterinario">Clinica Veterinaria</option>
                            <option value="entrambi">Entrambi</option>
                            <option value="altro">Altro</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Messaggio
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="5"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-blue focus:border-brand-blue outline-none transition-colors resize-vertical"
                                  placeholder="Descrivi le tue esigenze specifiche..."></textarea>
                    </div>

                    <!-- Privacy -->
                    <div>
                        <label class="flex items-start">
                            <input type="checkbox" 
                                   name="privacy" 
                                   required
                                   class="mt-1 mr-3 w-4 h-4 text-brand-blue border-gray-300 rounded focus:ring-brand-blue">
                            <span class="text-sm text-gray-600">
                                Acconsento al trattamento dei dati personali secondo la 
                                <a href="/privacy" class="text-brand-blue hover:underline">privacy policy</a> *
                            </span>
                        </label>
                    </div>

                    <!-- Newsletter -->
                    <div>
                        <label class="flex items-start">
                            <input type="checkbox" 
                                   name="newsletter" 
                                   class="mt-1 mr-3 w-4 h-4 text-brand-blue border-gray-300 rounded focus:ring-brand-blue">
                            <span class="text-sm text-gray-600">
                                Desidero ricevere aggiornamenti e novità via email
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center font-semibold rounded-lg bg-brand-green hover:bg-brand-green/90 text-white text-lg px-8 py-4 transition-all duration-300 hover:-translate-y-1 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                        Invia Richiesta
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Informazioni di Contatto</h2>
                
                <div class="space-y-8">
                    <!-- Phone -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Telefono</h3>
                            <p class="text-gray-600">+39 348 0123456</p>
                            <p class="text-sm text-gray-500">Lun-Ven: 9:00-18:00</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 4.26a2 2 0 001.78 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Email</h3>
                            <p class="text-gray-600">info@marcosottana.it</p>
                            <p class="text-sm text-gray-500">Risposta entro 24 ore</p>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Sede Operativa</h3>
                            <p class="text-gray-600">Via Roma 123</p>
                            <p class="text-gray-600">20100 Milano (MI)</p>
                            <p class="text-sm text-gray-500">Su appuntamento</p>
                        </div>
                    </div>

                    <!-- Emergency -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Emergenze</h3>
                            <p class="text-gray-600">+39 333 9876543</p>
                            <p class="text-sm text-gray-500">Solo per urgenze radiologiche</p>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="mt-12 p-6 bg-gray-50 rounded-lg">
                    <h3 class="font-bold text-gray-900 mb-4">Orari di Lavoro</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Lunedì - Venerdì</span>
                            <span class="font-medium text-gray-900">9:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sabato</span>
                            <span class="font-medium text-gray-900">9:00 - 12:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Domenica</span>
                            <span class="font-medium text-gray-900">Chiuso</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]![endif]-->            <!--[if BLOCK]![endif]-->            <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Alternative di Contatto</h2>
            <p class="text-xl text-gray-600 mb-8">Scegli la modalità preferita per entrare in contatto</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-16 h-16 bg-brand-green rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">WhatsApp</h3>
                    <p class="text-gray-600 mb-4">Risposta immediata</p>
                    <a href="https://wa.me/393480123456" 
                       target="_blank"
                       class="inline-flex items-center text-brand-green font-semibold hover:underline">
                        Scrivi su WhatsApp
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-16 h-16 bg-brand-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Videochiamata</h3>
                    <p class="text-gray-600 mb-4">Consulenza online</p>
                    <a href="/video-consulenza" 
                       class="inline-flex items-center text-brand-blue font-semibold hover:underline">
                        Prenota Ora
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-16 h-16 bg-brand-orange rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Sopralluogo</h3>
                    <p class="text-gray-600 mb-4">Visita in sede</p>
                    <a href="/sopralluogo" 
                       class="inline-flex items-center text-brand-orange font-semibold hover:underline">
                        Richiedi Visita
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]![endif]-->    <!--[if ENDBLOCK]![endif]--></div>    </div>
@endsection

@push('scripts')
<script>
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Simple form validation
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    // Basic validation
    if (!data.name || !data.email || !data.phone || !data.service || !data.sector) {
        alert('Per favore compila tutti i campi obbligatori.');
        return;
    }
    
    if (!data.privacy) {
        alert('È necessario accettare la privacy policy.');
        return;
    }
    
    // Submit via fetch or redirect
    this.submit();
});
</script>
@endpush