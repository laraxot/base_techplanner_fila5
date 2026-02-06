@props([
    'title' => '',
    'subtitle' => '',
    'description' => '',
    'backgroundImage' => '',
    'ctaPrimary' => ['label' => '', 'url' => '', 'style' => 'primary'],
    'ctaSecondary' => ['label' => '', 'url' => '', 'style' => 'secondary'],
])

<div class="hero min-h-screen relative overflow-hidden" 
    @if($backgroundImage)
    style="background-image: url('{{ $backgroundImage }}');"
    @else
    style="background-image: url('https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp');"
    @endif
>
    <div class="hero-overlay bg-opacity-60 bg-slate-900/40"></div>
    
    {{-- Decorative background elements for "Visual Excellence" --}}
    <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>

    <div class="hero-content text-center text-neutral-content relative z-10">
        <div class="max-w-4xl glass-panel p-8 md:p-12 rounded-3xl shadow-2xl transition-all duration-500 hover:shadow-primary/20">
            @if($title)
                <h1 class="mb-6 text-5xl md:text-7xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white via-primary-content to-white drop-shadow-sm">
                    {{ $title }}
                </h1>
            @endif
            
            @if($subtitle)
                <p class="mb-6 text-2xl md:text-3xl font-medium text-white/90 drop-shadow">
                    {{ $subtitle }}
                </p>
            @endif
            
            @if($description)
                <p class="mb-10 text-lg md:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed">
                    {{ $description }}
                </p>
            @endif
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @if($ctaPrimary['label'] ?? null)
                    <a href="{{ $ctaPrimary['url'] }}" 
                       class="btn btn-primary btn-lg shadow-lg hover:shadow-primary/50 transition-all duration-300 hover:scale-105 active:scale-95 min-w-[200px]">
                        {{ $ctaPrimary['label'] }}
                    </a>
                @endif
                
                @if($ctaSecondary['label'] ?? null)
                    <a href="{{ $ctaSecondary['url'] }}" 
                       class="btn btn-outline btn-lg text-white hover:bg-white hover:text-primary transition-all duration-300 min-w-[200px]">
                        {{ $ctaSecondary['label'] }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>