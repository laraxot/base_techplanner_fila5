<?php

declare(strict_types=1);

<<<<<<< .merge_file_A1OwYM
namespace Modules\Geo\Tests\Unit\Models;

/*
 * Specifica neutralizzata: i 16 scenari di questa prima stesura vivono ora in ComuneModelTest.php.
 *
 * Questo file era una classe PHPUnit che chiamava sul modello Comune i named scope byRegion(), byProvince(),
 * byCap(), byName(), byExactName() e le loro combinazioni. Quei metodi non esistono su Comune e non sono mai
 * esistiti: `git log --all -S'function byRegion' -- app/Models/Comune.php` e vuoto. Solo byRegion(), byProvince()
 * e byCap() esistono, come metodi statici di ComuneJson (che restituisce collection di array, non un builder).
 * I 69 commenti di ignore PHPStan della vecchia stesura coprivano proprio questo.
 *
 * Gli stessi comportamenti sono provati da ComuneModelTest.php con le API reali di Comune (query Eloquent,
 * findByCap(), findByNome()) e le letture del JSON da comunetest.php. Il corpo vecchio resta in git
 * (blob fafb1aa9 in HEAD, commit 60524329; blob 5e25f92a in laraxot/dev).
 */

describe('Comune query scopes (first draft)', function (): void {
    it('filters comuni by region, province, cap and name with the by*() scopes')
        ->skip('Comune::byRegion() and the other by*() scopes not implemented');

    it('loads, creates, updates and deletes a comune')
        ->skip('superseded by ComuneModelTest.php');
=======
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Modules\Geo\Models\Comune;
use Modules\Tenant\Services\TenantService;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    // Clear any cached data before setting up test data
    Cache::forget('sushi_Comune_data');

    // Crea un file JSON di test
    $this->testData = [
        [
            'id' => 1,
            'regione' => 'Lombardia',
            'provincia' => 'Milano',
<<<<<<< HEAD
            'nome' => 'Milano',
=======
            'comune' => 'Milano',
>>>>>>> 6ed19256f (.)
            'cap' => '20100',
            'lat' => 45.4642,
            'lng' => 9.1900,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 2,
            'regione' => 'Lombardia',
            'provincia' => 'Milano',
<<<<<<< HEAD
            'nome' => 'Sesto San Giovanni',
=======
            'comune' => 'Sesto San Giovanni',
>>>>>>> 6ed19256f (.)
            'cap' => '20099',
            'lat' => 45.5347,
            'lng' => 9.2345,
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ];

<<<<<<< HEAD
    // Use the path that matches the SushiToJson trait's getJsonFile() method
    $jsonPath = $this->app->make(TenantService::class)->filePath('database/content/comuni.json');
    $directory = dirname($jsonPath);
    if (! File::exists($directory)) {
        File::makeDirectory($directory, 0755, true);
    }

    File::put($jsonPath, json_encode($this->testData, JSON_PRETTY_PRINT));
=======
    File::put(base_path('database/content/comuni.json'), json_encode($this->testData, JSON_PRETTY_PRINT));
>>>>>>> 6ed19256f (.)
});

afterEach(function (): void {
    // Pulisci la cache
    Cache::forget('sushi_Comune_data');

    // Rimuovi il file di test
<<<<<<< HEAD
    $jsonPath = app(TenantService::class)->filePath('database/content/comuni.json');
    File::delete($jsonPath);
=======
    File::delete(base_path('database/content/comuni.json'));
>>>>>>> 6ed19256f (.)
});

test('it can load comuni from json', function (): void {
    $comuni = Comune::all();

    expect($comuni)->toHaveCount(2);
    expect($comuni[0]->comune)->toBe('Milano');
    expect($comuni[1]->comune)->toBe('Sesto San Giovanni');
});

test('it can filter comuni by region', function (): void {
<<<<<<< HEAD
    $comuni = Comune::where('regione', 'Lombardia')->get();
=======
    $comuni = Comune::byRegion('Lombardia')->get();
>>>>>>> 6ed19256f (.)

    expect($comuni)->toHaveCount(2);
    expect($comuni[0]->regione)->toBe('Lombardia');
    expect($comuni[1]->regione)->toBe('Lombardia');
});

test('it can filter comuni by province', function (): void {
    $comuni = Comune::byProvince('Milano')->get();

    expect($comuni)->toHaveCount(2);
    expect($comuni[0]->provincia)->toBe('Milano');
    expect($comuni[1]->provincia)->toBe('Milano');
});

test('it can filter comuni by cap', function (): void {
    $comuni = Comune::byCap('20100')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->cap)->toBe('20100');
});

