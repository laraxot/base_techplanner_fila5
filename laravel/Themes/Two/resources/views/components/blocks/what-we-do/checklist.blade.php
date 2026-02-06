@props([
    'title' => '',
    'subtitle' => '',
    'checklist' => [],
    'id' => 'controlli',
])

<div id="{{ $id }}" class="bg-gray-50 py-20 scroll-mt-20">
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

        <!-- Checklist Card -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($checklist as $item)
                    <div class="flex items-start p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <!-- Icon -->
                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0 mr-4">
                            @if ($item['icon'] === 'heroicon-o-cpu-chip')
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                </svg>
                            @elseif ($item['icon'] === 'heroicon-o-chart-pie')
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                </svg>
                            @elseif ($item['icon'] === 'heroicon-o-users-group')
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            @elseif ($item['icon'] === 'heroicon-o-lock-closed')
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            @elseif ($item['icon'] === 'heroicon-o-document-text')
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            @elseif ($item['icon'] === 'heroicon-arrows-pointing-out')
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                </svg>
                            @endif
                        </div>

                        <!-- Content -->
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">
                                {{ $item['title'] }}
                            </h4>
                            <p class="text-sm text-gray-600">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>