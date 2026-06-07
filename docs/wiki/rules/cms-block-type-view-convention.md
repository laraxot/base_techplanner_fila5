# Regola CMS: `type` ↔ cartella view (Filament Builder)

**Standing rule** — ogni blocco in `content_blocks` del JSON pagina.

## Regola

Il campo **`type`** deve coincidere con la **cartella** nel path Blade subito dopo `components.blocks.`:

```
"type": "{cartella}"
"view": "pub_theme::components.blocks.{cartella}.{file}"
```

| `type` | `view` corretta | `view` vietata |
|--------|-----------------|----------------|
| `ticket-layout` | `pub_theme::components.blocks.ticket-layout.layout` | `...blocks.ticket.layout` |
| `ticket` | `pub_theme::components.blocks.ticket.layout` | `...blocks.ticket-layout.layout` |

**Non è opzionale:** il backoffice Filament (`GetViewBlocksOptionsByTypeAction`, `PageContentBuilder`) risolve le varianti view dalla cartella `blocks/{type}/`.

## Esempio reale (elenco segnalazioni)

Con view già in `Themes/.../blocks/ticket/layout.blade.php`:

```json
{
  "type": "ticket",
  "id": "ticket-layout-home",
  "data": {
    "view": "pub_theme::components.blocks.ticket.layout"
  }
}
```

Se serve il nome semantico `ticket-layout` nel JSON, **prima** creare la cartella `blocks/ticket-layout/` e solo allora:

```json
{
  "type": "ticket-layout",
  "data": {
    "view": "pub_theme::components.blocks.ticket-layout.layout"
  }
}
```

## Perché (business)

| Motivo | Effetto |
|--------|---------|
| Builder Filament | Select `view` elenca file in `blocks/{type}/*.blade.php` |
| `BlockData` | Valida `view()->exists()`; mismatch confonde editor e agenti |
| DRY / KISS | Un nome = un percorso prevedibile nel tema |

## Codice di riferimento

- `Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction`
- `Modules\Cms\Datas\BlockData`
- Tema: `laravel/Themes/Sixteen/resources/views/components/blocks/ticket/`

## Riferimenti

- [STORY-108](../../stories/STORY-108-cms-block-type-view-naming-convention.md)
- Issue [#138](https://github.com/laraxot/base_fixcity_fila5/issues/138) · Discussion [#133](https://github.com/laraxot/base_fixcity_fila5/discussions/133)
