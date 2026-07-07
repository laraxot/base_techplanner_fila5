# Notify Module - Ottimizzazioni e Correzioni

## Panoramica
Il modulo Notify gestisce notifiche multi-canale (email, SMS, push, WhatsApp, Telegram, Slack). Dall'analisi del git status emergono modifiche significative che richiedono ottimizzazioni.

## 🚨 Problemi Identificati dal Git Status

### 1. Rimozione Resource NotificationTemplate
**Modifiche rilevate:**
```
D Modules/Notify/app/Filament/Resources/NotificationTemplateResource.php
D Modules/Notify/app/Filament/Resources/NotificationTemplateResource/Pages/
```

**Impatto:** Loss di funzionalità admin per gestire template notifiche.

**Raccomandazione:** Se la rimozione è intenzionale, verificare che sia stata sostituita da alternative. Se accidentale, ripristinare.

### 2. File Test Rimossi
**File rimossi:**
- `ContactManagementBusinessLogicTest.php`
<<<<<<< HEAD
- `MailTemplateVersionBusinessLogicTest.php`  
=======
- `MailTemplateVersionBusinessLogicTest.php`
>>>>>>> 6ed19256f (.)
- `NotificationTemplateVersionBusinessLogicTest.php`
- Multipli unit test per models

**Impatto critico:** Loss di test coverage per funzionalità business-critical.

**Correzione immediata:**
```bash
git log --follow -- Modules/Notify/tests/
# Verificare se i test sono stati spostati o eliminati
# Se eliminati, ripristinare da backup
```

## 🔧 Ottimizzazioni Tecniche

### 1. Multi-Channel Notification Service
```php
class NotificationService
{
    private array $channels = [];
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public function __construct(
        private EmailService $email,
        private SmsService $sms,
        private PushService $push,
        private WhatsAppService $whatsapp,
        private TelegramService $telegram,
        private SlackService $slack
    ) {
        $this->channels = [
            'email' => $this->email,
            'sms' => $this->sms,
            'push' => $this->push,
            'whatsapp' => $this->whatsapp,
            'telegram' => $this->telegram,
            'slack' => $this->slack,
        ];
    }
<<<<<<< HEAD
    
    public function send(NotificationRequest $request): NotificationResult
    {
        $results = [];
        
=======

    public function send(NotificationRequest $request): NotificationResult
    {
        $results = [];

>>>>>>> 6ed19256f (.)
        foreach ($request->channels as $channelName) {
            if (!isset($this->channels[$channelName])) {
                continue;
            }
<<<<<<< HEAD
            
            try {
                $channel = $this->channels[$channelName];
                $result = $channel->send($request);
                
                $results[$channelName] = $result;
                
                $this->logSuccess($channelName, $request, $result);
                
=======

            try {
                $channel = $this->channels[$channelName];
                $result = $channel->send($request);

                $results[$channelName] = $result;

                $this->logSuccess($channelName, $request, $result);

>>>>>>> 6ed19256f (.)
            } catch (\Exception $e) {
                $results[$channelName] = [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
<<<<<<< HEAD
                
                $this->logFailure($channelName, $request, $e);
            }
        }
        
        return new NotificationResult($results);
    }
    
    public function sendBulk(BulkNotificationRequest $request): BulkNotificationResult
    {
        $batch = Bus::batch([]);
        
        foreach ($request->recipients as $recipient) {
            $individualRequest = $request->toIndividualRequest($recipient);
            
            $batch->add(new SendNotificationJob($individualRequest));
        }
        
        $batch->name("Bulk notification: {$request->template->name}")
             ->onQueue('notifications')
             ->dispatch();
        
=======

                $this->logFailure($channelName, $request, $e);
            }
        }

        return new NotificationResult($results);
    }

    public function sendBulk(BulkNotificationRequest $request): BulkNotificationResult
    {
        $batch = Bus::batch([]);

        foreach ($request->recipients as $recipient) {
            $individualRequest = $request->toIndividualRequest($recipient);

            $batch->add(new SendNotificationJob($individualRequest));
        }

        $batch->name("Bulk notification: {$request->template->name}")
             ->onQueue('notifications')
             ->dispatch();

>>>>>>> 6ed19256f (.)
        return new BulkNotificationResult($batch->id);
    }
}
```

