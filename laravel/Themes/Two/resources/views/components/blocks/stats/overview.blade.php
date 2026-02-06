@props([
    'title' => '',
    'backgroundColor' => 'bg-gray-50',
    'stats' => [],
])

<section class="py-16 {{ $backgroundColor }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($title)
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    {{ $title }}
                </h2>
            </div>
        @endif
        
        @if($stats && count($stats) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($stats as $stat)
                    <div class="text-center p-6 bg-white rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                        @if(isset($stat['number']))
                            <div class="text-3xl lg:text-4xl font-bold text-blue-600 mb-2">
                                {{ $stat['number'] }}
                            </div>
                        @endif
                        
                        @if(isset($stat['label']))
                            <div class="text-lg font-semibold text-gray-900 mb-1">
                                {{ $stat['label'] }}
                            </div>
                        @endif
                        
                        @if(isset($stat['description']))
                            <div class="text-sm text-gray-600">
                                {{ $stat['description'] }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>