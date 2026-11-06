<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Contracts\UserContract;

<<<<<<< .merge_file_XO0qOP
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Safe\class_implements;
=======
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Tests\TestCase;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Safe\class_implements;

>>>>>>> 6ed19256f (.)
uses(TestCase::class);
>>>>>>> .merge_file_d6EaqT

// LOGIN WIDGET TESTS - Filament Component
// ✅ Test del WIDGET Filament, non della pagina
// ✅ Focus su: rendering, form interaction, authentication logic
// ✅ Architettura: Filament Widget + XotData + dynamic resolution

// WIDGET STRUCTURE TESTS

test('widget can be rendered', function (): void {
<<<<<<< .merge_file_XO0qOP
    $component = Livewire::test(LoginWidget::class);

=======
<<<<<<< HEAD
=======
    $component = Livewire::test(LoginWidget::class);

    /* @phpstan-ignore-next-line method.nonObject */
>>>>>>> .merge_file_d6EaqT
    $component->assertStatus(200);
});

test('widget has correct view', function (): void {
<<<<<<< .merge_file_XO0qOP
    expect(app(GetViewByClassAction::class)->execute(LoginWidget::class))->toContain('filament.widgets.login');
=======
    expect(LoginWidget::getView())->toBe('user::filament.widgets.login');
>>>>>>> .merge_file_d6EaqT
});

test('widget initializes correctly', function (): void {
    $component = Livewire::test(LoginWidget::class);

    // Widget dovrebbe inizializzare la proprietà data
<<<<<<< .merge_file_XO0qOP
    $component->assertSet('data', []);
=======
    /* @phpstan-ignore-next-line method.nonObject */
    $component->assertSet('data', []);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_d6EaqT
});

// WIDGET DATA BINDING TESTS

test('can set form data', function (): void {
<<<<<<< .merge_file_XO0qOP
    $component = Livewire::test(LoginWidget::class);

    // Set form data
    $component->set('data.email', 'test@example.com')->set('data.password', 'password123');

    // Verifica che i dati siano stati impostati
    $component->assertSet('data.email', 'test@example.com')->assertSet('data.password', 'password123');
=======
<<<<<<< HEAD
=======
    $component = Livewire::test(LoginWidget::class);

    // Set form data
    /* @phpstan-ignore-next-line method.nonObject */
    $component->set('data.email', 'test@example.com')->set('data.password', 'password123');

    // Verifica che i dati siano stati impostati
    /* @phpstan-ignore-next-line method.nonObject */
    $component->assertSet('data.email', 'test@example.com')->assertSet('data.password', 'password123');
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_d6EaqT
});

// WIDGET AUTHENTICATION LOGIC TESTS

test('authenticates user with valid credentials', function (): void {
<<<<<<< .merge_file_XO0qOP
    // ✅ Utilizzo funzione centralizzata dal TestCase
    $email = $this->generateUniqueEmail();
    $this->createTestUser([
=======
<<<<<<< HEAD
=======
    // ✅ Utilizzo funzione centralizzata dal TestCase
    $email = $this->generateUniqueEmail();
    $user = $this->createTestUser([
>>>>>>> .merge_file_d6EaqT
        'email' => $email,
        'password' => Hash::make('password123'),
    ]);

    assertGuest();

    $component = Livewire::test(LoginWidget::class);

<<<<<<< .merge_file_XO0qOP
    $component->set('data.email', $email)->set('data.password', 'password123')->call('login');
=======
    /* @phpstan-ignore-next-line method.nonObject */
    $component->set('data.email', $email)->set('data.password', 'password123')->call('save');
>>>>>>> .merge_file_d6EaqT

    // Verifica che l'utente sia autenticato
    assertAuthenticated();

    // Verifica che sia l'utente corretto
    $authenticatedUser = Auth::user();
    expect($authenticatedUser)->not->toBeNull();
    expect($authenticatedUser?->email)->toBe($email);
});

test('handles invalid credentials gracefully', function (): void {
    // ✅ Utilizzo funzioni centralizzate dal TestCase
    $email = $this->generateUniqueEmail();
    $this->createTestUser([
        'email' => $email,
        'password' => Hash::make('correct_password'),
    ]);

    assertGuest();

    $component = Livewire::test(LoginWidget::class);

    // Tenta login con password sbagliata
<<<<<<< .merge_file_XO0qOP
    $component->set('data.email', $email)->set('data.password', 'wrong_password')->call('login');

    // L'utente dovrebbe rimanere guest
    assertGuest();
=======
    /* @phpstan-ignore-next-line method.nonObject */
    $component->set('data.email', $email)->set('data.password', 'wrong_password')->call('save');

    // L'utente dovrebbe rimanere guest
    assertGuest();
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_d6EaqT
});

// WIDGET XOTDATA INTEGRATION TESTS

test('authentication works regardless of user type', function (): void {
<<<<<<< .merge_file_XO0qOP
    // ✅ Utilizzo funzioni centralizzate dal TestCase
    $email = $this->generateUniqueEmail();
    $this->createTestUser([
=======
<<<<<<< HEAD
=======
    // ✅ Utilizzo funzioni centralizzate dal TestCase
    $email = $this->generateUniqueEmail();
    $user = $this->createTestUser([
>>>>>>> .merge_file_d6EaqT
        'email' => $email,
        'password' => Hash::make('password123'),
    ]);

    assertGuest();

    $component = Livewire::test(LoginWidget::class);

<<<<<<< .merge_file_XO0qOP
    $component->set('data.email', $email)->set('data.password', 'password123')->call('login');
=======
    /* @phpstan-ignore-next-line method.nonObject */
    $component->set('data.email', $email)->set('data.password', 'password123')->call('save');
>>>>>>> .merge_file_d6EaqT

    assertAuthenticated();

    // Verifica che l'utente autenticato sia del tipo corretto
    $authenticatedUser = Auth::user();
    expect($authenticatedUser)->toBeInstanceOf($this->getUserClass());
    expect($authenticatedUser?->email)->toBe($email);
});

test('getUserClass returns valid class', function (): void {
    // ✅ Utilizzo funzione centralizzata dal TestCase
    $userClass = $this->getUserClass();

<<<<<<< .merge_file_XO0qOP
=======
    expect($userClass)->toBeString();
>>>>>>> .merge_file_d6EaqT
    expect(class_exists($userClass))->toBeTrue();

    // Verifica che il class implementi UserContract
    $interfaces = class_implements($userClass);
    expect($interfaces)->toContain(UserContract::class);
});

test('createTestUser creates valid instances', function (): void {
    // ✅ Utilizzo funzione centralizzata dal TestCase
    $user = $this->createTestUser();

    // Verifica proprietà richieste per autenticazione
    expect($user->email)->toBeString();
<<<<<<< .merge_file_XO0qOP
    expect($user->getAuthPassword())->not->toBeEmpty();
=======
    expect($user->password)->toBeString();
>>>>>>> .merge_file_d6EaqT

    // Verifica che l'utente sia nel database
    $userClass = $this->getUserClass();
    $foundUser = $userClass::where('email', $user->email)->first();
<<<<<<< .merge_file_XO0qOP
    expect($foundUser?->getAttribute('email'))->toBe($user->email);
=======
    expect($foundUser)->not->toBeNull();
    expect($foundUser->email)->toBe($user->email);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_d6EaqT
});
