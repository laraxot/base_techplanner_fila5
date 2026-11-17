# Rule 015: Parity-Safe CSS Scoping

## Rule

Per task di HTML/visual parity:

- non aggiungere classi al `<body>`
- non usare wrapper runtime/framework-specific come hook CSS principale
- usare solo hook gia presenti nel DOM finale e semanticamente stabili

## Preferred Selector Order

1. `#main-container` e altri `id` del markup finale
2. classi componenti reali come `.steppers-*`, `.cmp-*`, `.it-*`
3. data attribute applicativi stabili come `.page-content[data-slug="..."]`

## Avoid

- `body.page-*`
- `.tests-view-wrapper`
- selector dipendenti da `wire:id`, `wire:key`, snapshot Livewire o markup transiente

## Related

- [Theme Body Rule](../../../../laravel/Themes/Sixteen/docs/BODY_CLASS_RULE.md)
- [Theme CSS Scoping Rule](../../../../laravel/Themes/Sixteen/docs/architecture/CSS-SCOPING-RULE.md)
- [Fixcity HTML Body Rule](../../../../laravel/Modules/Fixcity/docs/html-body-parity-rule.md)
