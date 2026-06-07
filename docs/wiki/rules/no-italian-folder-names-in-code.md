# REGOLA CRITICA: Nomi Cartelle/File Solo in Inglese (PHP, CSS, JS, …)

## 🚨 ZERO TOLERANCE

**Nel codice tecnico (file, cartelle, classi, database, API) si usa SEMPRE l'inglese.**

### Il Problema

`segnalazioni` è la traduzione italiana di `ticket`. Usare nomi italiani nel codice:
- Viola il principio DRY (la traduzione è già nei file lang/)
- Crea confusione tra dominio tecnico (inglese) e traduzioni (italiano)
- Rompe la consistenza con il resto del codebase (tutto in inglese)
- Rende il codice non riutilizzabile in contesti internazionali

### Esempi di Errori GRAVI

| ❌ SBAGLIATO | ✅ CORRETTO | Contesto |
|--------------|-------------|----------|
| `components/blocks/segnalazioni/` | `components/blocks/ticket/` | Cartella componenti |
| `SegnalazioniFilterViewModel` | `TicketFilterViewModel` | Classe PHP |
| `BuildSegnalazioniFilterAggregateAction` | `BuildTicketFilterAggregateAction` | Action class |
| `segnalazione.php` (lang) | `ticket.php` (lang) | File traduzioni |
| `tabella_segnalazioni` | `tickets` | Tabella DB |
| `/api/segnalazioni` | `/api/tickets` | Endpoint API |
| `segnalazione-parity.css` | `ticket-parity.css` | CSS tema |
| `argomenti-parity.css` | `topics-parity.css` | CSS tema |
| `design-comuni-global.css` | `civic-design-global.css` | CSS tema (slug `civic-design`, non `comuni`) |

### Eccezioni Consentite

**SOLO nei file di traduzione** (`lang/it/*.php`):
- Chiavi traduzione: `'segnalazione' => '...'` ✅
- Namespace: `fixcity::segnalazione.` ✅
- Commenti di riferimento: `// Design Comuni segnalazioni-elenco` ✅

### Regola Decisionale

```
Se il nome è:
├── Usato in URL/API → inglese (ticket, not segnalazione)
├── Usato in classi/metodi → inglese (Ticket, not Segnalazione)
├── Usato in file/cartelle → inglese (ticket/, not segnalazioni/)
├── Usato in tabelle DB → inglese (tickets, not segnalazioni)
└── Usato SOLO in traduzioni → italiano consentito
```

### Prevenzione

Prima di creare qualsiasi file/cartella/classe:

1. **Chiediti**: "È un nome tecnico o una traduzione?"
2. Se tecnico → **DEVE** essere in inglese
3. Controlla esempi esistenti nel modulo
4. Se dubbi, consulta il glossario del modulo

### Verifica Compliance

```bash
# Cerca cartelle italiane comuni (da evitare)
find laravel -type d -name "segnalazi*" -o -name "pratic*" -o -name "servizi*" | grep -v lang | grep -v docs

# Cerca classi PHP con nomi italiani
grep -r "class.*[A-Z][a-z]*[aeiou]zi" laravel/Modules/*/app/ --include="*.php" | grep -v "Ticket"

# Cerca riferimenti a segnalazioni in codice non-traduzione
grep -rn "segnalazioni" laravel/Modules/*/app/ --include="*.php" | grep -v "lang/"
```

### CSS / asset tema

Vedi ADR [css-filenames-english-no-italian.md](../decisions/css-filenames-english-no-italian.md) e `laravel/Themes/Sixteen/docs/architecture/css-filename-english-naming.md`.

### Related Rules

- [css-filenames-english-no-italian.md](../decisions/css-filenames-english-no-italian.md) — mapping CSS Sixteen
- `translation-5-level-structure.md` - Come gestire traduzioni
- `filament-first-rule.md` - Componenti UI
- `naming-conventions.md` - Convenzioni naming complete

---

**Data creazione**: 2026-05-29  
**Severità**: CRITICA 🔴  
**Violazione precedente**: `components/blocks/segnalazioni/` → corretto in `ticket/`
