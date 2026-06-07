# No Standalone View Components in Modules

## 🔴 REGOLA PERMANENTE

**Vietato** creare View Component standalone in `Modules/*/app/View/Components/` per liste/tabelline.

### Perché

- Il codebase usa **Filament widgets** per tutti i list
- **DRY**: evita duplicazione logica con Blade puro
- **Maintainability**: una sola fonte di verità per list

### Quando usare cosa

| Scenario | Soluzione |
|---------|----------|
| Lista ticket/segnalazioni | `@livewire(\Modules\Fixcity\Filament\Widgets\TicketListWidget::class)` |
| Tab mappa/elenco | Blade `components/blocks/ticket/tabs.blade.php` con Bootstrap nativo |
| Filtro sidebar | Blade `components/blocks/ticket/filters-sidebar.blade.php` |
| Card segnalazione | Blade `components/blocks/ticket/card/*.blade.php` (presentational) |

### Cosa eliminare

```bash
# Quando trovi:
laravel/Modules/Fixcity/app/View/Components/Blocks/TicketList.php
laravel/Modules/Fixcity/resources/views/components/blocks/ticket_list/

# Ed è orfano (nessun riferimento), elimina:
rm -rf laravel/Modules/Fixcity/app/View/Components/Blocks/TicketList.php
rm -rf laravel/Modules/Fixcity/resources/views/components/blocks/ticket_list/
```

### Quality Gate

Prima di eliminare verifica:
```bash
grep -r "TicketList" laravel/ --include="*.php" --include="*.blade.php"
# Se solo in docs (non in uso) → PULIZIA CONSENTITA
```