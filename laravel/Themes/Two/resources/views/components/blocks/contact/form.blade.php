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

    // Il blocco si mostra solo se esiste la rotta che lo riceve (modulo TechPlanner attivo): senza, sarebbe un form
    // che non consegna. L'esito vero (inviato / ricevuto ma non inoltrato / non riuscito) arriva dal server.
    $formAvailable = \Illuminate\Support\Facades\Route::has('techplanner.contact.submit');
    $outcome = $formAvailable ? \Modules\TechPlanner\Enums\ContactOutcomeEnum::tryFrom((string) session('contact_outcome')) : null;
    $honeypotField = $formAvailable ? \Modules\TechPlanner\Actions\Contact\SubmitContactFormAction::HONEYPOT_FIELD : '';

    // Campi che il server sa ricevere: `name` e' il nome del campo nel JSON del blocco, `lang` il gruppo di chiavi di traduzione.
    $controls = [
        'nome' => ['kind' => 'input', 'type' => 'text', 'autocomplete' => 'name', 'lang' => 'name'],
        'email' => ['kind' => 'input', 'type' => 'email', 'autocomplete' => 'email', 'lang' => 'email'],
        'telefono' => ['kind' => 'input', 'type' => 'tel', 'autocomplete' => 'tel', 'lang' => 'phone'],
        'studio' => ['kind' => 'input', 'type' => 'text', 'autocomplete' => 'organization', 'lang' => 'studio'],
        'tipo' => ['kind' => 'select', 'type' => 'select', 'autocomplete' => 'off', 'lang' => 'type'],
        'messaggio' => ['kind' => 'textarea', 'type' => 'textarea', 'autocomplete' => 'off', 'lang' => 'message'],
    ];
    $inputClass = 'w-full px-4 py-3 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1E5A96] focus:border-transparent transition-colors';
@endphp

