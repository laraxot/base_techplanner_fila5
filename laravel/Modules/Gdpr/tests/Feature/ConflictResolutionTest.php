<?php

declare(strict_types=1);

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifica che le classi corrette siano istanziabili', function (): void {
<<<<<<< HEAD
    Assert::assertInstanceOf(Treatment::class, new Treatment());
    Assert::assertInstanceOf(Profile::class, new Profile());
=======
    expect(new Treatment)->toBeInstanceOf(Treatment::class);
    expect(new Profile)->toBeInstanceOf(Profile::class);
>>>>>>> 2ae5567 (.)
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment;
    $profile = new Profile;

    Assert::assertIsArray($treatment->getFillable());
    Assert::assertIsArray($profile->getFillable());
    Assert::assertSame('gdpr', $profile->getConnectionName());
});
