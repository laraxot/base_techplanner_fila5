<<<<<<< HEAD
# Implementazione Netfun SMS 

## Introduzione

Netfun è un provider italiano di SMS che offre servizi per l'invio di messaggi SMS tramite API REST. 
=======
# Implementazione Netfun SMS

## Introduzione

Netfun è un provider italiano di SMS che offre servizi per l'invio di messaggi SMS tramite API REST.
>>>>>>> 6ed19256f (.)
Questo documento descrive l'implementazione corretta dell'integrazione Netfun usando Spatie Queueable Actions.

## Endpoint API

L'endpoint corretto per le API Netfun è:
```
https://v2.smsviainternet.it/api/rest/v1/sms-batch.json
```

## Configurazione

### 1. Configurazione Specifica del Provider

Netfun utilizza un API token configurato in `config/services.php`:

```php
// config/services.php
return [
    // Altre configurazioni...
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    'netfun' => [
        'token' => env('NETFUN_TOKEN'),
        'sender' => env('NETFUN_SENDER'), // Senza valore predefinito
    ],
];
```

Assicurati di aggiungere le variabili d'ambiente nel file `.env`:

```
NETFUN_TOKEN=your_api_token
NETFUN_SENDER=your_sender_name
```

> **IMPORTANTE**: Non utilizzare valori predefiniti per parametri critici come il sender. Ogni ambiente deve definire esplicitamente i propri valori appropriati.

### 2. Configurazione Generica

Per la gestione di retry, rate limiting e altre configurazioni generiche, usa le sezioni comuni nel file `config/sms.php` che si applicano a tutti i provider SMS:

```php
// config/sms.php
return [
    // Configurazione specifica per provider (solo per riferimento)
    'drivers' => [
        // Vari provider...
    ],
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    // Configurazione generica per retry - usata per tutti i provider
    'retry' => [
        'attempts' => env('SMS_RETRY_ATTEMPTS', 3),
        'delay' => env('SMS_RETRY_DELAY', 60), // secondi
    ],
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    // Configurazione generica per rate limiting - usata per tutti i provider
    'rate_limit' => [
        'enabled' => env('SMS_RATE_LIMIT_ENABLED', true),
        'max_attempts' => env('SMS_RATE_LIMIT_MAX_ATTEMPTS', 60),
        'decay_minutes' => env('SMS_RATE_LIMIT_DECAY_MINUTES', 1),
    ],
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    // Altre configurazioni generiche
];
```

> **IMPORTANTE**: Evita di duplicare configurazioni generiche nella sezione specifica del provider. Usa le sezioni generiche per comportamenti applicabili a tutti i provider.

## Implementazione Data Objects

Seguendo gli standard del modulo, utilizziamo `spatie/laravel-data` per i DTO nella cartella `app/Datas`:

```php
<?php

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class NetfunSmsData extends Data
{
    public function __construct(
        public string $recipient,
        public string $message,
        public string $sender,
        public ?string $reference = null,
        public ?string $scheduledDate = null,
    ) {}
}
```

## Implementazione Queueable Action

L'invio SMS viene gestito tramite una Queueable Action utilizzando il pattern di Spatie:

```php
<?php

namespace Modules\Notify\Actions\SMS;

use Spatie\QueueableAction\QueueableAction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Notify\Datas\NetfunSmsData;

class SendNetfunSmsAction
{
    use QueueableAction;
<<<<<<< HEAD
    
    public function execute(NetfunSmsData $smsData)
    {
        $config = config('sms.drivers.netfun');
        
=======

    public function execute(NetfunSmsData $smsData)
    {
        $config = config('sms.drivers.netfun');

>>>>>>> 6ed19256f (.)
        try {
            $response = Http::post($config['endpoint'], [
                'apiKey' => $config['api_key'],
                'messages' => [[
                    'recipient' => $smsData->recipient,
                    'text' => $smsData->message,
                    'sender' => $smsData->sender,
                    'reference' => $smsData->reference,
                    'date' => $smsData->scheduledDate,
                ]],
            ]);
            // Gestione risposta e logging
        } catch (\Exception $e) {
            Log::error('Errore invio SMS Netfun', [
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }
}
```

