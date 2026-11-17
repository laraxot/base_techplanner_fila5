# OpenCode — schema frontmatter per agenti `.opencode/agents/*.md`

**Rule type**: infrastructure / config schema
**Status**: enforced (2026-05-11)
**Trigger**: stai editando file `.opencode/agents/*.md`, vedi errore `Configuration is invalid at .opencode/agents/...`

## Regola

OpenCode (https://opencode.ai/docs/agents/) usa uno schema YAML frontmatter
**diverso** da Claude Code. Migrare i file copiati da template Claude Code
(es. quelli generati da `get-shit-done`) o si ottiene
`Configuration is invalid at /var/www/.../.opencode/agents/<file>.md`.

### Schema OpenCode

**Required:**

| Campo | Valori | Note |
|-------|--------|------|
| `description` | string | scopo dell'agente |
| `mode` | `primary` \| `subagent` \| `all` | tipo di agente |

**Optional:**

| Campo | Tipo | Note |
|-------|------|------|
| `model` | string | es. `anthropic/claude-sonnet-4-20250514` |
| `temperature` | 0.0–1.0 | randomness |
| `top_p` | 0.0–1.0 | response diversity |
| `permission` | object | controllo tool fine-grained (vedi sotto) |
| `tools` | object di booleani | **DEPRECATO** — usare `permission` |
| `disable` | bool | disabilita l'agente |
| `hidden` | bool | nasconde da `@` autocomplete (solo subagent) |
| `color` | string | hex (`#34D399`) o nome tema (`orange`) |

### Permission (raccomandato al posto di `tools:`)

```yaml
permission:
  edit: deny
  bash:
    "*": ask
    "git push": allow
    "grep *": allow
  webfetch: deny
```

Action ammesse: `allow`, `ask`, `deny`. Le chiavi sono pattern wildcard.

## Schema Claude Code (NON valido in OpenCode)

```yaml
---
name: gsd-debug-session-manager       # OK in entrambi
description: ...                       # OK in entrambi
tools: Read, Write, Bash, Grep, Glob  # ❌ CSV string non valido in OpenCode
# manca mode:                         # ❌ obbligatorio in OpenCode
color: orange
---
```

## Schema OpenCode minimo valido

```yaml
---
name: gsd-debug-session-manager
description: Manages multi-cycle /gsd-debug checkpoint and continuation loop...
mode: subagent
color: orange
---
```

## Migrazione automatica (Claude Code → OpenCode)

Per ogni `.md` con `tools: <CSV>` deprecato:

1. Inserisci `mode: subagent` (o `primary` se è l'agente principale) subito dopo `description:`
2. Commenta o rimuovi la riga `tools: <CSV>` (CSV non e' valido)
3. Se servono restrizioni, esprimile con `permission:` (mappa key→action)

Esempio script in-place:

```bash
cd /var/www/_bases/base_fixcity_fila5/.opencode/agents
for f in gsd-*.md; do
  if grep -q "^tools: [A-Za-z]" "$f" && ! grep -q "^mode:" "$f"; then
    # commenta CSV tools e aggiunge mode subito dopo description
    sed -i -E '
      /^tools: [A-Za-z]/ s|^|# OpenCode-incompatible (Claude Code CSV): |
      /^description: / a\
mode: subagent
    ' "$f"
  fi
done
```

## Perché

1. **Compatibilita' upstream**: `get-shit-done@1.41.0` genera template in
   formato Claude Code (CSV `tools:`). OpenCode rifiuta. Va migrato.
2. **Schema diverso**: OpenCode valida via `opencode.ai/config.json` schema;
   tipi sbagliati falliscono al load.
3. **Default sensato**: senza `tools:`/`permission:`, un `mode: subagent`
   ha accesso a tutti i tool — generalmente OK per agenti GSD locali.
4. **Migrazione futura**: quando `get-shit-done` aggiungera' supporto nativo
   a OpenCode, rimuovere questo workaround.

## Trigger di applicazione

- Vedi errore `Configuration is invalid at /var/www/.../.opencode/agents/<file>.md`
- Dopo `gsd update` o `npx get-shit-done-cc@latest` che rigenera template
- Aggiungi un nuovo agente custom in `.opencode/agents/`

## Riferimenti

- OpenCode Agents docs: https://opencode.ai/docs/agents/
- OpenCode Config: https://opencode.ai/docs/config/
- get-shit-done: https://github.com/gsd-build/get-shit-done
- Memory: `feedback_opencode_agent_schema.md`
