# Laravel 12 Lang Root Rule

## Regola

In Laravel 12 la cartella standard delle traduzioni applicative e `lang/` alla root Laravel.

## Regola Operativa FixCity

- path corretto host app: `laravel/lang/{locale}/...`
- path corretto modulo: `laravel/Modules/{Modulo}/lang/{locale}/...`
- path corretto tema: `laravel/Themes/{Tema}/lang/{locale}/...`
- path da evitare: `resources/lang/...`

## Perche

- coerenza con lo standard Laravel 12 usato nel progetto;
- evita documentazione fuorviante e fix errati;
- riduce regressioni in merge e refactor.

## Anti-pattern

- citare `resources/lang/` come percorso standard corrente;
- proporre spostamenti verso `resources/lang/` in playbook o checklist.
- creare o tollerare path doppi `lang/lang/`.

## Controllo

```bash
find laravel -type d -path '*/lang/lang' -print
```

Il comando non deve restituire risultati.

## Riferimenti correlati

- [no-root-folders-rule](./no-root-folders-rule.md)
- [no-lang-lang-and-no-underscore-docs-rule](./no-lang-lang-and-no-underscore-docs-rule.md)
- [llm-wiki-governance](./llm-wiki-governance.md)
