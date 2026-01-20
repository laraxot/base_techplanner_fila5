@props([
    'title' => '',
    'description' => '',
<<<<<<< HEAD
    'primary_cta_label' => '',
    'primary_cta_url' => '#',
    'background_color' => 'bg-brand-blue',
])

<div class="{{ $background_color }} py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            {{ $title }}
        </h2>
        <p class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
            {{ $description }}
        </p>
        <a href="{{ $primary_cta_url }}" 
           class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-lg text-white bg-brand-green hover:bg-green-700 transition-colors shadow-lg hover:shadow-xl">
            {{ $primary_cta_label }}
        </a>
    </div>
</div>
=======
    'button_text' => '',
    'button_url' => '#',
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900'
])

<div class="relative isolate overflow-hidden {{ $background_color }} py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight {{ $text_color }} sm:text-4xl">{{ $title }}</h2>
            <p class="mt-6 text-lg leading-8 {{ $text_color }}">{{ $description }}</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ $button_url }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ $button_text }}
                </a>
            </div>
        </div>
    </div>
</div>
>>>>>>> 4b6b99016 (first commit)
