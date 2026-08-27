<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

use function Safe\json_encode;
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_Rcq1ol
=======
<<<<<<< .merge_file_48n25Q
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Notify Theme', function (): void {
    test('_can_create_notify_theme', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$theme = NotifyTheme::create([
=======
use PHPUnit\Framework\Assert;
>>>>>>> .merge_file_AsJnlY
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Safe\json_encode;

uses(TestCase::class)->group('notify-db');

beforeEach(function (): void {
    /** @var TestCase $this */
    $this->disableExceptionHandling();
});

describe('Notify Theme', function (): void {
    test('_can_create_notify_theme', function (): void {
        $theme = NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'lang' => 'it',
            'type' => 'email',
            'subject' => 'Benvenuto nella nostra piattaforma',
            'body' => 'Testo semplice del messaggio di benvenuto',
            'body_html' => '<h1>Benvenuto!</h1><p>Testo HTML del messaggio di benvenuto</p>',
            'from' => 'Sistema',
            'from_email' => 'noreply@example.com',
            'post_type' => 'App\Models\User',
            'post_id' => 123,
            'theme' => 'default',
            'logo_src' => '/images/logo.png',
            'logo_width' => 200,
            'logo_height' => 80,
            'view_params' => [
                'company_name' => 'Example Corp',
                'primary_color' => '#3b82f6',
                'secondary_color' => '#64748b',
            ],
        ]);
<<<<<<< .merge_file_48n25Q
        \assertNotifyTableHas('notify_themes', [
=======
        XotBasePest::assertTableHas('notify', 'notify_themes', [
>>>>>>> .merge_file_mhlLhv
            'id' => $theme->id,
            'lang' => 'it',
            'type' => 'email',
            'subject' => 'Benvenuto nella nostra piattaforma',
            'body' => 'Testo semplice del messaggio di benvenuto',
            'body_html' => '<h1>Benvenuto!</h1><p>Testo HTML del messaggio di benvenuto</p>',
            'from' => 'Sistema',
            'from_email' => 'noreply@example.com',
            'post_type' => 'App\Models\User',
            'post_id' => 123,
            'theme' => 'default',
            'logo_src' => '/images/logo.png',
            'logo_width' => 200,
            'logo_height' => 80,
            'view_params' => json_encode([
                'company_name' => 'Example Corp',
                'primary_color' => '#3b82f6',
                'secondary_color' => '#64748b',
            ]),
        ]);

        Assert::assertInstanceOf(NotifyTheme::class, $theme);
    });

    test('_has_correct_fillable_fields', function (): void {
<<<<<<< .merge_file_Rcq1ol
        $theme = new NotifyTheme();
=======
<<<<<<< .merge_file_48n25Q
$theme = new NotifyTheme;
=======
        $theme = new NotifyTheme;
>>>>>>> .merge_file_mhlLhv
>>>>>>> .merge_file_AsJnlY

        $expectedFillable = [
            'id',
            'lang',
            'type',
            'subject',
            'body',
            'body_html',
            'from',
            'from_email',
            'post_type',
            'post_id',
            'theme',
            'logo_src',
            'logo_width',
            'logo_height',
            'view_params',
        ];

        Assert::assertEquals($expectedFillable, $theme->getFillable());
    });

    test('_has_correct_casts', function (): void {
<<<<<<< .merge_file_Rcq1ol
        $theme = new NotifyTheme();
=======
<<<<<<< .merge_file_48n25Q
$theme = new NotifyTheme;
=======
        $theme = new NotifyTheme;
>>>>>>> .merge_file_mhlLhv
>>>>>>> .merge_file_AsJnlY

        $expectedCasts = [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'view_params' => 'array',
        ];

        Assert::assertEquals($expectedCasts, $theme->getCasts());
    });

    test('_has_logo_appended_attribute', function (): void {
<<<<<<< .merge_file_Rcq1ol
        $theme = new NotifyTheme();
=======
<<<<<<< .merge_file_48n25Q
$theme = new NotifyTheme;
=======
        $theme = new NotifyTheme;
>>>>>>> .merge_file_mhlLhv
>>>>>>> .merge_file_AsJnlY

        $expectedAppends = ['logo'];

        Assert::assertEquals($expectedAppends, $theme->getAppends());
    });

    test('_can_store_json_view_params', function (): void {
<<<<<<< .merge_file_48n25Q
$viewParams = [
=======
        $viewParams = [
>>>>>>> .merge_file_mhlLhv
            'company_name' => 'Test Company',
            'primary_color' => '#ef4444',
            'secondary_color' => '#f59e0b',
            'accent_color' => '#10b981',
            'fonts' => [
                'primary' => 'Inter',
                'secondary' => 'Roboto',
            ],
            'layout' => [
                'max_width' => '1200px',
                'padding' => '20px',
                'border_radius' => '8px',
            ],
        ];

        $theme = NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Test Theme',
            'view_params' => $viewParams,
        ]);
<<<<<<< .merge_file_48n25Q
        \assertNotifyTableHas('notify_themes', [
=======
        XotBasePest::assertTableHas('notify', 'notify_themes', [
>>>>>>> .merge_file_mhlLhv
            'id' => $theme->id,
            'view_params' => json_encode($viewParams),
        ]);
        Assert::assertEquals('Test Company', $theme->view_params['company_name']);
        Assert::assertEquals('#ef4444', $theme->view_params['primary_color']);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('Inter', \notifyArrayGet($theme->view_params, 'fonts', 'primary'));
        Assert::assertEquals('1200px', \notifyArrayGet($theme->view_params, 'layout', 'max_width'));
    });

    test('_can_generate_logo_attribute', function (): void {
$theme = NotifyTheme::create([
=======
        Assert::assertEquals('Inter', TestCase::notifyArrayGet($theme->view_params, 'fonts', 'primary'));
        Assert::assertEquals('1200px', TestCase::notifyArrayGet($theme->view_params, 'layout', 'max_width'));
    });

    test('_can_generate_logo_attribute', function (): void {
        $theme = NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Logo Test Theme',
            'logo_src' => '/images/custom-logo.png',
            'logo_width' => 300,
            'logo_height' => 120,
        ]);

        $logo = $theme->logo;
        Assert::assertArrayHasKey('path', $logo);
        Assert::assertArrayHasKey('width', $logo);
        Assert::assertArrayHasKey('height', $logo);
        Assert::assertEquals(300, $logo['width']);
        Assert::assertEquals(120, $logo['height']);
    });

    test('_uses_default_logo_dimensions_when_not_specified', function (): void {
<<<<<<< .merge_file_48n25Q
$theme = NotifyTheme::create([
=======
        $theme = NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Default Logo Theme',
            'logo_src' => '/images/default-logo.png',
        ]);

        $logo = $theme->logo;

        Assert::assertEquals(50, $logo['width']);
        Assert::assertEquals(50, $logo['height']);
    });

    test('_can_update_theme', function (): void {
<<<<<<< .merge_file_48n25Q
$theme = NotifyTheme::create([
=======
        $theme = NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Original Subject',
            'body' => 'Original body text',
            'theme' => 'original',
            'view_params' => ['original' => true],
        ]);

        $theme->update([
            'subject' => 'Updated Subject',
            'body' => 'Updated body text',
            'theme' => 'updated',
            'view_params' => ['updated' => true, 'version' => '2.0'],
        ]);
<<<<<<< .merge_file_48n25Q
        \assertNotifyTableHas('notify_themes', [
=======
        XotBasePest::assertTableHas('notify', 'notify_themes', [
>>>>>>> .merge_file_mhlLhv
            'id' => $theme->id,
            'subject' => 'Updated Subject',
            'body' => 'Updated body text',
            'theme' => 'updated',
            'view_params' => json_encode(['updated' => true, 'version' => '2.0']),
        ]);

<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('Updated Subject', \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->subject);
        Assert::assertEquals('Updated body text', \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->body);
        Assert::assertEquals('updated', \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->theme);
        Assert::assertEquals(['updated' => true, 'version' => '2.0'], \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->view_params);
    });

    test('_can_find_by_language', function (): void {
NotifyTheme::create([
=======
        Assert::assertEquals('Updated Subject', XotBasePest::assertFreshModel($theme, NotifyTheme::class)->subject);
        Assert::assertEquals('Updated body text', XotBasePest::assertFreshModel($theme, NotifyTheme::class)->body);
        Assert::assertEquals('updated', XotBasePest::assertFreshModel($theme, NotifyTheme::class)->theme);
        Assert::assertEquals(['updated' => true, 'version' => '2.0'], XotBasePest::assertFreshModel($theme, NotifyTheme::class)->view_params);
    });

    test('_can_find_by_language', function (): void {
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Italian Welcome',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'English Welcome',
            'lang' => 'en',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'German Welcome',
            'lang' => 'de',
        ]);

        $italianThemes = NotifyTheme::where('lang', 'it')->get();
        $englishThemes = NotifyTheme::where('lang', 'en')->get();
        $germanThemes = NotifyTheme::where('lang', 'de')->get();

        Assert::assertCount(1, $italianThemes);
        Assert::assertCount(1, $englishThemes);
        Assert::assertCount(1, $germanThemes);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('it', \assertFirstModel($italianThemes, \Modules\Notify\Models\NotifyTheme::class)->lang);
        Assert::assertEquals('en', \assertFirstModel($englishThemes, \Modules\Notify\Models\NotifyTheme::class)->lang);
        Assert::assertEquals('de', \assertFirstModel($germanThemes, \Modules\Notify\Models\NotifyTheme::class)->lang);
    });

    test('_can_find_by_type', function (): void {
NotifyTheme::create([
=======
        Assert::assertEquals('it', XotBasePest::assertFirstModel($italianThemes, NotifyTheme::class)->lang);
        Assert::assertEquals('en', XotBasePest::assertFirstModel($englishThemes, NotifyTheme::class)->lang);
        Assert::assertEquals('de', XotBasePest::assertFirstModel($germanThemes, NotifyTheme::class)->lang);
    });

    test('_can_find_by_type', function (): void {
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Email Theme',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'sms',
            'subject' => 'SMS Theme',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'push',
            'subject' => 'Push Theme',
            'lang' => 'it',
        ]);

        $emailThemes = NotifyTheme::where('type', 'email')->get();
        $smsThemes = NotifyTheme::where('type', 'sms')->get();
        $pushThemes = NotifyTheme::where('type', 'push')->get();

        Assert::assertCount(1, $emailThemes);
        Assert::assertCount(1, $smsThemes);
        Assert::assertCount(1, $pushThemes);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('email', \assertFirstModel($emailThemes, \Modules\Notify\Models\NotifyTheme::class)->type);
        Assert::assertEquals('sms', \assertFirstModel($smsThemes, \Modules\Notify\Models\NotifyTheme::class)->type);
        Assert::assertEquals('push', \assertFirstModel($pushThemes, \Modules\Notify\Models\NotifyTheme::class)->type);
    });

    test('_can_find_by_theme_name', function (): void {
NotifyTheme::create([
=======
        Assert::assertEquals('email', XotBasePest::assertFirstModel($emailThemes, NotifyTheme::class)->type);
        Assert::assertEquals('sms', XotBasePest::assertFirstModel($smsThemes, NotifyTheme::class)->type);
        Assert::assertEquals('push', XotBasePest::assertFirstModel($pushThemes, NotifyTheme::class)->type);
    });

    test('_can_find_by_theme_name', function (): void {
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Default Theme',
            'theme' => 'default',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Dark Theme',
            'theme' => 'dark',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Custom Theme',
            'theme' => 'custom',
        ]);

        $defaultThemes = NotifyTheme::where('theme', 'default')->get();
        $darkThemes = NotifyTheme::where('theme', 'dark')->get();
        $customThemes = NotifyTheme::where('theme', 'custom')->get();

        Assert::assertCount(1, $defaultThemes);
        Assert::assertCount(1, $darkThemes);
        Assert::assertCount(1, $customThemes);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('default', \assertFirstModel($defaultThemes, \Modules\Notify\Models\NotifyTheme::class)->theme);
        Assert::assertEquals('dark', \assertFirstModel($darkThemes, \Modules\Notify\Models\NotifyTheme::class)->theme);
        Assert::assertEquals('custom', \assertFirstModel($customThemes, \Modules\Notify\Models\NotifyTheme::class)->theme);
    });

    test('_can_find_by_post_type', function (): void {
NotifyTheme::create([
=======
        Assert::assertEquals('default', XotBasePest::assertFirstModel($defaultThemes, NotifyTheme::class)->theme);
        Assert::assertEquals('dark', XotBasePest::assertFirstModel($darkThemes, NotifyTheme::class)->theme);
        Assert::assertEquals('custom', XotBasePest::assertFirstModel($customThemes, NotifyTheme::class)->theme);
    });

    test('_can_find_by_post_type', function (): void {
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'User Welcome',
            'post_type' => 'App\Models\User',
            'post_id' => 123,
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Company Welcome',
            'post_type' => 'App\Models\Company',
            'post_id' => 456,
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Order Confirmation',
            'post_type' => 'App\Models\Order',
            'post_id' => 789,
        ]);

        $userThemes = NotifyTheme::where('post_type', 'App\Models\User')->get();
        $companyThemes = NotifyTheme::where('post_type', 'App\Models\Company')->get();
        $orderThemes = NotifyTheme::where('post_type', 'App\Models\Order')->get();

        Assert::assertCount(1, $userThemes);
        Assert::assertCount(1, $companyThemes);
        Assert::assertCount(1, $orderThemes);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('App\Models\User', \assertFirstModel($userThemes, \Modules\Notify\Models\NotifyTheme::class)->post_type);
        Assert::assertEquals('App\Models\Company', \assertFirstModel($companyThemes, \Modules\Notify\Models\NotifyTheme::class)->post_type);
        Assert::assertEquals('App\Models\Order', \assertFirstModel($orderThemes, \Modules\Notify\Models\NotifyTheme::class)->post_type);
    });

    test('_can_find_by_subject_pattern', function (): void {
NotifyTheme::create([
=======
        Assert::assertEquals('App\Models\User', XotBasePest::assertFirstModel($userThemes, NotifyTheme::class)->post_type);
        Assert::assertEquals('App\Models\Company', XotBasePest::assertFirstModel($companyThemes, NotifyTheme::class)->post_type);
        Assert::assertEquals('App\Models\Order', XotBasePest::assertFirstModel($orderThemes, NotifyTheme::class)->post_type);
    });

    test('_can_find_by_subject_pattern', function (): void {
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Welcome to our platform',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Welcome to our service',
            'lang' => 'en',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Order confirmation',
            'lang' => 'it',
        ]);

        $welcomeThemes = NotifyTheme::where('subject', 'like', '%Welcome%')->get();
        $orderThemes = NotifyTheme::where('subject', 'like', '%Order%')->get();

        Assert::assertCount(2, $welcomeThemes);
        Assert::assertCount(1, $orderThemes);
<<<<<<< .merge_file_48n25Q
        $welcomeSubject = \assertFirstModel($welcomeThemes, \Modules\Notify\Models\NotifyTheme::class)->subject;
        $orderSubject = \assertFirstModel($orderThemes, \Modules\Notify\Models\NotifyTheme::class)->subject;
=======
        $welcomeSubject = XotBasePest::assertFirstModel($welcomeThemes, NotifyTheme::class)->subject;
        $orderSubject = XotBasePest::assertFirstModel($orderThemes, NotifyTheme::class)->subject;
>>>>>>> .merge_file_mhlLhv
        Assert::assertNotNull($welcomeSubject);
        Assert::assertNotNull($orderSubject);
        Assert::assertStringContainsString('Welcome', $welcomeSubject);
        Assert::assertStringContainsString('Order', $orderSubject);
    });

    test('_can_find_by_from_email', function (): void {
<<<<<<< .merge_file_48n25Q
NotifyTheme::create([
=======
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'System Notification',
            'from' => 'System',
            'from_email' => 'system@example.com',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Marketing Email',
            'from' => 'Marketing',
            'from_email' => 'marketing@example.com',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Support Email',
            'from' => 'Support',
            'from_email' => 'support@example.com',
        ]);

        $systemThemes = NotifyTheme::where('from_email', 'system@example.com')->get();
        $marketingThemes = NotifyTheme::where('from_email', 'marketing@example.com')->get();
        $supportThemes = NotifyTheme::where('from_email', 'support@example.com')->get();

        Assert::assertCount(1, $systemThemes);
        Assert::assertCount(1, $marketingThemes);
        Assert::assertCount(1, $supportThemes);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('system@example.com', \assertFirstModel($systemThemes, \Modules\Notify\Models\NotifyTheme::class)->from_email);
        Assert::assertEquals('marketing@example.com', \assertFirstModel($marketingThemes, \Modules\Notify\Models\NotifyTheme::class)->from_email);
        Assert::assertEquals('support@example.com', \assertFirstModel($supportThemes, \Modules\Notify\Models\NotifyTheme::class)->from_email);
    });

    test('_can_find_by_view_params_value', function (): void {
NotifyTheme::create([
=======
        Assert::assertEquals('system@example.com', XotBasePest::assertFirstModel($systemThemes, NotifyTheme::class)->from_email);
        Assert::assertEquals('marketing@example.com', XotBasePest::assertFirstModel($marketingThemes, NotifyTheme::class)->from_email);
        Assert::assertEquals('support@example.com', XotBasePest::assertFirstModel($supportThemes, NotifyTheme::class)->from_email);
    });

    test('_can_find_by_view_params_value', function (): void {
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'High Priority Theme',
            'view_params' => [
                'priority' => 'high',
                'category' => 'security',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Low Priority Theme',
            'view_params' => [
                'priority' => 'low',
                'category' => 'general',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Medium Priority Theme',
            'view_params' => [
                'priority' => 'medium',
                'category' => 'maintenance',
            ],
        ]);

        $highPriorityThemes = NotifyTheme::whereJsonPath('view_params.priority', 'high')->get();
        $securityThemes = NotifyTheme::whereJsonPath('view_params.category', 'security')->get();

        Assert::assertCount(1, $highPriorityThemes);
        Assert::assertCount(1, $securityThemes);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('high', \assertFirstModel($highPriorityThemes, \Modules\Notify\Models\NotifyTheme::class)->view_params['priority']);
        Assert::assertEquals('security', \assertFirstModel($securityThemes, \Modules\Notify\Models\NotifyTheme::class)->view_params['category']);
    });

    test('_can_find_by_multiple_criteria', function (): void {
NotifyTheme::create([
=======
        Assert::assertEquals('high', XotBasePest::assertFirstModel($highPriorityThemes, NotifyTheme::class)->view_params['priority']);
        Assert::assertEquals('security', XotBasePest::assertFirstModel($securityThemes, NotifyTheme::class)->view_params['category']);
    });

    test('_can_find_by_multiple_criteria', function (): void {
        NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Italian High Priority Security',
            'lang' => 'it',
            'theme' => 'default',
            'view_params' => [
                'priority' => 'high',
                'category' => 'security',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'English Low Priority General',
            'lang' => 'en',
            'theme' => 'dark',
            'view_params' => [
                'priority' => 'low',
                'category' => 'general',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'sms',
            'subject' => 'Italian Medium Priority Maintenance',
            'lang' => 'it',
            'theme' => 'custom',
            'view_params' => [
                'priority' => 'medium',
                'category' => 'maintenance',
            ],
        ]);

        $italianEmailHighPriority = NotifyTheme::where('lang', 'it')
            ->where('type', 'email')
            ->whereJsonPath('view_params.priority', 'high')
            ->get();

        Assert::assertCount(1, $italianEmailHighPriority);
<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('it', \assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->lang);
        Assert::assertEquals('email', \assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->type);
        Assert::assertEquals('high', \notifyArrayGet(\assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->view_params, 'priority'));
        Assert::assertEquals('Italian High Priority Security', \assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->subject);
    });

    test('_can_handle_null_values', function (): void {
$theme = NotifyTheme::create([
=======
        Assert::assertEquals('it', XotBasePest::assertFirstModel($italianEmailHighPriority, NotifyTheme::class)->lang);
        Assert::assertEquals('email', XotBasePest::assertFirstModel($italianEmailHighPriority, NotifyTheme::class)->type);
        Assert::assertEquals('high', TestCase::notifyArrayGet(XotBasePest::assertFirstModel($italianEmailHighPriority, NotifyTheme::class)->view_params, 'priority'));
        Assert::assertEquals('Italian High Priority Security', XotBasePest::assertFirstModel($italianEmailHighPriority, NotifyTheme::class)->subject);
    });

    test('_can_handle_null_values', function (): void {
        $theme = NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Null Values Theme',
            'lang' => null,
            'body' => null,
            'body_html' => null,
            'from' => null,
            'from_email' => null,
            'post_type' => null,
            'post_id' => null,
            'theme' => null,
            'logo_src' => null,
            'logo_width' => null,
            'logo_height' => null,
            'view_params' => null,
        ]);

        Assert::assertNull($theme->lang);
        Assert::assertNull($theme->body);
        Assert::assertNull($theme->body_html);
        Assert::assertNull($theme->from);
        Assert::assertNull($theme->from_email);
        Assert::assertNull($theme->post_type);
        Assert::assertNull($theme->post_id);
        Assert::assertNull($theme->theme);
        Assert::assertNull($theme->logo_src);
        Assert::assertNull($theme->logo_width);
        Assert::assertNull($theme->logo_height);
        Assert::assertNull($theme->view_params);
    });

    test('_can_handle_empty_view_params', function (): void {
<<<<<<< .merge_file_48n25Q
$theme = NotifyTheme::create([
=======
        $theme = NotifyTheme::create([
>>>>>>> .merge_file_mhlLhv
            'type' => 'email',
            'subject' => 'Empty Params Theme',
            'view_params' => [],
        ]);
<<<<<<< .merge_file_48n25Q
        \assertNotifyTableHas('notify_themes', [
=======
        XotBasePest::assertTableHas('notify', 'notify_themes', [
>>>>>>> .merge_file_mhlLhv
            'id' => $theme->id,
            'view_params' => json_encode([]),
        ]);
        Assert::assertEmpty($theme->view_params);
    });

    test('_can_handle_complex_view_params', function (): void {
<<<<<<< .merge_file_48n25Q
$complexParams = [
=======
        $complexParams = [
>>>>>>> .merge_file_mhlLhv
            'branding' => [
                'logo' => [
                    'url' => '/images/logo.png',
                    'alt' => 'Company Logo',
                    'width' => 200,
                    'height' => 80,
                ],
                'colors' => [
                    'primary' => '#3b82f6',
                    'secondary' => '#64748b',
                    'accent' => '#f59e0b',
                    'success' => '#10b981',
                    'warning' => '#f59e0b',
                    'error' => '#ef4444',
                ],
                'fonts' => [
                    'heading' => 'Inter',
                    'body' => 'Roboto',
                    'mono' => 'JetBrains Mono',
                ],
            ],
            'layout' => [
                'container' => [
                    'max_width' => '1200px',
                    'padding' => '20px',
                    'margin' => '0 auto',
                ],
                'spacing' => [
                    'xs' => '4px',
                    'sm' => '8px',
                    'md' => '16px',
                    'lg' => '24px',
                    'xl' => '32px',
                ],
                'border_radius' => [
                    'sm' => '4px',
                    'md' => '8px',
                    'lg' => '12px',
                    'xl' => '16px',
                ],
            ],
            'features' => [
                'dark_mode' => true,
                'responsive' => true,
                'accessibility' => true,
                'animations' => false,
            ],
        ];

        $theme = NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Complex Params Theme',
            'view_params' => $complexParams,
        ]);
<<<<<<< .merge_file_48n25Q
        \assertNotifyTableHas('notify_themes', [
=======
        XotBasePest::assertTableHas('notify', 'notify_themes', [
>>>>>>> .merge_file_mhlLhv
            'id' => $theme->id,
            'view_params' => json_encode($complexParams),
        ]);

<<<<<<< .merge_file_48n25Q
        Assert::assertEquals('/images/logo.png', \notifyArrayGet($theme->view_params, 'branding', 'logo', 'url'));
        Assert::assertEquals('#3b82f6', \notifyArrayGet($theme->view_params, 'branding', 'colors', 'primary'));
        Assert::assertEquals('Inter', \notifyArrayGet($theme->view_params, 'branding', 'fonts', 'heading'));
        Assert::assertEquals('1200px', \notifyArrayGet($theme->view_params, 'layout', 'container', 'max_width'));
        Assert::assertTrue(\notifyArrayGet($theme->view_params, 'features', 'dark_mode'));
        Assert::assertFalse(\notifyArrayGet($theme->view_params, 'features', 'animations'));
=======
        Assert::assertEquals('/images/logo.png', TestCase::notifyArrayGet($theme->view_params, 'branding', 'logo', 'url'));
        Assert::assertEquals('#3b82f6', TestCase::notifyArrayGet($theme->view_params, 'branding', 'colors', 'primary'));
        Assert::assertEquals('Inter', TestCase::notifyArrayGet($theme->view_params, 'branding', 'fonts', 'heading'));
        Assert::assertEquals('1200px', TestCase::notifyArrayGet($theme->view_params, 'layout', 'container', 'max_width'));
        Assert::assertTrue(TestCase::notifyArrayGet($theme->view_params, 'features', 'dark_mode'));
        Assert::assertFalse(TestCase::notifyArrayGet($theme->view_params, 'features', 'animations'));
>>>>>>> .merge_file_mhlLhv
    });
});
