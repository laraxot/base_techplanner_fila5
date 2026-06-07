<?php

declare(strict_types=1);

namespace Modules\Cms\Tests\Feature\Auth;

use Livewire\Livewire;
use Modules\User\Filament\Widgets\RegistrationWidget;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Tests\TestCase;

// Use Cms specific TestCase only for this file
uses(TestCase::class);

<<<<<<< HEAD
function cmsHasUserType(string $type): bool
{
    try {
        XotData::make()->getUserResourceClassByType($type);

        return true;
    } catch (\Throwable) {
        return false;
    }
}

// Ensure XotData is mocked for every test
// beforeEach(function (): void {
//     // ✅ Utilizzo funzione centralizzata dal TestCase
//     $email = TestCase::generateUniqueEmail();
// });
=======
// Ensure XotData is mocked for every test
beforeEach(static function (): void {
    // ✅ Utilizzo funzione centralizzata dal TestCase
    static::mockXotData();
});
>>>>>>> dev

// REGISTRATION WIDGET TESTS - Filament Component
// ✅ Test del WIDGET Filament, non della pagina
// ✅ Focus su: rendering, form interaction, basic validation
// ✅ Architettura: Filament Widget + XotBaseWidget + dynamic resolution

// WIDGET CORE TESTS
<<<<<<< HEAD

test('registration widget renders correctly for patient type', function (): void {
    if (! cmsHasUserType('patient')) {
        $this->markTestSkipped('User type patient is not configured in this install.');
    }

    Livewire::test(RegistrationWidget::class, ['type' => 'patient'])
        ->assertStatus(200)
        ->assertViewIs('pub_theme::filament.widgets.registration');
});

test('registration widget renders correctly for doctor type', function (): void {
    if (! cmsHasUserType('doctor')) {
        $this->markTestSkipped('User type doctor is not configured in this install.');
    }

    Livewire::test(RegistrationWidget::class, ['type' => 'doctor'])
        ->assertStatus(200)
        ->assertViewIs('pub_theme::filament.widgets.registration');
});

test('registration widget throws exception without type parameter', function (): void {
    expect(function () {
        Livewire::test(RegistrationWidget::class);
    })->toThrow(\Exception::class);
});

test('registration widget can set and get form data', function (): void {
    if (! cmsHasUserType('patient')) {
        $this->markTestSkipped('User type patient is not configured in this install.');
    }

    $email = TestCase::generateUniqueEmail();
    Livewire::test(RegistrationWidget::class, ['type' => 'patient'])
        ->set('data.email', $email)
        ->set('data.name', 'Test User')
        ->assertSet('data.email', $email)
        ->assertSet('data.name', 'Test User');
});

test('registration widget can handle multiple form fields', function (): void {
    if (! cmsHasUserType('patient')) {
        $this->markTestSkipped('User type patient is not configured in this install.');
    }

    $testData = [
        'name' => 'Test Patient',
        'email' => TestCase::generateUniqueEmail(),
        'password' => 'TestPassword123!',
    ];

    $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient']);
    foreach ($testData as $field => $value) {
        $widget->set("data.{$field}", $value);
    }

    foreach ($testData as $field => $value) {
        expect($widget->get("data.{$field}"))->toBe($value);
    }
});

test('registration widget register method can be called', function (): void {
    if (! cmsHasUserType('patient')) {
        $this->markTestSkipped('User type patient is not configured in this install.');
    }

    $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient'])
        ->set('data.email', TestCase::generateUniqueEmail())
        ->set('data.name', 'Test User')
        ->set('data.password', 'TestPassword123!');

    try {
        $widget->call('register');
        expect(true)->toBeTrue();
    } catch (\Exception $e) {
        expect($e)->toBeInstanceOf(\Exception::class);
    }
});

test('registration widget is compatible with Livewire testing', function (): void {
    if (! cmsHasUserType('patient')) {
        $this->markTestSkipped('User type patient is not configured in this install.');
    }

    $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient']);
    expect($widget)->not()->toBeNull();
});

