<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

it('button blade renders semantic button or anchor tags', function (): void {
    $path = dirname(__DIR__, 3).'/resources/views/components/ui/button.blade.php';
<<<<<<< HEAD
    $contents = file_get_contents($path);

    Assert::assertStringContainsString('$tagAttr', $contents);
    Assert::assertStringContainsString('cursor-pointer', $contents);
    Assert::assertStringContainsString('preg_match', $contents);
    Assert::assertStringContainsString('javascript:', $contents);
=======
    $contents = (string) file_get_contents($path);

    Assert::assertStringContainsString('$tagAttr', $contents);
    Assert::assertStringContainsString('cursor-pointer', $contents);
>>>>>>> laraxot/dev
});

it('educational material detail renders structured content blocks', function (): void {
    $path = dirname(__DIR__, 3).'/resources/views/components/blocks/educational_material_detail.blade.php';
<<<<<<< HEAD
    $contents = file_get_contents($path);
=======

    $contents = (string) file_get_contents($path);
>>>>>>> laraxot/dev

    Assert::assertStringContainsString('$material->title', $contents);
    Assert::assertStringContainsString('$material->type', $contents);
});

it('language controller validates locale against supported list', function (): void {
<<<<<<< HEAD
    $source = file_get_contents(
=======
    $source = (string) file_get_contents(
>>>>>>> laraxot/dev
        dirname(__DIR__, 3).'/app/Http/Controllers/LanguageController.php'
    );

    Assert::assertStringContainsString('supported_locales', $source);
    Assert::assertStringContainsString('in_array($locale, $supportedLocales', $source);
});
