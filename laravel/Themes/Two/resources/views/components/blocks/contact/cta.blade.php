@props([
    'title' => '',
    'subtitle' => '',
    'primary_cta' => [],
    'secondary_cta' => [],
    'show_phone' => true,
    'phone' => '',
    'phone_mobile' => '',
    'show_email' => true,
    'email' => '',
])

@php
    // tel: solo cifre (e "+" iniziale per il prefisso internazionale).
    $tel = static fn (?string $number): string => preg_replace('/(?!^\+)[^\d]/', '', trim((string) $number)) ?? '';
    $contacts = [];
    if ($show_phone && !empty($phone)) {
        $contacts[] = ['label' => __('pub_theme::block_pages.contact_cta.phone.label'), 'text' => $phone, 'href' => 'tel:' . $tel($phone)];
    }
    if ($show_phone && !empty($phone_mobile)) {
        $contacts[] = ['label' => __('pub_theme::block_pages.contact_cta.phone_mobile.label'), 'text' => $phone_mobile, 'href' => 'tel:' . $tel($phone_mobile)];
    }
    if ($show_email && !empty($email)) {
        $contacts[] = ['label' => __('pub_theme::block_pages.contact_cta.email.label'), 'text' => $email, 'href' => 'mailto:' . $email];
    }
@endphp

<section class="py-16 bg-brand-blue">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center min-w-0">
            @if(!empty($title))
                <h2 class="text-3xl font-bold text-white mb-4 break-words">{{ $title }}</h2>
            @endif
            @if(!empty($subtitle))
                <p class="text-lg text-white mb-8 break-words">{{ $subtitle }}</p>
            @endif

            @if((!empty($primary_cta['label']) && !empty($primary_cta['url'])) || (!empty($secondary_cta['label']) && !empty($secondary_cta['url'])))
                <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
                    @if(!empty($primary_cta['label']) && !empty($primary_cta['url']))
                        <a href="{{ $primary_cta['url'] }}" class="inline-flex items-center justify-center min-h-11 px-8 py-3 rounded-lg font-semibold bg-white text-brand-blue hover:bg-blue-50 transition-colors">{{ $primary_cta['label'] }}</a>
                    @endif
                    @if(!empty($secondary_cta['label']) && !empty($secondary_cta['url']))
                        <a href="{{ $secondary_cta['url'] }}" class="inline-flex items-center justify-center min-h-11 px-8 py-3 rounded-lg font-semibold border border-white text-white hover:bg-white hover:text-brand-blue transition-colors">{{ $secondary_cta['label'] }}</a>
                    @endif
                </div>
            @endif

            @if(!empty($contacts))
                <ul class="flex flex-col sm:flex-row sm:flex-wrap justify-center gap-x-8 gap-y-2">
                    @foreach($contacts as $contact)
                        <li class="flex flex-wrap items-center justify-center gap-2 text-white">
                            <span>{{ $contact['label'] }}</span>
                            <a href="{{ $contact['href'] }}" class="inline-flex items-center min-h-11 font-semibold text-white underline underline-offset-2 break-all">{{ $contact['text'] }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</section>
