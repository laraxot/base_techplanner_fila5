@props([
    'title' => __('pub_theme::blocks.contact.form.title'),
    'subtitle' => __('pub_theme::blocks.contact.form.subtitle'),
    'fields' => [],
    'submit_label' => __('pub_theme::blocks.contact.form.submit_label'),
    'privacy_text' => __('pub_theme::blocks.contact.form.privacy_text'),
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

                {{-- Esiti del server: role=status/alert li annuncia agli screen reader (4.1.3, 3.3.1). --}}
                @if(session('status'))
                    <p role="status" class="rounded-lg bg-green-50 p-4 text-green-800">{{ session('status') }}</p>
                @endif
                @if($errors->any())
                    <div role="alert" class="rounded-lg bg-red-50 p-4 text-red-800">
                        <ul class="list-disc">
                            @foreach($errors->all() as $errorMessage)
                                <li>{{ $errorMessage }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <p class="text-sm text-gray-600">{{ __('pub_theme::blocks.contact.form.required_note') }}</p>

                {{-- Name --}}
                @if($nameField = collect($fields)->firstWhere('name', 'nome'))
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $nameField['label'] ?? __('pub_theme::blocks.contact.form.fields.name.label') }}
                            @if($nameField['required'] ?? false)
                                <span class="text-red-700" aria-hidden="true">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $nameField['type'] ?? 'text' }}"
                            name="nome"
                            id="nome"
                            autocomplete="name"
                            @required($nameField['required'] ?? false)
                            aria-describedby="nome-help"
                            class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent transition-colors"
                            placeholder="{{ $nameField['placeholder'] ?? __('pub_theme::blocks.contact.form.fields.name.placeholder') }}"
                        >
                        <p id="nome-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.fields.name.help') }}</p>
                    </div>
                @endif

                {{-- Email --}}
                @if($emailField = collect($fields)->firstWhere('name', 'email'))
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $emailField['label'] ?? __('pub_theme::blocks.contact.form.fields.email.label') }}
                            @if($emailField['required'] ?? false)
                                <span class="text-red-700" aria-hidden="true">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $emailField['type'] ?? 'email' }}"
                            name="email"
                            id="email"
                            autocomplete="email"
                            @required($emailField['required'] ?? false)
                            aria-describedby="email-help"
                            class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent transition-colors"
                            placeholder="{{ $emailField['placeholder'] ?? 'esempio@email.com' }}"
                        >
                        <p id="email-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.fields.email.help') }}</p>
                    </div>
                @endif

                {{-- Phone --}}
                @if($phoneField = collect($fields)->firstWhere('name', 'telefono'))
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $phoneField['label'] ?? __('pub_theme::blocks.contact.form.fields.phone.label') }}
                            @if($phoneField['required'] ?? false)
                                <span class="text-red-700" aria-hidden="true">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $phoneField['type'] ?? 'tel' }}"
                            name="telefono"
                            id="telefono"
                            autocomplete="tel"
                            @required($phoneField['required'] ?? false)
                            aria-describedby="telefono-help"
                            class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent transition-colors"
                            placeholder="{{ $phoneField['placeholder'] ?? '+39 347 58 96 127' }}"
                        >
                        <p id="telefono-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.fields.phone.help') }}</p>
                    </div>
                @endif

                {{-- Studio Name --}}
                @if($studioField = collect($fields)->firstWhere('name', 'studio'))
                    <div>
                        <label for="studio" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $studioField['label'] ?? __('pub_theme::blocks.contact.form.fields.studio.label') }}
                            @if($studioField['required'] ?? false)
                                <span class="text-red-700" aria-hidden="true">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ $studioField['type'] ?? 'text' }}"
                            name="studio"
                            id="studio"
                            autocomplete="organization"
                            @required($studioField['required'] ?? false)
                            aria-describedby="studio-help"
                            class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent transition-colors"
                            placeholder="{{ $studioField['placeholder'] ?? __('pub_theme::blocks.contact.form.fields.studio.placeholder') }}"
                        >
                        <p id="studio-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.fields.studio.help') }}</p>
                    </div>
                @endif

                {{-- Studio Type --}}
                @if($tipoField = collect($fields)->firstWhere('name', 'tipo'))
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $tipoField['label'] ?? __('pub_theme::blocks.contact.form.fields.type.label') }}
                            @if($tipoField['required'] ?? false)
                                <span class="text-red-700" aria-hidden="true">*</span>
                            @endif
                        </label>
                        <select
                            name="tipo"
                            id="tipo"
                            autocomplete="off"
                            @required($tipoField['required'] ?? false)
                            aria-describedby="tipo-help"
                            class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent transition-colors bg-white"
                        >
                            <option value="">{{ __('pub_theme::blocks.contact.form.fields.type.placeholder') }}</option>
                            @foreach($tipoField['options'] ?? [] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <p id="tipo-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.fields.type.help') }}</p>
                    </div>
                @endif

                {{-- Message --}}
                @if($messageField = collect($fields)->firstWhere('name', 'messaggio'))
                    <div>
                        <label for="messaggio" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $messageField['label'] ?? __('pub_theme::blocks.contact.form.fields.message.label') }}
                            @if($messageField['required'] ?? false)
                                <span class="text-red-700" aria-hidden="true">*</span>
                            @endif
                        </label>
                        <textarea
                            name="messaggio"
                            id="messaggio"
                            rows="5"
                            autocomplete="off"
                            @required($messageField['required'] ?? false)
                            aria-describedby="messaggio-help"
                            class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent transition-colors resize-none"
                            placeholder="{{ $messageField['placeholder'] ?? __('pub_theme::blocks.contact.form.fields.message.placeholder') }}"
                        ></textarea>
                        <p id="messaggio-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.fields.message.help') }}</p>
                    </div>
                @endif

                {{-- Privacy Checkbox --}}
                {{-- Mobile: checkbox 24px (era 16px) e label con py-3 => area di tocco >= 44px (tutta la riga e' cliccabile via for=). --}}
                <div class="flex items-start gap-3">
                    <input
                        id="privacy"
                        name="privacy"
                        type="checkbox"
                        required
                        aria-required="true"
                        aria-describedby="privacy-help"
                        class="h-6 w-6 shrink-0 mt-3 text-[#1E5A96] border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-[#1E5A96]"
                    >
                    <label for="privacy" class="py-3 text-sm text-gray-600">
                        {{ $privacyText }}
                    </label>
                    <p id="privacy-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.privacy_help') }}</p>
                </div>

                {{-- Submit Button --}}
                <div>
                    <button
                        type="submit"
                        aria-label="{{ $submitLabel }} - {{ __('pub_theme::blocks.contact.form.submit_aria') }}"
                        class="w-full px-8 py-4 bg-[#1E5A96] text-white font-semibold rounded-lg hover:bg-[#164575] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1E5A96] transition-all duration-200 transform hover:scale-[1.02]"
                    >
                        <span class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
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