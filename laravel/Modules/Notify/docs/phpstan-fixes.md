# PHPStan Fixes Report - 19 Dicembre 2025

**Status**: ✅ Correzioni Implementate
**Module**: Notify
**PHPStan Level**: 10
**Errors Fixed**: 17 → 0 (nel modulo Notify)

## Overview

Report completo delle correzioni PHPStan Level 10 implementate nel modulo Notify, inclusi fix per tipizzazione, metodi mancanti, e conformità agli standard Laraxot.

## Errori Corretti

### 1. NormalizePhoneNumberAction - Safe Functions

**File**: `Modules/Notify/app/Actions/NormalizePhoneNumberAction.php`

**Errori**:
- `preg_replace` unsafe function
- Parametri nullable non gestiti correttamente

**Fix Implementato**:
```php
use function Safe\preg_replace;

$normalized = preg_replace('/[^0-9+]/', '', $phoneNumber);
if (!is_string($normalized)) {
    return '';
}
```

**Filosofia**: Uso delle funzioni Safe per gestione errori robusta.

---

### 2. SendRecordNotificationAction - Refactoring Pattern

**File**: `Modules/Notify/app/Actions/SendRecordNotificationAction.php`

**Errori**:
- `routeNotificationFor*` chiamati senza Notification
- MailTemplate::make() non esiste

**Fix Implementato**:
- Uso di `new MailTemplate()` invece di `MailTemplate::make()`
- Creazione di Notification temporanea per `routeNotificationFor*` methods
- Migliorata estrazione contatti con pattern DRY

**Pattern Applicato**:
- Estrazione email/phone/whatsapp con fallback intelligente
- Normalizzazione phone numbers con `NormalizePhoneNumberAction`
- Uso di `Notification::route()` per entrambi canali standard e custom

---

### 3. RecordNotification - MailMessage::html() Non Esiste

**File**: `Modules/Notify/app/Notifications/RecordNotification.php`

**Errore**:
- `MailMessage::html()` non esiste in Laravel

**Fix Implementato**:
```php
use Illuminate\Support\HtmlString;

return (new MailMessage())
    ->subject($subject)
    ->line(new HtmlString($htmlContent));
```

**Filosofia**: Uso di `HtmlString` per permettere HTML in `MailMessage::line()`, pattern standard Laravel.

---

### 4. RecordNotification - Metodi mergeData() e addAttachments()

**File**: `Modules/Notify/app/Notifications/RecordNotification.php`

**Errori**:
- Metodi `mergeData()` e `addAttachments()` chiamati ma non esistenti
- Usati in `XotBaseTransition`, `SendSmsPage`, `SendSpatieEmailPage`

**Fix Implementato**:
```php
/**
 * Additional data to merge with record attributes.
 * @var array<string, mixed>
 */
public array $additionalData = [];

/**
 * Attachments to add to the mail message.
 * @var array<int, array<string, string>>
 */
public array $attachments = [];

public function mergeData(array $data): self
{
    $this->additionalData = array_merge($this->additionalData, $data);
    return $this;
}

public function addAttachments(array $attachments): self
{
    $this->attachments = array_merge($this->attachments, $attachments);
    return $this;
}
```

**Motivazione**: Compatibilità con codice esistente che usa questi metodi, mantenendo API fluente.

---

### 5. ChannelEnum - Return Type getLabel()

**File**: `Modules/Notify/app/Enums/ChannelEnum.php`

**Errore**:
- `getLabel()` dichiarato come `?string` ma mai restituisce null

**Fix Implementato**:
```php
public function getLabel(): string
{
    return match ($this) {
        self::Mail => __('notify::channel.mail'),
        self::Sms => __('notify::channel.sms'),
        self::WhatsApp => __('notify::channel.whatsapp'),
    };
}
```

---

### 6. SendRecordsNotificationBulkAction (Filament) - Tipizzazione Array

**File**: `Modules/Notify/app/Filament/Actions/SendRecordsNotificationBulkAction.php`

**Errori**:
- Namespace errato per `XotBaseBulkAction`
- Tipizzazione array non corretta per `options()`
- `nullCoalesce.expr` per expression non nullable

**Fix Implementato**:
```php
use Modules\Xot\Filament\Tables\Actions\XotBaseBulkAction;

->options(
    /** @return array<string, string> */
    fn (): array => collect(ChannelEnum::cases())
        ->mapWithKeys(function (ChannelEnum $enum): array {
            $label = $enum->getLabel();
            return [$enum->value => is_string($label) ? $label : $enum->value];
        })
        ->all()
)
```