@if($formAvailable)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        {{-- Section Title --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $title }}</h2>
            <p class="text-lg text-gray-600">{{ $subtitle }}</p>
        </div>

        <div class="max-w-2xl mx-auto">
            {{-- Esiti del server: role=status/alert li annuncia agli screen reader (4.1.3, 3.3.1); l'id e' il punto d'arrivo del redirect. --}}
            @if($outcome !== null || $errors->any())
                <div id="contact-form-feedback" tabindex="-1" class="mb-6 space-y-4 focus:outline-none">
                    @if($outcome === \Modules\TechPlanner\Enums\ContactOutcomeEnum::Sent)
                        <p role="status" class="rounded-lg bg-green-50 p-4 text-green-800">{{ __('pub_theme::blocks.contact.form.sent.message') }}</p>
                    @elseif($outcome === \Modules\TechPlanner\Enums\ContactOutcomeEnum::Received)
                        <p role="status" class="rounded-lg bg-amber-50 p-4 text-amber-900">{{ __('pub_theme::blocks.contact.form.received.message') }}</p>
                    @elseif($outcome === \Modules\TechPlanner\Enums\ContactOutcomeEnum::Failed)
                        <p role="alert" class="rounded-lg bg-red-50 p-4 text-red-800">{{ __('pub_theme::blocks.contact.form.failed.message') }}</p>
                    @endif
                    @if($errors->any())
                        <div role="alert" class="rounded-lg bg-red-50 p-4 text-red-800">
                            <p class="font-semibold">{{ __('pub_theme::blocks.contact.form.errors_summary.title') }}</p>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach($errors->messages() as $errorField => $errorMessages)
                                    <li><a href="#{{ $errorField }}" class="underline">{{ $errorMessages[0] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endif

            <form method="POST" action="{{ route('techplanner.contact.submit', ['lang' => app()->getLocale()]) }}" class="space-y-6">
                @csrf

                {{-- Honeypot: non visibile, non raggiungibile da tastiera, ignorato dagli screen reader. Un umano non lo compila. --}}
                <div hidden aria-hidden="true">
                    <label for="{{ $honeypotField }}">{{ __('pub_theme::blocks.contact.form.honeypot.label') }}</label>
                    <input type="text" name="{{ $honeypotField }}" id="{{ $honeypotField }}" value="" tabindex="-1" autocomplete="off">
                </div>

                <p class="text-sm text-gray-600">{{ __('pub_theme::blocks.contact.form.required_note') }}</p>

                @foreach($controls as $name => $control)
                    @php
                        $field = collect($fields)->firstWhere('name', $name);
                        $langKey = 'pub_theme::blocks.contact.form.fields.'.$control['lang'];
                        $fieldError = $errors->first($name);
                        $describedBy = $name.'-help'.($fieldError !== '' ? ' '.$name.'-error' : '');
                    @endphp
                    @if($field)
                        <div>
                            <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $field['label'] ?? __($langKey.'.label') }}
                                @if($field['required'] ?? false)
                                    <span class="text-red-700" aria-hidden="true">*</span>
                                @endif
                            </label>
                            @if($control['kind'] === 'select')
                                <select
                                    name="{{ $name }}"
                                    id="{{ $name }}"
                                    autocomplete="{{ $control['autocomplete'] }}"
                                    @required($field['required'] ?? false)
                                    @if($fieldError !== '') aria-invalid="true" @endif
                                    aria-describedby="{{ $describedBy }}"
                                    class="{{ $inputClass }} bg-white"
                                >
                                    <option value="">{{ __($langKey.'.placeholder') }}</option>
                                    @foreach($field['options'] ?? [] as $option)
                                        <option value="{{ $option }}" @selected(old($name) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            @elseif($control['kind'] === 'textarea')
                                <textarea
                                    name="{{ $name }}"
                                    id="{{ $name }}"
                                    rows="5"
                                    autocomplete="{{ $control['autocomplete'] }}"
                                    @required($field['required'] ?? false)
                                    @if($fieldError !== '') aria-invalid="true" @endif
                                    aria-describedby="{{ $describedBy }}"
                                    class="{{ $inputClass }} resize-none"
                                    placeholder="{{ $field['placeholder'] ?? __($langKey.'.placeholder') }}"
                                >{{ old($name) }}</textarea>
                            @else
                                <input
                                    type="{{ $field['type'] ?? $control['type'] }}"
                                    name="{{ $name }}"
                                    id="{{ $name }}"
                                    value="{{ old($name) }}"
                                    autocomplete="{{ $control['autocomplete'] }}"
                                    @required($field['required'] ?? false)
                                    @if($fieldError !== '') aria-invalid="true" @endif
                                    aria-describedby="{{ $describedBy }}"
                                    class="{{ $inputClass }}"
                                    placeholder="{{ $field['placeholder'] ?? __($langKey.'.placeholder') }}"
                                >
                            @endif
                            <p id="{{ $name }}-help" class="sr-only">{{ __($langKey.'.help') }}</p>
                            @if($fieldError !== '')
                                <p id="{{ $name }}-error" class="mt-2 text-sm text-red-700"><span class="sr-only">{{ __('pub_theme::blocks.contact.form.error_prefix.label') }} </span>{{ $fieldError }}</p>
                            @endif
                        </div>
                    @endif
                @endforeach

                {{-- Privacy Checkbox --}}
                {{-- Mobile: checkbox 24px (era 16px) e label con py-3 => area di tocco >= 44px (tutta la riga e' cliccabile via for=). --}}
                <div>
                    <div class="flex items-start gap-3">
                        <input
                            id="privacy"
                            name="privacy"
                            type="checkbox"
                            required
                            aria-required="true"
                            @if($errors->has('privacy')) aria-invalid="true" @endif
                            aria-describedby="privacy-help{{ $errors->has('privacy') ? ' privacy-error' : '' }}"
                            class="h-6 w-6 shrink-0 mt-3 text-[#1E5A96] border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-[#1E5A96]"
                        >
                        <label for="privacy" class="py-3 text-sm text-gray-600">
                            {{ $privacyText }}
                            <a href="{{ route('container0.index', ['container0' => 'privacy']) }}" class="font-medium text-[#1E5A96] underline" target="_blank" rel="noopener">{{ __('pub_theme::blocks.contact.form.privacy_link.label') }}<span class="sr-only"> {{ __('pub_theme::ui.sections.new_window.label') }}</span></a>
                        </label>
                        <p id="privacy-help" class="sr-only">{{ __('pub_theme::blocks.contact.form.privacy_help') }}</p>
                    </div>
                    @if($errors->has('privacy'))
                        <p id="privacy-error" class="mt-2 text-sm text-red-700"><span class="sr-only">{{ __('pub_theme::blocks.contact.form.error_prefix.label') }} </span>{{ $errors->first('privacy') }}</p>
                    @endif
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
@endif
