@props([
    'title' => 'Richiedi una Consulenza',
    'subtitle' => 'Compila il form e ti ricontatteremo entro 24 ore',
    'fields' => [],
    'submit_label' => 'Invia Richiesta',
    'privacy_text' => 'Inviando questo form accetti la nostra Privacy Policy.',
])

@php
    $submitLabel = $submit_label;
    $privacyText = $privacy_text;
@endphp

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        {{-- Section Title --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            <p class="text-lg text-gray-600">{{ $subtitle }}</p>
        </div>

        {{-- Contact Form --}}
        <div class="max-w-2xl mx-auto">
            <form method="POST" action="/it/contact/submit" class="space-y-6">
                @csrf

                {{-- Name --}}
                @if($nameField = collect($fields)->firstWhere('name', 'nome'))
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $nameField['label'] ?? 'Nome e Cognome' }}
                            @if($nameField['required'] ?? false)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $nameField['type'] ?? 'text' }}"
                            name="nome"
                            id="nome"
                            {{ $nameField['required'] ?? false ? 'required' : '' }}
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            placeholder="{{ $nameField['placeholder'] ?? 'Inserisci il tuo nome completo' }}"
                        >
                    </div>
                @endif

                {{-- Email --}}
                @if($emailField = collect($fields)->firstWhere('name', 'email'))
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $emailField['label'] ?? 'Email' }}
                            @if($emailField['required'] ?? false)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $emailField['type'] ?? 'email' }}"
                            name="email"
                            id="email"
                            {{ $emailField['required'] ?? false ? 'required' : '' }}
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            placeholder="{{ $emailField['placeholder'] ?? 'esempio@email.com' }}"
                        >
                    </div>
                @endif

                {{-- Phone --}}
                @if($phoneField = collect($fields)->firstWhere('name', 'telefono'))
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $phoneField['label'] ?? 'Telefono' }}
                            @if($phoneField['required'] ?? false)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $phoneField['type'] ?? 'tel' }}"
                            name="telefono"
                            id="telefono"
                            {{ $phoneField['required'] ?? false ? 'required' : '' }}
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            placeholder="{{ $phoneField['placeholder'] ?? '+39 XXX XXX XXXX' }}"
                        >
                    </div>
                @endif

                {{-- Studio Name --}}
                @if($studioField = collect($fields)->firstWhere('name', 'studio'))
                    <div>
                        <label for="studio" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $studioField['label'] ?? 'Nome Studio' }}
                            @if($studioField['required'] ?? false)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $studioField['type'] ?? 'text' }}"
                            name="studio"
                            id="studio"
                            {{ $studioField['required'] ?? false ? 'required' : '' }}
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                            placeholder="{{ $studioField['placeholder'] ?? 'Nome del tuo studio' }}"
                        >
                    </div>
                @endif

                {{-- Studio Type --}}
                @if($tipoField = collect($fields)->firstWhere('name', 'tipo'))
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $tipoField['label'] ?? 'Tipo di Studio' }}
                            @if($tipoField['required'] ?? false)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <select
                            name="tipo"
                            id="tipo"
                            {{ $tipoField['required'] ?? false ? 'required' : '' }}
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors bg-white"
                        >
                            <option value="">Seleziona tipo di studio</option>
                            @foreach($tipoField['options'] ?? [] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                {{-- Message --}}
                @if($messageField = collect($fields)->firstWhere('name', 'messaggio'))
                    <div>
                        <label for="messaggio" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $messageField['label'] ?? 'Messaggio' }}
                            @if($messageField['required'] ?? false)
                                <span class="text-red-500">*</span>
                            @endif
                        </label>
                        <textarea
                            name="messaggio"
                            id="messaggio"
                            rows="5"
                            {{ $messageField['required'] ?? false ? 'required' : '' }}
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors resize-none"
                            placeholder="{{ $messageField['placeholder'] ?? 'Descrivi la tua richiesta...' }}"
                        ></textarea>
                    </div>
                @endif

                {{-- Privacy Checkbox --}}
                <div class="flex items-start">
                    <input
                        id="privacy"
                        name="privacy"
                        type="checkbox"
                        required
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-1"
                    >
                    <label for="privacy" class="ml-3 text-sm text-gray-600">
                        {{ $privacyText }}
                    </label>
                </div>

                {{-- Submit Button --}}
                <div>
                    <button
                        type="submit"
                        class="w-full px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 transform hover:scale-[1.02]"
                    >
                        <span class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            {{ $submitLabel }}
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>