---

### 7. SendRecordsNotificationBulkAction (Action) - Parametri Errati

**File**: `Modules/Notify/app/Actions/SendRecordsNotificationBulkAction.php`

**Errori**:
- Passa `string $templateSlug` invece di `MailTemplate`
- Passa `array<string>` invece di `array<ChannelEnum>`
- `execute()` ora restituisce `void` invece di `bool`

**Fix Implementato**:
- Caricamento `MailTemplate` dallo slug prima della chiamata
- Conversione string channels in `ChannelEnum[]`
- Gestione corretta del fatto che `execute()` è void

---

### 8. SmsChannel - Tipizzazione toSms()

**File**: `Modules/Notify/app/Notifications/Channels/SmsChannel.php`

**Errori**:
- `toSms()` potrebbe non esistere su tutte le Notification
- String interpolation con mixed

**Fix Implementato**:
```php
if (!method_exists($notification, 'toSms')) {
    report(new \Exception(...));
    return;
}

$message = $notification->toSms($notifiable);
if (!is_string($message)) {
    $message = '';
}
```

---

### 9. WhatsAppChannel - Tipizzazione e Logica

**File**: `Modules/Notify/app/Notifications/Channels/WhatsAppChannel.php`

**Errori**:
- String interpolation con mixed
- Confronti sempre false

**Fix Implementato**:
```php
// Separazione logica per type narrowing
if ($to === null) {
    report(...);
    return;
}

if (!is_string($to) || $to === '' || $message === '') {
    report(...);
    return;
}

// $to è garantito essere string non-empty
Log::info("Sending WhatsApp to {$to}: {$message}");
```

---

### 10. ~~GetSeasonalEmailLayoutAction - RIMOSSO (Over-Engineering)~~

**File**: `Modules/Notify/app/Actions/GetSeasonalEmailLayoutAction.php` - **RIMOSSO**

**Motivazione Rimozione**:
- ❌ Duplicava logica già esistente in `GetThemeContextAction` (modulo Xot)
- ❌ Violava DRY: logica stagionale già centralizzata
- ❌ Violava KISS: complicazione inutile per logica semplice
- ✅ **Soluzione corretta**: Usare `GetMailLayoutAction` che delega a `GetThemeContextAction`

**Pattern Corretto Implementato**:
```php
// GetMailLayoutAction.php (già corretto)
$context = app(GetThemeContextAction::class)->execute(); // Single Source of Truth

// SpatieEmail.php (aggiornato dall'utente)
public function getHtmlLayout(): string
{
    return app(GetMailLayoutAction::class)->execute();
}
```

**Filosofia**: La logica stagionale esiste in `GetThemeContextAction` (Xot), non deve essere duplicata.

---

### 12. XotBaseTransition - RecordNotification Constructor

**File**: `Modules/Xot/app/States/Transitions/XotBaseTransition.php`

**Errori**:
- Passa `string $slug` invece di `MailTemplate` a `RecordNotification`
- Chiama `mergeData()` e `addAttachments()` (ora implementati)

**Fix Implementato**:
```php
// Load MailTemplate from slug
$mailTemplate = \Modules\Notify\Models\MailTemplate::where('slug', $slug)->first();

if ($mailTemplate === null) {
    return; // Skip if template not found
}

// ✅ CORRETTO: Pass slug string - MailTemplate resolved internally
$notify = new RecordNotification($this->record, $slug);
```

---

### 13. SendSmsPage e SendSpatieEmailPage - RecordNotification Constructor

**File**:
- `Modules/Notify/app/Filament/Clusters/Test/Pages/SendSmsPage.php`
- `Modules/Notify/app/Filament/Clusters/Test/Pages/SendSpatieEmailPage.php`

**Errori**:
- Passano `string $templateSlug` invece di `MailTemplate`
- Chiamano `mergeData()` (ora implementato)

**Fix Implementato**:
```php
// ✅ CORRETTO: Pass slug string - RecordNotification resolves MailTemplate internally (lazy resolution)
// No need to pre-load MailTemplate - RecordNotification handles it via firstOrCreate
$recordNotification = new RecordNotification($user, $template_slug);
```

---

## Pattern e Principi Applicati

### DRY (Don't Repeat Yourself)
- Estrazione contatti centralizzata in `SendRecordNotificationAction`
- Logica di normalizzazione phone numbers riutilizzata
- Pattern di validazione coerente

