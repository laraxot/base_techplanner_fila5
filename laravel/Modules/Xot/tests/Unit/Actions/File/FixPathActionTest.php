<?php

declare(strict_types=1);

uses(TestCase::class);
use Modules\Xot\Actions\File\FixPathAction;
use Modules\Xot\Tests\TestCase;
use PHPUnit\Framework\Assert;

it('normalizes path slashes correctly', function (): void {
    /** @var TestCase $this */
    $action = app(FixPathAction::class);

    $path = 'some/path\with/mixed\\slashes';
    $expected = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $path);

    Assert::assertSame($expected, $action->execute($path));
});
