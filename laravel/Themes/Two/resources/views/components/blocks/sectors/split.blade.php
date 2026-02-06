@props([
    'title' => '',
    'subtitle' => '',
    'sectors' => [],
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

        <!-- Sectors -->
        <div class="space-y-16">
            @foreach ($sectors as $sector)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="{{ $loop->odd ? 'order-1' : 'order-1 lg:order-2' }}">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">
                        {{ $sector['title'] }}
                    </h3>
                    <p class="text-lg text-gray-600 mb-6">
                        {{ $sector['description'] }}
                    </p>

                    <ul class="space-y-4">
                        @foreach ($sector['use_cases'] as $use_case)
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-gray-700">
                                <strong>{{ $use_case }}</strong>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Image -->
                <div class="{{ $loop->odd ? 'order-2 lg:order-1' : 'order-2' }}">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg">
                        <img src="{{ $sector['image'] }}"
                             alt="{{ $sector['title'] }}"
                             class="w-full h-80 object-cover hover:scale-105 transition-transform duration-500"
                             loading="lazy">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>