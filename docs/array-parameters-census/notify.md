# Modulo Notify — metodi con parametro `array`

[← Torna all'indice](../array-parameters-census.md)

Totale metodi trovati: **121**

---

## `Modules/Notify/app/Actions/BuildMailMessageAction.php`

Namespace: `Modules\Notify\Actions`

### `public function execute(...)` — class `BuildMailMessageAction` (linea 24)

```php
function execute(string $name, Model $model, array $view_params = [], ?DataCollection $dataCollection = null,)
```

**Parametri array:**
- `array $view_params = []`

---

## `Modules/Notify/app/Actions/Mail/Engines/Duocircle/SendDuocircleMailAction.php`

Namespace: `Modules\Notify\Actions\Mail\Engines\Duocircle`

### `public function execute(...)` — class `SendDuocircleMailAction` (linea 37)

```php
function execute(array $vars = [])
```

**Parametri array:**
- `array $vars = []`

---

## `Modules/Notify/app/Actions/Mail/Engines/Duocircle/TryDuocircleMailAction.php`

Namespace: `Modules\Notify\Actions\Mail\Engines\Duocircle`

### `public function execute(...)` — class `TryDuocircleMailAction` (linea 31)

```php
function execute(array $vars = [])
```

**Parametri array:**
- `array $vars = []`

---

## `Modules/Notify/app/Actions/Mail/SendMailAction.php`

Namespace: `Modules\Notify\Actions\Mail`

### `public function execute(...)` — class `SendMailAction` (linea 37)

```php
function execute(string $to, ?string $body = null, array $vars = [], ?string $from = null, string $driver = 'duocircle')
```

**Parametri array:**
- `array $vars = []`

---

## `Modules/Notify/app/Actions/Mail/SendMailtrapMailAction.php`

Namespace: `Modules\Notify\Actions\Mail`

### `public function execute(...)` — class `SendMailtrapMailAction` (linea 23)

```php
function execute(string $to, string $body, array $vars = [], ?string $from = null)
```

**Parametri array:**
- `array $vars = []`

---

## `Modules/Notify/app/Actions/Mail/TryMailAction.php`

Namespace: `Modules\Notify\Actions\Mail`

### `public function execute(...)` — class `TryMailAction` (linea 37)

```php
function execute(string $to = '', ?string $body = null, array $vars = [], ?string $from = null, string $driver = 'duocircle')
```

**Parametri array:**
- `array $vars = []`

---

## `Modules/Notify/app/Actions/NotificationManager.php`

Namespace: `Modules\Notify\Actions`

### `public function send(...)` — class `NotificationManager` (linea 26)

```php
function send(Model $recipient, string $templateCode, array $data = [], array $channels = [], array $options = [],)
```

**Parametri array:**
- `array $data = []`
- `array $channels = []`
- `array $options = []`

### `public function sendMultiple(...)` — class `NotificationManager` (linea 57)

```php
function sendMultiple(array $recipients, string $templateCode, array $data = [], array $channels = [], array $options = [],)
```

**Parametri array:**
- `array $recipients`
- `array $data = []`
- `array $channels = []`
- `array $options = []`

---

## `Modules/Notify/app/Actions/NotifyTheme/Attachment/Pdf.php`

Namespace: `Modules\Notify\Actions\NotifyTheme\Attachment`

### `public function execute(...)` — class `Pdf` (linea 25)

```php
function execute(string $post_type, array $view_params)
```

**Parametri array:**
- `array $view_params`

---

## `Modules/Notify/app/Actions/NotifyTheme/Get.php`

Namespace: `Modules\Notify\Actions\NotifyTheme`

### `public function execute(...)` — class `Get` (linea 23)

```php
function execute(string $name, string $type, array $view_params)
```

**Parametri array:**
- `array $view_params`

---

## `Modules/Notify/app/Actions/Push/SchedulePushNotificationAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SchedulePushNotificationAction` (linea 24)

```php
function execute(array $tokens, PushNotificationData $notification, array $data, DateTime $scheduleTime)
```

**Parametri array:**
- `array $tokens`
- `array $data`

---

## `Modules/Notify/app/Actions/Push/SendPushToAllUsersAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SendPushToAllUsersAction` (linea 21)

```php
function execute(PushNotificationData $notification, array $data = [])
```

**Parametri array:**
- `array $data = []`

---

## `Modules/Notify/app/Actions/Push/SendPushToDeviceAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SendPushToDeviceAction` (linea 27)

```php
function execute(string $token, PushNotificationData $notification, array $data = [])
```

**Parametri array:**
- `array $data = []`

---

## `Modules/Notify/app/Actions/Push/SendPushToDevicesAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SendPushToDevicesAction` (linea 25)

```php
function execute(array $tokens, PushNotificationData $notification, array $data = [])
```

**Parametri array:**
- `array $tokens`
- `array $data = []`

### `private function sendBatchToPlatform(...)` — class `SendPushToDevicesAction` (linea 59)

```php
function sendBatchToPlatform(string $platform, array $tokens, PushNotificationData $notification, array $data)
```

**Parametri array:**
- `array $tokens`
- `array $data`

### `private function groupTokensByPlatform(...)` — class `SendPushToDevicesAction` (linea 98)

```php
function groupTokensByPlatform(array $tokens)
```

**Parametri array:**
- `array $tokens`

---

## `Modules/Notify/app/Actions/Push/SendPushToPlatformAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SendPushToPlatformAction` (linea 29)

```php
function execute(string $platform, string $token, PushNotificationData $notification, array $data = [])
```

**Parametri array:**
- `array $data = []`

### `private function sendFCMNotification(...)` — class `SendPushToPlatformAction` (linea 43)

```php
function sendFCMNotification(string $token, PushNotificationData $notification, array $data)
```

**Parametri array:**
- `array $data`

### `private function sendWebPushNotification(...)` — class `SendPushToPlatformAction` (linea 104)

```php
function sendWebPushNotification(PushNotificationData $notification, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/app/Actions/Push/SendPushToTopicAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SendPushToTopicAction` (linea 31)

```php
function execute(string $topic, PushNotificationData $notification, array $data = [])
```

**Parametri array:**
- `array $data = []`

### `private function sendTopicToPlatform(...)` — class `SendPushToTopicAction` (linea 59)

```php
function sendTopicToPlatform(string $platform, string $topic, PushNotificationData $notification, array $data)
```

**Parametri array:**
- `array $data`

### `private function sendFCMTopicNotification(...)` — class `SendPushToTopicAction` (linea 83)

```php
function sendFCMTopicNotification(string $topic, PushNotificationData $notification, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/app/Actions/Push/SendPushWithTargetingAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SendPushWithTargetingAction` (linea 22)

```php
function execute(PushCriteriaData $criteria, PushNotificationData $notification, array $data = [])
```

**Parametri array:**
- `array $data = []`

---

## `Modules/Notify/app/Actions/Push/SendPushWithTemplateAction.php`

Namespace: `Modules\Notify\Actions\Push`

### `public function execute(...)` — class `SendPushWithTemplateAction` (linea 24)

```php
function execute(string $templateId, array $tokens, array $variables = [])
```

**Parametri array:**
- `array $tokens`
- `array $variables = []`

### `private function processTemplate(...)` — class `SendPushWithTemplateAction` (linea 74)

```php
function processTemplate(array $template, array $variables)
```

**Parametri array:**
- `array $template`
- `array $variables`

---

## `Modules/Notify/app/Actions/SendAppointmentNotificationAction.php`

Namespace: `Modules\Notify\Actions`

### `public function execute(...)` — class `SendAppointmentNotificationAction` (linea 31)

```php
function execute(mixed $appointment, string $type, array $additionalData = [])
```

**Parametri array:**
- `array $additionalData = []`

---

## `Modules/Notify/app/Actions/SendNotificationAction.php`

Namespace: `Modules\Notify\Actions`

### `public function handle(...)` — class `SendNotificationAction` (linea 31)

```php
function handle(Model $recipient, string $templateCode, array $data = [], array $channels = [], array $options = [],)
```

**Parametri array:**
- `array $data = []`
- `array $channels = []`
- `array $options = []`

### `protected function sendViaChannel(...)` — class `SendNotificationAction` (linea 80)

```php
function sendViaChannel(Model $recipient, NotificationTemplate $template, string $channel, array $compiled, array $data, array $options,)
```

**Parametri array:**
- `array $compiled`
- `array $data`
- `array $options`

### `protected function sendMail(...)` — class `SendNotificationAction` (linea 102)

```php
function sendMail(Model $recipient, array $compiled, array $options)
```

**Parametri array:**
- `array $compiled`
- `array $options`

### `protected function sendDatabase(...)` — class `SendNotificationAction` (linea 136)

```php
function sendDatabase(Model $recipient, NotificationTemplate $template, array $compiled, array $data, array $options,)
```

**Parametri array:**
- `array $compiled`
- `array $data`
- `array $options`

### `protected function sendSms(...)` — class `SendNotificationAction` (linea 176)

```php
function sendSms(Model $recipient, array $compiled, array $options)
```

**Parametri array:**
- `array $compiled`
- `array $options`

---

## `Modules/Notify/app/Actions/SendRecordNotificationAction.php`

Namespace: `Modules\Notify\Actions`

### `public function execute(...)` — class `SendRecordNotificationAction` (linea 24)

```php
function execute(Model $record, string $mailTemplateSlug, array $channels,)
```

**Parametri array:**
- `array $channels`

---

## `Modules/Notify/app/Actions/SendRecordsNotificationAction.php`

Namespace: `Modules\Notify\Actions`

### `public function execute(...)` — class `SendRecordsNotificationAction` (linea 45)

```php
function execute(Collection $records, string $templateSlug, array $channels,)
```

**Parametri array:**
- `array $channels`

---

## `Modules/Notify/app/Console/Commands/AnalyzeTranslationFiles.php`

Namespace: `Modules\Notify\Console\Commands`

### `private function flattenArray(...)` — class `AnalyzeTranslationFiles` (linea 92)

```php
function flattenArray(array $array, string $prefix = '')
```

**Parametri array:**
- `array $array`

### `private function analyzeStructurePatterns(...)` — class `AnalyzeTranslationFiles` (linea 114)

```php
function analyzeStructurePatterns(array $allFiles)
```

**Parametri array:**
- `array $allFiles`

### `private function generateConsistencyReport(...)` — class `AnalyzeTranslationFiles` (linea 154)

```php
function generateConsistencyReport(array $allFiles, array $allKeys)
```

**Parametri array:**
- `array $allFiles`
- `array $allKeys`

### `private function generateRecommendations(...)` — class `AnalyzeTranslationFiles` (linea 186)

```php
function generateRecommendations(array $allFiles)
```

**Parametri array:**
- `array $allFiles`

### `private function analyzeNavigationStructure(...)` — class `AnalyzeTranslationFiles` (linea 227)

```php
function analyzeNavigationStructure(array $allFiles)
```

**Parametri array:**
- `array $allFiles`

---

## `Modules/Notify/app/Contracts/CanThemeNotificationContract.php`

Namespace: `Modules\Notify\Contracts`

### `public function getNotificationData(...)` — interface `CanThemeNotificationContract` (linea 18)

```php
function getNotificationData(string $name, array $view_params = [])
```

**Parametri array:**
- `array $view_params = []`

### `public function increase(...)` — interface `CanThemeNotificationContract` (linea 35)

```php
function increase(string $what, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/app/Contracts/NotificationDispatcherContract.php`

Namespace: `Modules\Notify\Contracts`

### `public function broadcast(...)` — interface `NotificationDispatcherContract` (linea 29)

```php
function broadcast(string|Notification $notification, array $recipients)
```

**Parametri array:**
- `array $recipients`

---

## `Modules/Notify/app/Contracts/NotificationDispatcherInterface.php`

Namespace: `Modules\Notify\Contracts`

### `public function broadcast(...)` — interface `NotificationDispatcherInterface` (linea 29)

```php
function broadcast(string|Notification $notification, array $recipients)
```

**Parametri array:**
- `array $recipients`

---

## `Modules/Notify/app/Datas/EmailData.php`

Namespace: `Modules\Notify\Datas`

### `public function __construct(...)` — class `EmailData` (linea 34)

```php
function __construct(string $recipient, string $subject, string $body_html, array $attachments = [], ?string $from = null, ?string $from_email = null, ?string $body = null,)
```

**Parametri array:**
- `array $attachments = []`

---

## `Modules/Notify/app/Datas/NetfunSmsRequestData.php`

Namespace: `Modules\Notify\Datas`

### `public static function fromArray(...)` — class `NetfunSmsRequestData` (linea 25)

```php
function fromArray(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/app/Datas/NetfunSmsResponseData.php`

Namespace: `Modules\Notify\Datas`

### `public static function fromArray(...)` — class `NetfunSmsResponseData` (linea 27)

```php
function fromArray(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/app/Datas/SmsData.php`

Namespace: `Modules\Notify\Datas`

### `public function __construct(...)` — class `SmsData` (linea 24)

```php
function __construct(array $data = [])
```

**Parametri array:**
- `array $data = []`

### `public static function from(...)` — class `SmsData` (linea 36)

```php
function from(array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/app/Emails/SpatieEmail.php`

Namespace: `Modules\Notify\Emails`

### `public function mergeData(...)` — class `SpatieEmail` (linea 112)

```php
function mergeData(array $data)
```

**Parametri array:**
- `array $data`

### `public function getAttachmentFromPath(...)` — class `SpatieEmail` (linea 167)

```php
function getAttachmentFromPath(array $attachment)
```

**Parametri array:**
- `array $attachment`

### `public function getAttachmentFromData(...)` — class `SpatieEmail` (linea 188)

```php
function getAttachmentFromData(array $attachment)
```

**Parametri array:**
- `array $attachment`

### `public function addAttachments(...)` — class `SpatieEmail` (linea 218)

```php
function addAttachments(array $attachments)
```

**Parametri array:**
- `array $attachments`

---

## `Modules/Notify/app/Helpers/ConfigHelper.php`

Namespace: `Modules\Notify\Helpers`

### `public static function replaceTemplateVariables(...)` — class `ConfigHelper` (linea 23)

```php
function replaceTemplateVariables(array $data)
```

**Parametri array:**
- `array $data`

### `private static function recursiveReplace(...)` — class `ConfigHelper` (linea 139)

```php
function recursiveReplace(array $data, array $variables)
```

**Parametri array:**
- `array $data`
- `array $variables`

### `private static function replaceStringVariables(...)` — class `ConfigHelper` (linea 162)

```php
function replaceStringVariables(string $string, array $variables)
```

**Parametri array:**
- `array $variables`

---

## `Modules/Notify/app/Mail/AppointmentNotificationMail.php`

Namespace: `Modules\Notify\Mail`

### `public function __construct(...)` — class `AppointmentNotificationMail` (linea 33)

```php
function __construct(array $notificationData)
```

**Parametri array:**
- `array $notificationData`

---

## `Modules/Notify/app/Models/NotificationTemplate.php`

Namespace: `Modules\Notify\Models`

### `public function compile(...)` — class `NotificationTemplate` (linea 182)

```php
function compile(array $data = [])
```

**Parametri array:**
- `array $data = []`

### `public function shouldSend(...)` — class `NotificationTemplate` (linea 200)

```php
function shouldSend(array $data = [])
```

**Parametri array:**
- `array $data = []`

### `public function preview(...)` — class `NotificationTemplate` (linea 223)

```php
function preview(array $data = [])
```

**Parametri array:**
- `array $data = []`

### `public function setGrapesJSData(...)` — class `NotificationTemplate` (linea 311)

```php
function setGrapesJSData(array $data)
```

**Parametri array:**
- `array $data`

### `protected function compileString(...)` — class `NotificationTemplate` (linea 375)

```php
function compileString(?string $template, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/app/Models/NotifyTheme.php`

Namespace: `Modules\Notify\Models`

### `public function getLogoAttribute(...)` — class `NotifyTheme` (linea 111)

```php
function getLogoAttribute(?array $value)
```

**Parametri array:**
- `?array $value`

---

## `Modules/Notify/app/Notifications/GenericNotification.php`

Namespace: `Modules\Notify\Notifications`

### `public function __construct(...)` — class `GenericNotification` (linea 50)

```php
function __construct(string $title, string $message, array $channels = ['mail'], array $data = [])
```

**Parametri array:**
- `array $channels = ['mail']`
- `array $data = []`

---

## `Modules/Notify/app/Notifications/RecordNotification.php`

Namespace: `Modules\Notify\Notifications`

### `public function mergeData(...)` — class `RecordNotification` (linea 138)

```php
function mergeData(array $data)
```

**Parametri array:**
- `array $data`

### `public function addAttachments(...)` — class `RecordNotification` (linea 152)

```php
function addAttachments(array $attachments)
```

**Parametri array:**
- `array $attachments`

---

## `Modules/Notify/app/Notifications/SmsNotification.php`

Namespace: `Modules\Notify\Notifications`

### `public function __construct(...)` — class `SmsNotification` (linea 39)

```php
function __construct(string|SmsData $content, array $config = [])
```

**Parametri array:**
- `array $config = []`

---

## `Modules/Notify/app/Notifications/TelegramNotification.php`

Namespace: `Modules\Notify\Notifications`

### `public function __construct(...)` — class `TelegramNotification` (linea 35)

```php
function __construct(string $message, array $options = [])
```

**Parametri array:**
- `array $options = []`

---

## `Modules/Notify/app/Notifications/WhatsAppNotification.php`

Namespace: `Modules\Notify\Notifications`

### `public function __construct(...)` — class `WhatsAppNotification` (linea 40)

```php
function __construct(string|WhatsAppData $content, array $config = [])
```

**Parametri array:**
- `array $config = []`

---

## `Modules/Notify/app/Providers/Concerns/MergesNotifyConfigFromEnv.php`

Namespace: `Modules\Notify\Providers\Concerns`

### `protected function mergeNotifyCompanyConfig(...)` — trait `MergesNotifyConfigFromEnv` (linea 31)

```php
function mergeNotifyCompanyConfig(array $envConfig)
```

**Parametri array:**
- `array $envConfig`

### `protected function mergeNotifyMailLayoutConfig(...)` — trait `MergesNotifyConfigFromEnv` (linea 47)

```php
function mergeNotifyMailLayoutConfig(array $envConfig)
```

**Parametri array:**
- `array $envConfig`

### `protected function mergeChannelConfig(...)` — trait `MergesNotifyConfigFromEnv` (linea 70)

```php
function mergeChannelConfig(string $channel, array $envConfig)
```

**Parametri array:**
- `array $envConfig`

---

## `Modules/Notify/app/Services/MailEngines/MailtrapEngine.php`

Namespace: `Modules\Notify\Services\MailEngines`

### `public function setLocalVars(...)` — class `MailtrapEngine` (linea 50)

```php
function setLocalVars(array $vars)
```

**Parametri array:**
- `array $vars`

---

## `Modules/Notify/app/Services/NotificationManager.php`

Namespace: `Modules\Notify\Services`

### `public function send(...)` — class `NotificationManager` (linea 25)

```php
function send(Model $recipient, string $templateCode, array $data = [], array $channels = [], array $options = [],)
```

**Parametri array:**
- `array $data = []`
- `array $channels = []`
- `array $options = []`

### `public function sendMultiple(...)` — class `NotificationManager` (linea 54)

```php
function sendMultiple(array $recipients, string $templateCode, array $data = [], array $channels = [], array $options = [],)
```

**Parametri array:**
- `array $recipients`
- `array $data = []`
- `array $channels = []`
- `array $options = []`

---

## `Modules/Notify/app/Services/PushNotificationService.php`

Namespace: `Modules\Notify\Services`

### `public function sendToDevice(...)` — class `PushNotificationService` (linea 61)

```php
function sendToDevice(string $token, array $notification, array $data = [])
```

**Parametri array:**
- `array $notification`
- `array $data = []`

### `public function sendToDevices(...)` — class `PushNotificationService` (linea 93)

```php
function sendToDevices(array $tokens, array $notification, array $data = [])
```

**Parametri array:**
- `array $tokens`
- `array $notification`
- `array $data = []`

### `public function sendToTopic(...)` — class `PushNotificationService` (linea 128)

```php
function sendToTopic(string $topic, array $notification, array $data = [])
```

**Parametri array:**
- `array $notification`
- `array $data = []`

### `public function sendToAll(...)` — class `PushNotificationService` (linea 158)

```php
function sendToAll(array $notification, array $data = [])
```

**Parametri array:**
- `array $notification`
- `array $data = []`

### `public function scheduleNotification(...)` — class `PushNotificationService` (linea 177)

```php
function scheduleNotification(array $tokens, array $notification, array $data, DateTime $scheduleTime)
```

**Parametri array:**
- `array $tokens`
- `array $notification`
- `array $data`

### `public function sendWithTemplate(...)` — class `PushNotificationService` (linea 199)

```php
function sendWithTemplate(string $templateId, array $tokens, array $variables = [])
```

**Parametri array:**
- `array $tokens`
- `array $variables = []`

### `public function sendWithTargeting(...)` — class `PushNotificationService` (linea 220)

```php
function sendWithTargeting(array $criteria, array $notification, array $data = [])
```

**Parametri array:**
- `array $criteria`
- `array $notification`
- `array $data = []`

### `private function sendToPlatform(...)` — class `PushNotificationService` (linea 239)

```php
function sendToPlatform(string $platform, string $token, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

### `private function sendFCMNotification(...)` — class `PushNotificationService` (linea 254)

```php
function sendFCMNotification(string $token, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

### `private function sendAPNSNotification(...)` — class `PushNotificationService` (linea 306)

```php
function sendAPNSNotification(string $token, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

### `private function sendWebPushNotification(...)` — class `PushNotificationService` (linea 320)

```php
function sendWebPushNotification(string $token, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

### `private function sendBatchToPlatform(...)` — class `PushNotificationService` (linea 346)

```php
function sendBatchToPlatform(string $platform, array $tokens, array $notification, array $data)
```

**Parametri array:**
- `array $tokens`
- `array $notification`
- `array $data`

### `private function sendTopicToPlatform(...)` — class `PushNotificationService` (linea 386)

```php
function sendTopicToPlatform(string $platform, string $topic, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

### `private function sendFCMTopicNotification(...)` — class `PushNotificationService` (linea 401)

```php
function sendFCMTopicNotification(string $topic, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

### `private function groupTokensByPlatform(...)` — class `PushNotificationService` (linea 447)

```php
function groupTokensByPlatform(array $tokens)
```

**Parametri array:**
- `array $tokens`

### `private function processTemplate(...)` — class `PushNotificationService` (linea 515)

```php
function processTemplate(array $template, array $variables)
```

**Parametri array:**
- `array $template`
- `array $variables`

### `private function getTokensByCriteria(...)` — class `PushNotificationService` (linea 536)

```php
function getTokensByCriteria(array $criteria)
```

**Parametri array:**
- `array $criteria`

### `private function sendAPNSTopicNotification(...)` — class `PushNotificationService` (linea 546)

```php
function sendAPNSTopicNotification(string $topic, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

### `private function sendWebPushTopicNotification(...)` — class `PushNotificationService` (linea 560)

```php
function sendWebPushTopicNotification(string $topic, array $notification, array $data)
```

**Parametri array:**
- `array $notification`
- `array $data`

---

## `Modules/Notify/app/Services/SmsService.php`

Namespace: `Modules\Notify\Services`

### `public function setLocalVars(...)` — class `SmsService` (linea 65)

```php
function setLocalVars(array $vars)
```

**Parametri array:**
- `array $vars`

### `public function mergeVars(...)` — class `SmsService` (linea 89)

```php
function mergeVars(array $vars)
```

**Parametri array:**
- `array $vars`

---

## `Modules/Notify/tests/Fixtures/NetfunChannelNotifiableDummy.php`

Namespace: `Modules\Notify\Tests\Fixtures`

### `public function getNotificationData(...)` — class `NetfunChannelNotifiableDummy` (linea 18)

```php
function getNotificationData(string $name, array $view_params = [])
```

**Parametri array:**
- `array $view_params = []`

### `public function increase(...)` — class `NetfunChannelNotifiableDummy` (linea 37)

```php
function increase(string $what, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/tests/Fixtures/NotifyNotificationTemplateProxy.php`

Namespace: `Modules\Notify\Tests\Fixtures`

### `public function exposedCompileString(...)` — class `NotifyNotificationTemplateProxy` (linea 14)

```php
function exposedCompileString(?string $template, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/tests/Fixtures/SendRecordNotificationFailStub.php`

Namespace: `Modules\Notify\Tests\Fixtures`

### `public function execute(...)` — class `SendRecordNotificationFailStub` (linea 14)

```php
function execute(Model $record, string $templateSlug, array $channels)
```

**Parametri array:**
- `array $channels`

---

## `Modules/Notify/tests/Fixtures/SendRecordNotificationNoopStub.php`

Namespace: `Modules\Notify\Tests\Fixtures`

### `public function execute(...)` — class `SendRecordNotificationNoopStub` (linea 14)

```php
function execute(Model $record, string $templateSlug, array $channels)
```

**Parametri array:**
- `array $channels`

---

## `Modules/Notify/tests/Fixtures/SendRecordNotificationThrowStub.php`

Namespace: `Modules\Notify\Tests\Fixtures`

### `public function execute(...)` — class `SendRecordNotificationThrowStub` (linea 14)

```php
function execute(Model $record, string $templateSlug, array $channels)
```

**Parametri array:**
- `array $channels`

---

## `Modules/Notify/tests/Fixtures/SendRecordsNotificationBulkActionSpy.php`

Namespace: `Modules\Notify\Tests\Fixtures`

### `public function execute(...)` — class `SendRecordsNotificationBulkActionSpy` (linea 19)

```php
function execute(EloquentCollection $records, string $templateSlug, array $channels)
```

**Parametri array:**
- `array $channels`

---

## `Modules/Notify/tests/Fixtures/SendRecordsNotificationRecordDummy.php`

Namespace: `Modules\Notify\Tests\Fixtures`

### `public function __construct(...)` — class `SendRecordsNotificationRecordDummy` (linea 16)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Notify/tests/Pest.php`

### `function assertNotifyTableHas(...)` — _(funzione globale / closure con nome)_ (linea 28)

```php
function assertNotifyTableHas(string $table, array $where)
```

**Parametri array:**
- `array $where`

### `function assertNotifyTableMissing(...)` — _(funzione globale / closure con nome)_ (linea 42)

```php
function assertNotifyTableMissing(string $table, array $where)
```

**Parametri array:**
- `array $where`

### `function assertListContains(...)` — _(funzione globale / closure con nome)_ (linea 111)

```php
function assertListContains(string $needle, array $haystack)
```

**Parametri array:**
- `array $haystack`

### `function notifyArrayGet(...)` — _(funzione globale / closure con nome)_ (linea 173)

```php
function notifyArrayGet(?array $array, int|string ...$keys)
```

**Parametri array:**
- `?array $array`

### `function createNotification(...)` — _(funzione globale / closure con nome)_ (linea 222)

```php
function createNotification(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeNotification(...)` — _(funzione globale / closure con nome)_ (linea 230)

```php
function makeNotification(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function createMailTemplate(...)` — _(funzione globale / closure con nome)_ (linea 238)

```php
function createMailTemplate(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `function makeMailTemplate(...)` — _(funzione globale / closure con nome)_ (linea 246)

```php
function makeMailTemplate(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Notify/tests/Unit/Actions/SendNotificationActionTest.php`

Namespace: `Modules\Notify\Tests\Unit\Actions`

### `function makeDummySendNotificationRecipient(...)` — class `makeDummySendNotificationRecipient` (linea 25)

```php
function makeDummySendNotificationRecipient(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `public function __construct(...)` — class `anonymous` (linea 36)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Notify/tests/Unit/Actions/SendRecordNotificationActionTest.php`

Namespace: `Modules\Notify\Tests\Unit\Actions`

### `function makeDummyRecordForNotify(...)` — class `makeDummyRecordForNotify` (linea 21)

```php
function makeDummyRecordForNotify(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `public function __construct(...)` — class `anonymous` (linea 30)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Notify/tests/Unit/Actions/SendRecordsNotificationActionTest.php`

Namespace: `Modules\Notify\Tests\Unit\Actions`

### `function makeDummyBulkNotifyRecord(...)` — class `makeDummyBulkNotifyRecord` (linea 26)

```php
function makeDummyBulkNotifyRecord(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Notify/tests/Unit/Filament/Actions/SendRecordsNotificationBulkActionTest.php`

Namespace: `Modules\Notify\Tests\Unit\Filament\Actions`

### `function makeDummyNotifyBulkModel(...)` — class `makeDummyNotifyBulkModel` (linea 22)

```php
function makeDummyNotifyBulkModel(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

### `public function __construct(...)` — class `anonymous` (linea 31)

```php
function __construct(array $attributes = [])
```

**Parametri array:**
- `array $attributes = []`

---

## `Modules/Notify/tests/Unit/Notifications/NotificationsCoverageTest.php`

Namespace: `Modules\Notify\Tests\Unit\Notifications`

### `public function getNotificationData(...)` — class `Model` (linea 42)

```php
function getNotificationData(string $name, array $view_params = [])
```

**Parametri array:**
- `array $view_params = []`

### `public function increase(...)` — class `Model` (linea 67)

```php
function increase(string $what, array $data)
```

**Parametri array:**
- `array $data`

---

## `Modules/Notify/tests/Unit/Providers/NotifyServiceProviderTest.php`

Namespace: `Modules\Notify\Tests\Unit\Providers`

### `public function execute(...)` — class `anonymous` (linea 21)

```php
function execute(string $key, string|int|array|null $default = null)
```

**Parametri array:**
- `string|int|array|null $default = null`

### `public function execute(...)` — class `anonymous` (linea 40)

```php
function execute(string $key, string|int|array|null $default = null)
```

**Parametri array:**
- `string|int|array|null $default = null`

