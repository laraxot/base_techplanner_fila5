<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Gdpr\Tests\Feature;

uses(\Modules\Gdpr\Tests\TestCase::class);

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
=======
uses(TestCase::class);

uses(TestCase::class);

uses(TestCase::class);

uses(TestCase::class);

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
>>>>>>> dev

it('verifica che le classi corrette siano istanziabili', function (): void {
    expect(new Treatment())->toBeInstanceOf(Treatment::class);
    expect(new Profile())->toBeInstanceOf(Profile::class);
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment();
    $profile = new Profile();

<<<<<<< HEAD
    // Verifica che le proprietà fillable siano definite
    expect($treatment->getFillable())->toBeArray();
    expect($profile->getFillable())->toBeArray();

    // Verifica che la connessione al database sia definita correttamente
=======
    expect($treatment->getFillable())->toBeArray();
    expect($profile->getFillable())->toBeArray();

>>>>>>> dev
    expect($profile->getConnectionName())->toBe('gdpr');
});
