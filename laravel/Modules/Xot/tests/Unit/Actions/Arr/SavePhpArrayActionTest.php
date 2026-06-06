<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Arr;

use Modules\Xot\Actions\Arr\SavePhpArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
$this->action = app(SavePhpArrayAction::class);
    $this->tempDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'pest_test_'.uniqid();
    if (! file_exists($this->tempDir)) {
        mkdir($this->tempDir, 0755, true);
    }
});

afterEach(function (): void {
    if (isset($this->tempDir) && file_exists($this->tempDir)) {
        $files = glob($this->tempDir.'/*');
        if ($files !== false) {
            array_map('unlink', $files);
        }
        rmdir($this->tempDir);
    }
=======
    $action = app(SavePhpArrayAction::class);
    $tempDir = sys_get_temp_dir();
    mkdir($tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($tempDir))
        array_map('unlink', glob($tempDir.'/*'));
        rmdir($tempDir);    }
>>>>>>> 8215f950 (.)
});

it('saves array to php file', function (): void {
    $data = ['a' => 1, 'b' => 'test'];
<<<<<<< HEAD
$path = $this->tempDir.'/data.php';

    $result = $this->action->execute($data, $path);

=======
    $path = $tempDir.'/data.php';

    $result = $action->execute($data, $path);
>>>>>>> 8215f950 (.)
    expect($result)->toBeTrue();
    $loaded = require $path;
    expect($loaded)->toBe($data);
});

it('saved file has strict types', function (): void {
<<<<<<< HEAD
$path = $this->tempDir.'/strict.php';
    $this->action->execute(['x' => 1], $path);

=======
    $path = $tempDir.'/strict.php';
    $action->execute(['x' => 1], $path);
>>>>>>> 8215f950 (.)
    expect(file_get_contents($path))->toContain('declare(strict_types=1)');
});
