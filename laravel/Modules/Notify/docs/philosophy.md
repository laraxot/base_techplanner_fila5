# Notify Module: Multi-Channel Notifications

> **Notification Pipeline** — Email, SMS, Telegram, Firebase FCM, WhatsApp, delivered at scale.

---

## Zen

**"One event, many channels. Template-driven, never hardcoded."**

Notify decouples business logic (event happened) from delivery (how to tell the user). Switch providers without code change.

---

## Architecture

### Models (17, largest: 22 migrations)

**Core**:
- **EmailTemplate** — HTML template + variable placeholder (versioned, immutable)
- **Notification** — Job wrapper (recipient, template, channel, status)
- **Delivery** — Immutable log (sent_at, provider_response, bounce/fail status)
- **Contact** — User contact data (email, phone, telegram_id, device_token)

**Channel Config**:
- **NotificationChannel** — Email, SMS, Telegram, FCM config (per-tenant)
- **NotificationProvider** — Postmark, Twilio, Telegram Bot, Firebase config
- **NotificationRateLimit** — Per-user per-channel throttling

**Bounce/Error Handling**:
- **NotificationFailure** — Failed delivery (reason, retry count)
- **NotificationBounce** — Email bounce (hard/soft, unsubscribe)

### Traits (Audit + Rate Limiting)

- **HasNotificationRateLimiting** — User rate limit state (per-channel, per-day)
- **HasNotificationTracking** — Delivery history queryable
- **HasTenantNotifications** — Tenant-specific channel config

### Actions (12)

**Core**:
- `BuildMailMessageAction` — Template → Swift message
- `SendEmailAction`, `SendSmsAction`, `SendTelegramAction`, `SendFcmAction` — Channel dispatch

**Providers**:
- `EsendexSendAction` — SMS provider
- `NetfunSendAction` — Alternative SMS
- `PostmarkSendAction` — Email (native Laravel)

**Utilities**:
- `NormalizePhoneNumberAction` — E.164 formatting
- `DetermineSeasonalContentViewPathAction` — Template variant selection

### Forms/Tables

- **ChannelCheckboxList** — User channel preferences (email, SMS, push)
- **ContactSection** — Contact info editor (email, phone, external IDs)
- **HtmlLayoutPathSelect** — Template HTML layout picker

---

## Integration

**Who sends**:
- User (welcome email, password reset)
- Employee (absence notifications)
- Activity (audit digest email)
- Job (export complete notification)

**Reverse**: Notify used by all.

---

## Best Practices

1. **Template Versioning**
   ```php
   $template = EmailTemplate::where('slug', 'welcome_email')
       ->whereDate('published_at', '<=', now())
       ->latest('version')
       ->first();
   ```
   Why: Live update templates without code deploy.

2. **Provider Abstraction**
   ```php
   $channel = NotificationChannel::for(auth()->user()->current_tenant)->first('type');
   SendEmailAction::dispatch($user, $template, $channel); // Provider auto-selected
   ```
   Why: Swap Postmark ↔ SES without touching action code.

3. **Immutable Delivery Log**
   - Every send → Delivery record (never deleted, audit trail)
   - Status: pending → sent → bounce/fail → retry

4. **Rate Limiting Per User Per Channel**
   ```php
   if ($user->notification_rate_limit('sms') > 5) return; // Max 5 SMS/day
   ```

5. **Scheduled Send**
   ```php
   SendEmailAction::dispatch($user, $template)->delay(now()->addHours(2));
   ```
   Why: Batch-send during low-traffic windows.

---

## Bad Practices

- ❌ Hardcoded message text ("You have 3 new notifications")
- ❌ Fire-and-forget (no Delivery log)
- ❌ No unsubscribe link (GDPR/CAN-SPAM violation)
- ❌ SMS with sensitive data (verify it yourself via link)
- ❌ No provider fallback (if Postmark down, no email sent)

---

## False Friends

1. **SMS character limit**
   - GSM-7 (ASCII only): 160 chars per SMS
   - UTF-8 (emojis): 70 chars per SMS
   - **Trap**: Sending emojis costs 2+ SMS segments without knowing

2. **Email deliverability**
   - SPF/DKIM/DMARC records needed (domain config, not code)
   - **Trap**: Code looks correct, but emails land in spam (auth headers missing)

3. **Webhook confirmations**
   - Postmark/Twilio send webhooks (bounce, delivery)
   - **Trap**: Webhook callback happens async; Delivery status not instant

4. **Rate limiting false positive**
   - User hits limit, gets silent fail (no notification sent, no error logged)
   - **Trap**: User thinks feature broke, actually hit rate limit

---

## Security

✓ Immutable Delivery log (audit)
✓ Unsubscribe link + validation
✓ No sensitive data in SMS/push (max: "Check your account")
✓ Tenant isolation (user only receives for their tenant)

⚠️ **Gaps**:
- [ ] Webhook signature validation (verify sender is Postmark, not attacker)
- [ ] Bounce auto-unsubscribe (hard bounce → auto-disable email for that address)
- [ ] Template injection protection (variable is user-controlled, could be malicious)

---

## Roadmap

1. **Template A/B Testing**
   - Variant A: "50% off"
   - Variant B: "Free shipping"
   - Track which converts better

2. **Delivery Preference UI**
   - User selects: email only, SMS only, both, push only
   - Respects preference per notification type

3. **Bounce Handling**
   - Hard bounce → auto-unsubscribe
   - Soft bounce → retry next day
   - Webhooks from provider auto-update Contact status

4. **Analytics**
   - Open rate (email tracking pixel)
   - Click rate (link tracking)
   - Conversion (user acts within 24h of notification)

5. **Timezone-Aware Scheduling**
   - Send email at 9am user's local time, not UTC

---

## Summary

```
┌──────────────────────────────────────────┐
│ Notify (Multi-Channel Notifications)     │
├──────────────────────────────────────────┤
│ Purpose: Email, SMS, Telegram, FCM       │
│ Models: 17                               │
│ Migrations: 22 (most complex)            │
│ Forms: 4 components                      │
│ Channels: 5 (email, SMS, Telegram, FCM, WhatsApp) │
│ Providers: 8+ (Postmark, Twilio, etc)    │
│ Status: Stable (production)              │
│ Dependencies: Xot, User, Job             │
│ Reverse: All modules                     │
└──────────────────────────────────────────┘
```

---

- **Generated**: 2026-09-06
- **Author**: Claude (eccentrico mode)

