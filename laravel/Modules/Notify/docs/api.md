---
updated: 2026-09-26
qmd: "api"
issues: []
discussions: []
title: "Notify Module API"
type: reference
tags: [notify, api, notifications]
created: 2026-07-28
<<<<<<< HEAD
status: draft
---

# Notify Module: API
=======
---

# Notify Module — API
>>>>>>> laraxot/dev

## Sending Notifications

```php
$user->notify(new Notification());
$user->notifyLater($when, new Notification());
```

## Notification Classes

<<<<<<< HEAD
- `UserVerificationNotification`: Email verification
- `PasswordResetNotification`: Password reset
- `WelcomeNotification`: New user welcome

## Channels
- `mail`: Email delivery
- `database`: Database storage (read_at tracking)
- `slack`: Slack integration
=======
- `UserVerificationNotification` — Email verification
- `PasswordResetNotification` — Password reset
- `WelcomeNotification` — New user welcome

## Channels
- `mail` — Email delivery
- `database` — Database storage (read_at tracking)
- `slack` — Slack integration
>>>>>>> laraxot/dev
