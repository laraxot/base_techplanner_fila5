---
title: "Implementazione di Notifiche Multi-Canale"
type: concept
tags: [multi, channel, notifications]
created: 2026-07-14
updated: 2026-07-14
qmd: "multi-channel-notifications implementazione di notifiche multi-canale"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./errori-comuni-da-evitare.md"
  - "./netfun-sms-implementation.md"
  - "./notifications-implementation-guide.md"
  - "./sms-implementation-details.md"
  - "./sms-provider-configuration.md"
  - "./telegram-notifications-guide.md"
---

<<<<<<< .merge_file_HDa1qV
# Implementazione di Notifiche Multi-Canale 

Questa documentazione descrive come implementare correttamente notifiche multi-canale (email, SMS, Telegram) nel modulo Notify di <nome progetto>.
Questa documentazione descrive come implementare correttamente notifiche multi-canale (email, SMS, Telegram) nel modulo Notify di SaluteOra.
=======
# Implementazione di Notifiche Multi-Canale

Questa documentazione descrive come implementare correttamente notifiche multi-canale (email, SMS, Telegram) nel modulo Notify di <nome progetto>.
Questa documentazione descrive come implementare correttamente notifiche multi-canale (email, SMS, Telegram) nel modulo Notify di <nome progetto>.
>>>>>>> .merge_file_e76mxL

## Indice

