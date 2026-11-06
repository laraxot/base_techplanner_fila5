<?php

declare(strict_types=1);

<<<<<<< .merge_file_KQD7SM
use Illuminate\Support\Facades\File;
=======
<<<<<<< HEAD
namespace Modules\Notify\Tests\Feature;

use Illuminate\Support\Facades\File;
use Modules\Notify\Tests\TestCase;
=======
use Illuminate\Support\Facades\File;
use Tests\TestCase;
>>>>>>> 6ed19256f (.)

uses(TestCase::class);
>>>>>>> .merge_file_B9c7wV

uses(\Modules\Notify\Tests\TestCase::class);
test('html template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/html.blade.php');

    // Verifico che il file esiste
<<<<<<< .merge_file_KQD7SM
    expect(File::exists($filePath))->toBeTrue('Il file html.blade.php non esiste');
=======
<<<<<<< HEAD
=======
    $this->assertTrue(File::exists($filePath), 'Il file html.blade.php non esiste');
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_B9c7wV

    // Leggo il contenuto del file
    $content = File::get($filePath);

    // Verifico che contiene la funzione optional per subject
    expect(str_contains($content, 'optional($email_data)->subject'))->toBeTrue('Il template html.blade.php non utilizza optional() per subject');

<<<<<<< .merge_file_KQD7SM
    // Verifico che contiene la funzione optional per body_html
    expect(str_contains($content, 'optional($email_data)->body_html'))->toBeTrue('Il template html.blade.php non utilizza optional() per body_html');
=======
    $this->assertTrue($hasEmailData || $hasSubjectVar, 'Il template html.blade.php non gestisce subject via $email_data o $subject');
<<<<<<< HEAD
=======
    $this->assertTrue($hasOptional, 'Il template html.blade.php non utilizza optional() per gestire dati email');
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_B9c7wV
});

test('sunny template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/templates/sunny.blade.php');

    // Verifico che il file esiste
<<<<<<< .merge_file_KQD7SM
    expect(File::exists($filePath))->toBeTrue('Il file sunny.blade.php non esiste');
=======
<<<<<<< HEAD
=======
    $this->assertTrue(File::exists($filePath), 'Il file sunny.blade.php non esiste');
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_B9c7wV

    // Leggo il contenuto del file
    $content = File::get($filePath);

    // Verifico che contiene la funzione optional per cssInLine
    expect(str_contains($content, 'optional($_theme)->cssInLine'))->toBeTrue('Il template sunny.blade.php non utilizza optional() per cssInLine');
});

test('ark template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/templates/ark.blade.php');

    // Verifico che il file esiste
<<<<<<< .merge_file_KQD7SM
    expect(File::exists($filePath))->toBeTrue('Il file ark.blade.php non esiste');
=======
<<<<<<< HEAD
=======
    $this->assertTrue(File::exists($filePath), 'Il file ark.blade.php non esiste');
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_B9c7wV

    // Leggo il contenuto del file
    $content = File::get($filePath);

    // Verifico che contiene la funzione optional per cssInLine
    expect(str_contains($content, 'optional($_theme)->cssInLine'))->toBeTrue('Il template ark.blade.php non utilizza optional() per cssInLine');
});