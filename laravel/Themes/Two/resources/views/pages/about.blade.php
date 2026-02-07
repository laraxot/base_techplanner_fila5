@extends('layouts.app')

@section('title', 'Chi Siamo - Marco Sottana Consulenza Sicurezza')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-brand-blue to-brand-blue/90 text-white py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Chi Siamo</h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    Marco Sottana - Consulenza Sicurezza<br>
                    <span class="text-lg">Sicurezza e Igiene nei Tuoi Studi Professionali dal 2025</span>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#team" class="bg-white text-brand-blue px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Scopri il Team
                    </a>
                    <a href="/it/contacts" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-brand-blue transition-colors">
                        Contattaci
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-white py-12 border-b">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl font-bold text-brand-blue">10+</div>
                    <div class="text-gray-600">Anni di Esperienza</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-brand-green">100+</div>
                    <div class="text-gray-600">Studi Assistiti</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-brand-orange">500+</div>
                    <div class="text-gray-600">Controlli Effettuati</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-brand-blue">100%</div>
                    <div class="text-gray-600">Conformità Garantita</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <main>
        @foreach($page->content_blocks as $block)
            @if($block->type === 'content-split')
                <section class="py-20 bg-white">
                    <div class="container mx-auto px-4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div class="@if($block->data->reverse) lg:order-2 @endif">
                                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                                    {{ $block->data->title }}
                                </h2>
                                <div class="prose prose-lg text-gray-600">
                                    {!! $block->data->content !!}
                                </div>
                            </div>
                            <div class="@if($block->data->reverse) lg:order-1 @endif">
                                <img src="{{ $block->data->image }}" 
                                     alt="{{ $block->data->title }}" 
                                     class="rounded-lg shadow-lg w-full h-auto object-cover">
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if($block->type === 'values')
                <section class="py-20 bg-gray-50">
                    <div class="container mx-auto px-4">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                {{ $block->data->title }}
                            </h2>
                            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                                {{ $block->data->subtitle }}
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($block->data->services as $service)
                            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                <div class="w-12 h-12 bg-brand-blue/10 rounded-lg flex items-center justify-center mb-6">
                                    {!! $service->icon !!}
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                                    {{ $service->title }}
                                </h3>
                                <p class="text-gray-600">
                                    {{ $service->description }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            @if($block->type === 'team')
                <section id="team" class="py-20 bg-white">
                    <div class="container mx-auto px-4">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                {{ $block->data->title }}
                            </h2>
                            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                                {{ $block->data->subtitle }}
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($block->data->members as $member)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                <img src="{{ $member->image }}" 
                                     alt="{{ $member->name }}" 
                                     class="w-full h-64 object-cover">
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                        {{ $member->name }}
                                    </h3>
                                    <p class="text-brand-blue font-medium mb-3">
                                        {{ $member->role }}
                                    </p>
                                    <p class="text-gray-600 text-sm mb-4">
                                        {{ $member->description }}
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($member->certifications as $cert)
                                        <span class="bg-brand-blue/10 text-brand-blue px-3 py-1 rounded-full text-xs font-medium">
                                            {{ $cert }}
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            @if($block->type === 'company-data')
                <section class="py-20 bg-gray-50">
                    <div class="container mx-auto px-4">
                        <div class="max-w-4xl mx-auto">
                            <div class="text-center mb-16">
                                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                    {{ $block->data->title }}
                                </h2>
                                <p class="text-xl text-gray-600">
                                    {{ $block->data->subtitle }}
                                </p>
                            </div>
                            <div class="bg-white rounded-lg shadow-md p-8">
                                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach($block->data->fields as $field)
                                    <div class="flex justify-between border-b border-gray-200 pb-2">
                                        <dt class="font-medium text-gray-900">{{ $field->label }}</dt>
                                        <dd class="text-gray-600">{{ $field->value }}</dd>
                                    </div>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if($block->type === 'benefits')
                <section class="py-20 bg-white">
                    <div class="container mx-auto px-4">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                {{ $block->data->title }}
                            </h2>
                            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                                {{ $block->data->subtitle }}
                            </p>
                        </div>
                        <div class="space-y-12">
                            @foreach($block->data->benefits as $benefit)
                            <div class="bg-gray-50 rounded-lg p-8 hover:shadow-md transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0">
                                        {!! $benefit->icon !!}
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                            {{ $benefit->title }}
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            {{ $benefit->description }}
                                        </p>
                                        @if(isset($benefit->features))
                                        <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                                            @foreach($benefit->features as $feature)
                                            <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if(isset($block->data->cta))
                        <div class="text-center mt-12">
                            <a href="{{ $block->data->cta->url }}" 
                               class="bg-brand-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-brand-blue/90 transition-colors">
                                {{ $block->data->cta->label }}
                            </a>
                        </div>
                        @endif
                    </div>
                </section>
            @endif
        @endforeach
    </main>
</div>
@endsection