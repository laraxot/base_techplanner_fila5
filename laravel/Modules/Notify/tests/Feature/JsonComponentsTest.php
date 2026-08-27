<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Illuminate\Support\Facades\File;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\json_decode;

uses(TestCase::class)->group('no-notify-db');

test('components json is valid and contains expected components', function (): void {
    $filePath = base_path('Modules/Notify/app/Console/Commands/_components.json');

    Assert::assertTrue(File::exists($filePath));

    $content = File::get($filePath);
    /** @var array<int, array<string, string>>|null $json */
    $json = json_decode($content, true);

    Assert::assertIsArray($json);
    Assert::assertCount(3, $json);

    foreach ($json as $component) {
        Assert::assertArrayHasKey('name', $component);
        Assert::assertArrayHasKey('class', $component);
        Assert::assertArrayHasKey('ns', $component);
    }

    $names = array_column($json, 'name');
    Assert::assertContains('send-mail-command', $names);
    Assert::assertContains('telegram-webhook', $names);
    Assert::assertContains('analyze-translation-files', $names);

    $classes = array_column($json, 'class');
    Assert::assertContains('SendMailCommand', $classes);
    Assert::assertContains('TelegramWebhook', $classes);
    Assert::assertContains('AnalyzeTranslationFiles', $classes);
});
