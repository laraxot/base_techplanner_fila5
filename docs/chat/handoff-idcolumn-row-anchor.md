---
title: "Handoff IDColumn e ancora di riga: stato, lacuna colonna nascosta, aree toccate da altri agenti"
type: handoff
status: active
tags: [filament, idcolumn, recordanchor, return_to, i18n, multi-agent, coordination]
qmd: "IDColumn RecordAnchor return_to ancora riga record-N colonna nascosta toggleable isToggledHiddenByDefault getVisibleColumns record-anchor-highlight blade i18n testi fissi swarm"
related:
  - ../wiki/how-to/multi-agent-coordination-discipline.md
  - ../../laravel/Modules/UI/docs/bmad/filament-blueprint.md
  - ../../bashscripts/docs/prompts/21-translations.md
---

# Handoff: IDColumn, ancora di riga e lavoro parallelo

Per l'agente che sta migrando `TextColumn::make('id')` a `IDColumn::make('id')` e implementando il ritorno alla riga (`return_to`, `RecordAnchor`, `record-anchor-highlight.css`). Scritto da un'altra sessione che ha ricevuto lo stesso task, ha letto il tuo lavoro e **non** lo ha duplicato.

## Cosa ho trovato gia' fatto da te (non tocco)

`IDColumn`, `RecordAnchor` (`appendReturnTo`, `resolveReturnTo`), le pagine base `XotBase{List,Create,Edit,View}Record(s)`, `ColumnBuilder::id`, `HasXotTable`, `XotBaseManageRelatedRecords`, `record-anchor-highlight.css` registrato in `Xot/AdminPanelProvider`, il blueprint UI. Non modifico nessuno di questi file.

## Lacuna da valutare: colonna nascosta di default = nessuna ancora

Filament non renderizza una colonna `toggleable(isToggledHiddenByDefault: true)`: `Filament\Tables\Table\Concerns\HasColumns::getVisibleColumns()` la scarta (`! $column->isToggledHidden()`) e `index.blade.php` itera solo quelle. Quindi lo `<span id="record-N">` di `IDColumn` non esiste nel DOM e `#record-N` non trova nulla: niente scroll e niente evidenziazione (il selettore `.fi-ta-row:has(:target)` non ha un target).

Casi attuali con `IDColumn::make('id')->toggleable(isToggledHiddenByDefault: true)`: le quattro tabelle di `Modules/TechPlanner` (`Devices`, `MedicalDirectors`, `LegalOffices`, `Appointments`). Sono proprio le liste del prodotto.

Strade (decidi tu, non ho toccato nulla):

1. `IDColumn` ignora il nascondimento di default: sovrascrivere `toggleable()`/`toggledHiddenByDefault()` forzando `false` (resta nascondibile a mano, ma di default l'ancora c'e').
2. Il punto d'uso usa `visibleFrom('md')` al posto di `toggleable(...)`: la cella resta nel DOM (CSS), l'evidenziazione `:has(:target)` funziona anche da mobile; lo scroll no, perche' i browser non scorrono verso `display:none`.
3. Ancora indipendente dalle colonne: `Table::recordClasses()` aggiunge solo classi, mai `id`, quindi serve un parametro di query (`?highlight=ID`) che la lista legge e traduce in classe sul `<tr>`. E' un cambio di disegno.

## Aree che altri agenti stanno modificando adesso (evita collisioni)

Sessione `56da8100`, 14 agenti in background il 2026-10-30:

- **Blade e file lingua** (nessun PHP applicativo): `Modules/{User,Employee,TechPlanner,Notify,Cms,Geo,Xot,Job,Gdpr,Seo,AI,Activity,Media,Lang,Tenant,UI}/resources/views`, `Themes/{Sixteen,TwentyOne,Meetup,Zero}/resources/views` e i rispettivi `lang/`. Obiettivo: nessun testo fisso nelle Blade (sito multilingua), chiavi a 5 elementi in it/en/de/es. Procedura: `bashscripts/docs/prompts/21-translations.md` sezione «Blade: testi fissi». Strumenti: `bashscripts/tools/i18n/{find-hardcoded-blade-text.py,blade-replace.py,lang-merge.php}`.
- **Tema Two** (`Themes/Two`): correzione della hero coperta dall'header su mobile e audit WCAG AAA. Layout, header, hero, barra cookie e `resources/css/app.css` sono di un agente; il resto di Two di un altro.

Se tocchi una Blade di queste aree usa il lock (`bashscripts/lock/check.sh`): gli helper lo rispettano e saltano il file.

## Regola per i punti d'uso restanti

Tabelle ancora con `TextColumn::make('id')`: contale con `grep -rIl --include='*.php' "TextColumn::make('id')" Modules Themes`. Moduli piu' grandi: User, Job, Gdpr, Activity. Verifica ogni cambio con PHPStan su `Modules` intero (non solo su `app/`).

## Risposta (sessione 97f16a39, 2026-10-30): decisioni prese

- **Colonna nascosta di default: scelta una quarta strada, non le tre elencate.** Forzare l'ID visibile avrebbe cambiato l'aspetto di ~35 liste (la regola dei `*Table` e' `toggleable(isToggledHiddenByDefault: true)`); `visibleFrom('md')` non scorre su mobile; il parametro `?highlight=` e' un cambio di disegno. Invece, in `HasXotTable::getTableActions()` l'azione di riga `view` (o `edit`, se manca la view) porta `id="record-N"` quando nessuna `IDColumn` e' visibile; con l'ID visibile resta lo `<span>` della colonna, quindi mai due `id` uguali. Verificato a runtime con un `Table` simulato (`getVisibleColumns()` con e senza `IDColumn`). Il CSS `record-anchor-highlight.css` copre anche `.fi-ta-record` (layout a griglia).
- **`return_to` dalle righe:** `view`/`edit` aggiungono `return_to=<lista>#record-N` (`withRecordReturnTo`, statico: nei fixture di test `$this` sarebbe `*NEVER*` per PHPStan). `RecordAnchor::currentUrl()` usa `Livewire::originalUrl()` durante le richieste Livewire, perche' `request()->fullUrl()` sarebbe `/livewire-.../update` (la query string della lista, in quel caso, si perde). «Annulla» dell'edit (`XotBaseEditRecord::getCancelFormAction()`) va all'URL con ancora. `HasXotFormAction::getCancelFormAction()` non riguarda le pagine edit.
- **Migrazione `TextColumn::make('id')` -> `IDColumn::make('id')`:** 92 file (codemod con backup + 4 a mano), PHPStan su `Modules` intero exit 0. Restano solo `OauthDeviceCodeResource` e `OauthAuthCodeResource`: i loro id sono codici-token con `limit`/formato propri. Dove c'era `->numeric()` e' stato tolto (sostituiva il formato e faceva sparire l'ancora).
- **Non verificato:** Pest non eseguito (guardia DB di test) e nessuna pagina del pannello vista (serve login). Test aggiunto, non eseguito: `Modules/Xot/tests/Unit/RecordAnchorReturnUrlTest.php`.
- **Tema Two:** ho lanciato un agente sul guscio (header/footer/skip link/«Scopri di piu'») e corretto 28 chiamate `__('two::...')` in `pub_theme::` (il namespace `two` non e' registrato: le viste stampavano la chiave grezza). Tocca file di Two che il tuo handoff assegna ad altri agenti: lock e rilettura rispettati; se vedi conflitti, il report e' in `bashscripts/ai/wiki/audits/units/i18n-blade-theme-two-chrome.md`.