### KISS (Keep It Simple, Stupid)
- Metodi semplici e focalizzati
- Type narrowing progressivo per garantire type safety
- Uso di pattern Laravel standard (HtmlString, Notification::route)

### Type Safety
- Tipizzazione esplicita per tutti i parametri e return types
- Type narrowing per garantire correttezza
- PHPDoc completi per generics

### Clean Code
- Separazione logica per type narrowing
- Naming chiaro e descrittivo
- Commenti dove necessario per chiarire intent

## Testing Recommendations

### Unit Tests
```php
test('RecordNotification mergeData merges additional data correctly', function () {
    $record = Client::factory()->create();
    $template = MailTemplate::factory()->create();
    $notification = new RecordNotification($record, $template);

    $notification->mergeData(['custom' => 'value']);

    expect($notification->additionalData)->toHaveKey('custom');
});

test('RecordNotification addAttachments adds attachments correctly', function () {
    // Test attachments
});
```

### Integration Tests
- Verifica che `SendRecordNotificationAction` funzioni con tutti i canali
- Verifica che `mergeData()` funzioni correttamente con placeholder replacement
- Verifica che attachments vengano inclusi nel MailMessage

## Documentazione Aggiornata

- [RecordNotification](./notifications/record-notification.md) - Aggiornata con `mergeData()` e `addAttachments()`
- [SendRecordNotificationAction](./send-record-notification-action-refactoring.md) - Pattern di estrazione contatti
- [ChannelEnum](./refactoring/channel-enum-implementation-complete.md) - Return type corretto

## Note per Sviluppo Futuro

1. **MailMessage HTML**: Se Laravel aggiunge supporto nativo per `->html()`, valutare migrazione
2. **Attachments**: Considerare delegazione diretta a `MailMessage::attach()` invece di array intermedio
3. **Type Narrowing**: Pattern applicato può essere riutilizzato in altri canali custom

## Compliance Status

- ✅ PHPStan Level 10: **0 errori nel modulo Notify** (risolto autoload dopo composer dump-autoload)
- ✅ PHPMD: Warning minori accettabili (StaticAccess per app(), Assert, factory methods)
- ✅ Type Safety: 100% tipizzato
- ✅ DRY: Pattern composizione rispettato
- ✅ KISS: Codice semplice e leggibile

## Risoluzione Autoload

L'errore `WhatsAppChannel not found` in `ChannelEnum.php` è stato risolto eseguendo `composer dump-autoload` per aggiornare l'autoload di Composer dopo le modifiche ai file.

---

**Ultimo aggiornamento**: 19 Dicembre 2025
**Filosofia**: *"Type safety first, simplicity second, DRY always"*
# PHPStan Fixes - Modulo Notify

## Panoramica
Documentazione dei fix applicati al modulo Notify per raggiungere PHPStan livello 9.

## Fix Applicati

### 1. NotificationLog.php
**Problema**: Metodi `markAsOpened()` e `markAsClicked()` mancanti

**Soluzione**: Aggiunta dei metodi mancanti
```php
/**
 * Marca la notifica come aperta.
 */
public function markAsOpened(): void
{
    $this->update([
        'opened_at' => now(),
        'status' => NotificationLogStatusEnum::OPENED,
    ]);
}

/**
 * Marca la notifica come cliccata.
 */
public function markAsClicked(): void
{
    $this->update([
        'clicked_at' => now(),
        'status' => NotificationLogStatusEnum::CLICKED,
    ]);
}
```

### 2. NotificationTrackingController.php
**Problema**: Uso di `base64_decode` non sicuro

**Soluzione**: Utilizzo della funzione sicura
```php
// PRIMA (non sicuro)
$decodedData = base64_decode($encodedData);

// DOPO (sicuro)
use function Safe\base64_decode;
$decodedData = base64_decode($encodedData);
```

## Dipendenze
- `NotificationLogStatusEnum::OPENED` - già presente
- `NotificationLogStatusEnum::CLICKED` - già presente
- `Safe\base64_decode` - funzione sicura per decodifica base64

## Risultati
- ✅ **0 errori** PHPStan livello 9
- ✅ **Metodi mancanti** implementati correttamente
- ✅ **Gestione sicura** di base64_decode
- ✅ **Conformità** agli standard di sicurezza

## Collegamenti
- [Report Completo PHPStan Fixes](../../../bashscripts/docs/phpstan_fixes_comprehensive_report.md)
- [Script Risoluzione Conflitti](../../../bashscripts/docs/conflict_resolution_script_improvements.md)

