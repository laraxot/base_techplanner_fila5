# Integrazioni

## Mailgun

### 1. Configurazione
```php
// config/services.php
return [
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'webhook' => [
            'secret' => env('MAILGUN_WEBHOOK_SECRET'),
            'endpoint' => env('MAILGUN_WEBHOOK_ENDPOINT'),
        ],
    ],
];
```

### 2. Implementazione
```php
// app/Services/MailgunService.php
class MailgunService
{
    private $mailgun;
    private $domain;

    public function __construct()
    {
        $this->mailgun = Mailgun::create(
            config('services.mailgun.secret'),
            config('services.mailgun.endpoint')
        );
        $this->domain = config('services.mailgun.domain');
    }

    public function send($to, $subject, $template, $data = [])
    {
        try {
            // 1. Validazione
            $this->validateRequest($to, $subject, $template);
<<<<<<< HEAD
            
            // 2. Preparazione
            $payload = $this->preparePayload($to, $subject, $template, $data);
            
            // 3. Invio
            $response = $this->mailgun->messages()->send($this->domain, $payload);
            
            // 4. Logging
            $this->logDelivery($response);
            
=======

            // 2. Preparazione
            $payload = $this->preparePayload($to, $subject, $template, $data);

            // 3. Invio
            $response = $this->mailgun->messages()->send($this->domain, $payload);

            // 4. Logging
            $this->logDelivery($response);

>>>>>>> 6ed19256f (.)
            return $response;
        } catch (Exception $e) {
            // 1. Log errore
            $this->logError($e);
<<<<<<< HEAD
            
            // 2. Notifica admin
            $this->notifyAdmin($e);
            
            // 3. Retry
            $this->retry($to, $subject, $template, $data);
            
=======

            // 2. Notifica admin
            $this->notifyAdmin($e);

            // 3. Retry
            $this->retry($to, $subject, $template, $data);

>>>>>>> 6ed19256f (.)
            throw $e;
        }
    }
}
```

## Mailtrap

### 1. Configurazione
```php
// config/mail.php
return [
    'default' => env('MAIL_MAILER', 'smtp'),
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAILTRAP_HOST'),
            'port' => env('MAILTRAP_PORT'),
            'username' => env('MAILTRAP_USERNAME'),
            'password' => env('MAILTRAP_PASSWORD'),
            'encryption' => env('MAILTRAP_ENCRYPTION', 'tls'),
        ],
    ],
];
```

### 2. Implementazione
```php
// app/Services/MailtrapService.php
class MailtrapService
{
    public function test($to, $subject, $template, $data = [])
    {
        // 1. Validazione ambiente
        $this->validateEnvironment();
<<<<<<< HEAD
        
        // 2. Preparazione test
        $testData = $this->prepareTestData($data);
        
        // 3. Invio test
        $response = $this->sendTest($to, $subject, $template, $testData);
        
=======

        // 2. Preparazione test
        $testData = $this->prepareTestData($data);

        // 3. Invio test
        $response = $this->sendTest($to, $subject, $template, $testData);

>>>>>>> 6ed19256f (.)
        // 4. Verifica risultato
        return $this->verifyTest($response);
    }

    private function validateEnvironment()
    {
        if (app()->environment('production')) {
            throw new EnvironmentException('Mailtrap non può essere usato in produzione');
        }
    }
}
```

## Webhook

### 1. Configurazione
```php
// config/webhooks.php
return [
    'mailgun' => [
        'secret' => env('MAILGUN_WEBHOOK_SECRET'),
        'endpoint' => env('MAILGUN_WEBHOOK_ENDPOINT'),
        'events' => [
            'delivered',
            'opened',
            'clicked',
            'bounced',
            'complained',
        ],
    ],
];
```

### 2. Implementazione
```php
// app/Http/Controllers/WebhookController.php
class WebhookController extends Controller
{
    public function handleMailgun(Request $request)
    {
        // 1. Verifica firma
        $this->verifySignature($request);
<<<<<<< HEAD
        
        // 2. Processa evento
        $event = $this->processEvent($request);
        
        // 3. Aggiorna analytics
        $this->updateAnalytics($event);
        
        // 4. Notifica se necessario
        $this->notifyIfNeeded($event);
        
=======

        // 2. Processa evento
        $event = $this->processEvent($request);

        // 3. Aggiorna analytics
        $this->updateAnalytics($event);

        // 4. Notifica se necessario
        $this->notifyIfNeeded($event);

>>>>>>> 6ed19256f (.)
        return response()->json(['status' => 'success']);
    }
}
```

