@php
declare(strict_types=1);

@props([
    'title' => __('pub_theme::blog.search_bar.title.title'),
    'subtitle' => __('pub_theme::blog.search_bar.subtitle.message'),
    'placeholder' => __('pub_theme::blog.search_bar.field.placeholder'),
    'show_advanced' => true,
    'show_suggestions' => true
])
?>

{{-- Blog Search Section --}}
<section class="py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>
        
        {{-- Search Form --}}
        <div class="max-w-4xl mx-auto">
            <form action="{{ route('blog') }}" method="GET" class="relative">
                <div class="flex items-center bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden focus-within:ring-4 focus-within:ring-blue-500/20 transition-all duration-300">
                    {{-- Search Icon --}}
                    <div class="pl-6 pr-4">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    
                    {{-- Search Input --}}
                    <label for="blog-search-input" class="sr-only">{{ __('pub_theme::blog.search_bar.field.label') }}</label>
                    <input type="text" 
                           id="blog-search-input"
                           name="q" 
                           placeholder="{{ $placeholder }}" 
                           autocomplete="off"
                           aria-label="{{ __('pub_theme::blog.search_bar.field_description.label') }}"
                           class="flex-1 py-5 px-4 text-lg text-gray-700 bg-transparent border-none focus:outline-none focus:ring-0 placeholder-gray-400"
                           x-model="searchQuery"
                           @keydown.enter.prevent="search">
                    
                    {{-- Search Button --}}
                    <button type="submit" 
                            aria-label="{{ __('pub_theme::blog.search_bar.submit_description.label') }}"
                            class="px-8 py-5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('pub_theme::common.actions.search.label') }}
                    </button>
                </div>
            </form>
            
            {{-- Advanced Filters Toggle --}}
            @if($show_advanced)
                <button @click="showAdvanced = !showAdvanced" 
                        aria-label="{{ __('pub_theme::blog.search_bar.toggle_description.label') }}"
                        aria-expanded="false"
                        :aria-expanded="showAdvanced.toString()"
                        class="mt-4 text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center mx-auto transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-md px-2 py-1">
                    <span>{{ __('pub_theme::blog.search_bar.toggle.label') }}</span>
                    <svg class="w-5 h-5 ml-2 transform transition-transform duration-200" 
                         :class="{ 'rotate-180': showAdvanced }" 
                         fill="none" 
                         stroke="currentColor" 
                         viewBox="0 0 24 24"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                
                {{-- Advanced Filters Panel --}}
                <div x-show="showAdvanced" 
                     x-collapse
                     class="mt-6 bg-white rounded-xl shadow-lg border border-gray-200 p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Date Range --}}
                        <div>
                            <label for="blog-search-date" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('pub_theme::blog.search_bar_date.field.label') }}</label>
                            <select id="blog-search-date" 
                                    name="date"
                                    autocomplete="off"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent">
                                <option value="">{{ __('pub_theme::blog.search_bar_date.all.label') }}</option>
                                <option value="7days">{{ __('pub_theme::blog.search_bar_date.days_7.label') }}</option>
                                <option value="30days">{{ __('pub_theme::blog.search_bar_date.days_30.label') }}</option>
                                <option value="90days">{{ __('pub_theme::blog.search_bar_date.months_3.label') }}</option>
                                <option value="1year">{{ __('pub_theme::blog.search_bar_date.year_1.label') }}</option>
                            </select>
                        </div>
                        
                        {{-- Category --}}
                        <div>
                            <label for="blog-search-category" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('pub_theme::common.filters.category.label') }}</label>
                            <select id="blog-search-category" 
                                    name="category"
                                    autocomplete="off"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent">
                                <option value="">{{ __('pub_theme::common.filters.all_categories.label') }}</option>
                                <option value="radioprotezione">{{ __('pub_theme::blog.categories.radioprotection.label') }}</option>
                                <option value="normativa">{{ __('pub_theme::blog.categories.regulations.label') }}</option>
                                <option value="elettromedicali">{{ __('pub_theme::blog.categories.electromedical.label') }}</option>
                                <option value="guide">{{ __('pub_theme::blog.categories.guides.label') }}</option>
                                <option value="veterinaria">{{ __('pub_theme::blog.categories.veterinary.label') }}</option>
                                <option value="novita">{{ __('pub_theme::blog.categories.news.label') }}</option>
                            </select>
                        </div>
                        
                        {{-- Sort By --}}
                        <div>
                            <label for="blog-search-sort" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('pub_theme::blog.search_bar_sort.field.label') }}</label>
                            <select id="blog-search-sort" 
                                    name="sort"
                                    autocomplete="off"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent">
                                <option value="relevance">{{ __('pub_theme::blog.search_bar_sort.relevance.label') }}</option>
                                <option value="date-desc">{{ __('pub_theme::blog.search_bar_sort.newest.label') }}</option>
                                <option value="date-asc">{{ __('pub_theme::blog.search_bar_sort.oldest.label') }}</option>
                                <option value="popular">{{ __('pub_theme::common.sorting.popular.label') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<script>
    if (typeof Alpine !== 'undefined') {
        Alpine.data('search', () => ({
            searchQuery: '',
            showAdvanced: false,
            search() {
                // Form submission
            }
        }))
    }
</script>