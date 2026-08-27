<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Illuminate\Support\Facades\File;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_h4Hfh9
use function Safe\json_decode;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

describe('Json Component', function (): void {
    test('_components_json_is_valid_and_contains_expected_components', function (): void {
$filePath = base_path('Modules/Notify/app/Console/Commands/_components.json');
=======

use function Safe\json_decode;

uses(TestCase::class)->group('no-notify-db');

describe('Json Component', function (): void {
    test('_components_json_is_valid_and_contains_expected_components', function (): void {
        $filePath = base_path('Modules/Notify/app/Console/Commands/_components.json');
>>>>>>> .merge_file_oNMS16

        Assert::assertTrue(File::exists($filePath), 'Il file _components.json non esiste');

        $content = File::get($filePath);
<<<<<<< .merge_file_724d5w
        /** @var array<int, array<string, string>> $json */
=======
<<<<<<< .merge_file_h4Hfh9
        /** @var array<int, array<string, string>> $json */
        $json = json_decode($content, true);

        Assert::assertNotNull($json, 'Il file _components.json non contiene JSON valido');
        Assert::assertCount(2, $json, 'Il file _components.json non contiene i 2 componenti attesi');

        Assert::assertArrayHasKey('name', $json[0], 'Il primo componente non ha una chiave "name"');
        Assert::assertArrayHasKey('class', $json[0], 'Il primo componente non ha una chiave "class"');
        Assert::assertArrayHasKey('ns', $json[0], 'Il primo componente non ha una chiave "ns"');

        Assert::assertArrayHasKey('name', $json[1], 'Il secondo componente non ha una chiave "name"');
        Assert::assertArrayHasKey('class', $json[1], 'Il secondo componente non ha una chiave "class"');
        Assert::assertArrayHasKey('ns', $json[1], 'Il secondo componente non ha una chiave "ns"');

        $names = array_column($json, 'name');
        Assert::assertContains('send-mail-command', $names, 'Componente "send-mail-command" non trovato');
        Assert::assertContains('telegram-webhook', $names, 'Componente "telegram-webhook" non trovato');

        $classes = array_column($json, 'class');
        Assert::assertContains('SendMailCommand', $classes, 'Classe "SendMailCommand" non trovata');
        Assert::assertContains('TelegramWebhook', $classes, 'Classe "TelegramWebhook" non trovata');
=======
        /** @var array<int, array<string, string>>|null $json */
>>>>>>> .merge_file_UQd6rm
        $json = json_decode($content, true);

        Assert::assertNotNull($json, 'Il file _components.json non contiene JSON valido');
        Assert::assertCount(2, $json, 'Il file _components.json non contiene i 2 componenti attesi');

        Assert::assertArrayHasKey('name', $json[0], 'Il primo componente non ha una chiave "name"');
        Assert::assertArrayHasKey('class', $json[0], 'Il primo componente non ha una chiave "class"');
        Assert::assertArrayHasKey('ns', $json[0], 'Il primo componente non ha una chiave "ns"');

        Assert::assertArrayHasKey('name', $json[1], 'Il secondo componente non ha una chiave "name"');
        Assert::assertArrayHasKey('class', $json[1], 'Il secondo componente non ha una chiave "class"');
        Assert::assertArrayHasKey('ns', $json[1], 'Il secondo componente non ha una chiave "ns"');

        $names = array_column($json, 'name');
<<<<<<< .merge_file_724d5w
        Assert::assertContains('send-mail-command', $names, 'Componente "send-mail-command" non trovato');
        Assert::assertContains('telegram-webhook', $names, 'Componente "telegram-webhook" non trovato');

        $classes = array_column($json, 'class');
        Assert::assertContains('SendMailCommand', $classes, 'Classe "SendMailCommand" non trovata');
        Assert::assertContains('TelegramWebhook', $classes, 'Classe "TelegramWebhook" non trovata');
=======
        Assert::assertContains('send-mail-command', $names);
        Assert::assertContains('telegram-webhook', $names);
>>>>>>> .merge_file_oNMS16
>>>>>>> .merge_file_UQd6rm
    });
});
