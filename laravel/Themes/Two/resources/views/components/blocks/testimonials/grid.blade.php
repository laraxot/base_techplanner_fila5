@props([
    'title' => '',
    'subtitle' => '',
    'testimonials' => [],
])

<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($testimonials as $testimonial)
            <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                <!-- Avatar -->
                <div class="flex items-center mb-4">
                    <img src="{{ $testimonial['avatar'] }}"
                         alt="{{ $testimonial['name'] }}"
                         class="w-12 h-12 rounded-full object-cover mr-3"
                         loading="lazy">
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">
                            {{ $testimonial['name'] }}
                        </h4>
                        <p class="text-xs text-gray-600">
                            {{ $testimonial['role'] }}
                        </p>
                    </div>
                </div>

                <!-- Metadata -->
                <div class="mb-4">
                    <p class="text-xs text-primary font-bold uppercase tracking-wider mb-1">
                        {{ $testimonial['role'] ?? ($testimonial['company'] ?? '') }}
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ $testimonial['location'] ?? '' }}
                    </p>
                </div>


                <!-- Quote -->
                <p class="text-sm text-gray-700 leading-relaxed mb-3 italic">
                    "{{ $testimonial['quote'] }}"
                </p>

                <!-- Rating -->
                <div class="flex mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $testimonial['rating'])
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @else
                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endif
                    @endfor
                </div>

                <!-- Date -->
                <p class="text-xs text-gray-400">
                    {{ $testimonial['date'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>