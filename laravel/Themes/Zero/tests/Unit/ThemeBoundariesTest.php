<?php

declare(strict_types=1);

use function Safe\file_get_contents;

/*
 * ADR in docs/adr/: il tema Zero non contiene classi PHP (logica e modelli stanno nei moduli) e le pagine auth rendono il
 * LoginWidget del modulo User caricando il CSS compilato del pannello Filament. Test sul sorgente, senza app.
 */
test('the theme ships no PHP classes', function (): void {
    $php = [];
    foreach (['app', 'src'] as $folder) {
        $dir = dirname(__DIR__, 2).'/'.$folder;
        if (! is_dir($dir)) {
            continue;
        }
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)) as $file) {
            if ($file instanceof SplFileInfo && $file->getExtension() === 'php') {
                $php[] = $file->getPathname();
            }
        }
    }

    expect($php)->toBe([]);
});

test('auth layout loads the Filament panel CSS for widgets rendered outside a panel', function (): void {
    $layout = file_get_contents(dirname(__DIR__, 2).'/resources/views/components/layouts/auth.blade.php');
    $login = file_get_contents(dirname(__DIR__, 2).'/resources/views/pages/auth/login.blade.php');

    expect($layout)->toContain('@filamentStyles')
        ->toContain("asset('css/filament/filament/app.css')")
        ->and($login)->toContain('Modules\User\Filament\Widgets\Auth\LoginWidget');
});