## Utilizzo nella Notification

```php
<?php

namespace Modules\Notify\Notifications;

use Illuminate\Notifications\Notification;
use Modules\Notify\Actions\SMS\SendNetfunSmsAction;
use Modules\Notify\Datas\NetfunSmsData;

class AppointmentReminder extends Notification
{
    protected $appointment;
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public function via($notifiable)
    {
        return ['mail', 'database', 'netfun'];
    }
<<<<<<< HEAD
    
    public function toNetfun($notifiable)
    {
        $phoneNumber = $notifiable->routeNotificationForSms($this);
        
        if (!$phoneNumber) {
            return null;
        }
        
        $action = app(SendNetfunSmsAction::class);
        
=======

    public function toNetfun($notifiable)
    {
        $phoneNumber = $notifiable->routeNotificationForSms($this);

        if (!$phoneNumber) {
            return null;
        }

        $action = app(SendNetfunSmsAction::class);

>>>>>>> 6ed19256f (.)
        $smsData = new NetfunSmsData(
            recipient: $phoneNumber,
            message: "Promemoria: appuntamento il {$this->appointment->date}",
            sender: '',
<<<<<<< HEAD
            sender: '<nome progetto>',
            sender: '',
            sender: '<nome progetto>',
            reference: 'app_' . $this->appointment->id
        );
        
        // Esecuzione sincrona per notifiche
        return $action->execute($smsData);
        
=======
            sender: 'SaluteOra',
            reference: 'app_' . $this->appointment->id
        );

        // Esecuzione sincrona per notifiche
        return $action->execute($smsData);

>>>>>>> 6ed19256f (.)
        // Per esecuzione asincrona
        // return $action->onQueue('sms')->execute($smsData);
    }
}
```

## Errori Comuni da Evitare

1. **Mai modificare i moduli riutilizzabili** - Non modificare direttamente `config/sms.php` nel modulo Notify
2. **Mai utilizzare il namespace sbagliato** - Usare `Modules\Notify\Datas` e non `Modules\Notify\Datas`
3. **Mai utilizzare username/password per Netfun** - Netfun utilizza un API token, non username/password
4. **Mai usare HTTP client sbagliato** - Utilizzare `GuzzleHttp\Client` come nella classe `NetfunSendAction` esistente

## Riferimenti

