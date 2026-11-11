<?php

declare(strict_types=1);

use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\TechPlanner\Filament\Resources\ClientResource\Tables\ClientsTable;
use Modules\TechPlanner\Models\Client;
use Modules\TechPlanner\Tests\TestCase;

uses(TestCase::class);

/**
 * Stato e testo della colonna come li calcola Filament, senza montare una tabella Livewire:
 * si invocano le closure dichiarate da ClientsTable.
 *
 * @return array{0: mixed, 1: string}
 */
function tpDistanceCell(Client $client): array
{
    /** @var TextColumn $column */
    $column = (new ClientsTable())->getTableColumns()['distance'];

    $state = (new ReflectionProperty($column, 'getStateUsing'))->getValue($column);
    $format = (new ReflectionProperty($column, 'formatStateUsing'))->getValue($column);
    if (! $state instanceof Closure || ! $format instanceof Closure) {
        throw new RuntimeException('La colonna distance deve dichiarare getStateUsing e formatStateUsing');
    }

    $value = $state($client);
    $text = $format($value);
    if (! is_string($text)) {
        throw new RuntimeException('Il formattatore della distanza deve restituire una stringa');
    }

    return [$value, $text];
}

/*
 * Ordinamento dei clienti per distanza (manuale d'uso, «Coordinate e ordinamento per distanza»).
 * TPL-01: senza `withDistance()` la colonna Distanza non deve far esplodere la lista.
 * GEO-03: la distanza è in km, senza fattore miglia; i clienti senza coordinate vanno in fondo.
 */

beforeEach(function (): void {
    config(['database.connections.tech_planner' => ['driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '']]);
    DB::purge('tech_planner');
    Schema::connection('tech_planner')->create('clients', static function (Blueprint $table): void {
        $table->id();
        $table->string('company_name')->nullable();
        $table->double('latitude')->nullable();
        $table->double('longitude')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
    DB::connection('tech_planner')->table('clients')->insert([
        ['id' => 1, 'company_name' => 'Senza coordinate', 'latitude' => null, 'longitude' => null],
        ['id' => 2, 'company_name' => 'Padova', 'latitude' => 45.4064, 'longitude' => 11.8768],
        ['id' => 3, 'company_name' => 'Treviso', 'latitude' => 45.6669, 'longitude' => 12.2430],
        ['id' => 4, 'company_name' => 'Venezia', 'latitude' => 45.4408, 'longitude' => 12.3155],
    ]);
});

it('orders clients by real kilometres from the chosen client, without coordinates last', function (): void {
    $rows = Client::query()->withDistance(45.4408, 12.3155)->get();

    expect($rows->pluck('company_name')->all())->toBe(['Venezia', 'Treviso', 'Padova', 'Senza coordinate']);

    $treviso = $rows->firstWhere('company_name', 'Treviso');
    $distance = $treviso?->getAttributes()['distance'] ?? null;

    // Venezia–Treviso con queste coordinate: 25,77 km; con il vecchio fattore 1,1515 erano 29,67.
    expect($distance)->toBeFloat()
        ->and($distance)->toBeGreaterThan(24.5)
        ->and($distance)->toBeLessThan(26.5);
});

it('shows a dash instead of crashing when no starting client was chosen', function (): void {
    $client = Client::query()->findOrFail(3);

    // Causa radice di TPL-01: l'accesso magico tratta GeoTrait::distance() come relazione.
    expect(fn (): mixed => $client->getAttribute('distance'))->toThrow(LogicException::class);

    [$state, $text] = tpDistanceCell($client);

    expect($state)->toBeNull()->and($text)->toBe('—');
});

it('formats the distance in kilometres with the Italian decimal separator', function (): void {
    $client = Client::query()->withDistance(45.4408, 12.3155)->findOrFail(2);

    [$state, $text] = tpDistanceCell($client);

    expect($state)->toBeFloat()
        ->and($text)->toMatch('/^\d{2},\d{2} km$/');
});
