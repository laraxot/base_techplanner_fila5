<?php
/*
# Piano di Implementazione Miglioramenti Conversione

**Basato su:** Report di Analisi Conversione  
**Tema:** Two - Laravel/Folio  
**Periodo Implementazione:** Febbraio - Aprile 2026  

---

## 1. IMPLEMENTAZIONE IMMEDIATA (2 Settimane)

### 1.1 Creazione Pagine Mancanti

#### **Comandi Folio da Eseguire**
```bash
# Creazione pagine base
php artisan folio:page "chi-siamo"
php artisan folio:page "servizi"
php artisan folio:page "faq"
php artisan folio:page "contatti"

# Con nome route per navigazione
php artisan folio:page "chi-siamo" --name="about"
php artisan folio:page "servizi" --name="services"
php artisan folio:page "faq" --name="faq"
php artisan folio:page "contatti" --name="contact"
```

#### **Struttura File da Creare**
```
resources/views/pages/
├── chi-siamo.blade.php
├── servizi.blade.php
├── faq.blade.php
└── contatti.blade.php

resources/views/components/blocks/
├── hero/
│   ├── about.blade.php
│   ├── services.blade.php
│   ├── faq.blade.php
│   └── contact.blade.php
└── content/
    ├── about-section.blade.php
    ├── services-grid.blade.php
    ├── faq-accordion.blade.php
    └── contact-form.blade.php
```

### 1.2 Componente Hero About Page
<tool_call>write
<arg_key>content</arg_key>
<arg_value>@php
*/
use function Laravel\Folio\{name, middleware};

name('about');
?>

@extends('layouts.base')

@section('title', 'Chi Siamo - Marco Sottana')
@section('description', 'Scopri chi è Marco Sottana, esperto qualificato in radioprotezione e sicurezza radiologica per studi dentistici e veterinari')

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
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Chi Siamo</h1>
            <p class="text-xl text-gray-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                Esperti qualificati in radioprotezione e sicurezza radiologica, dedicati a garantire la conformità normativa e la sicurezza del tuo studio.
            </p>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->            <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">La Nostra Missione</h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Con oltre 15 anni di esperienza nel campo della radioprotezione, aiutiamo studi dentistici e veterinari a operare in piena sicurezza e conformità con le normative vigenti.
                </p>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Il nostro approccio combina competenza tecnica, attenzione al dettaglio e comprensione delle esigenze specifiche di ogni settore, fornendo soluzioni personalizzate e servizi di consulenza di alto livello.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-brand-green rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Certificazione IFS/INAIL</h3>
                            <p class="text-gray-600">Esperto qualificato certificato per radioprotezione</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-brand-blue rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Aggiornamento Costante</h3>
                            <p class="text-gray-600">Formazione continua su normative D.Lgs 101/2020</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Approccio Personalizzato</h3>
                            <p class="text-gray-600">Soluzioni su misura per ogni tipo di studio</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <img src="/themes/Two/resources/images/team-professional.jpg" 
                     alt="Team professionale radioprotezione" 
                     class="rounded-2xl shadow-lg w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->            <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">I Nostri Valori</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Principi che guidano ogni nostro intervento</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-brand-blue rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Sicurezza</h3>
                <p class="text-gray-600">Protezione totale per pazienti, operatori e ambiente attraverso protocolli rigorosi e verifiche sistematiche.</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-brand-green rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Competenza</h3>
                <p class="text-gray-600">Conoscenza approfondita della normativa e delle tecnologie radiologiche per interventi precisi ed efficaci.</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-brand-orange rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Puntualità</h3>
                <p class="text-gray-600">Rispetto dei tempi programmati e consegna nei termini previsti per non interrompere l'attività dello studio.</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Affidabilità</h3>
                <p class="text-gray-600">Supporto continuo e disponibilità per qualsiasi necessità tecnica o normativa durante tutto l'anno.</p>
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->            <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Pronto a Garantire la Massima Sicurezza al Tuo Studio?</h2>
            <p class="text-xl text-gray-600 mb-8">Contattaci per una consulenza personalizzata e scopri come possiamo aiutarti</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/it/contatti"
                   class="inline-flex items-center justify-center font-semibold rounded-lg bg-brand-green hover:bg-brand-green/90 text-white text-lg px-8 py-4 group shadow-xl transition-all hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                    Richiedi Consulenza
                </a>
                <a href="/it/servizi"
                   class="inline-flex items-center justify-center font-semibold rounded-lg bg-white text-brand-blue hover:bg-brand-blue hover:text-white border-2 border-brand-blue text-lg px-8 py-4 transition-all">
                    Scopri i Servizi
                </a>
            </div>
        </div>
    </div>
</section>
        <!--[if ENDBLOCK]><![endif]-->    <!--[if ENDBLOCK]><![endif]--></div>    </div>
@endsection