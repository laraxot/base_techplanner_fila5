---
paths:
  - "laravel/Modules/User/**/*.php"
  - "laravel/Modules/**/database/migrations/**/*.php"
---

# Socialite — No google_id Column Rule

## REGOLA PERMANENTE: Nessuna colonna provider nella tabella users

### Vincolo assoluto

```
VIETATO: aggiungere google_id, facebook_id, github_id, o qualsiasi {provider}_id alla tabella users
OBBLIGATORIO: usare il modello SocialiteUser (tabella socialite_users)
```

### Perché

Con molti provider OAuth (Google, Facebook, Apple, Microsoft, GitHub, GitLab, Slack, TikTok, Twitch...) aggiungere una colonna per provider sporca la tabella `users` con N colonne. Ogni nuovo provider richiede una migration.

### Architettura corretta

```
tabella users
  → nessuna colonna OAuth

tabella socialite_users
  user_id    → FK users.id
  provider   → 'google' | 'facebook' | ...
  provider_id → ID univoco presso il provider
  token, name, email, avatar
```

Un utente può avere N righe (uno per provider collegato).

### Modelli

- `Modules/User/app/Models/SocialiteUser.php` — riga OAuth
- `Modules/User/app/Models/SocialProvider.php` — config provider (Sushi, no DB)

### Actions (NON usare service classes)

```php
// Creare collegamento OAuth
app(CreateSocialiteUserAction::class)->execute($provider, $oauthUser, $user);

// Recuperare collegamento
app(RetrieveSocialiteUserAction::class)->execute($provider, $providerId);
```

### Story di riferimento

- Analisi User module: sessione 2026-04-20

### Documentazione

- `laravel/Modules/User/docs/wiki/concepts/socialite-architecture.md`
- `laravel/Modules/User/docs/wiki/concepts/socialite-admin-tutorial.md`