### 2. Enhanced Template System
```php
class NotificationTemplate extends BaseModel
{
    protected $fillable = [
        'name',
        'subject',
        'content',
        'channels',
        'variables',
        'is_active',
        'version',
    ];
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    protected function casts(): array
    {
        return [
            'channels' => 'array',
            'variables' => 'array',
            'is_active' => 'boolean',
            'version' => 'integer',
        ];
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    // Relations
    public function versions(): HasMany
    {
        return $this->hasMany(NotificationTemplateVersion::class);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    // Methods
    public function render(array $data = []): RenderedTemplate
    {
        $renderer = app(TemplateRenderer::class);
<<<<<<< HEAD
        
        return $renderer->render($this, $data);
    }
    
=======

        return $renderer->render($this, $data);
    }

>>>>>>> 6ed19256f (.)
    public function createVersion(): NotificationTemplateVersion
    {
        return $this->versions()->create([
            'subject' => $this->subject,
            'content' => $this->content,
            'channels' => $this->channels,
            'variables' => $this->variables,
            'version_number' => $this->version,
            'created_by' => auth()->id(),
        ]);
    }
<<<<<<< HEAD
    
    public function rollbackToVersion(int $versionNumber): bool
    {
        $version = $this->versions()->where('version_number', $versionNumber)->first();
        
        if (!$version) {
            return false;
        }
        
=======

    public function rollbackToVersion(int $versionNumber): bool
    {
        $version = $this->versions()->where('version_number', $versionNumber)->first();

        if (!$version) {
            return false;
        }

>>>>>>> 6ed19256f (.)
        return $this->update([
            'subject' => $version->subject,
            'content' => $version->content,
            'channels' => $version->channels,
            'variables' => $version->variables,
            'version' => $this->version + 1,
        ]);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public function scopeForChannel($query, string $channel)
    {
        return $query->whereJsonContains('channels', $channel);
    }
}
```