- [Documentazione Netfun API](https://www.netfun.it/docs/api)
- [Spatie Laravel Data](https://github.com/spatie/laravel-data)
<<<<<<< HEAD
- [Spatie Queueable Actions](https://github.com/spatie/laravel-queueable-action)
=======
- [Spatie Queueable Actions](https://github.com/spatie/laravel-queueable-action)
# Implementazione Netfun SMS

## Introduzione

Netfun è un provider italiano di SMS che offre servizi per l'invio di messaggi SMS tramite API REST.
Questo documento descrive l'implementazione corretta dell'integrazione Netfun usando Spatie Queueable Actions.

## Endpoint API

L'endpoint corretto per le API Netfun è:
```
https://v2.smsviainternet.it/api/rest/v1/sms-batch.json
```

## Configurazione

### 1. Configurazione Specifica del Provider

Netfun utilizza un API token configurato in `config/services.php`:

```php
// config/services.php
return [
    // Altre configurazioni...

    'netfun' => [
        'token' => env('NETFUN_TOKEN'),
        'sender' => env('NETFUN_SENDER'), // Senza valore predefinito
    ],
];
```

Assicurati di aggiungere le variabili d'ambiente nel file `.env`:

```
NETFUN_TOKEN=your_api_token
NETFUN_SENDER=your_sender_name
```

> **IMPORTANTE**: Non utilizzare valori predefiniti per parametri critici come il sender. Ogni ambiente deve definire esplicitamente i propri valori appropriati.

### 2. Configurazione Generica

Per la gestione di retry, rate limiting e altre configurazioni generiche, usa le sezioni comuni nel file `config/sms.php` che si applicano a tutti i provider SMS:

```php
// config/sms.php
return [
    // Configurazione specifica per provider (solo per riferimento)
    'drivers' => [
        // Vari provider...
    ],

    // Configurazione generica per retry - usata per tutti i provider
    'retry' => [
        'attempts' => env('SMS_RETRY_ATTEMPTS', 3),
        'delay' => env('SMS_RETRY_DELAY', 60), // secondi
    ],

    // Configurazione generica per rate limiting - usata per tutti i provider
    'rate_limit' => [
        'enabled' => env('SMS_RATE_LIMIT_ENABLED', true),
        'max_attempts' => env('SMS_RATE_LIMIT_MAX_ATTEMPTS', 60),
        'decay_minutes' => env('SMS_RATE_LIMIT_DECAY_MINUTES', 1),
    ],

    // Altre configurazioni generiche
];
```

> **IMPORTANTE**: Evita di duplicare configurazioni generiche nella sezione specifica del provider. Usa le sezioni generiche per comportamenti applicabili a tutti i provider.

## Implementazione Data Objects

Seguendo gli standard del modulo, utilizziamo `spatie/laravel-data` per i DTO nella cartella `app/Datas`:

```php
<?php

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;

class NetfunSmsData extends Data
{
    public function __construct(
        public string $recipient,
        public string $message,
        public string $sender,
        public ?string $reference = null,
        public ?string $scheduledDate = null,
    ) {}
}
```

## Implementazione Queueable Action

L'invio SMS viene gestito tramite una Queueable Action utilizzando il pattern di Spatie:

```php
<?php

namespace Modules\Notify\Actions\SMS;

use Spatie\QueueableAction\QueueableAction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Notify\Datas\NetfunSmsData;

class SendNetfunSmsAction
{
    use QueueableAction;

    public function execute(NetfunSmsData $smsData)
    {
        $config = config('sms.drivers.netfun');

        try {
            $response = Http::post($config['endpoint'], [
                'apiKey' => $config['api_key'],
                'messages' => [[
                    'recipient' => $smsData->recipient,
                    'text' => $smsData->message,
                    'sender' => $smsData->sender,
                    'reference' => $smsData->reference,
                    'date' => $smsData->scheduledDate,
                ]],
            ]);
            // Gestione risposta e logging
        } catch (\Exception $e) {
            Log::error('Errore invio SMS Netfun', [
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }
}
```

## Utilizzo nella Notification

```php
<?php

namespace Modules\Notify\Notifications;

use Illuminate\Notifications\Notification;
use Modules\Notify\Actions\SMS\SendNetfunSmsAction;
use Modules\Notify\Datas\NetfunSmsData;

class AppointmentReminder extends Notification
{
    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['mail', 'database', 'netfun'];
    }

    public function toNetfun($notifiable)
    {
        $phoneNumber = $notifiable->routeNotificationForSms($this);

        if (!$phoneNumber) {
            return null;
        }

        $action = app(SendNetfunSmsAction::class);

        $smsData = new NetfunSmsData(
            recipient: $phoneNumber,
            message: "Promemoria: appuntamento il {$this->appointment->date}",
            sender: '<main module>',
            reference: 'app_' . $this->appointment->id
        );

        // Esecuzione sincrona per notifiche
        return $action->execute($smsData);

        // Per esecuzione asincrona
        // return $action->onQueue('sms')->execute($smsData);
    }
}
```

## Errori Comuni da Evitare

1. **Mai modificare i moduli riutilizzabili** - Non modificare direttamente `config/sms.php` nel modulo Notify
2. **Mai utilizzare il namespace sbagliato** - Usare `Modules\Notify\Datas` e non `Modules\Notify\Datas`
3. **Mai utilizzare username/password per Netfun** - Netfun utilizza un API token, non username/password
4. **Mai usare HTTP client sbagliato** - Utilizzare `GuzzleHttp\Client` come nella classe `NetfunSendAction` esistente

## Riferimenti

- [Documentazione Netfun API](https://www.netfun.it/docs/api)
- [Spatie Laravel Data](https://github.com/spatie/laravel-data)
- [Spatie Queueable Actions](https://github.com/spatie/laravel-queueable-action)
>>>>>>> 6ed19256f (.)
