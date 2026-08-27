<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Illuminate\Support\Facades\File;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\json_decode;

<<<<<<< .merge_file_9S1sTV
uses(\Modules\Notify\Tests\TestCase::class);
=======
uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_lgBHXR

test('components json is valid and contains expected components', function (): void {
    $filePath = base_path('Modules/Notify/app/Console/Commands/_components.json');

    Assert::assertTrue(File::exists($filePath));
<<<<<<< .merge_file_9S1sTV

    $json = \assertNotifyArray(json_decode(File::get($filePath), true));

    Assert::assertCount(2, $json);

    $first = \assertNotifyArray($json[0] ?? null);
    $second = \assertNotifyArray($json[1] ?? null);

    Assert::assertArrayHasKey('name', $first);
    Assert::assertArrayHasKey('class', $first);
    Assert::assertArrayHasKey('ns', $first);
    Assert::assertArrayHasKey('name', $second);
    Assert::assertArrayHasKey('class', $second);
    Assert::assertArrayHasKey('ns', $second);
=======

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
>>>>>>> .merge_file_lgBHXR

    $names = array_column($json, 'name');
    Assert::assertContains('send-mail-command', $names);
    Assert::assertContains('telegram-webhook', $names);
<<<<<<< .merge_file_9S1sTV
=======
    Assert::assertContains('analyze-translation-files', $names);
>>>>>>> .merge_file_lgBHXR

    $classes = array_column($json, 'class');
    Assert::assertContains('SendMailCommand', $classes);
    Assert::assertContains('TelegramWebhook', $classes);
<<<<<<< .merge_file_9S1sTV
=======
    Assert::assertContains('AnalyzeTranslationFiles', $classes);
>>>>>>> .merge_file_lgBHXR
});
