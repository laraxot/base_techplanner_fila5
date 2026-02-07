@php
use function Laravel\Folio\{name, middleware};

name('faq');
?>

@extends('layouts.base')

@section('title', 'FAQ - Domande Frequenti - Marco Sottana')
@section('description', 'Domande frequenti su radioprotezione, sicurezza radiologica, controlli e conformità normativa per studi dentistici e veterinari')

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
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Domande Frequenti</h1>
            <p class="text-xl text-gray-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                Risposte chiare alle domande più comuni su radioprotezione e sicurezza radiologica
            </p>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->            <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">FAQ - Radioprotezione</h2>
                <p class="text-xl text-gray-600">Le risposte che cerchi sulla sicurezza radiologica</p>
            </div>

            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between bg-gray-50 hover:bg-gray-100 transition-colors" 
                            onclick="this.parentElement.classList.toggle('open')">
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 01-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1.17a3.001 3.001 0 01-2-2.83A3 3 0 017 8a3 3 0 01.867 2.5 1 1 0 101.731 1A3 3 0 019 12a3 3 0 01-.867-2.5 1 1 0 101.731-1A3 3 0 0111 8a3 3 0 01-2 2.83z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Cosa è la radioprotezione e perché è importante?</h3>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-white hidden">
                        <p class="text-gray-600 leading-relaxed">
                            La radioprotezione è l'insieme delle misure di sicurezza volte a proteggere le persone dalle radiazioni ionizzanti. È fondamentale perché previene danni alla salute, garantisce la conformità legale e assicura un ambiente di lavoro sicuro per pazienti e operatori.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between bg-gray-50 hover:bg-gray-100 transition-colors" 
                            onclick="this.parentElement.classList.toggle('open')">
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 bg-brand-green rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Quanto spesso devono essere effettuati i controlli?</h3>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-white hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Secondo il D.Lgs 101/2020, i controlli di radioprotezione devono essere effettuati:
                            <br><br>
                            • <strong>Controlli di costanza:</strong> Annuali per apparecchiature fisse<br>
                            • <strong>Controlli straordinari:</strong> Dopo manutenzione o modifiche<br>
                            • <strong>Dosimetria:</strong> Monitoraggio continuo del personale esposto<br>
                            • <strong>Verifiche schermature:</strong> Ogni 2 anni o dopo modifiche strutturali
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between bg-gray-50 hover:bg-gray-100 transition-colors" 
                            onclick="this.parentElement.classList.toggle('open')">
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 bg-brand-orange rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm3 5a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm0 3a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Quali documenti sono obbligatori per uno studio?</h3>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-white hidden">
                        <p class="text-gray-600 leading-relaxed">
                            La documentazione obbligatoria include:
                            <br><br>
                            • <strong>Registro macchine:</strong> Elenco completo delle apparecchiature<br>
                            • <strong>Nomina esperto qualificato:</strong> Documento ufficiale<br>
                            • <strong>Relazioni tecniche:</strong> Risultati dei controlli periodici<br>
                            • <strong>Schede dosimetriche:</strong> Monitoraggio esposizione personale<br>
                            • <strong>Piano sicurezza:</strong> Procedure operative e emergenze<br>
                            • <strong>Comunicazioni ARPA:</strong> Reportistica obbligatoria
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between bg-gray-50 hover:bg-gray-100 transition-colors" 
                            onclick="this.parentElement.classList.toggle('open')">
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Differenze tra radioprotezione odontoiatrica e veterinaria?</h3>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-white hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Le principali differenze riguardano:
                            <br><br>
                            • <strong>Apparecchiature:</strong> I veterinari usano spesso sistemi più potenti<br>
                            • <strong>Contenimento animali:</strong> Procedure specifiche per immobilizzazione<br>
                            • <strong>Schermature:</strong> Barriere più robuste necessarie<br>
                            • <strong>Procedura:</strong> Protocolli di biosicurezza aggiuntivi<br>
                            • <strong>Formazione:</strong> Competenze specifiche per radiologia veterinaria
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between bg-gray-50 hover:bg-gray-100 transition-colors" 
                            onclick="this.parentElement.classList.toggle('open')">
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Cosa succede in caso di ispezione?</h3>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-white hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Durante un'ispezione:
                            <br><br>
                            • I verificatori controllano documentazione e apparecchiature<br>
                            • Verificano conformità schermature e DPI<br>
                            • Controllano registro dosimetrico<br>
                            • Eventuali non conformità richiedono piano di adeguamento<br>
                            • È fondamentale avere tutta la documentazione in ordine e aggiornata
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between bg-gray-50 hover:bg-gray-100 transition-colors" 
                            onclick="this.parentElement.classList.toggle('open')">
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267.65-.130 1.323-.308 2.014-.538.69-.23 1.329-.531 1.904-.902a1 1 0 111.018 1.716c-.647.383-1.36.682-2.121.936-.55.179-1.112.337-1.668.476-.405.115-.83.22-1.252.349a1 1 0 11-.6-1.909c.476-.15.945-.277 1.407-.399.311-.074.618-.134.906-.221a23.862 23.862 0 00.985-.47 24.103 24.103 0 004.9-3.156 1 1 0 10-1.334-1.49 22.142 22.142 0 01-4.511 2.923c-.148.099-.317.208-.488.31a1 1 0 10-1.018 1.717c.334-.22.656-.453.967-.686.237-.15.498-.306.761-.46.605-.337 1.177-.683 1.714-1.018a1 1 0 111.018 1.716c-.465.275-.935.533-1.383.78-.341.183-.68.36-1.011.533l-.002.001c-.294.155-.59.313-.886.474-.291.158-.591.318-.897.477a1 1 0 10-.916-1.773c.274-.141.55-.282.818-.417.273-.138.546-.277.815-.42.58-.31 1.15-.642 1.709-.963a1 1 0 101.018 1.717 41.053 41.053 0 01-2.21 1.228c-.238.123-.482.248-.732.373a1 1 0 10-.916 1.773 43.621 43.621 0 003.057-1.476c.218-.13.44-.257.665-.383.244-.138.491-.277.738-.416a1 1 0 101.018-1.717c-.194.108-.389.219-.583.328l-.001.001c-.225.117-.449.235-.671.351a1 1 0 101.018 1.717 40.13 40.13 0 00-1.078-.528z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Quali sono le sanzioni per non conformità?</h3>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-white hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Le sanzioni possono includere:
                            <br><br>
                            • <strong>Multe amministrative:</strong> Da €1.000 a €50.000<br>
                            • <strong>Sospensione attività:</strong> Fino a regolarizzazione<br>
                            • <strong>Provvedimenti penali:</strong> In casi di grave pericolo<br>
                            • <strong>Sequestro apparecchiature:</strong> Se non conformi<br>
                            <br>
                            È fondamentale mantenere la conformità per evitare sanzioni e garantire la sicurezza.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]![endif]-->            <!--[if BLOCK]![endif]-->            <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Non Hai Trovato la Risposta Che Cerchi?</h2>
            <p class="text-xl text-gray-600 mb-8">Contattaci direttamente per una consulenza personalizzata</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/it/contatti"
                   class="inline-flex items-center justify-center font-semibold rounded-lg bg-brand-green hover:bg-brand-green/90 text-white text-lg px-8 py-4 group shadow-xl transition-all hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                    Parla con un Esperto
                </a>
                <a href="tel:+393480123456"
                   class="inline-flex items-center justify-center font-semibold rounded-lg bg-brand-blue text-white hover:bg-brand-blue/90 text-lg px-8 py-4 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    Chiama Subito
                </a>
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]![endif]-->    <!--[if ENDBLOCK]![endif]--></div>    </div>
@endsection

@push('styles')
<style>
.faq-item.open .faq-content {
    display: block;
}

.faq-item.open .faq-toggle svg {
    transform: rotate(180deg);
}

.faq-content {
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endpush