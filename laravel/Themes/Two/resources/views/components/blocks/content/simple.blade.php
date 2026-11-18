@props([
    'content' => '',
])

{{-- Testo ricco da CMS (privacy, cookie, termini, articoli): il preflight Tailwind azzera titoli, liste e link e il plugin @tailwindcss/typography
     non e' nel CSS compilato, quindi `prose` non fa nulla. Stile scritto a mano, con ambito .fo-prose, in un solo blocco per pagina.
     Colonna 70ch, interlinea 1.7, h2 1.5rem / h3 1.25rem, liste con punti e rientro, link sottolineati (brand-blue su bianco 7,5:1), tabelle che scorrono. --}}
@once
    @push('styles')
        <style>
            .fo-prose { --fo-fg: #374151; --fo-head: #111827; --fo-link: var(--color-brand-blue, #1c548c); --fo-rule: #d1d5db; max-width: 70ch; margin-inline: auto; min-width: 0; color: var(--fo-fg); font-size: 1.0625rem; line-height: 1.7; overflow-wrap: break-word; }
            .fo-prose > :first-child { margin-top: 0; }
            .fo-prose h1, .fo-prose h2, .fo-prose h3, .fo-prose h4 { color: var(--fo-head); font-weight: 700; line-height: 1.25; margin: 2.25rem 0 .75rem; scroll-margin-top: calc(var(--site-header-h, 5rem) + 1rem); }
            .fo-prose h1 { font-size: 2rem; }
            .fo-prose h2 { font-size: 1.5rem; }
            .fo-prose h3 { font-size: 1.25rem; }
            .fo-prose h4 { font-size: 1.125rem; }
            .fo-prose p, .fo-prose ul, .fo-prose ol, .fo-prose blockquote, .fo-prose pre, .fo-prose table { margin: 0 0 1.25rem; }
            .fo-prose ul { list-style: disc; padding-left: 1.5rem; }
            .fo-prose ol { list-style: decimal; padding-left: 1.5rem; }
            .fo-prose li { margin: .375rem 0; padding-left: .25rem; }
            .fo-prose li > ul, .fo-prose li > ol { margin: .375rem 0 0; }
            .fo-prose li > ul { list-style: circle; }
            .fo-prose strong { color: var(--fo-head); font-weight: 600; }
            .fo-prose a { color: var(--fo-link); text-decoration: underline; text-underline-offset: .15em; overflow-wrap: anywhere; }
            .fo-prose a:hover { text-decoration-thickness: 2px; }
            .fo-prose a:focus-visible { outline: 3px solid var(--fo-link); outline-offset: 2px; border-radius: .125rem; }
            .fo-prose blockquote { border-left: 4px solid var(--fo-rule); padding-left: 1rem; font-style: italic; }
            .fo-prose hr { border: 0; border-top: 1px solid var(--fo-rule); margin: 2rem 0; }
            .fo-prose img, .fo-prose video, .fo-prose iframe { max-width: 100%; height: auto; }
            .fo-prose pre, .fo-prose code { font-size: .9375rem; overflow-x: auto; }
            .fo-prose pre { max-width: 100%; }
            /* ponytail: tabella scorrevole con display:block perde la semantica di tabella in alcuni lettori di schermo; se i testi legali useranno tabelle, avvolgerle in un div role="region" tabindex="0" lato CMS. */
            .fo-prose table { display: block; max-width: 100%; overflow-x: auto; border-collapse: collapse; }
            .fo-prose th, .fo-prose td { border: 1px solid var(--fo-rule); padding: .5rem .75rem; text-align: left; vertical-align: top; }
            .fo-prose th { color: var(--fo-head); background: #f3f4f6; }
        </style>
    @endpush
@endonce

<div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="fo-prose">
        {!! $content !!}
    </div>
</div>
