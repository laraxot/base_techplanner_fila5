@props([
    'title' => '',
    'description' => '',
    'features' => [],
])

<section class="py-24 bg-base-100 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            @if($title)
                <h2 class="text-4xl md:text-5xl font-extrabold text-base-content mb-6 tracking-tight">
                    {{ $title }}
                </h2>
            @endif
            
            @if($description)
                <p class="text-lg md:text-xl text-base-content/70 max-w-3xl mx-auto leading-relaxed">
                    {{ $description }}
                </p>
            @endif
            <div class="mt-4 flex justify-center">
                <div class="h-1.5 w-24 bg-primary rounded-full opacity-60"></div>
            </div>
        </div>
        
        @if($features && count($features) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($features as $feature)
                    <div class="card bg-base-200 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-base-300 group">
                        <div class="card-body p-10">
                            @if(isset($feature['icon']))
                                <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-primary group-hover:scale-110 transition-all duration-500">
                                    {{-- Support Heroicons or other icon libraries --}}
                                    @if(str_starts_with($feature['icon'], 'heroicon-'))
                                        {{-- Fallback logic for icons if real ones aren't available --}}
                                        <svg class="w-8 h-8 text-primary group-hover:text-primary-content transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7m0 0l-7-7m7 7H3"/>
                                        </svg>
                                    @else
                                        <i class="{{ $feature['icon'] }} text-3xl text-primary group-hover:text-primary-content transition-colors duration-500"></i>
                                    @endif
                                </div>
                            @endif
                            
                            @if(isset($feature['title']))
                                <h3 class="card-title text-2xl font-bold mb-4 group-hover:text-primary transition-colors duration-300">
                                    {{ $feature['title'] }}
                                </h3>
                            @endif
                            
                            @if(isset($feature['description']))
                                <p class="text-base-content/70 leading-relaxed mb-6">
                                    {{ $feature['description'] }}
                                </p>
                            @endif
                            
                            @if(isset($feature['url']))
                                <div class="card-actions justify-end mt-auto">
                                    <a href="{{ $feature['url'] }}" 
                                       class="btn btn-ghost btn-sm gap-2 hover:bg-primary/10 text-primary transition-all duration-300">
                                        Scopri di più
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
{{--
/**
 * Features Grid Block - Theme Two
 * Design minimalista con focus sulla leggibilità
 */
--}}

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(isset($title))
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-4">{{ $title }}</h2>
        @endif
        
        @if(isset($description))
            <p class="text-lg text-center text-gray-600 mb-12 max-w-2xl mx-auto">{{ $description }}</p>
        @endif

        @if(isset($features) && is_array($features))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($features as $feature)
                    <div class="text-center p-6 rounded-lg border border-gray-200 hover:border-gray-300 hover:shadow-md transition">
                        @if(isset($feature['icon']))
                            <div class="w-12 h-12 mx-auto mb-4 text-{{ $feature['color'] ?? 'blue' }}-600">
                                <x-dynamic-component :component="$feature['icon']" class="w-full h-full" />
                            </div>
                        @endif

                        @if(isset($feature['title']))
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $feature['title'] }}</h3>
                        @endif

                        @if(isset($feature['description']))
                            <p class="text-gray-600 mb-4">{{ $feature['description'] }}</p>
                        @endif

                        @if(isset($feature['url']))
                            <a href="{{ $feature['url'] }}" 
                               class="text-{{ $feature['color'] ?? 'blue' }}-600 hover:text-{{ $feature['color'] ?? 'blue' }}-700 font-medium">
                                Scopri di più →
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>