test('it can filter comuni by name', function (): void {
    $comuni = Comune::byName('Milano')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
});

test('it can filter comuni by exact name', function (): void {
    $comuni = Comune::byExactName('Milano')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
});

test('it can filter comuni by name and province', function (): void {
    $comuni = Comune::byNameAndProvince('Milano', 'Milano')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
    expect($comuni[0]->provincia)->toBe('Milano');
});

test('it can filter comuni by name and region', function (): void {
    $comuni = Comune::byNameAndRegion('Milano', 'Lombardia')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
    expect($comuni[0]->regione)->toBe('Lombardia');
});

test('it can filter comuni by name province and region', function (): void {
    $comuni = Comune::byNameProvinceAndRegion('Milano', 'Milano', 'Lombardia')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
    expect($comuni[0]->provincia)->toBe('Milano');
    expect($comuni[0]->regione)->toBe('Lombardia');
});

test('it can filter comuni by name and cap', function (): void {
    $comuni = Comune::byNameAndCap('Milano', '20100')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
    expect($comuni[0]->cap)->toBe('20100');
});

test('it can filter comuni by name province and cap', function (): void {
    $comuni = Comune::byNameProvinceAndCap('Milano', 'Milano', '20100')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
    expect($comuni[0]->provincia)->toBe('Milano');
    expect($comuni[0]->cap)->toBe('20100');
});

test('it can filter comuni by name region and cap', function (): void {
    $comuni = Comune::byNameRegionAndCap('Milano', 'Lombardia', '20100')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
    expect($comuni[0]->regione)->toBe('Lombardia');
    expect($comuni[0]->cap)->toBe('20100');
});

test('it can filter comuni by name province region and cap', function (): void {
<<<<<<< HEAD
    $comuni = Comune::where('nome', 'Milano')->where('provincia', 'Milano')->where('regione', 'Lombardia')->where('cap', '20100')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->nome)->toBe('Milano');
=======
    $comuni = Comune::byNameProvinceRegionAndCap('Milano', 'Milano', 'Lombardia', '20100')->get();

    expect($comuni)->toHaveCount(1);
    expect($comuni[0]->comune)->toBe('Milano');
>>>>>>> 6ed19256f (.)
    expect($comuni[0]->provincia)->toBe('Milano');
    expect($comuni[0]->regione)->toBe('Lombardia');
    expect($comuni[0]->cap)->toBe('20100');
});

test('it can create a new comune', function (): void {
<<<<<<< HEAD
    $comune = new Comune([
=======
    $comune = Comune::create([
>>>>>>> 6ed19256f (.)
        'regione' => 'Lombardia',
        'provincia' => 'Milano',
        'comune' => 'Bresso',
        'cap' => '20091',
        'lat' => 45.5389,
        'lng' => 9.1900,
    ]);
    $comune->save();

    expect($comune->id)->not->toBeNull();
    expect($comune->comune)->toBe('Bresso');
    expect($comune->provincia)->toBe('Milano');
    expect($comune->regione)->toBe('Lombardia');
    expect($comune->cap)->toBe('20091');
    expect($comune->lat)->toBe(45.5389);
    expect($comune->lng)->toBe(9.1900);
});

test('it can update an existing comune', function (): void {
    $comune = Comune::first();
<<<<<<< HEAD
    if ($comune) {
        $comune->comune = 'Milano Centro';
        $comune->cap = '20121';
        $comune->save();

        expect($comune->comune)->toBe('Milano Centro');
        expect($comune->cap)->toBe('20121');
    } else {
        // If no comune exists, create one for the test
        $comune = new Comune([
            'regione' => 'Lombardia',
            'provincia' => 'Milano',
            'comune' => 'Milano Centro',
            'cap' => '20121',
            'lat' => 45.5389,
            'lng' => 9.1900,
        ]);
        $comune->save();

        expect($comune->comune)->toBe('Milano Centro');
        expect($comune->cap)->toBe('20121');
    }
=======
    $comune->update([
        'comune' => 'Milano Centro',
        'cap' => '20121',
    ]);

    expect($comune->comune)->toBe('Milano Centro');
    expect($comune->cap)->toBe('20121');
>>>>>>> 6ed19256f (.)
});

test('it can delete an existing comune', function (): void {
    $comune = Comune::first();
    $id = $comune->id;

    $comune->delete();

    expect(Comune::find($id))->toBeNull();
>>>>>>> .merge_file_oPoruz
});
