@props([
    'title' => '',
    'subtitle' => '',
    'testimonials' => [],
    'id' => 'testimonianze',
])

<section id="{{ $id }}" class="py-20 bg-gray-50 scroll-mt-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">{{ $subtitle }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($testimonials as $testimonial)
            <div class="relative bg-white rounded-xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                {{-- Quote icon --}}
                <div class="absolute top-6 right-8 text-[#2D8659]/20">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151C7.546 6.068 5.983 8.789 5.983 11h4v10H0z"/></svg>
                </div>

                {{-- Author info --}}
                <div class="flex items-center gap-4 mb-4">
                    @if(!empty($testimonial['avatar']))
                        <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] ?? '' }}"
                             class="w-14 h-14 rounded-full object-cover ring-2 ring-gray-100"
                             loading="lazy"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-[#1E5A96] to-[#2D8659] items-center justify-center text-white font-bold text-lg ring-2 ring-gray-100 hidden">
                            {{ isset($testimonial['name']) ? mb_substr($testimonial['name'], 0, 1) : '?' }}
                        </div>
                    @else
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-[#1E5A96] to-[#2D8659] flex items-center justify-center text-white font-bold text-lg ring-2 ring-gray-100">
                            {{ isset($testimonial['name']) ? mb_substr($testimonial['name'], 0, 1) : '?' }}
                        </div>
                    @endif
                    <div>
                        <div class="font-bold text-gray-900">{{ $testimonial['name'] ?? '' }}</div>
                        <div class="text-sm text-gray-500">{{ $testimonial['role'] ?? '' }}</div>
                        @if(!empty($testimonial['location']))
                            <div class="text-xs text-gray-400">{{ $testimonial['location'] }}</div>
                        @endif
                    </div>
                </div>

                {{-- Rating --}}
                @if(!empty($testimonial['rating']))
                    <div class="flex gap-0.5 mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                @endif

                {{-- Quote --}}
                <p class="text-gray-700 leading-relaxed italic mb-4">"{{ $testimonial['quote'] ?? $testimonial['content'] ?? '' }}"</p>

                {{-- Date --}}
                @if(!empty($testimonial['date']))
                    <div class="text-xs text-[#2D8659] mt-4">{{ $testimonial['date'] }}</div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>