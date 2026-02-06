{{--
/**
 * Why Critical Grid Block - Theme Two
 * Sezione informativa con pretitolo, titolo, sottotitolo e 4 card con icona
 */
--}}

<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            @if(isset($pretitle))
                <span class="inline-block text-sm font-bold tracking-widest uppercase text-emerald-600 mb-3">{{ $pretitle }}</span>
            @endif

            @if(isset($title))
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            @endif

            @if(isset($description))
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ $description }}</p>
            @endif
        </div>

        @if(isset($items) && is_array($items))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($items as $item)
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:border-gray-200 hover:shadow-lg transition-all duration-300">
                        @if(isset($item['icon_color']) || isset($item['icon']))
                            <div class="w-12 h-12 rounded-xl bg-{{ $item['icon_color'] ?? 'emerald' }}-100 text-{{ $item['icon_color'] ?? 'emerald' }}-600 flex items-center justify-center mb-5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    @switch($item['icon'] ?? 'info')
                                        @case('warning')
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                        @break
                                        @case('book')
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                                        @break
                                        @case('users')
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                        @break
                                        @case('scale')
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z"/>
                                        @break
                                        @default
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                                    @endswitch
                                </svg>
                            </div>
                        @endif

                        @if(isset($item['title']))
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $item['title'] }}</h3>
                        @endif

                        @if(isset($item['description']))
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $item['description'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