### 3. Filament Resources Enhancement
```php
// Ripristinare NotificationTemplateResource
class NotificationTemplateResource extends XotBaseResource
{
    protected static ?string $model = NotificationTemplate::class;
    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationGroup = 'Communications';
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Template Details')->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
<<<<<<< HEAD
                    
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                    
=======

                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),

>>>>>>> 6ed19256f (.)
                Forms\Components\MarkdownEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
            ]),
<<<<<<< HEAD
            
=======

>>>>>>> 6ed19256f (.)
            Section::make('Configuration')->schema([
                Forms\Components\CheckboxList::make('channels')
                    ->options([
                        'email' => 'Email',
                        'sms' => 'SMS',
                        'push' => 'Push Notification',
                        'whatsapp' => 'WhatsApp',
                        'telegram' => 'Telegram',
                        'slack' => 'Slack',
                    ])
                    ->required(),
<<<<<<< HEAD
                    
=======

>>>>>>> 6ed19256f (.)
                Forms\Components\KeyValue::make('variables')
                    ->label('Template Variables')
                    ->keyLabel('Variable Name')
                    ->valueLabel('Default Value')
                    ->columnSpanFull(),
<<<<<<< HEAD
                    
=======

>>>>>>> 6ed19256f (.)
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]),
        ]);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
<<<<<<< HEAD
                    
                Tables\Columns\TextColumn::make('subject')
                    ->limit(50),
                    
=======

                Tables\Columns\TextColumn::make('subject')
                    ->limit(50),

>>>>>>> 6ed19256f (.)
                Tables\Columns\BadgeColumn::make('channels')
                    ->getStateUsing(fn($record) => count($record->channels ?? []))
                    ->label('Channels')
                    ->color('info'),
<<<<<<< HEAD
                    
                Tables\Columns\TextColumn::make('version')
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                    
=======

                Tables\Columns\TextColumn::make('version')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

>>>>>>> 6ed19256f (.)
                Tables\Columns\TextColumn::make('notifications_count')
                    ->counts('notifications')
                    ->label('Sent'),
            ])
            ->actions([
                Tables\Actions\Action::make('preview')
                    ->icon('heroicon-o-eye')
                    ->modalContent(fn($record) => view('notify::template-preview', compact('record')))
                    ->modalWidth('5xl'),
<<<<<<< HEAD
                    
=======

>>>>>>> 6ed19256f (.)
                Tables\Actions\Action::make('send_test')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->form([
                        Forms\Components\TextInput::make('recipient')
                            ->email()
                            ->required(),
                    ])
                    ->action(function ($data, $record) {
                        app(NotificationService::class)->send(
                            new NotificationRequest(
                                template: $record,
                                recipients: [$data['recipient']],
                                channels: ['email'],
                                data: []
                            )
                        );
                    }),
<<<<<<< HEAD
                    
                Tables\Actions\EditAction::make(),
                
=======

                Tables\Actions\EditAction::make(),

>>>>>>> 6ed19256f (.)
                Tables\Actions\Action::make('versions')
                    ->icon('heroicon-o-clock')
                    ->url(fn($record) => static::getUrl('versions', ['record' => $record])),
            ]);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotificationTemplates::route('/'),
            'create' => Pages\CreateNotificationTemplate::route('/create'),
            'edit' => Pages\EditNotificationTemplate::route('/{record}/edit'),
            'versions' => Pages\ManageTemplateVersions::route('/{record}/versions'),
        ];
    }
}
```

### 4. Channel-Specific Services

#### Enhanced Email Service
```php
class EmailService
{
    public function __construct(
        private MailManager $mail,
        private TemplateRenderer $renderer
    ) {}
<<<<<<< HEAD
    
    public function send(NotificationRequest $request): array
    {
        $template = $this->renderer->render($request->template, $request->data);
        
=======

    public function send(NotificationRequest $request): array
    {
        $template = $this->renderer->render($request->template, $request->data);

>>>>>>> 6ed19256f (.)
        $message = (new MailMessage)
            ->subject($template->subject)
            ->view('emails.notification', [
                'content' => $template->content,
                'data' => $request->data,
            ]);
<<<<<<< HEAD
            
        foreach ($request->recipients as $recipient) {
            $this->mail->to($recipient)->send($message);
        }
        
=======

        foreach ($request->recipients as $recipient) {
            $this->mail->to($recipient)->send($message);
        }

>>>>>>> 6ed19256f (.)
        return [
            'success' => true,
            'sent_count' => count($request->recipients),
        ];
    }
}
```

#### SMS Service with Multiple Providers
```php
class SmsService
{
    public function __construct(private SmsProviderManager $providerManager) {}
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    public function send(NotificationRequest $request): array
    {
        $provider = $this->providerManager->getDefault();
        $template = app(TemplateRenderer::class)->render($request->template, $request->data);
<<<<<<< HEAD
        
        $results = [];
        
=======

        $results = [];

>>>>>>> 6ed19256f (.)
        foreach ($request->recipients as $recipient) {
            try {
                $messageId = $provider->send(
                    to: $recipient,
                    message: $template->content
                );
<<<<<<< HEAD
                
=======

>>>>>>> 6ed19256f (.)
                $results[] = [
                    'recipient' => $recipient,
                    'success' => true,
                    'message_id' => $messageId,
                ];
<<<<<<< HEAD
                
=======

>>>>>>> 6ed19256f (.)
            } catch (\Exception $e) {
                $results[] = [
                    'recipient' => $recipient,
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }
<<<<<<< HEAD
        
=======

>>>>>>> 6ed19256f (.)
        return [
            'success' => !empty(array_filter($results, fn($r) => $r['success'])),
            'results' => $results,
        ];
    }
}
```

