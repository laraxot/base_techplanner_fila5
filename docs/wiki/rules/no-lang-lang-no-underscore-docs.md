# No Lang/Lang No Underscore-Docs Rule

## REGOLA PERMANENTE: Vietato `lang/lang/` e `_docs/` nei moduli e temi

### Vincoli assoluti

```
VIETATO: laravel/Modules/<Name>/lang/lang/
VIETATO: laravel/Themes/<Name>/lang/lang/
VIETATO: laravel/Modules/<Name>/_docs/
VIETATO: laravel/Themes/<Name>/_docs/
```

### Forma corretta

**Traduzioni**:
```
laravel/Modules/<Name>/lang/<locale>/*.php   ← corretto
laravel/Themes/<Name>/lang/<locale>/*.php    ← corretto
```

**Documentazione**:
```
laravel/Modules/<Name>/docs/*.md             ← corretto
laravel/Themes/<Name>/docs/*.md              ← corretto
```

### Perché

`lang/lang/` viola DRY e crea ambiguità sul source of truth delle traduzioni.
Laravel e Laraxot si aspettano una sola radice `lang/` per modulo/tema, con il
locale immediatamente sotto (`lang/it/`, `lang/en/`, ...).

`_docs/` segnala materiale temporaneo o non ufficiale. La documentazione
deve stare in `docs/`; se una nota è utile va promossa e indicizzata, altrimenti
va tenuta fuori da Git.

### Verifica rapida

```bash
find laravel/Modules laravel/Themes -type d \( -path '*/lang/lang' -o -name '_docs' \) | sort
```

Deve ritornare **zero righe**.

### Azione correttiva

1. Ispezionare contenuto delle directory violanti.
2. Spostare eventuali file `.php` da `lang/lang/<locale>/` a `lang/<locale>/` (merge manuale se il locale esiste già).
3. Promuovere contenuto utile da `_docs/` a `docs/`; scartare il resto.
4. Rimuovere le directory vuote.
5. Rieseguire la verifica.

### Stato violazioni 2026-04-21

Rimaste da correggere (story 8-37):
- `laravel/Modules/Xot/lang/lang` — locale dirs nested, merge in `lang/`
- `laravel/Modules/Xot/_docs` — note di ricerca `.txt`, non promuovibili
- `laravel/Modules/UI/_docs` — note di sviluppo `.txt`, non promuovibili

Già corrette in sessioni precedenti:
- `laravel/Modules/Job/lang/lang`
- `laravel/Modules/Job/_docs`
- `laravel/Modules/Media/bashscripts/_docs`
- `laravel/Modules/User/docs/_docs`

### Documentazione

- `docs/wiki/concepts/no-lang-lang-and-no-underscore-docs-rule.md` — wiki entry
- Story di riferimento: `_bmad-output/implementation-artifacts/8-37-remove-lang-lang-and-underscore-docs.md`
