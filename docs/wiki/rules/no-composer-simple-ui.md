# Regola: NO Composer per Componenti UI Semplici

## Principio Fondamentale

**Per componenti UI semplici che si integrano nella grafica del tema: NON installare pacchetti Composer.**

Si utilizzano **Filament Widget nativi**, **Blade Components**, o **Volt Components** con logica PHP nativa.

---

## Quando NON usare Composer

### Esempi di componenti che NON richiedono pacchetti:

| Componente | Perché no Composer | Soluzione |
|------------|-------------------|-----------|
| **Social Share Buttons** | Sono solo URL con parametri query | PHP nativo + `urlencode()` |
| **Breadcrumbs** | Navigazione interna semplice | Route helper nativi |
| **Pagination** | Filament/Blade lo fa nativamente | Componenti esistenti |
| **Modal/Ripple** | Alpine.js + Tailwind nativi | JS/CSS senza lib |
| **Carousel/Slider** | Alpine.js + CSS transforms | Implementazione leggera |
| **Toast/Notifications** | Livewire dispatch + Alpine | Nativo |
| **Copy to Clipboard** | Navigator.clipboard API | JS nativo |
| **QR Code statico** | SVG generato online o API | No pacchetto locale |
| **Contatore animato** | Alpine.js + CSS | JS nativo |
| **Tabs/Accordion** | Alpine.js x-show/x-collapse | JS nativo |

---

## Esempio Confronto

### ❌ WRONG - Con pacchetto (overkill)

```bash
# Installazione pacchetto per URL semplici
composer require kudashevs/laravel-share-buttons
```

```php
// Uso pacchetto - dipendenza extra
$shareButtons = new ShareButtons();
$url = $shareButtons->facebook($url)->getLink();
```

### ✅ CORRECT - PHP nativo

```php
// Zero dipendenze - puro PHP
$url = urlencode($shareableUrl);
$facebookUrl = "https://www.facebook.com/sharer/sharer.php?u={$url}";
```

---

## Regola Decisionale

Prima di installare un pacchetto Composer, chiediti:

```
┌─────────────────────────────────────────┐
│ Si può fare in meno di 20 righe di PHP  │
│ nativo senza dipendenze esterne?       │
├─────────────────────────────────────────┤
│  ✅ SÌ → NON installare il pacchetto    │
│  ❌ NO → Valutare pacchetto/testato    │
└─────────────────────────────────────────┘
```

---

## Social Share - Implementazione Nativa Completa

```php
<?php

declare(strict_types=1);

namespace Modules\Seo\Filament\Widgets;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class SocialShareWidget extends XotBaseWidget
{
    protected static string $view = 'seo::widgets.social-share';

    public ?string $url = null;
    public ?string $title = null;

    /**
     * @return array<string, string>
     */
    public function getShareUrls(): array
    {
        $encodedUrl = urlencode($this->url ?? LaravelLocalization::localizeUrl(request()->path()));
        $encodedTitle = urlencode($this->title ?? '');

        return [
            'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$encodedUrl}",
            'twitter' => "https://twitter.com/intent/tweet?text={$encodedTitle}&url={$encodedUrl}",
            'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url={$encodedUrl}",
            'whatsapp' => "https://wa.me/?text={$encodedTitle}+{$encodedUrl}",
            'telegram' => "https://t.me/share/url?url={$encodedUrl}&text={$encodedTitle}",
        ];
    }
}
```

**Totale**: ~15 righe di codice, **zero dipendenze**.

---

## Vantaggi Approccio Nativo

| Aspetto | Con Pacchetto | Widget Nativo |
|---------|---------------|---------------|
| Dipendenze | +1 pacchetto da mantenere | Zero |
| Vendor lock-in | Sì, update necessari | No |
| Controllo UI | Limitato dal pacchetto | Totale (Tailwind) |
| Performance | Codice extra non usato | Solo codice necessario |
| Manutenzione | Breaking changes possibili | Codice proprietario stabile |
| Tailwind integration | Spesso richiede override | Nativa e coerente |
| Bundle size | Più grande | Minima |

---

## Eccezioni Valide per Composer

SÌ a pacchetti Composer quando:

1. **Logica complessa** che richiede algoritmi sofisticati (PDF generation, Excel export)
2. **Integrazione API** con servizi esterni (Stripe, SendGrid, AWS)
3. **Sicurezza** (crittografia, hashing - meglio pacchetti testati)
4. **Parsing complesso** (Markdown, YAML, XML con edge cases)
5. **Performance critical** con ottimizzazioni C/native
6. **Standard industriali** ben mantenuti (Spatie packages)

---

## Anti-Pattern Vietato

```bash
# ❌ NON FARE - Pacchetto per logica semplice
composer require vendor/simple-button-component
composer require acme/social-share-widget
composer require foobar/click-to-copy
```

Questi pacchetti aggiungono:
- Vendor directory inutile
- Potenziali vulnerabilità
- Breaking changes da gestire
- Override CSS complicati

---

## Implementazione UI Nativa

### Tailwind + Heroicons (già presenti)

```blade
{{-- Icons già disponibili via Filament --}}
<x-filament::icon icon="heroicon-o-share" class="w-5 h-5" />
<x-filament::icon icon="heroicon-o-clipboard-document" class="w-5 h-5" />

{{-- O componenti dinamici --}}
<x-dynamic-component :component="'heroicon-o-' . $service" class="w-5 h-5" />
```

### Alpine.js per interattività

```blade
{{-- Copy to clipboard nativo --}}
<button x-data="{ copied: false }"
        @click="
            navigator.clipboard.writeText('{{ $url }}');
            copied = true;
            setTimeout(() => copied = false, 2000);
        ">
    <span x-show="!copied">Copia link</span>
    <span x-show="copied" x-cloak>Copiato!</span>
</button>
```

---

## Collegamenti

- [Social Share Component](../Seo/docs/social-share-component.md)
- [XotBaseWidget](../Xot/docs/xotbase-extension-rules.md)
- [Translation Best Practices](../Xot/docs/translations-best-practices.md)
- [Frontend Design Guidelines](../Themes/Meetup/docs/frontend-guidelines.md)

---

**Ultimo aggiornamento**: 2026-02-19  
**Stato**: Regola attiva  
**Applicazione**: Tutti i moduli e temi
