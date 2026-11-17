@props([
    'title' => __('pub_theme::blocks.share.links.title'),
    'text' => null,
    'platforms' => ['linkedin', 'facebook', 'whatsapp', 'copy'],
])

{{-- Nessuno script di terzi: ogni piattaforma e' un normale link all'indirizzo di condivisione, quindi nulla esce dal sito finche' non si clicca. --}}
<section class="py-8 bg-white" aria-labelledby="share-links-title">
    <div class="container mx-auto px-4 flex flex-col items-center gap-3">
        <h2 id="share-links-title" class="text-base font-semibold text-gray-900">{{ $title }}</h2>
        <x-seo::social-share :data="new \Modules\Seo\Datas\SocialShareData(url: url()->current(), title: $text, platforms: $platforms)" />
    </div>
</section>
