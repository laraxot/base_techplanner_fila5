@extends('layouts.app')

@section('title', 'Servizi - Marco Sottana Consulenza Sicurezza')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-brand-blue to-brand-blue/90 text-white py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">I Nostri Servizi</h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    Controllo radioprotezione, elettromedicali e documentazione<br>
                    <span class="text-lg">per studi dentistici e veterinari secondo D.Lgs 101/2020</span>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#radioprotezione" class="bg-white text-brand-blue px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Scopri Dettagli
                    </a>
                    <a href="/it/contacts" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-brand-blue transition-colors">
                        Richiedi Consulenza
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Services Grid -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Servizi Principali
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Le nostre aree di competenza specializzata
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($page->content_blocks[0]->data->services as $service)
                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 group">
                    <div class="w-16 h-16 bg-brand-blue/10 rounded-lg flex items-center justify-center mb-6 group-hover:bg-brand-blue/20 transition-colors">
                        <svg class="w-8 h-8 text-brand-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            @if($service->icon === 'shield-alert')
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3L8.58 7c.77 1.333 2.694 1.333 3.464 0l1.732-3L13.732 4c-.77 1.333-2.694 1.333-3.464 0L3.34 16z"/>
                            @elseif($service->icon === 'wrench')
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826l2.37 2.37a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826l2.37 2.37a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826l2.37 2.37a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826l2.37 2.37zM17.25 10.698a2.625 2.625 0 0 0-2.625 2.625 0 0 0 0 5.25 0a2.625 2.625 0 0 0 0-5.25 0zm-10.5 0a2.625 2.625 0 0 0-2.625 2.625 0 0 0 0 5.25 0a2.625 2.625 0 0 0 0-5.25 0z"/>
                            @elseif($service->icon === 'file-check')
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H8a2 2 0 0 1 2-2v-6a2 2 0 0 1-2-2H4a2 2 0 0 1-2 2v6a2 2 0 0 1 2 2h2m7-5a2 2 0 0 1 2-2h2a2 2 0 0 1 2-2V4a2 2 0 0 1-2-2h-2a2 2 0 0 1-2 2v6a2 2 0 0 1 2 2h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2z"/>
                            @endif
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-brand-blue transition-colors">
                        {{ $service->title }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ $service->description }}
                    </p>
                    <a href="{{ $service->url }}" 
                       class="inline-flex items-center text-brand-blue font-medium hover:text-brand-blue/80 transition-colors">
                        Scopri Dettagli
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Service Details Sections -->
    @foreach($page->content_blocks as $block)
        @if($block->type === 'service-details')
            <section id="{{ $block->slug }}" class="py-20 bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ $block->data->image }}" 
                                 alt="{{ $block->data->title }}" 
                                 class="w-full h-64 object-cover">
                            <div class="p-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                                    {{ $block->data->title }}
                                </h2>
                                <p class="text-lg text-gray-600 mb-6">
                                    {{ $block->data->description }}
                                </p>
                                
                                @if(isset($block->data->details))
                                <div class="space-y-8">
                                    @foreach($block->data->details as $detail)
                                    <div class="border-l-4 border-brand-blue pl-6">
                                        <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                            {{ $detail->title }}
                                        </h3>
                                        <ul class="space-y-2">
                                            @foreach($detail->items as $item)
                                            <li class="text-gray-600">{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                                @endif

                                @if(isset($block->data->checklist))
                                <div class="bg-gray-50 rounded-lg p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Checklist del Controllo</h3>
                                    <ul class="space-y-2">
                                        @foreach($block->data->checklist as $item)
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 4M5 13l4 4m0-8L9 4l4-4"/>
                                            </svg>
                                            <span class="text-gray-700">{{ $item }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="flex items-center justify-between bg-gray-100 px-6 py-4 rounded-b-lg">
                                    <div>
                                        <span class="text-sm text-gray-600">Frequenza:</span>
                                        <span class="font-medium text-gray-900">{{ $block->data->frequency }}</span>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-600">Durata:</span>
                                        <span class="font-medium text-gray-900">{{ $block->data->duration }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <!-- Specialization Sectors -->
    @if($page->content_blocks[2]->type === 'sectors')
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ $page->content_blocks[2]->data->title }}
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $page->content_blocks[2]->data->subtitle }}
                </p>
            </div>
            <div class="space-y-16">
                @foreach($page->content_blocks[2]->data->sectors as $sector)
                <div class="bg-gray-50 rounded-2xl overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                        <div class="p-8 lg:p-12">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">
                                {{ $sector->title }}
                            </h3>
                            <p class="text-gray-600 mb-6">
                                {{ $sector->subtitle }}
                            </p>
                            <div class="space-y-3">
                                @foreach($sector->focus_areas as $area)
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-brand-blue mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-gray-700">{{ $area }}</span>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-6">
                                <span class="inline-block bg-brand-blue/10 text-brand-blue px-3 py-1 rounded-full text-sm font-medium">
                                    Conformità: {{ $sector->compliance }}
                                </span>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="{{ $sector->image }}" 
                                 alt="{{ $sector->title }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    @if($page->content_blocks[3]->type === 'cta')
    <section class="py-20 bg-brand-blue text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    {{ $page->content_blocks[3]->data->title }}
                </h2>
                <p class="text-xl mb-8 text-blue-100">
                    {{ $page->content_blocks[3]->data->description }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ $page->content_blocks[3]->data->button_url }}" 
                       class="bg-white text-brand-blue px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        {{ $page->content_blocks[3]->data->button_text }}
                    </a>
                    @if(isset($page->content_blocks[3]->data->secondary_url))
                    <a href="{{ $page->content_blocks[3]->data->secondary_url }}" 
                       class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-brand-blue transition-colors">
                        {{ $page->content_blocks[3]->data->secondary_text }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Guide Download Section -->
    @if($page->content_blocks[4]->type === 'guide-download')
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="w-16 h-16 bg-brand-orange/10 rounded-lg flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 4h6m-6 4h6m2 5H8a2 2 0 0 1 2-2v-6a2 2 0 0 1-2-2H4a2 2 0 0 1-2 2v6a2 2 0 0 1 2 2h2m2 5H8a2 2 0 0 1 2-2v-6a2 2 0 0 1-2-2H4a2 2 0 0 1-2 2v6a2 2 0 0 1 2 2h2z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                        {{ $page->content_blocks[4]->data->title }}
                    </h2>
                    <p class="text-gray-600 mb-6">
                        {{ $page->content_blocks[4]->data->description }}
                    </p>
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <ul class="space-y-2 text-sm text-gray-600">
                            @foreach($page->content_blocks[4]->data->features as $feature)
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 4M5 13l4 4m0-8L9 4l4-4"/>
                                </svg>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ $page->content_blocks[4]->data->button_url }}" 
                       class="bg-brand-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-brand-orange/90 transition-colors inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 4h6m-6 4h6m2 5H8a2 2 0 0 1 2-2v-6a2 2 0 0 1 2-2H4a2 2 0 0 1-2 2v6a2 2 0 0 1 2 2h2z"/>
                        </svg>
                        {{ $page->content_blocks[4]->data->button_label }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Newsletter Section -->
    @if($page->content_blocks[5]->type === 'newsletter')
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <div class="bg-brand-blue rounded-lg p-8">
                    <h2 class="text-2xl font-bold text-white mb-4">
                        {{ $page->content_blocks[5]->data->title }}
                    </h2>
                    <p class="text-blue-100 mb-6">
                        {{ $page->content_blocks[5]->data->description }}
                    </p>
                    <form class="flex flex-col sm:flex-row gap-4">
                        <input type="email" 
                               placeholder="{{ $page->content_blocks[5]->data->placeholder }}" 
                               class="flex-1 px-4 py-2 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-brand-blue/50">
                        <button type="submit" 
                                class="bg-white text-brand-blue px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                            {{ $page->content_blocks[5]->data->button_label }}
                        </button>
                    </form>
                    <p class="text-blue-100 text-sm mt-4">
                        {{ $page->content_blocks[5]->data->privacy_text }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection