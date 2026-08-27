<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

use function Safe\json_encode;
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\MailTemplateLog;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_ILbkNY
=======
<<<<<<< .merge_file_hNEXjO
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Mail Template Log', function (): void {
    test('_can_create_mail_template_log', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$log = MailTemplateLog::create([
=======
use PHPUnit\Framework\Assert;
>>>>>>> .merge_file_EABHfZ
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Safe\json_encode;

uses(TestCase::class)->group('notify-db');

beforeEach(function (): void {
    /** @var TestCase $this */
    $this->disableExceptionHandling();
});

describe('Mail Template Log', function (): void {
    test('_can_create_mail_template_log', function (): void {
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'status_message' => 'Email sent successfully',
            'data' => [
                'to' => 'user@example.com',
                'subject' => 'Welcome to our platform',
                'template' => 'welcome_email',
            ],
            'metadata' => [
                'provider' => 'smtp',
                'queue_id' => 'queue_789',
                'attempts' => 1,
            ],
            'sent_at' => now(),
            'delivered_at' => now()->addMinutes(1),
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
>>>>>>> .merge_file_ymkLKM
            'id' => $log->id,
            'template_id' => 123,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'status_message' => 'Email sent successfully',
        ]);

        Assert::assertInstanceOf(MailTemplateLog::class, $log);
    });

    test('_has_correct_fillable_fields', function (): void {
<<<<<<< .merge_file_ILbkNY
        $log = new MailTemplateLog();
=======
<<<<<<< .merge_file_hNEXjO
$log = new MailTemplateLog;
=======
        $log = new MailTemplateLog;
>>>>>>> .merge_file_ymkLKM
>>>>>>> .merge_file_EABHfZ

        $expectedFillable = [
            'template_id',
            'mailable_type',
            'mailable_id',
            'status',
            'status_message',
            'data',
            'metadata',
            'sent_at',
            'delivered_at',
            'failed_at',
            'opened_at',
            'clicked_at',
        ];

        Assert::assertEquals($expectedFillable, $log->getFillable());
    });

    test('_has_correct_casts', function (): void {
<<<<<<< .merge_file_ILbkNY
        $log = new MailTemplateLog();
=======
<<<<<<< .merge_file_hNEXjO
$log = new MailTemplateLog;
=======
        $log = new MailTemplateLog;
>>>>>>> .merge_file_ymkLKM
>>>>>>> .merge_file_EABHfZ

        $expectedCasts = [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'data' => 'array',
            'metadata' => 'array',
            'sent_at' => 'datetime',
            'delivered_at' => 'datetime',
            'failed_at' => 'datetime',
            'opened_at' => 'datetime',
            'clicked_at' => 'datetime',
        ];

        Assert::assertEquals($expectedCasts, $log->getCasts());
    });

    test('_can_store_json_data', function (): void {
<<<<<<< .merge_file_hNEXjO
$data = [
=======
        $data = [
>>>>>>> .merge_file_ymkLKM
            'to' => 'user@example.com',
            'cc' => ['cc1@example.com', 'cc2@example.com'],
            'bcc' => ['bcc@example.com'],
            'subject' => 'Test Email Subject',
            'body' => 'Test email body content',
            'template' => 'test_template',
            'variables' => [
                'name' => 'John Doe',
                'company' => 'Example Corp',
                'activation_link' => 'https://example.com/activate',
            ],
        ];

        $log = MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => $data,
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
>>>>>>> .merge_file_ymkLKM
            'id' => $log->id,
            'data' => json_encode($data),
        ]);
        Assert::assertEquals('user@example.com', $log->data['to']);
        Assert::assertEquals(['cc1@example.com', 'cc2@example.com'], $log->data['cc']);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('John Doe', \notifyArrayGet($log->data, 'variables', 'name'));
        Assert::assertEquals('Example Corp', \notifyArrayGet($log->data, 'variables', 'company'));
    });

    test('_can_store_json_metadata', function (): void {
$metadata = [
=======
        Assert::assertEquals('John Doe', TestCase::notifyArrayGet($log->data, 'variables', 'name'));
        Assert::assertEquals('Example Corp', TestCase::notifyArrayGet($log->data, 'variables', 'company'));
    });

    test('_can_store_json_metadata', function (): void {
        $metadata = [
>>>>>>> .merge_file_ymkLKM
            'provider' => 'smtp',
            'queue_id' => 'queue_123',
            'attempts' => 3,
            'max_attempts' => 5,
            'retry_after' => 300,
            'error_details' => [
                'code' => 'SMTP_ERROR',
                'message' => 'Connection timeout',
                'retry_count' => 2,
            ],
            'performance' => [
                'queue_time' => 1500,
                'processing_time' => 2500,
                'total_time' => 4000,
            ],
        ];

        $log = MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'failed',
            'metadata' => $metadata,
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
>>>>>>> .merge_file_ymkLKM
            'id' => $log->id,
            'metadata' => json_encode($metadata),
        ]);
        Assert::assertEquals('smtp', $log->metadata['provider']);
        Assert::assertEquals('queue_123', $log->metadata['queue_id']);
        Assert::assertEquals(3, $log->metadata['attempts']);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('SMTP_ERROR', \notifyArrayGet($log->metadata, 'error_details', 'code'));
        Assert::assertEquals(4000, \notifyArrayGet($log->metadata, 'performance', 'total_time'));
    });

    test('_can_update_status_and_timestamps', function (): void {
$log = MailTemplateLog::create([
=======
        Assert::assertEquals('SMTP_ERROR', TestCase::notifyArrayGet($log->metadata, 'error_details', 'code'));
        Assert::assertEquals(4000, TestCase::notifyArrayGet($log->metadata, 'performance', 'total_time'));
    });

    test('_can_update_status_and_timestamps', function (): void {
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'pending',
        ]);

        $log->update([
            'status' => 'sent',
            'sent_at' => now(),
            'status_message' => 'Email sent successfully',
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
>>>>>>> .merge_file_ymkLKM
            'id' => $log->id,
            'status' => 'sent',
            'status_message' => 'Email sent successfully',
        ]);

<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('sent', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->sent_at);
        Assert::assertEquals('Email sent successfully', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status_message);
    });

    test('_can_mark_as_delivered', function (): void {
$log = MailTemplateLog::create([
=======
        Assert::assertEquals('sent', XotBasePest::assertFreshModel($log, MailTemplateLog::class)->status);
        Assert::assertNotNull(XotBasePest::assertFreshModel($log, MailTemplateLog::class)->sent_at);
        Assert::assertEquals('Email sent successfully', XotBasePest::assertFreshModel($log, MailTemplateLog::class)->status_message);
    });

    test('_can_mark_as_delivered', function (): void {
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'sent_at' => now(),
        ]);

        $log->update([
            'status' => 'delivered',
            'delivered_at' => now()->addMinutes(1),
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
>>>>>>> .merge_file_ymkLKM
            'id' => $log->id,
            'status' => 'delivered',
        ]);

<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('delivered', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->delivered_at);
    });

    test('_can_mark_as_failed', function (): void {
$log = MailTemplateLog::create([
=======
        Assert::assertEquals('delivered', XotBasePest::assertFreshModel($log, MailTemplateLog::class)->status);
        Assert::assertNotNull(XotBasePest::assertFreshModel($log, MailTemplateLog::class)->delivered_at);
    });

    test('_can_mark_as_failed', function (): void {
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'pending',
        ]);

        $log->update([
            'status' => 'failed',
            'failed_at' => now(),
            'status_message' => 'SMTP connection failed',
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
>>>>>>> .merge_file_ymkLKM
            'id' => $log->id,
            'status' => 'failed',
            'status_message' => 'SMTP connection failed',
        ]);

<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('failed', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->failed_at);
        Assert::assertEquals('SMTP connection failed', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status_message);
    });

    test('_can_mark_as_opened', function (): void {
$log = MailTemplateLog::create([
=======
        Assert::assertEquals('failed', XotBasePest::assertFreshModel($log, MailTemplateLog::class)->status);
        Assert::assertNotNull(XotBasePest::assertFreshModel($log, MailTemplateLog::class)->failed_at);
        Assert::assertEquals('SMTP connection failed', XotBasePest::assertFreshModel($log, MailTemplateLog::class)->status_message);
    });

    test('_can_mark_as_opened', function (): void {
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'delivered',
            'delivered_at' => now(),
        ]);

        $log->update([
            'opened_at' => now()->addMinutes(5),
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
            'id' => $log->id,
            'opened_at' => \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->opened_at,
        ]);

        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->opened_at);
    });

    test('_can_mark_as_clicked', function (): void {
$log = MailTemplateLog::create([
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
            'id' => $log->id,
            'opened_at' => XotBasePest::assertFreshModel($log, MailTemplateLog::class)->opened_at,
        ]);

        Assert::assertNotNull(XotBasePest::assertFreshModel($log, MailTemplateLog::class)->opened_at);
    });

    test('_can_mark_as_clicked', function (): void {
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'delivered',
            'delivered_at' => now(),
            'opened_at' => now()->addMinutes(5),
        ]);

        $log->update([
            'clicked_at' => now()->addMinutes(10),
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
            'id' => $log->id,
            'clicked_at' => \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->clicked_at,
        ]);

        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->clicked_at);
    });

    test('_can_find_by_template_id', function (): void {
MailTemplateLog::create([
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
            'id' => $log->id,
            'clicked_at' => XotBasePest::assertFreshModel($log, MailTemplateLog::class)->clicked_at,
        ]);

        Assert::assertNotNull(XotBasePest::assertFreshModel($log, MailTemplateLog::class)->clicked_at);
    });

    test('_can_find_by_template_id', function (): void {
        MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 456,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 101,
            'status' => 'sent',
        ]);

        $template123Logs = MailTemplateLog::where('template_id', 123)->get();
        $template456Logs = MailTemplateLog::where('template_id', 456)->get();

        Assert::assertCount(2, $template123Logs);
        Assert::assertCount(1, $template456Logs);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals(123, \assertFirstModel($template123Logs, \Modules\Notify\Models\MailTemplateLog::class)->template_id);
        Assert::assertEquals(123, \assertFirstModel($template123Logs->slice(1), \Modules\Notify\Models\MailTemplateLog::class)->template_id);
        Assert::assertEquals(456, \assertFirstModel($template456Logs, \Modules\Notify\Models\MailTemplateLog::class)->template_id);
    });

    test('_can_find_by_status', function (): void {
MailTemplateLog::create([
=======
        Assert::assertEquals(123, XotBasePest::assertFirstModel($template123Logs, MailTemplateLog::class)->template_id);
        Assert::assertEquals(123, XotBasePest::assertFirstModel($template123Logs->slice(1), MailTemplateLog::class)->template_id);
        Assert::assertEquals(456, XotBasePest::assertFirstModel($template456Logs, MailTemplateLog::class)->template_id);
    });

    test('_can_find_by_status', function (): void {
        MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'failed',
        ]);

        MailTemplateLog::create([
            'template_id' => 125,
            'mailable_type' => 'App\Mail\NewsletterMail',
            'mailable_id' => 101,
            'status' => 'delivered',
        ]);

        $sentLogs = MailTemplateLog::where('status', 'sent')->get();
        $failedLogs = MailTemplateLog::where('status', 'failed')->get();
        $deliveredLogs = MailTemplateLog::where('status', 'delivered')->get();

        Assert::assertCount(1, $sentLogs);
        Assert::assertCount(1, $failedLogs);
        Assert::assertCount(1, $deliveredLogs);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('sent', \assertFirstModel($sentLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertEquals('failed', \assertFirstModel($failedLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertEquals('delivered', \assertFirstModel($deliveredLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
    });

    test('_can_find_by_mailable_type', function (): void {
MailTemplateLog::create([
=======
        Assert::assertEquals('sent', XotBasePest::assertFirstModel($sentLogs, MailTemplateLog::class)->status);
        Assert::assertEquals('failed', XotBasePest::assertFirstModel($failedLogs, MailTemplateLog::class)->status);
        Assert::assertEquals('delivered', XotBasePest::assertFirstModel($deliveredLogs, MailTemplateLog::class)->status);
    });

    test('_can_find_by_mailable_type', function (): void {
        MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 125,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 101,
            'status' => 'sent',
        ]);

        $testMailLogs = MailTemplateLog::where('mailable_type', 'App\Mail\TestMail')->get();
        $welcomeMailLogs = MailTemplateLog::where('mailable_type', 'App\Mail\WelcomeMail')->get();

        Assert::assertCount(2, $testMailLogs);
        Assert::assertCount(1, $welcomeMailLogs);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('App\Mail\TestMail', \assertFirstModel($testMailLogs, \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
        Assert::assertEquals('App\Mail\TestMail', \assertFirstModel($testMailLogs->slice(1), \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
        Assert::assertEquals('App\Mail\WelcomeMail', \assertFirstModel($welcomeMailLogs, \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
    });

    test('_can_find_by_date_range', function (): void {
$yesterday = now()->subDay();
=======
        Assert::assertEquals('App\Mail\TestMail', XotBasePest::assertFirstModel($testMailLogs, MailTemplateLog::class)->mailable_type);
        Assert::assertEquals('App\Mail\TestMail', XotBasePest::assertFirstModel($testMailLogs->slice(1), MailTemplateLog::class)->mailable_type);
        Assert::assertEquals('App\Mail\WelcomeMail', XotBasePest::assertFirstModel($welcomeMailLogs, MailTemplateLog::class)->mailable_type);
    });

    test('_can_find_by_date_range', function (): void {
        $yesterday = now()->subDay();
>>>>>>> .merge_file_ymkLKM
        $today = now();
        $tomorrow = now()->addDay();

        MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'sent_at' => $yesterday,
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
            'sent_at' => $today,
        ]);

        MailTemplateLog::create([
            'template_id' => 125,
            'mailable_type' => 'App\Mail\NewsletterMail',
            'mailable_id' => 101,
            'status' => 'sent',
            'sent_at' => $tomorrow,
        ]);

        $todayLogs = MailTemplateLog::whereDate('sent_at', $today->toDateString())->get();
        $recentLogs = MailTemplateLog::where('sent_at', '>=', $yesterday)->get();

        Assert::assertCount(1, $todayLogs);
        Assert::assertCount(2, $recentLogs); // yesterday and today
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('App\Mail\WelcomeMail', \assertFirstModel($todayLogs, \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
    });

    test('_can_find_by_data_pattern', function (): void {
MailTemplateLog::create([
=======
        Assert::assertEquals('App\Mail\WelcomeMail', XotBasePest::assertFirstModel($todayLogs, MailTemplateLog::class)->mailable_type);
    });

    test('_can_find_by_data_pattern', function (): void {
        MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => [
                'to' => 'user@example.com',
                'subject' => 'Welcome to our platform',
                'template' => 'welcome_template',
            ],
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
            'data' => [
                'to' => 'admin@example.com',
                'subject' => 'System notification',
                'template' => 'system_template',
            ],
        ]);

        $welcomeSubjectLogs = MailTemplateLog::whereJsonPath('data.subject', 'like', '%Welcome%')->get();
        $welcomeTemplateLogs = MailTemplateLog::whereJsonPath('data.template', 'like', '%welcome%')->get();

        Assert::assertCount(1, $welcomeSubjectLogs);
        Assert::assertCount(1, $welcomeTemplateLogs);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('Welcome to our platform', \assertFirstModel($welcomeSubjectLogs, \Modules\Notify\Models\MailTemplateLog::class)->data['subject']);
        Assert::assertEquals('welcome_template', \notifyArrayGet(\assertFirstModel($welcomeTemplateLogs, \Modules\Notify\Models\MailTemplateLog::class)->data, 'template'));
    });

    test('_can_find_by_metadata_pattern', function (): void {
MailTemplateLog::create([
=======
        Assert::assertEquals('Welcome to our platform', XotBasePest::assertFirstModel($welcomeSubjectLogs, MailTemplateLog::class)->data['subject']);
        Assert::assertEquals('welcome_template', TestCase::notifyArrayGet(XotBasePest::assertFirstModel($welcomeTemplateLogs, MailTemplateLog::class)->data, 'template'));
    });

    test('_can_find_by_metadata_pattern', function (): void {
        MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'metadata' => [
                'provider' => 'smtp',
                'queue_id' => 'queue_123',
                'attempts' => 1,
            ],
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
            'metadata' => [
                'provider' => 'ses',
                'queue_id' => 'queue_456',
                'attempts' => 1,
            ],
        ]);

        $smtpLogs = MailTemplateLog::whereJsonPath('metadata.provider', 'smtp')->get();
        $sesLogs = MailTemplateLog::whereJsonPath('metadata.provider', 'ses')->get();

        Assert::assertCount(1, $smtpLogs);
        Assert::assertCount(1, $sesLogs);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('smtp', \assertFirstModel($smtpLogs, \Modules\Notify\Models\MailTemplateLog::class)->metadata['provider']);
        Assert::assertEquals('ses', \assertFirstModel($sesLogs, \Modules\Notify\Models\MailTemplateLog::class)->metadata['provider']);
    });

    test('_can_find_by_multiple_criteria', function (): void {
MailTemplateLog::create([
=======
        Assert::assertEquals('smtp', XotBasePest::assertFirstModel($smtpLogs, MailTemplateLog::class)->metadata['provider']);
        Assert::assertEquals('ses', XotBasePest::assertFirstModel($sesLogs, MailTemplateLog::class)->metadata['provider']);
    });

    test('_can_find_by_multiple_criteria', function (): void {
        MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => [
                'to' => 'user@example.com',
                'subject' => 'Welcome email',
            ],
            'metadata' => [
                'provider' => 'smtp',
                'attempts' => 1,
            ],
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'failed',
            'data' => [
                'to' => 'admin@example.com',
                'subject' => 'System notification',
            ],
            'metadata' => [
                'provider' => 'smtp',
                'attempts' => 3,
            ],
        ]);

        $smtpWelcomeLogs = MailTemplateLog::where('status', 'sent')
            ->whereJsonPath('metadata.provider', 'smtp')
            ->whereJsonPath('data.subject', 'like', '%Welcome%')
            ->get();

        Assert::assertCount(1, $smtpWelcomeLogs);
<<<<<<< .merge_file_hNEXjO
        Assert::assertEquals('sent', \assertFirstModel($smtpWelcomeLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertEquals('smtp', \assertFirstModel($smtpWelcomeLogs, \Modules\Notify\Models\MailTemplateLog::class)->metadata['provider']);
        Assert::assertEquals('Welcome email', \assertFirstModel($smtpWelcomeLogs, \Modules\Notify\Models\MailTemplateLog::class)->data['subject']);
    });

    test('_can_handle_null_values', function (): void {
$log = MailTemplateLog::create([
=======
        Assert::assertEquals('sent', XotBasePest::assertFirstModel($smtpWelcomeLogs, MailTemplateLog::class)->status);
        Assert::assertEquals('smtp', XotBasePest::assertFirstModel($smtpWelcomeLogs, MailTemplateLog::class)->metadata['provider']);
        Assert::assertEquals('Welcome email', XotBasePest::assertFirstModel($smtpWelcomeLogs, MailTemplateLog::class)->data['subject']);
    });

    test('_can_handle_null_values', function (): void {
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => null,
            'mailable_type' => null,
            'mailable_id' => null,
            'status' => null,
            'status_message' => null,
            'data' => null,
            'metadata' => null,
            'sent_at' => null,
            'delivered_at' => null,
            'failed_at' => null,
            'opened_at' => null,
            'clicked_at' => null,
        ]);

        Assert::assertNull($log->template_id);
        Assert::assertNull($log->mailable_type);
        Assert::assertNull($log->mailable_id);
        Assert::assertNull($log->status);
        Assert::assertNull($log->status_message);
        Assert::assertNull($log->data);
        Assert::assertNull($log->metadata);
        Assert::assertNull($log->sent_at);
        Assert::assertNull($log->delivered_at);
        Assert::assertNull($log->failed_at);
        Assert::assertNull($log->opened_at);
        Assert::assertNull($log->clicked_at);
    });

    test('_can_handle_empty_arrays', function (): void {
<<<<<<< .merge_file_hNEXjO
$log = MailTemplateLog::create([
=======
        $log = MailTemplateLog::create([
>>>>>>> .merge_file_ymkLKM
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => [],
            'metadata' => [],
        ]);
<<<<<<< .merge_file_hNEXjO
        \assertNotifyTableHas('mail_template_logs', [
=======
        XotBasePest::assertTableHas('notify', 'mail_template_logs', [
>>>>>>> .merge_file_ymkLKM
            'id' => $log->id,
            'data' => json_encode([]),
            'metadata' => json_encode([]),
        ]);
        Assert::assertEmpty($log->data);
        Assert::assertEmpty($log->metadata);
    });
});
