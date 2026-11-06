@props([
    'title' => '',
    'content' => '',
])

{{-- Contenuto legale (HTML da CMS): il preflight Tailwind azzera h3/ul/p e il plugin typography non e' compilato,
     quindi gli elementi interni sono stilizzati qui, con ambito limitato a .legal-content. --}}
<style>
    .legal-content h3 { font-size: 1.25rem; font-weight: 700; color: #111827; margin: 2rem 0 0.75rem; }
    .legal-content p { margin: 0 0 1rem; }
    .legal-content ul { list-style: disc; padding-left: 1.5rem; margin: 0 0 1rem; }
    .legal-content ol { list-style: decimal; padding-left: 1.5rem; margin: 0 0 1rem; }
    .legal-content li { margin-bottom: 0.5rem; }
    .legal-content strong { font-weight: 600; color: #111827; }
    .legal-content a { color: var(--color-brand-blue); text-decoration: underline; overflow-wrap: anywhere; }
</style>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto min-w-0">
            @if(!empty($title))
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 break-words">{{ $title }}</h2>
            @endif

            <div class="legal-content text-gray-700 leading-relaxed break-words">{!! $content !!}</div>
        </div>
    </div>
</section>
