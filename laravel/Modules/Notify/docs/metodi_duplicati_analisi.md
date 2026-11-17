---
title: "metodi duplicati analisi"
type: note
created: 2026-09-26
updated: 2026-09-26
qmd: "metodi duplicati analisi"
issues: []
discussions: []
module: Notify
topic: METODI_DUPLICATI_ANALISI
tags: [metodi-duplicati, refactoring]
canonical: ../../../Themes/One/docs/shared-components/METODI_DUPLICATI_ANALISI.md
<<<<<<< HEAD
status: stub
---

# Metodi Duplicati: Analisi Notify
=======
---

# Metodi Duplicati — Analisi Notify
>>>>>>> laraxot/dev

Elenco dei metodi duplicati (cross-file e cross-modulo) che coinvolgono il modulo **Notify**, estratti dal report globale generato da `/tmp/metodi_duplicati_domain_report.md`.

## Metodo: `via` (14 occorrenze)

**Moduli coinvolti:** Job, Notify, Progressioni, Ptv, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Notifications/EmailDataNotification.php`
- `./laravel/Modules/Notify/app/Notifications/FirebaseAndroidNotification.php`
- `./laravel/Modules/Notify/app/Notifications/GenericNotification.php`
- `./laravel/Modules/Notify/app/Notifications/RecordNotification.php`
- `./laravel/Modules/Notify/app/Notifications/SmsNotification.php`
- `./laravel/Modules/Notify/app/Notifications/TelegramNotification.php`
- `./laravel/Modules/Notify/app/Notifications/ThemeNotification.php`
- `./laravel/Modules/Notify/app/Notifications/TicketAssignedNotification.php`
- `./laravel/Modules/Notify/app/Notifications/TicketStatusChangedNotification.php`
- `./laravel/Modules/Notify/app/Notifications/WhatsAppNotification.php`

<<<<<<< HEAD
[Riflessione: Presente in 5 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 5 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `getUser` (14 occorrenze)

**Moduli coinvolti:** Notify, User, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendAwsEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmail.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendFirebasePushNotificationPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendNetfunSmsPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotification.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotificationPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSmsPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSpatieEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendTelegram.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendWhatsAppPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/TestSmtpPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getModel` (13 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Media, Notify, Ptv, User, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Contracts/CanThemeNotificationContract.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getHeaderWidgets` (13 occorrenze)

**Moduli coinvolti:** Job, Media, Notify, Ptv, UI, User, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Pages/SettingPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getDescription` (12 occorrenze)

**Moduli coinvolti:** MobilitaVolontaria, Notify, Pdnd, Seo, UI, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/SmsDriverEnum.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `get` (11 occorrenze)

**Moduli coinvolti:** Lang, Media, Notify, Seo, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Helpers/ConfigHelper.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `toMail` (10 occorrenze)

**Moduli coinvolti:** Job, Notify, Progressioni, Ptv, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Notifications/EmailDataNotification.php`
- `./laravel/Modules/Notify/app/Notifications/GenericNotification.php`
- `./laravel/Modules/Notify/app/Notifications/RecordNotification.php`
- `./laravel/Modules/Notify/app/Notifications/ThemeNotification.php`
- `./laravel/Modules/Notify/app/Notifications/TicketAssignedNotification.php`
- `./laravel/Modules/Notify/app/Notifications/TicketStatusChangedNotification.php`

<<<<<<< HEAD
[Riflessione: Presente in 5 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 5 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `failed` (8 occorrenze)

**Moduli coinvolti:** DbForge, Job, Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Jobs/SendNotificationJob.php`
- `./laravel/Modules/Notify/app/Jobs/SendScheduledPushNotification.php`

<<<<<<< HEAD
[Riflessione: Presente in 4 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 4 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `envelope` (8 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Notify, Performance, Progressioni, Ptv

**File in Notify:**

- `./laravel/Modules/Notify/app/Emails/EmailDataEmail.php`
- `./laravel/Modules/Notify/app/Emails/SpatieEmail.php`
- `./laravel/Modules/Notify/app/Mail/AppointmentNotificationMail.php`
- `./laravel/Modules/Notify/app/Mail/ChristmasGreetingMailable.php`

<<<<<<< HEAD
[Riflessione: Presente in 5 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 5 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `attachments` (8 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Notify, Performance, Progressioni, Ptv

**File in Notify:**

- `./laravel/Modules/Notify/app/Emails/EmailDataEmail.php`
- `./laravel/Modules/Notify/app/Emails/SpatieEmail.php`
- `./laravel/Modules/Notify/app/Mail/AppointmentNotificationMail.php`
- `./laravel/Modules/Notify/app/Mail/ChristmasGreetingMailable.php`

<<<<<<< HEAD
[Riflessione: Presente in 5 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 5 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `sendEmail` (7 occorrenze)

**Moduli coinvolti:** Media, Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendAwsEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmail.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSpatieEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendTelegram.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/TestSmtpPage.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `options` (7 occorrenze)

**Moduli coinvolti:** Notify, Performance, UI, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/MediaTypeEnum.php`
- `./laravel/Modules/Notify/app/Enums/TelegramDriverEnum.php`
- `./laravel/Modules/Notify/app/Enums/WhatsAppDriverEnum.php`

<<<<<<< HEAD
[Riflessione: Presente in 4 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 4 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `content` (7 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Notify, Performance, Progressioni, Ptv

**File in Notify:**

- `./laravel/Modules/Notify/app/Emails/EmailDataEmail.php`
- `./laravel/Modules/Notify/app/Mail/AppointmentNotificationMail.php`
- `./laravel/Modules/Notify/app/Mail/ChristmasGreetingMailable.php`

<<<<<<< HEAD
[Riflessione: Presente in 5 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 5 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `getSlug` (6 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Emails/SpatieEmail.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendAwsEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendNetfunSmsPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSmsPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendWhatsAppPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getInstance` (6 occorrenze)

**Moduli coinvolti:** Media, Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Services/MailEngines/MailtrapEngine.php`
- `./laravel/Modules/Notify/app/Services/SmsService.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getEmailFormActions` (6 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendAwsEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmail.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSpatieEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendTelegram.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/TestSmtpPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `emailForm` (6 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendAwsEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmail.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSpatieEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendTelegram.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/TestSmtpPage.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `getTimeout` (5 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Datas/SMS/GammuData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/NexmoData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/PlivoData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/SmsFactorData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/TwilioData.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getAuthHeaders` (5 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Datas/SMS/AgiletelecomData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/NexmoData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/PlivoData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/SmsFactorData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/TwilioData.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `forUser` (5 occorrenze)

**Moduli coinvolti:** Notify, User

**File in Notify:**

- `./laravel/Modules/Notify/database/factories/NotifyThemeableFactory.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `template` (4 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Models/MailTemplateLog.php`
- `./laravel/Modules/Notify/app/Models/MailTemplateVersion.php`
- `./laravel/Modules/Notify/app/Models/NotificationLog.php`
- `./laravel/Modules/Notify/app/Models/NotificationTemplateVersion.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `sendMail` (4 occorrenze)

**Moduli coinvolti:** IndennitaResponsabilita, Notify, Progressioni

**File in Notify:**

- `./laravel/Modules/Notify/app/Actions/SendNotificationAction.php`

<<<<<<< HEAD
[Riflessione: Presente in 3 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 3 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `scopeActive` (4 occorrenze)

**Moduli coinvolti:** Job, Notify, Sigma, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Models/NotificationTemplate.php`

<<<<<<< HEAD
[Riflessione: Presente in 4 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 4 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `label` (4 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/NotificationLogStatusEnum.php`
- `./laravel/Modules/Notify/app/Enums/NotificationTypeEnum.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `icon` (4 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/NotificationLogStatusEnum.php`
- `./laravel/Modules/Notify/app/Enums/NotificationTypeEnum.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `getSubheading` (4 occorrenze)

**Moduli coinvolti:** Notify, Ptv, Sigma, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Resources/NotificationTemplateResource/Pages/PreviewNotificationTemplate.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getSlugOptions` (4 occorrenze)

**Moduli coinvolti:** Lang, Notify, Rating, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Models/MailTemplate.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getPath` (4 occorrenze)

**Moduli coinvolti:** Media, Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Datas/SMS/GammuData.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getDefault` (4 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/MediaTypeEnum.php`
- `./laravel/Modules/Notify/app/Enums/SmsDriverEnum.php`
- `./laravel/Modules/Notify/app/Enums/TelegramDriverEnum.php`
- `./laravel/Modules/Notify/app/Enums/WhatsAppDriverEnum.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getConfig` (4 occorrenze)

**Moduli coinvolti:** Notify, Tenant

**File in Notify:**

- `./laravel/Modules/Notify/app/Datas/SMS/GammuData.php`
- `./laravel/Modules/Notify/app/Notifications/SmsNotification.php`
- `./laravel/Modules/Notify/app/Notifications/WhatsAppNotification.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getBaseUrl` (4 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Datas/SMS/NexmoData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/PlivoData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/SmsFactorData.php`
- `./laravel/Modules/Notify/app/Datas/SMS/TwilioData.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `color` (4 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/NotificationLogStatusEnum.php`
- `./laravel/Modules/Notify/app/Enums/NotificationTypeEnum.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `toSms` (3 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Notifications/RecordNotification.php`
- `./laravel/Modules/Notify/app/Notifications/SmsNotification.php`
- `./laravel/Modules/Notify/app/Notifications/ThemeNotification.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `sendNotification` (3 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotification.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotificationPage.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `login` (3 occorrenze)

**Moduli coinvolti:** Activity, Notify, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Actions/EsendexSendAction.php`

<<<<<<< HEAD
[Riflessione: Presente in 3 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 3 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `linkable` (3 occorrenze)

**Moduli coinvolti:** Incentivi, Lang, Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Models/NotifyTheme.php`

<<<<<<< HEAD
[Riflessione: Presente in 3 moduli diversi: forte candidato per refactoring in trait/modulo Xot o helper condiviso]
=======
[Riflessione: Presente in 3 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]
>>>>>>> laraxot/dev

---

## Metodo: `labels` (3 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/MediaTypeEnum.php`
- `./laravel/Modules/Notify/app/Enums/TelegramDriverEnum.php`
- `./laravel/Modules/Notify/app/Enums/WhatsAppDriverEnum.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `isSupported` (3 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/MediaTypeEnum.php`
- `./laravel/Modules/Notify/app/Enums/TelegramDriverEnum.php`
- `./laravel/Modules/Notify/app/Enums/WhatsAppDriverEnum.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getEmailFormSchema` (3 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendAwsEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendEmailPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSpatieEmailPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getContent` (3 occorrenze)

**Moduli coinvolti:** Media, Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Datas/EmailAttachmentData.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `email` (3 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/database/factories/NotificationChannelFactory.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `try` (2 occorrenze)

**Moduli coinvolti:** Job, Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Services/MailEngines/MailtrapEngine.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `toCloudMessage` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Contracts/MobilePushNotification.php`
- `./laravel/Modules/Notify/app/Notifications/FirebaseAndroidNotification.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `smsForm` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendNetfunSmsPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSmsPage.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `setLocalVars` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Services/MailEngines/MailtrapEngine.php`
- `./laravel/Modules/Notify/app/Services/SmsService.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `sendSms` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Actions/SendNotificationAction.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendNetfunSmsPage.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `sendEmailCallback` (2 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Contracts/CanThemeNotificationContract.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `scopeForChannel` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Models/NotificationLog.php`
- `./laravel/Modules/Notify/app/Models/NotificationTemplate.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `notifications` (2 occorrenze)

**Moduli coinvolti:** Notify, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Traits/HasTenantNotifications.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `notificationForm` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotification.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotificationPage.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `mergeData` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Emails/SpatieEmail.php`
- `./laravel/Modules/Notify/app/Notifications/RecordNotification.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `increase` (2 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Contracts/CanThemeNotificationContract.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `getTemplate` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Services/NotificationManager.php`
- `./laravel/Modules/Notify/app/Services/PushNotificationService.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getSmsFormSchema` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendNetfunSmsPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSmsPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getSmsFormActions` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendNetfunSmsPage.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendSmsPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getProvider` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Notifications/SmsNotification.php`
- `./laravel/Modules/Notify/app/Notifications/WhatsAppNotification.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getNotificationFormActions` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotification.php`
- `./laravel/Modules/Notify/app/Filament/Clusters/Test/Pages/SendPushNotificationPage.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getNotificationData` (2 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Contracts/CanThemeNotificationContract.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getMobileDeviceTokens` (2 occorrenze)

**Moduli coinvolti:** Notify, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Contracts/CanReceivePushNotifications.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getKey` (2 occorrenze)

**Moduli coinvolti:** Notify, User

**File in Notify:**

- `./laravel/Modules/Notify/app/Contracts/CanReceivePushNotifications.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getEasterDate` (2 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Actions/DetermineSeasonalContentViewPathAction.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `getColumnDefinitions` (2 occorrenze)

**Moduli coinvolti:** Notify, Xot

**File in Notify:**

- `./laravel/Modules/Notify/app/Enums/ContactTypeEnum.php`

<<<<<<< HEAD
[Riflessione: Metodo getter/setter: possibile trait o interfaccia condivisa]
=======
[Riflessione: Metodo getter/setter — possibile trait o interfaccia condivisa]
>>>>>>> laraxot/dev

---

## Metodo: `from` (2 occorrenze)

**Moduli coinvolti:** Media, Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Datas/SmsData.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `fieldOptions` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Filament/Resources/NotifyThemeResource.php`
- `./laravel/Modules/Notify/app/Filament/Resources/NotifyThemeResource/Schemas/NotifyThemeForm.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `disabled` (2 occorrenze)

**Moduli coinvolti:** Notify, Ptv

**File in Notify:**

- `./laravel/Modules/Notify/database/factories/NotificationChannelFactory.php`

<<<<<<< HEAD
[Riflessione: Presente in 2 moduli: valutare se la logica è identica (refactoring) o volutamente diversa (override)]
=======
[Riflessione: Presente in 2 moduli — valutare se la logica è identica (refactoring) o volutamente diversa (override)]
>>>>>>> laraxot/dev

---

## Metodo: `determineMediaType` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Actions/WhatsApp/Send360dialogWhatsAppAction.php`
- `./laravel/Modules/Notify/app/Actions/WhatsApp/SendVonageWhatsAppAction.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Metodo: `addAttachments` (2 occorrenze)

**Moduli coinvolti:** Notify

**File in Notify:**

- `./laravel/Modules/Notify/app/Emails/SpatieEmail.php`
- `./laravel/Modules/Notify/app/Notifications/RecordNotification.php`

<<<<<<< HEAD
[Riflessione: Duplicato interno al modulo Notify: valutare estrazione in trait di modulo o classe base]
=======
[Riflessione: Duplicato interno al modulo Notify — valutare estrazione in trait di modulo o classe base]
>>>>>>> laraxot/dev

---

## Riflessioni per Notify

- **Totale metodi duplicati che coinvolgono Notify:** 67
- **Di cui cross-modulo:** 41
- **Di cui interni al modulo:** 26

### Pattern di riflessione

- **refactoring in trait/classe base/helper:** 54 metodi
- **altro:** 13 metodi

### Moduli con maggiori duplicazioni incrociate

- **Xot:** 35 metodi in comune
- **User:** 20 metodi in comune
- **Ptv:** 11 metodi in comune
- **Media:** 10 metodi in comune
- **Job:** 8 metodi in comune
- **Progressioni:** 7 metodi in comune
- **IndennitaResponsabilita:** 5 metodi in comune
- **UI:** 5 metodi in comune
- **Seo:** 5 metodi in comune
- **Performance:** 5 metodi in comune

---
<<<<<<< HEAD
_Report generato automaticamente: fonte: `/tmp/metodi_duplicati_domain_report.md`_
=======
_Report generato automaticamente — fonte: `/tmp/metodi_duplicati_domain_report.md`_
>>>>>>> laraxot/dev
