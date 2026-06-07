# Comment Module Concepts

## Native comments (target — STORY-158)

Epic per eliminare `packages/spatie/` e internalizzare il dominio commenti.

| Doc | Scopo |
|-----|--------|
| [wiki/concepts/native-comments-architecture.md](../wiki/concepts/native-comments-architecture.md) | Architettura target |
| [wiki/concepts/spatie-package-inventory.md](../wiki/concepts/spatie-package-inventory.md) | Mapping file Spatie → module |
| [wiki/decisions/adr-internalize-spatie-comments.md](../wiki/decisions/adr-internalize-spatie-comments.md) | ADR |
| [wiki/concepts/spatie-comments-fo-ticket-integration.md](../wiki/concepts/spatie-comments-fo-ticket-integration.md) | Stato FO ticket (pre-migrazione) |

Workflow: `/internalize-spatie-comments` (`.claude/commands/bmad/`)

## Current Implementation (transitorio)

### Models
- `Modules\Comment\Models\Comment` extends `Spatie\Comments\Models\Comment` → **da rimuovere**
- Connection DB: `comment`

### Livewire FO
- `<livewire:comments :model="$record" />` — alias Spatie Livewire

### Consumer
- Fixcity `Ticket` + `HasComments`
- Blog `Article`
- User `CanComment` via `InteractsWithSpatieComments`

## Integration Points

| Entity | Module | Route |
|--------|--------|-------|
| Ticket | Fixcity | `/it/tickets/{id}` |
| Article | Blog | `/it/articles/{slug}` |

## Database

Migration owner: `database/migrations/2024_01_01_000010_create_comments_table.php` — **data sacred**, no destructive changes.
