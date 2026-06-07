# Filter Checkbox Naming Rule

## Regola permanente

Le classi CSS per i filtri checkbox devono seguire un naming pattern coerente con Design Comuni ma adattato allo stack tecnologico del progetto.

## Obiettivo

Mantenere la semantica accessibile e il rispetto del design system Bootstrap Italia/Design Comuni, utilizzando il nostro stack personalizzato: **Tailwind + Alpine.js + Lit + DaisyUI + Filament**.

## Pattern da seguire

### Formato classe
```
[component-prefix]-[element]-[variant]
```

### Esempi corretti
- ✅ `filter-checkbox` – Checkbox generico per filtri
- ✅ `filter-checkbox--ticket-type` – Checkbox filtro per tipo ticket
- ✅ `filter-checkbox--status` – Checkbox filtro per stato
- ✅ `filter-checkbox--category` – Checkbox filtro per categoria

### ❌ Da evitare
- ❌ `segnalazioni-filter-checkbox` – Usare "ticket" invece di "segnalazioni"
- ❌ `ticket-type-filter` – Ordine errato delle parole
- ❌ `form-checkbox-ticket` – Non seguire il pattern filter-*

## Stack tecnologico

1. **Tailwind CSS** – Utility classes per layout e spaziatura
2. **Alpine.js** – Reattività per filtri (x-model, x-change)
3. **Lit** – Web Components per filtri complessi
4. **DaisyUI** – Componenti UI di default (non override per filtri)
5. **Filament** – Schema e validation per backend

## Implementazione consigliata

### Blade template
```blade
<div class="filter-checkbox-wrapper">
    <label class="filter-checkbox" for="ticket-type-1">
        <input type="checkbox" id="ticket-type-1" value="1" 
               x-model="selectedTypes" 
               @change="updateFilters()">
        <span class="filter-checkbox__label">Segnalazione</span>
    </label>
</div>
```

### CSS (app.css)
```css
.filter-checkbox {
  @apply flex items-center gap-2 p-2 rounded cursor-pointer;
  @apply hover:bg-gray-100 transition-colors;
}

.filter-checkbox input[type="checkbox"] {
  @apply w-4 h-4 accent-primary;
}

.filter-checkbox__label {
  @apply text-sm text-gray-700;
}
```

## Accessibilità

- Usare `label` con `for` associato
- Aggiungere `aria-label` dove necessario
- Gestire `aria-checked` per stato dinamico

## Verifica

- [ ] Nome classe segue il pattern `filter-checkbox`
- [ ] Non viene usato "segnalazioni" in classe
- [ ] Il CSS è nel tema (app.css)
- [ ] Accessibilità verificata
- [ ] Funziona con Tailwind + Alpine.js

## Riferimenti

- Design Comuni: https://italia.github.io/design-comuni-pagine-statiche/
- Bootstrap Italia: https://bootstrap-italia.netlify.app/
- Stack: Tailwind + Alpine.js + Lit + DaisyUI + Filament

---

**Data**: 2026-05-31  
**Stato**: ✅ Attivo  
**Proprietario**: Team Frontend