## Analytics

### 1. Configurazione
```php
// config/analytics.php
return [
    'mailgun' => [
        'enabled' => true,
        'tracking' => [
            'opens' => true,
            'clicks' => true,
            'bounces' => true,
            'complaints' => true,
        ],
        'storage' => [
            'driver' => 'redis',
            'ttl' => 86400, // 24 ore
        ],
    ],
];
```

### 2. Implementazione
```php
// app/Services/AnalyticsService.php
class AnalyticsService
{
    public function track($event)
    {
        // 1. Validazione evento
        $this->validateEvent($event);
<<<<<<< HEAD
        
        // 2. Processa evento
        $processed = $this->processEvent($event);
        
        // 3. Aggiorna metriche
        $this->updateMetrics($processed);
        
=======

        // 2. Processa evento
        $processed = $this->processEvent($event);

        // 3. Aggiorna metriche
        $this->updateMetrics($processed);

>>>>>>> 6ed19256f (.)
        // 4. Genera report
        $this->generateReport($processed);
    }
}
```

## Testing

### 1. Unit Test
```php
// tests/Unit/IntegrationTest.php
class IntegrationTest extends TestCase
{
    public function test_mailgun_integration()
    {
        $mailgun = $this->app->make(MailgunService::class);
<<<<<<< HEAD
        
=======

>>>>>>> 6ed19256f (.)
        $response = $mailgun->send(
            'test@example.com',
            'Test Subject',
            'test-template',
            ['name' => 'Test User']
        );
<<<<<<< HEAD
        
=======

>>>>>>> 6ed19256f (.)
        $this->assertTrue($response->successful());
    }
}
```

### 2. Integration Test
```php
// tests/Integration/WebhookTest.php
class WebhookTest extends TestCase
{
    public function test_webhook_handling()
    {
        // 1. Simula evento
        $event = $this->createTestEvent();
<<<<<<< HEAD
        
        // 2. Invia webhook
        $response = $this->postJson('/webhook/mailgun', $event);
        
        // 3. Verifica risposta
        $response->assertStatus(200);
        
=======

        // 2. Invia webhook
        $response = $this->postJson('/webhook/mailgun', $event);

        // 3. Verifica risposta
        $response->assertStatus(200);

>>>>>>> 6ed19256f (.)
        // 4. Verifica analytics
        $this->assertEventTracked($event);
    }
}
```

## Monitoraggio

### 1. Health Check
```php
// app/Services/IntegrationHealthService.php
class IntegrationHealthService
{
    public function check()
    {
        return [
            'mailgun' => $this->checkMailgun(),
            'mailtrap' => $this->checkMailtrap(),
            'webhooks' => $this->checkWebhooks(),
            'analytics' => $this->checkAnalytics(),
        ];
    }

    private function checkMailgun()
    {
        // 1. Verifica connessione
        // 2. Controlla quota
        // 3. Verifica webhook
        // 4. Log stato
    }
}
```

### 2. Alerting
```php
// app/Services/IntegrationAlertService.php
class IntegrationAlertService
{
    public function alert($integration, $type, $data)
    {
        $alert = [
            'integration' => $integration,
            'type' => $type,
            'data' => $data,
            'timestamp' => now(),
            'severity' => $this->getSeverity($type),
        ];

        $this->storeAlert($alert);
        $this->notifyAdmins($alert);
    }
}
```

## Note
- Tutti i collegamenti sono relativi
- La documentazione è mantenuta in italiano
- I collegamenti sono bidirezionali quando appropriato
- Ogni sezione ha il suo README.md specifico

## Contribuire
<<<<<<< HEAD
Per una lista completa di tutti i collegamenti tra i README.md, consultare il file [README_links.md](../../../docs/README_links.md). 
Per contribuire alla documentazione, seguire le [Linee Guida](../../../../docs/linee-guida-documentazione.md) e le [Regole dei Collegamenti](../../../../docs/regole_collegamenti_documentazione.md).

## Collegamenti Completi
Per una lista completa di tutti i collegamenti tra i README.md, consultare il file [README_links.md](../../../../docs/readme_links.md). 
=======
Per contribuire alla documentazione, seguire le [Linee Guida](../../../docs/linee-guida-documentazione.md) e le [Regole dei Collegamenti](../../../docs/regole_collegamenti_documentazione.md).

## Collegamenti Completi
Per una lista completa di tutti i collegamenti tra i README.md, consultare il file [README_links.md](../../../docs/README_links.md).
>>>>>>> 6ed19256f (.)
