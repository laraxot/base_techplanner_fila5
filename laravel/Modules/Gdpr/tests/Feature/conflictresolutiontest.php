<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
>>>>>>> laraxot/dev

uses(TestCase::class);

it('verifica che le classi corrette siano istanziabili', function (): void {
<<<<<<< HEAD
    Assert::assertInstanceOf(Treatment::class, new Treatment());
    Assert::assertInstanceOf(Profile::class, new Profile());
=======
    expect(new Treatment())->not->toBeNull();
    expect(new Profile())->not->toBeNull();
>>>>>>> laraxot/dev
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment();
    $profile = new Profile();

<<<<<<< HEAD
    Assert::assertIsArray($treatment->getFillable());
    Assert::assertIsArray($profile->getFillable());
    Assert::assertSame('gdpr', $profile->getConnectionName());
=======
    // Verifica che le proprietà fillable siano definite
    expect($treatment->getFillable())->not->toBeNull();
    expect($profile->getFillable())->not->toBeNull();

    // Verifica che la connessione al database sia definita correttamente
    expect($profile->getConnectionName())->toBe('gdpr');
>>>>>>> laraxot/dev
});
