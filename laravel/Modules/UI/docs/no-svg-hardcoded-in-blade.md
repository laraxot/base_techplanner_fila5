# Regola: No SVG Hardcoded nelle Blade

## Scopo

Gli SVG **non devono** essere scritti inline nelle view Blade. Vanno creati come file in `Modules/UI/resources/svg/` e richiamati tramite `@svg()` o `<x-filament::icon>`.

## Motivazione

1. **DRY**: Logo e icone riutilizzabili (Google, GitHub, Microsoft, Facebook) in un unico punto
2. **Manutenibilità**: Modifiche al logo in un solo file
3. **Filament way**: Preferire `<x-filament::icon>` per coerenza con l'ecosistema
4. **Consistenza**: Tutte le icone seguono lo stesso pattern di registrazione

## Dove Creare gli SVG

### Icone riutilizzabili (brand, utility)

```
laravel/Modules/UI/resources/svg/
├── google.svg              → ui-google
├── brands/
│   ├── github.svg          → ui-brands.github
│   ├── microsoft.svg       → ui-brands.microsoft
│   ├── fb.svg              → ui-brands.fb
│   └── linkedin.svg        → ui-brands.linkedin
```

### Convenzione Blade Icons (sottocartelle)

- `brands/github.svg` → nome icona `brands.github` (punto = separatore path)
- Con prefisso `ui` → `ui-brands.github`

## Utilizzo Corretto

### Filament way (preferito)

```blade
<x-filament::icon icon="ui-google" class="w-5 h-5" />
<x-filament::icon icon="ui-brands.github" class="w-5 h-5 text-white" />
<x-filament::icon icon="ui-brands.microsoft" class="w-5 h-5" />
```

### Blade Icons @svg

```blade
@svg('ui-google', 'w-5 h-5')
@svg('ui-brands.github', ['class' => 'w-5 h-5 text-white'])
```

## Anti-pattern da Evitare

```blade
{{-- ERRATO: SVG inline hardcoded --}}
<svg class="w-5 h-5" viewBox="0 0 24 24">
    <path d="M22.56 12.25c0-.78..." fill="#4285F4"/>
    <path d="M12 23c2.97 0..." fill="#34A853"/>
</svg>
```

## Eccezioni

- Icone Heroicons (`heroicon-o-*`) sono già registrate da Filament
- Per animazioni complesse o SVG one-off in componenti isolati, valutare caso per caso

## Collegamenti

- [Icon System](icon-system.md)
- [Blade Icons](../../Xot/docs/registerbladeicons.md)
- [Auth Social Login Translations](../../User/docs/auth-social-login-translations.md)
