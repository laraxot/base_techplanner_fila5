@php
use function Laravel\Folio\{name, middleware};

name('services');
?>

@extends('layouts.base')

@section('title', 'Servizi di Radioprotezione - Marco Sottana')
@section('description', 'Servizi completi di radioprotezione e sicurezza radiologica per studi dentistici e veterinari: controlli, documentazione, conformità normativa')

@section('content')
<div>
    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <section class="relative h-96 flex items-center justify-center overflow-hidden">
    
    <div class="absolute inset-0 z-0 bg-gradient-to-br from-brand-blue via-brand-blue/90 to-black">
        <div class="absolute inset-0 bg-[radial-gradient(rgba(255,255,255,0.05)_1px,transparent_1px)] [background-size:24px_24px] opacity-30"></div>
        <!--[if BLOCK]><![endif]-->            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-40 mix-blend-overlay"
                 style="background-image: url('/themes/Two/resources/images/hero-bg.jpg');"></div>
        <!--[if ENDBLOCK]><![endif]-->    </div>

    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">I Nostri Servizi</h1>
            <p class="text-xl text-gray-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                Soluzioni complete per la sicurezza radiologica e conformità normativa nel settore odontoiatrico e veterinario
            </p>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->            <section id="servizi" class="py-20 bg-white scroll-mt-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">I Nostri Servizi</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Soluzioni complete per la sicurezza radiologica</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!--[if BLOCK]><![endif]-->                        <div class="group bg-white border border-gray-100 border-t-brand-blue border-t-4 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                
                <!--[if BLOCK]><![endif]-->                <div class="w-full h-48 bg-brand-blue/10 flex items-center justify-center">
                    <!--[if BLOCK]><![endif]-->                        <svg class="w-16 h-16 text-brand-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
</svg>                    <!--[if ENDBLOCK]><![endif]-->                </div>
                <!--[if ENDBLOCK]><![endif]-->
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Controllo Radioprotezione</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Verifiche periodiche e straordinarie per apparecchiature radiologiche in ambito odontoiatrico e veterinario. Garanzia di conformità al D.Lgs 101/2020.</p>

                    <ul class="space-y-3 mb-6 text-sm text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Controlli di accettazione e costanza
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Verifica schermature e barriere protettive
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Monitoraggio dosimetria personale
                        </li>
                    </ul>

                    <a href="/it/contatti?service=radioprotezione"
                       class="inline-flex items-center text-brand-blue font-semibold text-sm hover:underline group-hover:translate-x-1 transform transition-all duration-300">
                        Richiedi Info
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
                                    <div class="group bg-white border border-gray-100 border-t-brand-green border-t-4 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                
                <!--[if BLOCK]><![endif]-->                <div class="w-full h-48 bg-brand-green/10 flex items-center justify-center">
                    <!--[if BLOCK]><![endif]-->                        <svg class="w-16 h-16 text-brand-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 1 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z"/>
</svg>                    <!--[if ENDBLOCK]><![endif]-->                </div>
                <!--[if ENDBLOCK]><![endif]-->
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Controllo Elettromedicali</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Manutenzione preventiva e verifiche di sicurezza elettrica su tutti i dispositivi medici (IEC 62353), assicurando funzionalità e sicurezza per pazienti e operatori.</p>

                    <ul class="space-y-3 mb-6 text-sm text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Verifiche di sicurezza elettrica IEC 62353
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Manutenzione preventiva programmata
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Certificazione conformità CE
                        </li>
                    </ul>

                    <a href="/it/contatti?service=elettromedicali"
                       class="inline-flex items-center text-brand-green font-semibold text-sm hover:underline group-hover:translate-x-1 transform transition-all duration-300">
                        Richiedi Info
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
                                    <div class="group bg-white border border-gray-100 border-t-brand-orange border-t-4 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                
                <!--[if BLOCK]><![endif]-->                <div class="w-full h-48 bg-brand-orange/10 flex items-center justify-center">
                    <!--[if BLOCK]><![endif]-->                        <svg class="w-16 h-16 text-brand-orange" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z"/>
</svg>                    <!--[if ENDBLOCK]><![endif]-->                </div>
                <!--[if ENDBLOCK]<![endif]-->
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Documentazione e Conformità</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Gestione completa della documentazione obbligatoria: registri di controllo, nomine esperti qualificati, relazioni tecniche e comunicazioni agli organi competenti.</p>

                    <ul class="space-y-3 mb-6 text-sm text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Registro macchine e apparecchiature
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Nomine esperti qualificati
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-brand-green mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Relazioni tecniche e comunicazioni ARPA
                        </li>
                    </ul>

                    <a href="/it/contatti?service=documentazione"
                       class="inline-flex items-center text-brand-orange font-semibold text-sm hover:underline group-hover:translate-x-1 transform transition-all duration-300">
                        Richiedi Info
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            <!--[if ENDBLOCK]><![endif]-->        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->            <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Perché Scegliere I Nostri Servizi</h2>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Offriamo un approccio completo alla sicurezza radiologica, combinando competenza tecnica, conoscenza normativa e attenzione alle specifiche esigenze del tuo settore.
                </p>
                
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-brand-blue rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Esperienza Decennale</h3>
                            <p class="text-gray-600">15+ anni di esperienza specifica nel settore della radioprotezione per studi dentistici e veterinari.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-brand-green rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Certificazioni Ufficiali</h3>
                            <p class="text-gray-600">Esperto qualificato certificato IFS/INAIL, regolarmente iscritto all'albo dei tecnici di radioprotezione.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-brand-orange rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Interventi Tempestivi</h3>
                            <p class="text-gray-600">Servizi rapidi e flessibili, programmati secondo le tue necessità senza interrompere l'attività.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <img src="/themes/Two/resources/images/services-professional.jpg" 
                     alt="Servizi professionali radioprotezione" 
                     class="rounded-2xl shadow-lg w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->            <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Hai Bisogno di una Consulenza Personalizzata?</h2>
            <p class="text-xl text-gray-600 mb-8">Contattaci per analizzare le tue esigenze specifiche e ricevere un preventivo dettagliato</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/it/contatti"
                   class="inline-flex items-center justify-center font-semibold rounded-lg bg-brand-green hover:bg-brand-green/90 text-white text-lg px-8 py-4 group shadow-xl transition-all hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                    Richiedi Preventivo
                </a>
                <a href="tel:+393480123456"
                   class="inline-flex items-center justify-center font-semibold rounded-lg bg-brand-blue text-white hover:bg-brand-blue/90 text-lg px-8 py-4 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    Chiama Ora
                </a>
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]![endif]-->    <!--[if ENDBLOCK]![endif]--></div>    </div>
@endsection