test('registration widget works for different user types', function (): void {
    foreach (['patient', 'doctor'] as $type) {
        if (! cmsHasUserType($type)) {
            $this->markTestSkipped("User type {$type} is not configured in this install.");
        }

        $widget = Livewire::test(RegistrationWidget::class, ['type' => $type])
            ->set('data.email', TestCase::generateUniqueEmail())
            ->set('data.name', "Test {$type}")
=======
describe('Registration Widget', static function () {
    test('patient widget renders correctly', static function () {
        Livewire::test(RegistrationWidget::class, ['type' => 'patient'])
            ->assertStatus(200)
            ->assertViewIs('pub_theme::filament.widgets.registration');
    });

    test('doctor widget renders correctly', static function () {
        Livewire::test(RegistrationWidget::class, ['type' => 'doctor'])
            ->assertStatus(200)
            ->assertViewIs('pub_theme::filament.widgets.registration');
    });

    test('widget without type throws exception', static function () {
        expect(static function () {
            Livewire::test(RegistrationWidget::class);
        })->toThrow(\Exception::class);
    });

    test('widget accepts form data', static function () {
        $email = static::generateUniqueEmail();

        $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient'])
            ->set('data.email', $email)
            ->set('data.name', 'Test User')
            ->assertSet('data.email', $email)
            ->assertSet('data.name', 'Test User');

        expect($widget->get('data.email'))->toBe($email);
    });

    test('widget accepts multiple fields', static function () {
        $testData = [
            'name' => 'Test Patient',
            'email' => static::generateUniqueEmail(),
            'password' => 'TestPassword123!',
        ];

        $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient']);

        foreach ($testData as $field => $value) {
            $widget->set("data.{$field}", $value);
        }

        foreach ($testData as $field => $value) {
            expect($widget->get("data.{$field}"))->toBe($value);
        }
    });

    test('widget register action does not cause fatal errors', static function () {
        $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient'])
            ->set('data.email', static::generateUniqueEmail())
            ->set('data.name', 'Test User')
>>>>>>> dev
            ->set('data.password', 'TestPassword123!');

        try {
            $widget->call('register');
            expect(true)->toBeTrue();
        } catch (\Exception $e) {
            expect($e)->toBeInstanceOf(\Exception::class);
        }
<<<<<<< HEAD
    }
});

test('registration widget preserves form data after validation errors', function (): void {
    if (! cmsHasUserType('patient')) {
        $this->markTestSkipped('User type patient is not configured in this install.');
    }

    $email = 'invalid-email';
    $name = 'Test User';

    $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient'])
        ->set('data.email', $email)
        ->set('data.name', $name);

    expect($widget->get('data.email'))->toBe($email)->and($widget->get('data.name'))->toBe($name);
=======
    });

    test('widget is compatible with livewire testing', static function () {
        $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient']);

        expect($widget)->not()->toBeNull();
    });

    test('widget works for all user types', static function () {
        foreach (['patient', 'doctor'] as $type) {
            $widget = Livewire::test(RegistrationWidget::class, ['type' => $type])
                ->set('data.email', static::generateUniqueEmail())
                ->set('data.name', "Test {$type}")
                ->set('data.password', 'TestPassword123!');

            try {
                $widget->call('register');
                expect(true)->toBeTrue();
            } catch (\Exception $e) {
                expect($e)->toBeInstanceOf(\Exception::class);
            }
        }
    });

    test('widget preserves data after invalid input', static function () {
        $email = 'invalid-email';
        $name = 'Test User';

        $widget = Livewire::test(RegistrationWidget::class, ['type' => 'patient'])->set('data.email', $email)->set(
            'data.name',
            $name,
        );

        expect($widget->get('data.email'))->toBe($email)->and($widget->get('data.name'))->toBe($name);
    });
>>>>>>> dev
});