## 📊 Analytics & Monitoring

### 1. Notification Analytics
```php
class NotificationAnalyticsService
{
    public function getStats(Carbon $from, Carbon $to): array
    {
        return [
            'total_sent' => Notification::whereBetween('created_at', [$from, $to])->count(),
            'by_channel' => $this->getChannelStats($from, $to),
            'success_rate' => $this->getSuccessRate($from, $to),
            'top_templates' => $this->getTopTemplates($from, $to),
            'delivery_times' => $this->getDeliveryTimes($from, $to),
        ];
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    private function getChannelStats(Carbon $from, Carbon $to): array
    {
        return Notification::whereBetween('created_at', [$from, $to])
            ->selectRaw('channel, COUNT(*) as count, AVG(CASE WHEN status = "delivered" THEN 1 ELSE 0 END) as success_rate')
            ->groupBy('channel')
            ->get()
            ->mapWithKeys(fn($stat) => [$stat->channel => [
                'count' => $stat->count,
                'success_rate' => round($stat->success_rate * 100, 2),
            ]])
            ->toArray();
    }
}
```

### 2. Real-time Dashboard Widget
```php
class NotificationStatsWidget extends BaseWidget
{
    protected static string $view = 'notify::widgets.notification-stats';
<<<<<<< HEAD
    
    public function getViewData(): array
    {
        $analytics = app(NotificationAnalyticsService::class);
        
=======

    public function getViewData(): array
    {
        $analytics = app(NotificationAnalyticsService::class);

>>>>>>> 6ed19256f (.)
        return [
            'today_stats' => $analytics->getStats(today(), now()),
            'week_stats' => $analytics->getStats(now()->subWeek(), now()),
            'channel_performance' => $this->getChannelPerformance(),
            'recent_failures' => $this->getRecentFailures(),
        ];
    }
<<<<<<< HEAD
    
    private function getChannelPerformance(): array
    {
        return Notification::where('created_at', '>=', now()->subHours(24))
            ->selectRaw('channel, 
=======

    private function getChannelPerformance(): array
    {
        return Notification::where('created_at', '>=', now()->subHours(24))
            ->selectRaw('channel,
>>>>>>> 6ed19256f (.)
                COUNT(*) as total,
                SUM(CASE WHEN status = "delivered" THEN 1 ELSE 0 END) as delivered,
                AVG(TIMESTAMPDIFF(SECOND, created_at, delivered_at)) as avg_delivery_time')
            ->groupBy('channel')
            ->get()
            ->toArray();
    }
}
```

## 🔄 Queue & Job Management

### 1. Priority Queue System
```php
class NotificationJobDispatcher
{
    public function dispatch(NotificationRequest $request): void
    {
        $priority = $this->calculatePriority($request);
        $queue = $this->getQueueForPriority($priority);
<<<<<<< HEAD
        
=======

>>>>>>> 6ed19256f (.)
        SendNotificationJob::dispatch($request)
            ->onQueue($queue)
            ->delay($this->calculateDelay($request));
    }
<<<<<<< HEAD
    
    private function calculatePriority(NotificationRequest $request): int
    {
        $priority = 5; // Default
        
=======

    private function calculatePriority(NotificationRequest $request): int
    {
        $priority = 5; // Default

>>>>>>> 6ed19256f (.)
        // Urgent notifications
        if ($request->template->hasTag('urgent')) {
            $priority = 1;
        }
<<<<<<< HEAD
        
=======

>>>>>>> 6ed19256f (.)
        // Bulk notifications
        if (count($request->recipients) > 100) {
            $priority = 8;
        }
<<<<<<< HEAD
        
        return $priority;
    }
    
=======

        return $priority;
    }

>>>>>>> 6ed19256f (.)
    private function getQueueForPriority(int $priority): string
    {
        return match (true) {
            $priority <= 2 => 'notifications-urgent',
            $priority <= 5 => 'notifications-normal',
            default => 'notifications-bulk',
        };
    }
}
```

