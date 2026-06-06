<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Actions\Array;

use Modules\Xot\Actions\Array\SavePhpArrayAction;

beforeEach(function (): void {
<<<<<<< HEAD
    $action = app(SavePhpArrayAction::class);
    $tempDir = sys_get_temp_dir();
    mkdir($tempDir, 0755, true);
});

afterEach(function (): void {
    if (isset($tempDir))
        foreach (glob($tempDir.'/*'))
            unlink($f);
        }
        rmdir($tempDir);
=======
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
            foreach ($files as $f) {
                unlink($f);
            }
        }
        rmdir($this->tempDir);
>>>>>>> origin/dev
    }
});

it('saves array to php', function (): void {
<<<<<<< HEAD
    $path = $tempDir.'/d.php';
    $data = ['a' => 1];
    $result = $action->execute($data, $path);
=======
    $path = $this->tempDir.'/d.php';
    $data = ['a' => 1];
    $result = $this->action->execute($data, $path);
>>>>>>> origin/dev
    expect($result)->toBeTrue();
    expect(require $path)->toBe($data);
});
