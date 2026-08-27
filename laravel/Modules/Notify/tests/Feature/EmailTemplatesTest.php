<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Illuminate\Support\Facades\File;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_Diq5o4
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

describe('Email Templates', function (): void {
    test('_html_template_contains_optional_function', function (): void {
$filePath = base_path('Modules/Notify/resources/views/emails/html.blade.php');
=======

uses(TestCase::class)->group('notify-db');

describe('Email Templates', function (): void {
    test('_html_template_contains_optional_function', function (): void {
        $filePath = base_path('Modules/Notify/resources/views/emails/html.blade.php');
>>>>>>> .merge_file_CCs8M9

        Assert::assertTrue(File::exists($filePath), 'Il file html.blade.php non esiste');

        $content = File::get($filePath);

        Assert::assertStringContainsString(
            'optional($email_data)->subject',
            $content,
            'Il template html.blade.php non utilizza optional() per subject',
        );

        Assert::assertStringContainsString(
            'optional($email_data)->body_html',
            $content,
            'Il template html.blade.php non utilizza optional() per body_html',
        );
    });

    test('_sunny_template_contains_optional_function', function (): void {
<<<<<<< .merge_file_Diq5o4
$filePath = base_path('Modules/Notify/resources/views/emails/templates/sunny.blade.php');
=======
        $filePath = base_path('Modules/Notify/resources/views/emails/templates/sunny.blade.php');
>>>>>>> .merge_file_CCs8M9

        Assert::assertTrue(File::exists($filePath), 'Il file sunny.blade.php non esiste');

        $content = File::get($filePath);

        Assert::assertStringContainsString(
            'optional($_theme)->cssInLine',
            $content,
            'Il template sunny.blade.php non utilizza optional() per cssInLine',
        );
    });

    test('_ark_template_contains_optional_function', function (): void {
<<<<<<< .merge_file_Diq5o4
$filePath = base_path('Modules/Notify/resources/views/emails/templates/ark.blade.php');
=======
        $filePath = base_path('Modules/Notify/resources/views/emails/templates/ark.blade.php');
>>>>>>> .merge_file_CCs8M9

        Assert::assertTrue(File::exists($filePath), 'Il file ark.blade.php non esiste');

        $content = File::get($filePath);

        Assert::assertStringContainsString(
            'optional($_theme)->cssInLine',
            $content,
            'Il template ark.blade.php non utilizza optional() per cssInLine',
        );
    });
});
