@php
    $title = $data['title'] ?? 'Rimani Aggiornato';
    $description = $data['description'] ?? 'Iscriviti alla nostra newsletter per ricevere aggiornamenti.';
    $placeholder = $data['placeholder'] ?? 'La tua email';
    $buttonLabel = $data['button_label'] ?? 'Iscriviti';
    $privacyText = $data['privacy_text'] ?? '';
    $bgColor = $data['bg_color'] ?? 'gradient';
@endphp

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-[#1E5A96] to-[#2D8659] rounded-xl p-8 md:p-12 text-white">
            {{-- Icon --}}
            <div class="flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                </svg>
            </div>
            
            {{-- Title --}}
            <h3 class="text-3xl font-bold text-center mb-4">{{ $title }}</h3>
            
            {{-- Description --}}
            <p class="text-center text-gray-100 mb-8 max-w-2xl mx-auto">{{ $description }}</p>
            
            {{-- Form --}}
            <form class="max-w-md mx-auto">
                <div class="flex flex-col sm:flex-row gap-3">
                    <input 
                        type="email" 
                        placeholder="{{ $placeholder }}" 
                        class="flex-1 px-4 py-3 rounded-lg text-gray-900 bg-white focus:ring-2 focus:ring-white focus:outline-none"
                        required
                    >
                    <button 
                        type="submit" 
                        class="inline-flex items-center justify-center text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 rounded-md px-8 bg-white text-[#1E5A96] hover:bg-gray-100"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                            <path d="m21.854 2.147-10.94 10.939"></path>
                        </svg>
                        {{ $buttonLabel }}
                    </button>
                </div>
                
                @if($privacyText)
                    <p class="text-xs text-gray-200 mt-3 text-center">{{ $privacyText }}</p>
                @endif
            </form>
        </div>
    </div>
</section>
