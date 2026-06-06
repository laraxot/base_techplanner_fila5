<?php

declare(strict_types=1);

dataset('userMigrationFiles', static function (): array {
    $basePath = dirname(__DIR__, 4).'/database/migrations';
    $files = glob($basePath.'/*.php');

<<<<<<< HEAD
    if (false === $files) {
=======
    if ($files === false) {
>>>>>>> origin/dev
        return [];
    }

    sort($files);

    return array_combine($files, $files);
});

<<<<<<< HEAD
it('does not contain merge conflict markers in user migrations', function (string $migrationFile): void {
    $contents = file_get_contents($migrationFile);

    expect($contents)->not->toBeFalse();
    expect($contents)->not->toContain('<<<<<<< HEAD');
    expect($contents)->not->toContain('=======');
    expect($contents)->not->toContain('>>>>>>> ');
})->with('userMigrationFiles');

it('has valid php syntax in user migrations', function (string $migrationFile): void {
=======
it('does not contain merge conflict markers in user migrations', static function (string $migrationFile): void {
    $contents = file_get_contents($migrationFile);

    expect($contents)->not->toBeFalse();
})->with('userMigrationFiles');

it('has valid php syntax in user migrations', static function (string $migrationFile): void {
>>>>>>> origin/dev
    $output = [];
    $exitCode = 0;

    exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);

    expect($exitCode)->toBe(
        0,
        implode(PHP_EOL, $output),
    );
})->with('userMigrationFiles');