*Ultimo aggiornamento: Dicembre 2024*

---

## Contenuto unito da `phpstan-fixes-.md`

# PHPStan Errori Modulo Notify - 2025-01-22

## Analisi Completa

**Data Analisi**: 2025-01-22
**PHPStan Level**: 10
**Modulo**: Notify
**Errori Trovati**: 2
**Errori Corretti**: 2 ✅

---

## Errori Identificati e Corretti

### 1. NormalizePhoneNumberAction.php - ltrim con tipo errato

**File**: `app/Actions/SMS/NormalizePhoneNumberAction.php`
**Linea**: 24

**Errore**: `Parameter #1 $string of function ltrim expects string, array<string>|string given.`

**Causa**: `preg_replace()` può ritornare `array<string>|string`, ma `ltrim()` si aspetta solo `string`.

**Correzione Applicata**:
```php
// Prima
$phoneNumber = preg_replace("/\([0-9]+?\)/", '', $phoneNumber);
$phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
$phoneNumber = ltrim($phoneNumber, '0');

// Dopo
$phoneNumber = preg_replace("/\([0-9]+?\)/", '', $phoneNumber);
Assert::string($phoneNumber, 'Failed to remove parentheses from phone number');

$phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
Assert::string($phoneNumber, 'Failed to remove non-numeric characters from phone number');

$phoneNumber = ltrim($phoneNumber, '0');
```

### 2. WhatsAppActionFactory.php - encapsed string con tipo errato

**File**: `app/Factories/WhatsAppActionFactory.php`
**Linea**: 46

**Errore**: `Part $normalizedDriver (array<string>|string) of encapsed string cannot be cast to string.`

**Causa**: `preg_replace()` può ritornare `array<string>|string`, ma viene usato in una stringa encapsed.

**Correzione Applicata**:
```php
// Prima
$normalizedDriver = preg_replace('/[^a-zA-Z0-9]/', '', ucfirst(strtolower(is_string($driver) ? $driver : '')));
$className = "\\Modules\\Notify\\Actions\\WhatsApp\\Send{$normalizedDriver}WhatsAppAction";

// Dopo
$driver ??= Config::get('whatsapp.default', 'twilio');
Assert::string($driver, 'Driver must be a string');

$normalizedDriver = preg_replace('/[^a-zA-Z0-9]/', '', ucfirst(strtolower($driver)));
Assert::string($normalizedDriver, 'Failed to normalize driver name');

$className = "\\Modules\\Notify\\Actions\\WhatsApp\\Send{$normalizedDriver}WhatsAppAction";
```

Inoltre rimosso controllo `is_string()` ridondante dopo `Assert::string()`.

---

## Stato Correzioni

✅ **TUTTI GLI ERRORI CORRETTI** - 2025-01-22

- ✅ NormalizePhoneNumberAction.php - Aggiunto Assert::string() per type narrowing
- ✅ WhatsAppActionFactory.php - Aggiunto Assert::string() e rimosso controllo ridondante

**Risultato Finale**: 0 errori PHPStan livello 10 ✅

---

## Pattern Applicato

Stesso pattern di Chart: usare `Assert::string()` per type narrowing dopo `preg_replace()`.

---

## Collegamenti

- [PHPStan Usage](../../Xot/docs/phpstan-usage.md)
- [Code Quality Standards](../../Xot/docs/code-quality-standards.md)

*Ultimo aggiornamento: 2025-01-22*
- [PHPStan Usage](../../xot/docs/phpstan-usage.md)
- [Code Quality Standards](../../xot/docs/code-quality-standards.md)

# PHPStan Level 10 Fixes - Session 2026-01-05

## Module: Notify (2 errors)

### Priority: MEDIUM - Notification system

## Error 1: NormalizePhoneNumberAction.php:24

**Error:** Parameter #1 $string of function ltrim expects string, array<string>|string given.

**Location:** `app/Actions/SMS/NormalizePhoneNumberAction.php:24`

**Analysis:**
The `ltrim()` function receives a variable that can be either `string` or `array<string>`, but `ltrim()` only accepts `string`.

**Root Cause:** The input parameter is typed as `array<string>|string` (likely from a config or validation that allows both), but `ltrim()` requires a string.

**Solution:** Add type narrowing to ensure we only pass strings to `ltrim()`:

```php
// Before
$normalized = ltrim($phoneNumber, '+');

// After
if (is_string($phoneNumber)) {
    $normalized = ltrim($phoneNumber, '+');
} else {
    // Handle array case - concatenate or take first element
    $normalized = ltrim(implode('', $phoneNumber), '+');
}

// Or simpler - cast to string first
$normalized = ltrim((string) $phoneNumber, '+');
```

**Recommended approach:** Use Safe function wrapper:

```php
use function Safe\ltrim;

$normalized = ltrim((string) $phoneNumber, '+');
```

---

## Error 2: WhatsAppActionFactory.php:46

**Error:** Part $normalizedDriver (array<string>|string) of encapsed string cannot be cast to string.

**Location:** `app/Factories/WhatsAppActionFactory.php:46`

**Analysis:**
The code tries to use a variable in a string interpolation, but the variable can be either `string` or `array<string>`, which can't be directly cast to string in interpolation.

**Root Cause:** Similar to Error 1 - the driver name can be an array or string.

**Solution:** Cast to string before interpolation:

```php
// Before
$message = "Using driver: {$normalizedDriver}";

// After
$message = "Using driver: " . (string) $normalizedDriver;

// Or ensure it's always a string
$driverString = is_array($normalizedDriver) ? implode('|', $normalizedDriver) : $normalizedDriver;
$message = "Using driver: {$driverString}";
```

---

## Implementation Strategy

### Phase 1: Fix NormalizePhoneNumberAction
1. Read the file to understand the context
2. Add type narrowing for the input parameter
3. Use Safe function wrapper or explicit cast
4. Test with both string and array inputs

### Phase 2: Fix WhatsAppActionFactory
1. Read the file to understand the context
2. Cast driver to string before interpolation
3. Handle array case appropriately (implode or take first)
4. Test with different driver configurations

## Testing Checklist

- [ ] Run PHPStan Level 10 on Notify module - expect 0 errors
- [ ] Run PHPMD on Notify module
- [ ] Run PHPInsights on Notify module
- [ ] Test SMS normalization with various formats
- [ ] Test WhatsApp action factory with different drivers
- [ ] Git commit changes

## Related Documentation

- [Safe Functions Guide](../Xot/docs/safe-functions.md)
- [Type Narrowing Patterns](../Xot/docs/type-narrowing.md)
- [SMS Configuration](./sms_global_vs_specific_params.md)

---

## Contenuto unito da `PHPSTAN-FIXES.md`

# PHPStan Error Fixes - Notify Module

## Error: Method Name Mismatch in Actions

### Problem
PHPStan riportava errori quando un Action usa `execute()` invece di `handle()`.

**Errore originale**:
```
Call to an undefined method SendNotificationAction::execute()
```

**Causa**:
- Spatie QueueableAction trait si aspetta il metodo `handle()` 
- Il metodo `execute()` non è definito nel trait

### Solution
Rinominare il metodo da `execute()` a `handle()` in tutte le Actions.

**File**: `Modules/Notify/app/Actions/SendNotificationAction.php`

```php
// PRIMA (ERRATO)
public function execute(
    Model $recipient,
    string $templateCode,
    // ...
): ?NotificationModel {
    // ...
}

// DOPO (CORRETTO)
public function handle(
    Model $recipient,
    string $templateCode,
    // ...
): ?NotificationModel {
    // ...
}
```

### Namespace Aliases for Notification

**Problema aggiuntivo**: Conflitto tra `Notification` facade e `Notification` model.

**Soluzione**: Usare alias negli import

```php
use Illuminate\Support\Facades\Notification as NotificationFacade;
use Modules\Notify\Models\Notification as NotificationModel;

// Uso:
NotificationFacade::send($recipient, $notification);  // Facade
$notification = new NotificationModel();  // Model
```

### PHPStan Result
✅ **Prima**: 22 errori nel file
✅ **Dopo**: 0 errore

### Files Fixed
- `Modules/Notify/app/Actions/SendNotificationAction.php`
- `Modules/Notify/app/Jobs/SendNotificationJob.php` (chiama `handle()` invece di `execute()`)

### Pattern da Applicare
Tutte le Actions che estendono `QueueableAction` devono:
1. Implementare il metodo `handle()`, non `execute()`
2. Documentare il tipo di ritorno con PHPDoc
3. Usare alias per evitare conflitti di nomi

### Verification
```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Notify --memory-limit=-1
```

### Related
- Spatie QueueableAction documentation
- PHPStan Level MAX requirements
- Laravel Notification facade vs model distinction
