---
title: "tenant config"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "tenant config"
issues: []
discussions: []
<<<<<<< HEAD
status: draft
=======
>>>>>>> laraxot/dev
---

# Quick Reference - Tenant Config

## Verifiche base

```php
config('app.url');
app(\Modules\Tenant\Actions\GetTenantNameAction::class)->execute();
<<<<<<< HEAD
config('it.<nome progetto>.manager.morph_map');
=======
config('it.quaeris.manager.morph_map');
>>>>>>> laraxot/dev
\Illuminate\Database\Eloquent\Relations\Relation::morphMap();
```

## Problema tipico

- Il worker usa config vecchia/cached o tenant path inatteso.

## Azioni

1. verificare tenant risolto
2. verificare chiavi config effettivamente caricate
3. riallineare provider/morph map
4. restart queue worker
