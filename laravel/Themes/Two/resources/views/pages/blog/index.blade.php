<x-layouts.app>
    <div class="min-h-screen bg-gray-100">
        <div class="bg-white rounded-lg shadow-sm p-6">
            {{-- Search and Filters Section --}}
            <section class="py-8 bg-white border-b">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                        {{-- Main Search --}}
                        <div class="lg:col-span-3">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    value="{{ $search }}"
                                    placeholder="Cerca articoli per titolo, contenuto o argomento..."
                                    class="w-full px-6 py-4 pr-12 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-transparent"
                                >
                                <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            
                            @if($search)
                                <div class="mt-2 text-sm text-gray-600">
                                    Risultati per: <strong>"{{ $search }}"</strong>
                                </div>
                            @endif
                        </div>
                        
                        {{-- Quick Filters --}}
                        <div class="flex flex-wrap gap-2 items-center">
                            @if($selectedCategory || $search)
                                <a href="{{ route('pages.blog') }}" class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition-colors">
                                    Reset Filtri
                                </a>
                            @endif
                        </div>
                    </div>
                    
                    {{-- Filter Pills --}}
                    <div class="flex flex-wrap gap-4 mt-6">
                        {{-- Category Filter --}}
                        <div class="flex items-center gap-2">
                            <label class="text-sm font-medium text-gray-700">Categoria:</label>
                            <select onchange="window.location.href='?category='+this.value+'&search={{ $search }}'" class="px-3 py-1 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-blue">
                                <option value="">Tutte</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ $selectedCategory == $category->category_id ? 'selected' : '' }}>
                                        {{ $category->category?->name ?? 'Altro' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Results Summary --}}
            @if($posts->count() > 0)
                <div class="container mx-auto px-4 py-4">
                    <p class="text-gray-600">
                        Trovati {{ $posts->total() }} articoli
                        @if($selectedCategory) nella categoria "{{ $categories->where('category_id', $selectedCategory)->first()?->category?->name ?? 'Altro' }}"@endif
                    </p>
                </div>
            @endif

            {{-- Blog Grid --}}
            <section class="py-16 bg-white">
                <div class="container mx-auto px-4">
                    @if($posts->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($posts as $post)
                                <article class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                    {{-- Featured Image --}}
                                    @if($post->featured_image)
                                        <div class="aspect-w-16 aspect-h-9 overflow-hidden">
                                            <img 
                                                src="{{ $post->featured_image }}" 
                                                alt="{{ $post->title }}"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                                                loading="lazy"
                                            >
                                        </div>
                                    @endif
                                    
                                    <div class="p-6">
                                        {{-- Category Badge --}}
                                        @if($post->category)
                                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full mb-3">
                                                {{ $post->category->name }}
                                            </span>
                                        @endif
                                        
                                        {{-- Title --}}
                                        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                                            <a href="{{ url(app()->getLocale() . '/blog/' . $post->slug) }}" class="hover:text-brand-blue transition-colors">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        
                                        {{-- Excerpt --}}
                                        @if($post->excerpt)
                                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                                {{ $post->excerpt }}
                                            </p>
                                        @endif
                                        
                                        {{-- Meta --}}
                                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                            @if($post->published_at)
                                                <span>{{ $post->published_at->format('d M Y') }}</span>
                                            @endif
                                        </div>
                                        
                                        {{-- Tags --}}
                                        @if(isset($post->metadata['tags']) && is_array($post->metadata['tags']))
                                            <div class="flex flex-wrap gap-1">
                                                @foreach(array_slice($post->metadata['tags'], 0, 3) as $tag)
                                                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded">
                                                        #{{ $tag }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        
                        {{-- Pagination --}}
                        @if($posts->hasPages())
                            <div class="mt-12">
                                {{ $posts->links() }}
                            </div>
                        @endif
                    @else
                        {{-- No Results --}}
                        <div class="text-center py-16">
                            <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Nessun articolo trovato</h3>
                            <p class="text-gray-600 mb-6">
                                Prova a modificare i criteri di ricerca o i filtri applicati.
                            </p>
                            <a href="{{ route('pages.blog') }}" class="px-6 py-2 bg-brand-blue text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Resetta tutti i filtri
                            </a>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
</x-layouts.app>
