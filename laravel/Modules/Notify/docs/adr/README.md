---
title: "ADR del modulo Notify"
type: index
module: Notify
status: active
tags: [adr, decisioni, notify]
created: 2026-11-18
updated: 2026-11-26
qmd: "Notify adr architecture decision records madr formato"
---

# ADR del modulo Notify

Il **perche'** delle scelte di Notify: una decisione per file, con le alternative scartate. Il nome del file e' `NNNN-argomento` in
kebab-case (prefisso numerico del formato harness MADR), senza date (la data sta nella frontmatter). Formato e regole:
[ADR 0012 di Xot](../../../Xot/docs/adr/0012-behavioral-contract-governance.md) e
[ADR di Xot](../../../Xot/docs/adr/README.md). Elenco con stato: [index.md](index.md).

Quando leggerli: prima di aggiungere un webhook o un fornitore (email, SMS), di far scrivere al modulo dati che appartengono al
progetto, di leggere configurazione con `env()` o di far inviare notifiche fuori dalle Action di consegna.

## Metodo

Scrivere un ADR solo per una scelta difficile da invertire, sorprendente o fondata su un trade-off reale. Un ADR rende leggibili
contesto, alternative, decisione, conseguenze e una verifica ripetibile; non e' un diario ne' una spiegazione retroattiva inventata:
se la decisione non e' dimostrabile dal codice o da una story/doc del repo, non si scrive.

Le decisioni si verificano contro codice e test correnti. Una modifica sostanziale crea un nuovo ADR e segna il precedente
`superseded` o `deprecated`, collegandolo al nuovo (`superseded by <file>`).

## Formato

Frontmatter: `title`, `type: decision`, `status` (`proposed` | `accepted` | `superseded` | `deprecated`), `created`, `updated`,
`decision-makers` (facoltativo), `module`, `qmd`, `issues`. Template: [0000-template.md](0000-template.md) (copia locale di
`Modules/Xot/docs/adr/0000-template.md`); guard: `Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`.

```markdown
---
title: "ADR — <decisione in una riga>"
type: decision
status: proposed | accepted | superseded | deprecated
module: Notify
created: AAAA-MM-GG
updated: AAAA-MM-GG
decision-makers: [team back office]
issues: []
---

# ADR: <decisione>

## Contesto
Fatti e vincoli che hanno reso necessaria la scelta (misure, norme, policy, incidenti).

## Driver della decisione
Le forze che pesano sulla scelta, in elenco; ogni voce verificabile nel codice o in un documento del repo.

## Alternative scartate
Ogni alternativa seria, con il motivo per cui non è stata scelta.

## Decisione
Cosa si fa, in concreto, e dove sta nel codice.

## Conseguenze
Pro, contro, debito che resta, cosa misurare. Chi cambia la decisione scrive un nuovo ADR e segna questo `superseded`.

## Conferma
Test (percorso e, se c'è, `--group`), comando eseguibile da `laravel/` o regola di review che falliscono se la decisione viene violata. Se non esiste una conferma automatica: «Nessuna conferma automatica oggi; proposta: …». Se il codice contraddice la decisione, prima di Conferma c'è `## Stato attuale`.
```

Ogni ADR ha i sei titoli sopra, in quest'ordine.

## Decisioni

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-mail-delivery-outcomes-are-events](0001-mail-delivery-outcomes-are-events.md) | accepted | Gli esiti delle email sono un evento Laravel (`MailDeliveryEventReceived`): il modulo non scrive nulla. | Sì: `--group=NOTIFY-MAILJET-INV-2`, `-3` |
| [0002-notify-config-is-centralized](0002-notify-config-is-centralized.md) | accepted | `env()` solo in `laravel/config`; il config del modulo è `notify.notify.<chiave>`; impostazioni per tenant in `NotifyConfigData`. | Sì: `NotifyConfigDataTest.php` e review con `rg`; Stato attuale con 3 scarti |
| [0003-notify-owns-delivery-contract](0003-notify-owns-delivery-contract.md) | proposed | Notify possiede l'orchestrazione della consegna (template, canali, errori); le rotte web non hanno UI. | Parziale: `--group=NOTIFY-SEND-INV-1`, `NOTIFY-RECIPIENT-INV-1..3`; due test obsoleti (Stato attuale) |
| [0004-webhooks-authenticate-with-a-token-in-the-path](0004-webhooks-authenticate-with-a-token-in-the-path.md) | accepted | I webhook in ingresso si autenticano con un token segreto nel percorso (fail-closed). | Sì: `--group=NOTIFY-MAILJET-INV-1`, `-4`, `NOTIFY-INBOUND-INV-1` |

Elenco con stato: [index.md](index.md).

## Stato di copertura

ADR: 4. Con conferma automatica (test o comando eseguibile da `laravel/`): 3. ADR 0002 e 0003 hanno una sezione «Stato attuale» (scarti tra decisione, codice e test). ADR 0003 è ancora `proposed`: serve una decisione del proprietario per portarlo ad `accepted`.

## Backlog

- Riattivare `larastan.noEnvCallsOutsideOfConfig` in `laravel/phpstan.neon` (riga 27, commentata) e allineare Telegram a una sola chiave (`services.telegram.token` o `notify.telegram.*`) (ADR 0002).
- `laravel/config/notify-env.php:18` riporta `noreply@fixcity.eu` come default del mittente e sovrascrive il default neutro del modulo (ADR 0002).
- Riscrivere i due test obsoleti di `SendNotificationActionTest.php` (righe 94 e 115) e aggiungere un test sull'isolamento dei canali (ADR 0003).
- Un limite di frequenza sulle due rotte dei webhook (ADR 0004, debito dichiarato).
- Le copie senza numero (`mail-delivery-outcomes-are-events.md`, `notify-config-is-centralized.md`, `notify-owns-delivery-contract.md`, `webhooks-authenticate-with-a-token-in-the-path.md`) risultano cancellate nell'albero di lavoro (`git status` del 2026-11-26): il numerato è l'unico ADR.
- `0000-template.md` è il modello, non una decisione.

## Decisioni precedenti (formato libero, non ancora ADR)

- [Consolidamento migrazioni notification_logs](../wiki/decisions/notification-logs-migration-consolidation.md) — lo schema del modello `NotificationLog` vince sulle due migrazioni duplicate.
- [Consolidamento delle Action SMS](../wiki/index.md) — nota deprecata.
- [Consolidamento delle Action SMS (copia con trattino finale)](../wiki/index.md) — nota deprecata.
