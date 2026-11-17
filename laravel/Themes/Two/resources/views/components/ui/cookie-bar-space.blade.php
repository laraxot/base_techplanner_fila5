{{--
    Integrazione tema <-> banner cookie (Modules/Gdpr) SENZA ricompilare il CSS del tema (npm run build svuota public/: vedi docs/wiki/how-to/deployment-validation.md).
    Non stampa nulla qui: accoda <style> e <script> nello stack `styles` del <head> (Cms head.blade.php), quindi va richiamato PRIMA di <x-cms::head>.
    Usa solo CSS scritto a mano (non layered, quindi vince sulle utility Tailwind gia' compilate) e classi `hero-fill`/`hero-ctas` messe dalle viste hero.
    Quando il tema verra' ricompilato queste regole possono migrare in resources/css/app.css; il blocco e' reversibile togliendo la riga nei layout.

    --cookie-bar-h = altezza della barra cookie FISSA e visibile, 0px altrimenti (gia' accettata, chiusa, in flusso, stampa). Lo aggiorna lo script qui sotto
    con ResizeObserver + MutationObserver sulla barra, senza dipendere dall'interno dello script del modulo.
--}}
@once
    @push('styles')
        <style>
            :root { --cookie-bar-h: 0px; }

            /* Sotto l'header fisso (z-50): con il menu mobile aperto il pannello ricopre la barra e "Accedi"/CTA restano cliccabili. */
            body > .gdpr-cookiebar { z-index: 40; }

            /* Testo ingrandito (200%) o viewport corti: la barra fissa non supera il 40% dello schermo e scorre dentro; i pulsanti restano agganciati in fondo.
               Sotto 30rem di altezza il modulo la mette nel flusso (position: static): li' non si limita. */
            @media (min-height: 30.0625rem) {
                body > .gdpr-cookiebar:not([data-layout="flow"]) { max-height: 40dvh; overflow-y: auto; overscroll-behavior: contain; }
                body > .gdpr-cookiebar:not([data-layout="flow"]) .gdpr-cookiebar__actions { position: sticky; bottom: 0; background: #fff; }
            }
            body > .gdpr-cookiebar .gdpr-cookiebar__body { overflow-wrap: anywhere; }
            body > .gdpr-cookiebar .gdpr-btn { max-width: 100%; }

            /* Hero a tutta altezza: sotto l'header e sopra la barra cookie (le utility min-h-[calc(100dvh-...)] restano come ripiego). */
            .hero-fill { min-height: calc(100dvh - var(--site-header-h) - var(--cookie-bar-h)); }

            /* Telefoni bassi (<= 40rem: 320x568, 360x640) con la barra fissa visibile: il primo schermo e' 100dvh - header - barra, quindi la hero si compatta
               (meno margini e testi un po' piu' piccoli) perche' titolo e CTA entrino sopra la barra. Torna normale appena la barra sparisce. */
            @media (max-height: 40rem) {
                body:has(> .gdpr-cookiebar:not([hidden], [data-layout="flow"])) .hero-fill { padding-block: 1rem; }
                body:has(> .gdpr-cookiebar:not([hidden], [data-layout="flow"])) .hero-fill h1 { font-size: 1.625rem; line-height: 1.2; margin-bottom: .5rem; }
                body:has(> .gdpr-cookiebar:not([hidden], [data-layout="flow"])) .hero-fill p { font-size: 1rem; line-height: 1.4; margin-bottom: .75rem; }
                body:has(> .gdpr-cookiebar:not([hidden], [data-layout="flow"])) .hero-fill .hero-ctas { gap: .5rem; }
                body:has(> .gdpr-cookiebar:not([hidden], [data-layout="flow"])) .hero-fill .hero-ctas a { min-height: 2.75rem; padding: .5rem 1.25rem; font-size: 1rem; }
            }
        </style>
        <script>
            (() => {
                const root = document.documentElement;
                const bar = () => document.querySelector('.gdpr-cookiebar');
                const apply = () => {
                    const el = bar();
                    const fixed = el !== null && !el.hidden && getComputedStyle(el).position === 'fixed';
                    root.style.setProperty('--cookie-bar-h', fixed ? `${Math.ceil(el.getBoundingClientRect().height)}px` : '0px');
                };
                addEventListener('resize', apply);
                // la barra e' iniettata prima di </body> e mostrata dal suo script: a DOMContentLoaded esiste gia'
                addEventListener('DOMContentLoaded', () => {
                    const el = bar();
                    if (el) {
                        new ResizeObserver(apply).observe(el);
                        new MutationObserver(apply).observe(el, { attributes: true, attributeFilter: ['hidden', 'data-layout', 'class', 'style'] });
                    }
                    apply();
                });
            })();
        </script>
    @endpush
@endonce