- [Introduzione](#introduzione)
- [Architettura delle Notifiche](#architettura-delle-notifiche)
- [Implementazione Email](#implementazione-email)
- [Implementazione SMS](#implementazione-sms)
- [Implementazione Telegram](#implementazione-telegram)
- [Notifiche Multi-Canale](#notifiche-multi-canale)
- [Errori Comuni e Soluzioni](#errori-comuni-e-soluzioni)
- [Best Practices](#best-practices)

## Introduzione

<nome progetto> utilizza il sistema di notifiche di Laravel per inviare comunicazioni attraverso diversi canali. Ogni canale richiede un'implementazione specifica per garantire la corretta consegna dei messaggi.
<<<<<<< .merge_file_HDa1qV
SaluteOra utilizza il sistema di notifiche di Laravel per inviare comunicazioni attraverso diversi canali. Ogni canale richiede un'implementazione specifica per garantire la corretta consegna dei messaggi.
=======
<nome progetto> utilizza il sistema di notifiche di Laravel per inviare comunicazioni attraverso diversi canali. Ogni canale richiede un'implementazione specifica per garantire la corretta consegna dei messaggi.
>>>>>>> .merge_file_e76mxL

## Architettura delle Notifiche

### Struttura Base

Tutte le classi di notifica devono:

1. Estendere `Illuminate\Notifications\Notification`
2. Implementare almeno un metodo `toXXX()` per ogni canale
3. Definire correttamente il metodo `via()`

```php
namespace Modules\Notify\Notifications;

use Illuminate\Notifications\Notification;

class RecordNotification extends Notification
{
    // Proprietà e costruttore

    public function via(object $notifiable): array
    {
        // Ritorna i canali di notifica
        return ['mail', 'sms', 'telegram'];
    }

    // Metodi per i vari canali
    public function toMail(object $notifiable) { /* ... */ }
    public function toSms(object $notifiable) { /* ... */ }
    public function toTelegram(object $notifiable) { /* ... */ }
}
```

## Implementazione Email

### Utilizzo di Spatie TemplateMailable

Quando si utilizza `SpatieEmail` con le notifiche, è **fondamentale** impostare esplicitamente il destinatario:

```php
public function toMail($notifiable): SpatieEmail
{
    $email = new SpatieEmail($this->record, $this->slug);
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    // IMPORTANTE: garantisci che ci sia sempre un destinatario
    if (method_exists($notifiable, 'routeNotificationFor')) {
        $email->to($notifiable->routeNotificationFor('mail'));
    }
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    return $email;
}
```

### Differenza tra MailMessage e TemplateMailable

**Laravel MailMessage**:
- Imposta automaticamente i destinatari basandosi sul `$notifiable`
- Utilizza una fluent API per costruire l'email

**Spatie TemplateMailable**:
- **Non imposta automaticamente i destinatari** dal `$notifiable`
- Utilizza template dal database per il contenuto
- Richiede impostazione esplicita del destinatario

## Implementazione SMS

### Configurazione Provider SMS

<nome progetto> supporta diversi provider SMS. La configurazione di base prevede:
<<<<<<< .merge_file_HDa1qV
SaluteOra supporta diversi provider SMS. La configurazione di base prevede:
=======
<nome progetto> supporta diversi provider SMS. La configurazione di base prevede:
>>>>>>> .merge_file_e76mxL

1. Installazione del provider scelto:
   ```bash
   composer require laravel-notification-channels/twilio
   ```

2. Configurazione in `config/services.php`:
   ```php
   'twilio' => [
       'account_sid' => env('TWILIO_ACCOUNT_SID'),
       'auth_token' => env('TWILIO_AUTH_TOKEN'),
       'from' => env('TWILIO_FROM_NUMBER'),
   ],
   ```

### Implementazione Notifica SMS

```php
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

// Nel metodo via()
public function via($notifiable)
{
    return ['mail', TwilioChannel::class];
}

// Metodo per SMS
public function toTwilio($notifiable)
{
    return (new TwilioSmsMessage())
        ->content("Il tuo appuntamento è confermato per il {$this->appointment->date}");
}
```

### Configurazione Notifiable

Nelle classi Notifiable (es. User):

```php
public function routeNotificationForTwilio()
{
    return $this->phone_number; // Deve essere in formato E.164 (+39XXXXXXXXXX)
}
```

## Implementazione Telegram

### Configurazione

1. Installazione:
   ```bash
   composer require laravel-notification-channels/telegram
   ```

2. Configurazione:
   ```php
   // config/services.php
   'telegram-bot-api' => [
       'token' => env('TELEGRAM_BOT_TOKEN'),
   ],
   ```

### Implementazione

```php
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

// Nel metodo via()
public function via($notifiable)
{
    return ['mail', TelegramChannel::class];
}

// Metodo per Telegram
public function toTelegram($notifiable)
{
    return TelegramMessage::create()
        ->content("**Notifica Importante**\nIl tuo appuntamento è confermato.")
        ->button('Visualizza Dettagli', url('/appointments'));
}
```

## Notifiche Multi-Canale

### Implementazione Completa

Una notifica multi-canale completa include:

```php
namespace Modules\Notify\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Modules\Notify\Emails\SpatieEmail;

class AppointmentNotification extends Notification
{
    protected $record;
    protected $slug;
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function __construct($record, $slug)
    {
        $this->record = $record;
        $this->slug = $slug;
    }
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function via($notifiable)
    {
        // Determina dinamicamente i canali basandosi sulle preferenze dell'utente
        $channels = ['mail'];
<<<<<<< .merge_file_HDa1qV
        
        if ($notifiable->sms_notifications_enabled) {
            $channels[] = TwilioChannel::class;
        }
        
        if ($notifiable->telegram_notifications_enabled) {
            $channels[] = TelegramChannel::class;
        }
        
        return $channels;
    }
    
    public function toMail($notifiable)
    {
        $email = new SpatieEmail($this->record, $this->slug);
        
=======

        if ($notifiable->sms_notifications_enabled) {
            $channels[] = TwilioChannel::class;
        }

        if ($notifiable->telegram_notifications_enabled) {
            $channels[] = TelegramChannel::class;
        }

        return $channels;
    }

    public function toMail($notifiable)
    {
        $email = new SpatieEmail($this->record, $this->slug);

>>>>>>> .merge_file_e76mxL
        // IMPORTANTE: imposta esplicitamente il destinatario
        if (method_exists($notifiable, 'routeNotificationFor')) {
            $email->to($notifiable->routeNotificationFor('mail'));
        }
<<<<<<< .merge_file_HDa1qV
        
        return $email;
    }
    
=======

        return $email;
    }

>>>>>>> .merge_file_e76mxL
    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage())
            ->content("Notifica: {$this->record->title}");
    }
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content("Il tuo appuntamento è confermato per il {$this->appointment->date}");
    }
}
```

## Implementazione Netfun SMS

Netfun è un provider di SMS italiano che offre API per l'invio di messaggi SMS. Seguendo l'architettura di <nome progetto>, implementeremo l'integrazione con Netfun utilizzando Spatie Queueable Actions.
<<<<<<< .merge_file_HDa1qV
Netfun è un provider di SMS italiano che offre API per l'invio di messaggi SMS. Seguendo l'architettura di SaluteOra, implementeremo l'integrazione con Netfun utilizzando Spatie Queueable Actions.
=======
Netfun è un provider di SMS italiano che offre API per l'invio di messaggi SMS. Seguendo l'architettura di <nome progetto>, implementeremo l'integrazione con Netfun utilizzando Spatie Queueable Actions.
>>>>>>> .merge_file_e76mxL

### 1. Configurazione

Per prima cosa, aggiungiamo la configurazione nel file `config/sms.php`:

```php
// config/sms.php
return [
    // Altre configurazioni...
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    'netfun' => [
        'username' => env('NETFUN_USERNAME'),
        'password' => env('NETFUN_PASSWORD'),
        'sender' => env('NETFUN_SENDER', '<nome progetto>'),
<<<<<<< .merge_file_HDa1qV
        'sender' => env('NETFUN_SENDER', 'SaluteOra'),
=======
        'sender' => env('NETFUN_SENDER', '<nome progetto>'),
>>>>>>> .merge_file_e76mxL
        'api_url' => env('NETFUN_API_URL', 'https://api.netfun.it/sms/v1/'),
    ],
];
```

Assicurati di aggiungere le corrispondenti variabili al tuo file `.env`:

```
NETFUN_USERNAME=your_username
NETFUN_PASSWORD=your_password
NETFUN_SENDER=<nome progetto>
<<<<<<< .merge_file_HDa1qV
NETFUN_SENDER=SaluteOra
=======
NETFUN_SENDER=<nome progetto>
>>>>>>> .merge_file_e76mxL
```

### 2. Creazione della Queueable Action

Implementiamo una Queueable Action per l'invio SMS tramite Netfun:

```php
<?php

namespace Modules\Notify\Actions\SMS;

use Spatie\QueueableAction\QueueableAction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SendNetfunSMSAction
{
    use QueueableAction;
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    protected string $username;
    protected string $password;
    protected string $sender;
    protected string $apiUrl;
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function __construct()
    {
        $this->username = config('sms.netfun.username');
        $this->password = config('sms.netfun.password');
        $this->sender = config('sms.netfun.sender');
        $this->apiUrl = config('sms.netfun.api_url');
    }
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function execute(string $to, string $message, array $options = [])
    {
        // Normalizza il numero di telefono (formato E.164)
        $to = $this->normalizePhoneNumber($to);
<<<<<<< .merge_file_HDa1qV
        
        // Genera un ID di riferimento univoco per il messaggio
        $reference = $options['reference'] ?? (string) Str::uuid();
        
=======

        // Genera un ID di riferimento univoco per il messaggio
        $reference = $options['reference'] ?? (string) Str::uuid();

>>>>>>> .merge_file_e76mxL
        try {
            $response = Http::post($this->apiUrl, [
                'username' => $this->username,
                'password' => $this->password,
                'sender' => $options['sender'] ?? $this->sender,
                'recipient' => $to,
                'message' => $message,
                'reference' => $reference,
                // Altri parametri opzionali
                'date' => $options['scheduled_date'] ?? null, // Data pianificata di invio
            ]);
<<<<<<< .merge_file_HDa1qV
            
            if ($response->successful()) {
                $responseData = $response->json();
                
=======

            if ($response->successful()) {
                $responseData = $response->json();

>>>>>>> .merge_file_e76mxL
                Log::info('SMS Netfun inviato con successo', [
                    'to' => $to,
                    'reference' => $reference,
                    'message_id' => $responseData['message_id'] ?? null,
                ]);
<<<<<<< .merge_file_HDa1qV
                
=======

>>>>>>> .merge_file_e76mxL
                return [
                    'success' => true,
                    'message_id' => $responseData['message_id'] ?? null,
                    'reference' => $reference,
                ];
            } else {
                Log::warning('Errore invio SMS Netfun', [
                    'to' => $to,
                    'reference' => $reference,
                    'status' => $response->status(),
                    'response' => $response->json(),
                ]);
<<<<<<< .merge_file_HDa1qV
                
=======

>>>>>>> .merge_file_e76mxL
                return [
                    'success' => false,
                    'error' => $response->json()['message'] ?? 'Errore sconosciuto',
                    'reference' => $reference,
                ];
            }
        } catch (\Exception $e) {
            Log::error('Eccezione durante invio SMS Netfun', [
                'to' => $to,
                'reference' => $reference,
                'error' => $e->getMessage(),
            ]);
<<<<<<< .merge_file_HDa1qV
            
            throw $e;
        }
    }
    
    /**
     * Normalizza il numero di telefono nel formato E.164
     * 
=======

            throw $e;
        }
    }

    /**
     * Normalizza il numero di telefono nel formato E.164
     *
>>>>>>> .merge_file_e76mxL
     * @param string $phoneNumber
     * @return string
     */
    protected function normalizePhoneNumber(string $phoneNumber): string
    {
        // Rimuovi tutti i caratteri non numerici
        $digits = preg_replace('/[^0-9]/', '', $phoneNumber);
<<<<<<< .merge_file_HDa1qV
        
=======

>>>>>>> .merge_file_e76mxL
        // Se il numero non inizia con '+' e non ha un prefisso internazionale,
        // aggiungi il prefisso italiano per default
        if (!Str::startsWith($phoneNumber, '+')) {
            // Se il numero inizia con '00', sostituisci con '+'
            if (Str::startsWith($digits, '00')) {
                $digits = '+' . substr($digits, 2);
<<<<<<< .merge_file_HDa1qV
            } 
=======
            }
>>>>>>> .merge_file_e76mxL
            // Se il numero inizia con '3' (cellulare italiano), aggiungi prefisso italiano
            elseif (Str::startsWith($digits, '3')) {
                $digits = '+39' . $digits;
            }
        }
<<<<<<< .merge_file_HDa1qV
        
=======

>>>>>>> .merge_file_e76mxL
        return $digits;
    }
}
```

### 3. Creazione di un Message DTO

Creiamo un Data Transfer Object (DTO) per rappresentare un messaggio SMS Netfun:

```php
<?php

namespace Modules\Notify\Datas;

class NetfunSMSMessage
{
    public string $content;
    public ?string $sender = null;
    public ?string $reference = null;
    public ?string $scheduledDate = null;
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Imposta il contenuto del messaggio
     * 
=======

    /**
     * Imposta il contenuto del messaggio
     *
>>>>>>> .merge_file_e76mxL
     * @param string $content
     * @return $this
     */
    public function content(string $content): self
    {
        $this->content = $content;
        return $this;
    }
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Imposta il mittente del messaggio
     * 
=======

    /**
     * Imposta il mittente del messaggio
     *
>>>>>>> .merge_file_e76mxL
     * @param string $sender
     * @return $this
     */
    public function from(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Imposta un riferimento personalizzato
     * 
=======

    /**
     * Imposta un riferimento personalizzato
     *
>>>>>>> .merge_file_e76mxL
     * @param string $reference
     * @return $this
     */
    public function reference(string $reference): self
    {
        $this->reference = $reference;
        return $this;
    }
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Pianifica l'invio del messaggio
     * 
=======

    /**
     * Pianifica l'invio del messaggio
     *
>>>>>>> .merge_file_e76mxL
     * @param string $date Formato: 'Y-m-d H:i:s'
     * @return $this
     */
    public function scheduleFor(string $date): self
    {
        $this->scheduledDate = $date;
        return $this;
    }
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Converte l'oggetto in array di opzioni
     * 
=======

    /**
     * Converte l'oggetto in array di opzioni
     *
>>>>>>> .merge_file_e76mxL
     * @return array
     */
    public function toArray(): array
    {
        return [
            'sender' => $this->sender,
            'reference' => $this->reference,
            'scheduled_date' => $this->scheduledDate,
        ];
    }
}
```

### 4. Creazione del Channel Netfun

Implementiamo un Channel personalizzato per Netfun che utilizza la nostra Queueable Action:

```php
<?php

namespace Modules\Notify\Channels;

use Illuminate\Notifications\Notification;
use Modules\Notify\Actions\SMS\SendNetfunSMSAction;
use Modules\Notify\Datas\NetfunSMSMessage;

class NetfunChannel
{
    protected SendNetfunSMSAction $sendSMSAction;
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function __construct(SendNetfunSMSAction $sendSMSAction)
    {
        $this->sendSMSAction = $sendSMSAction;
    }
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Invia la notifica tramite Netfun SMS
     * 
=======

    /**
     * Invia la notifica tramite Netfun SMS
     *
>>>>>>> .merge_file_e76mxL
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return array|null
     */
    public function send($notifiable, Notification $notification)
    {
        // Ottieni il numero di telefono dal Notifiable
        if (!$to = $notifiable->routeNotificationForNetfun($notification)) {
            return null;
        }
<<<<<<< .merge_file_HDa1qV
        
        // Ottieni il messaggio dalla notifica
        $message = $notification->toNetfun($notifiable);
        
        if (!$message instanceof NetfunSMSMessage) {
            throw new \Exception('Il metodo toNetfun() deve restituire un\'istanza di NetfunSMSMessage');
        }
        
=======

        // Ottieni il messaggio dalla notifica
        $message = $notification->toNetfun($notifiable);

        if (!$message instanceof NetfunSMSMessage) {
            throw new \Exception('Il metodo toNetfun() deve restituire un\'istanza di NetfunSMSMessage');
        }

>>>>>>> .merge_file_e76mxL
        // Esegui l'invio tramite la Queueable Action
        // L'esecuzione avverrà in modo asincrono (in background)
        return $this->sendSMSAction
            ->onQueue('sms') // Esegui sulla coda 'sms'
            ->execute(
                $to,
                $message->content,
                $message->toArray()
            );
    }
}
```

### 5. Metodo Necessario nel Notifiable (es. User Model)

```php
<?php

namespace Modules\User\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
<<<<<<< .merge_file_HDa1qV
    
    // ... altri metodi e proprietà
    
    /**
     * Restituisce il numero di telefono per invio notifiche Netfun
     * 
=======

    // ... altri metodi e proprietà

    /**
     * Restituisce il numero di telefono per invio notifiche Netfun
     *
>>>>>>> .merge_file_e76mxL
     * @param \Illuminate\Notifications\Notification $notification
     * @return string|null
     */
    public function routeNotificationForNetfun($notification)
    {
        return $this->phone_number; // Dovrebbe essere in formato E.164
    }
}
```

### 6. Utilizzo nella Notification

Ora possiamo utilizzare il canale Netfun nelle nostre notifiche:

```php
<?php

namespace Modules\Notify\Notifications;

use Illuminate\Notifications\Notification;
use Modules\Notify\Channels\NetfunChannel;
use Modules\Notify\Datas\NetfunSMSMessage;

class AppointmentReminder extends Notification
{
    protected $appointment;
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Definisci i canali su cui inviare la notifica
     * 
=======

    /**
     * Definisci i canali su cui inviare la notifica
     *
>>>>>>> .merge_file_e76mxL
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', NetfunChannel::class];
    }
<<<<<<< .merge_file_HDa1qV
    
    /**
     * Formatta il messaggio per il canale Netfun
     * 
=======

    /**
     * Formatta il messaggio per il canale Netfun
     *
>>>>>>> .merge_file_e76mxL
     * @param mixed $notifiable
     * @return \Modules\Notify\Datas\NetfunSMSMessage
     */
    public function toNetfun($notifiable)
    {
        $date = $this->appointment->date->format('d/m/Y H:i');
<<<<<<< .merge_file_HDa1qV
        
        return (new NetfunSMSMessage())
            ->content("Gentile {$notifiable->first_name}, le ricordiamo il suo appuntamento del {$date}. <nome progetto>.")
            ->content("Gentile {$notifiable->first_name}, le ricordiamo il suo appuntamento del {$date}. SaluteOra.")
            ->reference('app_' . $this->appointment->id);
    }
    
=======

        return (new NetfunSMSMessage())
            ->content("Gentile {$notifiable->first_name}, le ricordiamo il suo appuntamento del {$date}. <nome progetto>.")
            ->content("Gentile {$notifiable->first_name}, le ricordiamo il suo appuntamento del {$date}. <nome progetto>.")
            ->reference('app_' . $this->appointment->id);
    }

>>>>>>> .merge_file_e76mxL
    // Altri metodi per altri canali (mail, ecc.)
}
```

### 7. Test dell'Implementazione

Per testare l'invio di un SMS tramite Netfun con la nostra implementazione:

```php
<?php

namespace Modules\Notify\Tests\Feature;

use Tests\TestCase;
use Modules\User\Models\User;
use Modules\Notify\Datas\NetfunSMSMessage;
use Modules\Notify\Actions\SMS\SendNetfunSMSAction;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;

class NetfunSMSTest extends TestCase
{
    use DatabaseTransactions;
<<<<<<< .merge_file_HDa1qV
    
=======

>>>>>>> .merge_file_e76mxL
    public function testSendSMS()
    {
        // Mock della risposta HTTP
        Http::fake([
            'api.netfun.it/*' => Http::response([
                'success' => true,
                'message_id' => '123456789',
            ], 200),
        ]);
<<<<<<< .merge_file_HDa1qV
        
        $user = User::factory()->create([
            'phone_number' => '+393401234567',
        ]);
        
        $action = app(SendNetfunSMSAction::class);
        
        $message = (new NetfunSMSMessage())
            ->content('Test SMS da <nome progetto>')
            ->content('Test SMS da SaluteOra')
            ->reference('test_123');
        
=======

        $user = User::factory()->create([
            'phone_number' => '+393401234567',
        ]);

        $action = app(SendNetfunSMSAction::class);

        $message = (new NetfunSMSMessage())
            ->content('Test SMS da <nome progetto>')
            ->content('Test SMS da <nome progetto>')
            ->reference('test_123');

>>>>>>> .merge_file_e76mxL
        $result = $action->execute(
            $user->phone_number,
            $message->content,
            $message->toArray()
        );
<<<<<<< .merge_file_HDa1qV
        
=======

>>>>>>> .merge_file_e76mxL
        $this->assertTrue($result['success']);
        $this->assertEquals('123456789', $result['message_id']);
    }
}
```

### 8. Invio Personalizzato con Queue

Puoi anche utilizzare la Queueable Action direttamente nei tuoi controller o service:

```php
<?php

namespace Modules\Appointment\Controllers;

use Illuminate\Http\Request;
use Modules\Notify\Datas\NetfunSMSMessage;
use Modules\Notify\Actions\SMS\SendNetfunSMSAction;
use Modules\Appointment\Models\Appointment;

class AppointmentReminderController extends Controller
{
    public function sendReminder(Request $request, Appointment $appointment)
    {
        $sendSMSAction = app(SendNetfunSMSAction::class);
<<<<<<< .merge_file_HDa1qV
        
        $message = (new NetfunSMSMessage())
            ->content("Gentile {$appointment->patient->first_name}, le ricordiamo il suo appuntamento del {$appointment->date->format('d/m/Y H:i')}. <nome progetto>.")
            ->content("Gentile {$appointment->patient->first_name}, le ricordiamo il suo appuntamento del {$appointment->date->format('d/m/Y H:i')}. SaluteOra.")
            ->reference('app_' . $appointment->id);
        
=======

        $message = (new NetfunSMSMessage())
            ->content("Gentile {$appointment->patient->first_name}, le ricordiamo il suo appuntamento del {$appointment->date->format('d/m/Y H:i')}. <nome progetto>.")
            ->content("Gentile {$appointment->patient->first_name}, le ricordiamo il suo appuntamento del {$appointment->date->format('d/m/Y H:i')}. <nome progetto>.")
            ->reference('app_' . $appointment->id);

>>>>>>> .merge_file_e76mxL
        // Esecuzione asincrona
        $sendSMSAction->onQueue('sms')
            ->execute(
                $appointment->patient->phone_number,
                $message->content,
                $message->toArray()
            );
<<<<<<< .merge_file_HDa1qV
        
=======

>>>>>>> .merge_file_e76mxL
        return response()->json([
            'message' => 'Promemoria inviato con successo',
        ]);
    }
}
```

Utilizzando questa architettura basata su Queueable Actions, otteniamo diversi vantaggi:

1. **Esecuzione asincrona** semplicemente chiamando `->onQueue('sms')`
2. **Migliore testabilità** delle singole componenti
3. **Riutilizzo** del codice in diversi contesti (notifiche, controller, command, ecc.)
4. **Chiarezza architetturale** con componenti a singola responsabilità
            ->content("**{$this->record->title}**\n{$this->record->description}");
    }
}
```

### Invio di Notifiche On-Demand

Per inviare notifiche a destinatari che non sono models Notifiable:

<<<<<<< .merge_file_HDa1qV
=======
```

>>>>>>> .merge_file_e76mxL
```php
Notification::route('mail', 'esempio@example.com')
    ->route('twilio', '+39XXXXXXXXXX')  // Numero in formato E.164
    ->route('telegram', '123456789')    // Chat ID Telegram
    ->notify(new AppointmentNotification($record, 'appointment-confirm'));
```

## Errori Comuni e Soluzioni

### 1. "An email must have a To, Cc, or Bcc header"

**Causa**: Quando si usa `SpatieEmail` nelle notifiche, non viene impostato automaticamente il destinatario.

**Soluzione**: Impostare esplicitamente il destinatario:
```php
$email = new SpatieEmail($this->record, $this->slug);
$email->to($notifiable->routeNotificationFor('mail'));
return $email;
```

### 2. Errori di formattazione numeri telefonici

**Causa**: I provider SMS richiedono numeri in formato E.164 (+39XXXXXXXXXX).

**Soluzione**: Formattare correttamente i numeri:
```php
public function routeNotificationForTwilio()
{
    // Aggiungi il prefisso +39 se mancante
    $phone = $this->phone;
    if (!str_starts_with($phone, '+')) {
        $phone = '+39' . ltrim($phone, '0');
    }
    return $phone;
}
```

### 3. Errori di autenticazione API

**Causa**: Credenziali mancanti o errate per i servizi esterni.

**Soluzione**: Verificare la presenza di tutte le variabili d'ambiente:
```bash

# .env
TWILIO_ACCOUNT_SID=AC123...
TWILIO_AUTH_TOKEN=abc123...
TWILIO_FROM_NUMBER=+39XXXXXXXXXX
TELEGRAM_BOT_TOKEN=12345:ABC...
```

## Best Practices

1. **Utilizza le Code**: Implementa `ShouldQueue` per non bloccare l'applicazione.

2. **Gestisci Preferenze Utente**: Permetti agli utenti di scegliere quali canali utilizzare.

3. **Fallback Automatico**: Implementa logica di fallback (se l'email fallisce, prova SMS).

4. **Logging**: Registra sempre successi e fallimenti delle notifiche.

5. **Test di Integrazione**: Crea test dedicati per ogni canale di notifica.

6. **Validazione Input**: Valida sempre email e numeri di telefono prima dell'invio.

7. **GDPR Compliance**: Includi link per disattivare le notifiche.

8. **Rate Limiting**: Implementa limiti per evitare spam accidentali.

## Collegamenti alla Documentazione Correlata

- [NOTIFICATIONS_IMPLEMENTATION_GUIDE.md](./notifications-implementation-guide-1.md)
- [SMS_PROVIDER_CONFIGURATION.md](./sms-provider-configuration-2.md)
- [TELEGRAM_NOTIFICATIONS_GUIDE.md](./telegram-notifications-guide-1.md)
