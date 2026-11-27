---
title: "convenzioni namespace filament"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "convenzioni namespace filament"
issues: []
discussions: []
status: draft
---

# Convenzioni Namespace per Filament

> **Regola fondamentale:** Il namespace dei componenti Filament è sempre `Modules\<NomeModulo>\Filament`, anche se i file si trovano fisicamente in `app/Filament`. **Non va mai aggiunto `App` nel namespace.**

## Struttura Corretta dei File

### Posizionamento

I componenti Filament **DEVONO** essere posizionati nelle seguenti directory:

```
Modules/NomeModulo/app/Filament/Resources/  # Risorse Filament
Modules/NomeModulo/app/Filament/Pages/      # Pagine Filament
Modules/NomeModulo/app/Filament/Widgets/    # Widget Filament
```

### Namespace

Il namespace corretto è `Modules\NomeModulo\Filament\[Resources|Pages|Widgets]` (senza il segmento `app`):

```php
// ✅ CORRETTO
namespace Modules\User\Filament\Widgets;

// ❌ ERRATO
namespace Modules\User\App\Filament\Widgets;
```

## Traduzioni nei Blocks Filament

- **Non usare mai `->label()` nei componenti Filament**
  - Le etichette sono gestite automaticamente dal LangServiceProvider
  - Utilizzare la struttura espansa per i campi nei file di traduzione
  - Seguire la convenzione di naming per le chiavi di traduzione: `modulo::risorsa.fields.campo.label`

- **Struttura Corretta per getFormSchema()**
  ```php
  public function getFormSchema(): array
  {
      return [
          'title' => Forms\Components\TextInput::make('title'),
          'content' => Forms\Components\RichEditor::make('content'),
      ];
  }
  ```

- Per le regole generali e best practice consulta la [documentazione del modulo Xot](../../Xot/docs/README.md).

## Regole Tailwind CSS con Filament
- **IMPORTANTE:** Con Filament 3.x, usare solo `tailwindcss@3.x` (NO 4.x). Riferimento: [Filament Docs](https://filamentphp.com/project_docs/3.x/notifications/installation#installing-tailwind-css).
- Tutti i temi custom devono rispettare questa versione.

## Regole build/publish temi custom
- Per temi custom (es. Themes/One) la build e pubblicazione asset si fa SOLO dalla cartella del tema:
  ```sh
  npm run build
  # public_html/themes/<Tema> è un symlink a laravel/Themes/<Tema>/public: niente copia (Modules/Xot/docs/wiki/concepts/public-html-symlink-assets.md)
  ```
- Non usare mai `vendor:publish` per asset dei temi custom.
- Vedi anche il [README del tema Two](../../../Themes/Two/docs/README.md)

## Preview custom in Filament
- **Per anteprime custom nelle pagine Filament usare sempre `ViewEntry`** (mai `CustomEntry`).
- `CustomEntry` **non esiste** in Filament 3.x.
- La preview va sempre fatta tramite Blade custom e `ViewEntry`:

```php
Section::make('Anteprima')
    ->schema([
        ViewEntry::make('preview')
            ->view('cms::sections.preview', [
                'blocks' => $this->record->content_blocks,
                'section' => $this->record,
            ]),
    ]),
```

- [Doc ufficiale Filament ViewEntry](https://filamentphp.com/project_docs/3.x/infolists/entries/custom)

## Collegamenti Bidirezionali

### Modulo Xot (Core)
- [README Xot](../../Xot/docs/README.md) - Indice principale della documentazione
- [Struttura dei moduli](../../Xot/docs/module-structure.md) - Struttura standard dei moduli
- [Regole per le directory](../../Xot/docs/wiki/rules/laravel-folders-lowercase.mdc) - Convenzioni di naming e case sensitivity
- [Regole per i namespace](best-practices/namespace-conventions.md) - Convenzioni per i namespace

### Filament
- [Componenti Filament](best-practices/filament-components.md) - Struttura e convenzioni dei componenti

### Moduli Correlati
- [Lang - Filament Translations](../../Lang/docs/filament-translations-1.md) - Traduzioni in Filament

### Documentazione Interna
- [README del modulo Cms](./README.md) - Indice principale del modulo Cms
- [Componenti Filament](best-practices/filament-components.md) - Convenzioni dei componenti Filament

---
> **Nota**: Questo documento è linkato anche dal README di Xot per garantire coerenza tra i moduli.