## 🧪 Testing Recovery

### 1. Ripristino Test Essenziali
```php
// ContactManagementTest
class ContactManagementTest extends TestCase
{
    test('can create contact')
    {
        $contact = Contact::factory()->create([
            'email' => 'test@example.com',
            'phone' => '+1234567890',
        ]);
<<<<<<< HEAD
        
=======

>>>>>>> 6ed19256f (.)
        $this->assertDatabaseHas('contacts', [
            'email' => 'test@example.com',
        ]);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    test('can add contact to group')
    {
        $contact = Contact::factory()->create();
        $group = ContactGroup::factory()->create();
<<<<<<< HEAD
        
        $contact->groups()->attach($group);
        
=======

        $contact->groups()->attach($group);

>>>>>>> 6ed19256f (.)
        $this->assertTrue($contact->groups->contains($group));
    }
}

// NotificationTemplateTest
class NotificationTemplateTest extends TestCase
{
    test('can render template with variables')
    {
        $template = NotificationTemplate::factory()->create([
            'content' => 'Hello {{name}}, welcome to {{app_name}}!',
            'variables' => ['name', 'app_name'],
        ]);
<<<<<<< HEAD
        
=======

>>>>>>> 6ed19256f (.)
        $rendered = $template->render([
            'name' => 'John',
            'app_name' => 'MyApp',
        ]);
<<<<<<< HEAD
        
        $this->assertEquals('Hello John, welcome to MyApp!', $rendered->content);
    }
    
    test('template versioning works correctly')
    {
        $template = NotificationTemplate::factory()->create(['version' => 1]);
        
        $version = $template->createVersion();
        
=======

        $this->assertEquals('Hello John, welcome to MyApp!', $rendered->content);
    }

    test('template versioning works correctly')
    {
        $template = NotificationTemplate::factory()->create(['version' => 1]);

        $version = $template->createVersion();

>>>>>>> 6ed19256f (.)
        $this->assertEquals(1, $version->version_number);
        $this->assertEquals($template->id, $version->notification_template_id);
    }
}
```

## 🎯 Priorità di Implementazione

### 🔴 Critica (Immediata)
1. ✅ Ripristinare NotificationTemplateResource se rimosso per errore
2. ✅ Ripristinare test coverage rimossa
3. ✅ Verificare integrità database per template eliminati

### 🟡 Alta (Entro 1 settimana)
1. Enhanced multi-channel service
2. Template versioning system
3. Real-time monitoring dashboard
4. Queue optimization

### 🟢 Media (Entro 2 settimane)
1. Analytics implementation
2. Bulk notification optimization
3. Delivery retry mechanisms
4. Advanced templating features

### 🔵 Bassa (Future)
1. A/B testing for templates
2. Advanced segmentation
3. Machine learning optimization
4. External integrations expansion

## 💡 Osservazioni Finali

Il modulo Notify mostra segni di refactoring significativo con rimozione di componenti importanti. È cruciale:

1. **Verificare se le rimozioni sono intenzionali** - Se sì, documentare le alternative
2. **Ripristinare test coverage** - Essential per reliability
3. **Implementare monitoring robusto** - Per multi-channel notifications
4. **Stabilire governance per template** - Versioning e approval workflow

<<<<<<< HEAD
La natura multi-canale del modulo richiede particolare attenzione alla reliability e monitoring, dato che fallimenti possono impattare comunicazioni business-critical.
=======
La natura multi-canale del modulo richiede particolare attenzione alla reliability e monitoring, dato che fallimenti possono impattare comunicazioni business-critical.
>>>>>>> 6ed19256f (.)
