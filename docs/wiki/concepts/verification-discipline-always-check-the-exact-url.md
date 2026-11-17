---
title: Verification discipline - always check the exact URL (wizard steps)
type: concept
updated: 2026-04-23
tags: [verification, debugging, wizard, filament, livewire, llm-wiki, context-compression]
---

# Regola

Quando un bug report contiene un URL specifico (es. `.../segnalazione-crea?step=...`), il lavoro **non e' completo** finche' non verifichi **quello stesso URL** dopo i fix.

Questa regola evita regressioni tipiche: si fixa una pagina "base" ma lo step Livewire/Wizard che l'utente usa resta rotto.

# Best practices

- Verifica sempre con lo stesso URL/step indicato dall'utente:
  - HTTP status (`curl -i`)
  - log applicativo (`laravel/storage/logs/laravel.log`)
  - e, quando serve, verifica visiva (screenshot).
- Preferisci log + snippet mirati rispetto a dump enormi di HTML/JSON nel contesto LLM.
- Quando una pagina ritorna 500, identifica la causa leggendo:
  - ultimo errore in `laravel.log`
  - stacktrace e file/linea
  - solo dopo apri il file e patcha.

# Bad practices

- Dichiarare "fix completato" dopo aver controllato solo `.../segnalazione-crea` senza controllare lo step `?step=...`.
- Incollare nel contesto LLM output giganteschi (HTML completo / log megabyte):
  - aumenta il rischio di `maximum context length`
  - rende piu' difficile isolare la vera causa.

# False friends

- "Ho fatto `optimize:clear` quindi e' ok": no, serve la verifica sull'URL esatto.
- "Se `curl` ritorna 200 allora e' a posto": 200 non garantisce parity UI o che un widget (es. mappa) sia visibile; serve anche verifica visiva quando il bug e' di rendering.

