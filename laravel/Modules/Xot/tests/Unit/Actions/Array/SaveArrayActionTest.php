<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SaveArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $action = app(SaveArrayAction::class);
    $tempDir = sys_get_temp_dir();
    mkdir($tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($tempDir))
        array_map('unlink', glob($tempDir.'/*'));
        rmdir($tempDir);
=======
    $this->action = app(SaveArrayAction::class);
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
>>>>>>> origin/dev
    }
});

it('saves array in json format', function (): void {
<<<<<<< HEAD
    $path = $tempDir.'/data.json';

    $result = $action->execute(['a' => 1], $path, 'json');
=======
    $path = $this->tempDir.'/data.json';

    $result = $this->action->execute(['a' => 1], $path, 'json');
>>>>>>> origin/dev

    expect($result)->toBeTrue()
        ->and((string) file_get_contents($path))->toContain('"a": 1');
});

it('saves array in php format by default', function (): void {
<<<<<<< HEAD
    $path = $tempDir.'/data.php';

    $result = $action->execute(['b' => 2], $path);
=======
    $path = $this->tempDir.'/data.php';

    $result = $this->action->execute(['b' => 2], $path);
>>>>>>> origin/dev

    expect($result)->toBeTrue()
        ->and(require $path)->toBe(['b' => 2]);
});

it('throws for unsupported format', function (): void {
<<<<<<< HEAD
    $action->execute([], $this->tempDir.'/invalid.txt', 'xml');
})->throws(InvalidArgumentException::class, 'Formato non supportato');
=======
    $this->action->execute([], $this->tempDir.'/invalid.txt', 'xml');
})->throws(\InvalidArgumentException::class, 'Formato non supportato');
>>>>>>> origin/dev
