---
title: "view pattern"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "view pattern"
issues: []
discussions: []
<<<<<<< HEAD
status: draft
---

# Pattern view(): Variabile view-string + Parametri Espliciti
=======
---

# Pattern view() — Variabile view-string + Parametri Espliciti
>>>>>>> laraxot/dev

**Regola**: Per ogni chiamata a view() usare variabile tipizzata view-string e parametri espliciti.

## Pattern Preferito

```php
/** @phpstan-var view-string $viewName */
$viewName = 'pub_theme::components.layouts.guest';
$viewParams = [];

return view($viewName, $viewParams);
```

## Logica

<<<<<<< HEAD
1. **Type safety**: view-string è più preciso di (string): PHPStan sa che è un path Blade valido
2. **Estensibilità**: Stessa struttura con 0 o N parametri: aggiungere dati = popolare $viewParams
3. **Consistenza**: Sempre view($viewName, $viewParams): nessun default implicito
=======
1. **Type safety**: view-string è più preciso di (string) — PHPStan sa che è un path Blade valido
2. **Estensibilità**: Stessa struttura con 0 o N parametri — aggiungere dati = popolare $viewParams
3. **Consistenza**: Sempre view($viewName, $viewParams) — nessun default implicito
>>>>>>> laraxot/dev
4. **Manutenibilità**: View name e params in un blocco, facile modificare

## Con parametri

```php
/** @phpstan-var view-string $viewName */
$viewName = 'fixcity::components.blocks.ticket-list';
$viewName = 'ptv::components.blocks.ticket-list';
$viewParams = [
    'tickets' => $this->tickets,
    'status' => $this->status,
];

return view($viewName, $viewParams);
```

## Da evitare

```php
// ❌ Stringa inline, parametri impliciti
return view('pub_theme::components.layouts.guest');

// ❌ Cast (string) perde semantica view-string
return view((string) $view);
```

## Collegamenti

- [phpstan_critical_rules](../.cursor/rules/phpstan_critical_rules.md)
- [AGENTS.md](../AGENTS.md)
- [agents.md](../agents.md)
<<<<<<< HEAD
- [AGENTS.md](../../../AGENTS.md)
- [agents.md](../../../AGENTS.md)
=======
>>>>>>> laraxot/dev
