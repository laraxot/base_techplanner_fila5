@props([
    'title' => __('pub_theme::blocks.newsletter.blog.title'),
    'description' => __('pub_theme::blocks.newsletter.blog.description'),
    'cta_label' => __('pub_theme::blocks.newsletter.blog.cta_label'),
])

@php
    $ctaLabel = $cta_label;
@endphp

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            @if(!empty($title))
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            @endif
            
            @if(!empty($description))
                <p class="text-lg text-gray-600 mb-8">{{ $description }}</p>
            @endif
            
            <form class="flex flex-col sm:flex-row gap-4" method="POST" action="/newsletter/subscribe">
                @csrf
                <input 
                    type="email" 
                    name="email" 
                    placeholder="{{ __('pub_theme::blocks.newsletter.blog.email_placeholder') }}" 
                    required
                    class="flex-1 px-6 py-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                >
                <button 
                    type="submit"
                    class="px-8 py-4 bg-brand-blue hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-lg hover:shadow-xl"
                >
                    {{ $ctaLabel }}
                </button>
            </form>
            
            <p class="mt-4 text-sm text-gray-500">
                {{ __('pub_theme::blocks.newsletter.blog.privacy_note') }}
            </p>
        </div>
    </div>
</section>
