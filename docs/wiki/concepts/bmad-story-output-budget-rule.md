# BMAD Story Output Budget Rule

## Regola

`/bmad-create-story` deve mantenere il budget totale sotto il limite del provider:

```text
text_input + tool_input + max_output <= context_limit
```

Con limite `131072`, non usare output da `32000` token quando il contesto contiene gia' decine di migliaia di token.

## Evidenza

Errore osservato il 2026-04-23:

```text
requested about 132009 tokens
70958 text input + 29051 tool input + 32000 output
maximum context length is 131072
```

## Best Practices

- Target output iniziale: `8000-12000` token.
- Produrre story lunghe in sezioni consecutive.
- Usare LLM Wiki/QMD per riferimenti persistenti.
- Passare agli agent solo link wiki e snippet minimi.
- Salvare analisi riusabili in `docs/wiki/`, `laravel/Modules/*/docs/wiki/`, `laravel/Themes/*/docs/wiki/`, `bashscripts/docs/wiki/`.

## Bad Practices

- Rilanciare lo stesso prompt dopo errore 400.
- Chiedere 32k output con tool output gia' alto.
- Includere stack trace e documenti ufficiali completi quando esiste una sintesi wiki.
- Confondere il problema con bug applicativo Laravel.

## False Friends

- "Manca solo poco al limite" e' comunque failure: il provider rifiuta prima della generazione.
- Il `context-compression plugin` citato dall'errore e' una feature lato provider/client, non un pacchetto Laravel.
- QMD e LLM Wiki non aumentano il limite provider: servono a ridurre input e tool input.
