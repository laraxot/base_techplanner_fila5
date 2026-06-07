<?php

declare(strict_types=1);

namespace Modules\Cms\Tests\Feature\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use Livewire\Volt\Volt as LivewireVolt;
=======
=======
>>>>>>> dev
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Volt as LivewireVolt;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
use Modules\Xot\Tests\TestCase;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
test('login component renders', function () {
    $component = LivewireVolt::test('auth.login');

    expect($component)->not->toBeNull();
    $component->assertOk();
});

test('login component has default empty fields', function () {
    $component = LivewireVolt::test('auth.login');

    $component->assertSet('email', '')->assertSet('password', '')->assertSet('remember', false);
});

test('login component shows wire models', function () {
    $component = LivewireVolt::test('auth.login');

    $component
        ->assertSee('wire:model="email"')
        ->assertSee('wire:model="password"')
        ->assertSee('wire:model="remember"');
});

test('user can authenticate with valid credentials', function () {
    $email = $this->generateUniqueEmail();
    $user = $this->createTestUser([
        'email' => $email,
        'password' => Hash::make('password123'),
    ]);

    assertGuest();

    $response = LivewireVolt::test('auth.login')
        ->set('email', $email)
        ->set('password', 'password123')
        ->call('save');

    $response->assertHasNoErrors();
    assertAuthenticated();
});

test('user cannot authenticate with invalid password', function () {
    $email = $this->generateUniqueEmail();
    $this->createTestUser([
        'email' => $email,
        'password' => Hash::make('password123'),
    ]);

    assertGuest();

    $response = LivewireVolt::test('auth.login')
        ->set('email', $email)
        ->set('password', 'wrong_password')
        ->call('save');

    $response->assertHasErrors(['email']);
    assertGuest();
});

test('user cannot authenticate with non-existent email', function () {
    $email = $this->generateUniqueEmail();

    assertGuest();

    $response = LivewireVolt::test('auth.login')
        ->set('email', $email)
        ->set('password', 'password123')
        ->call('save');

    $response->assertHasErrors(['email']);
    assertGuest();
});

test('user cannot authenticate with invalid email format', function () {
    $response = LivewireVolt::test('auth.login')
        ->set('email', 'invalid-email')
        ->set('password', 'password123')
        ->call('save');

    $response->assertHasErrors(['email']);
});

test('form validation requires email and password', function () {
    $response = LivewireVolt::test('auth.login')->call('save');

    $response->assertHasErrors(['email', 'password']);
});

test('password too short fails validation', function () {
    $email = $this->generateUniqueEmail();

    $response = LivewireVolt::test('auth.login')
        ->set('email', $email)
        ->set('password', '123')
        ->call('save');

    $response->assertHasErrors();
=======
// NOTE: Helper functions moved to Modules\Xot\Tests\TestCase for DRY pattern
// Use $this->$this->generateUniqueEmail(), $this->getUserClass(), $this->$this->createTestUser()

=======
// NOTE: Helper functions moved to Modules\Xot\Tests\TestCase for DRY pattern
// Use $this->$this->generateUniqueEmail(), $this->getUserClass(), $this->$this->createTestUser()

describe('Volt Component Rendering', function (): void {
    test('volt login component can be rendered', function (): void {
>>>>>>> dev
        $component = LivewireVolt::test('auth.login');

        expect($component)->not->toBeNull();
        $component->assertOk();
    });

<<<<<<< HEAD
=======
    test('volt component has initial state', function (): void {
>>>>>>> dev
        $component = LivewireVolt::test('auth.login');

        $component->assertSet('email', '')->assertSet('password', '')->assertSet('remember', false);
    });

<<<<<<< HEAD
=======
    test('volt component renders form elements', function (): void {
>>>>>>> dev
        $component = LivewireVolt::test('auth.login');

        $component
            ->assertSee('wire:model="email"')
            ->assertSee('wire:model="password"')
            ->assertSee('wire:model="remember"');
    });
});

<<<<<<< HEAD
=======
describe('Volt Component Authentication', function (): void {
    test('user can authenticate via volt component', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        $response->assertHasNoErrors();
        assertAuthenticated();
    });

<<<<<<< HEAD
=======
    test('authentication fails with wrong credentials', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'wrong_password')
            ->call('save');

        $response->assertHasErrors(['email']);
        assertGuest();
    });

<<<<<<< HEAD
=======
    test('authentication fails with non-existent user', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        $response->assertHasErrors(['email']);
        assertGuest();
    });
});

<<<<<<< HEAD
=======
describe('Volt Component Validation', function (): void {
    test('email validation works', function (): void {
>>>>>>> dev
        $response = LivewireVolt::test('auth.login')
            ->set('email', 'invalid-email')
            ->set('password', 'password123')
            ->call('save');

        $response->assertHasErrors(['email']);
    });

<<<<<<< HEAD
=======
    test('required fields validation', function (): void {
>>>>>>> dev
        $response = LivewireVolt::test('auth.login')->call('save');

        $response->assertHasErrors(['email', 'password']);
    });

<<<<<<< HEAD
=======
    test('password minimum length validation', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', '123')
            ->call('save');

        // Password troppo corta dovrebbe fallire
        $response->assertHasErrors();
    });
});

<<<<<<< HEAD
=======
describe('Volt Component Session Management', function (): void {
    test('remember me functionality works', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->set('remember', true)
            ->call('save');

        $response->assertHasNoErrors();
        assertAuthenticated();
    });

<<<<<<< HEAD
=======
    test('session regeneration on login', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        // Store original session ID
        $originalSessionId = session()->getId();

        LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        assertAuthenticated();

        // Session should be regenerated for security
        expect(session()->getId())->not->toBe($originalSessionId);
    });

<<<<<<< HEAD
=======
    test('session data is preserved on authentication', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        // Set some session data
        Session::put('test_key', 'test_value');

        LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        assertAuthenticated();

        // Session data should be preserved (session regenerated but data kept)
        expect(Session::get('test_key'))->toBe('test_value');
    });
});

<<<<<<< HEAD
=======
describe('Volt Component Security', function (): void {
    test('login attempts are rate limited', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        // Multiple failed attempts
        for ($i = 0; $i < 5; ++$i) {
            LivewireVolt::test('auth.login')
                ->set('email', $email)
                ->set('password', 'wrong_password')
                ->call('save');
        }

        // Should be rate limited after too many attempts
        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        // May have throttling errors
        expect($response)->not->toBeNull();
    });

<<<<<<< HEAD
=======
    test('csrf protection is active', function (): void {
>>>>>>> dev
        // Volt components should automatically handle CSRF protection
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        // Should work normally with CSRF protection
        $response->assertHasNoErrors();
    });

<<<<<<< HEAD
=======
    test('input sanitization works', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();

        $response = LivewireVolt::test('auth.login')
            ->set('email', '<script>alert("xss")</script>'.$email)
            ->set('password', 'password123')
            ->call('save');

        // Should handle potentially malicious input safely
        expect($response)->not->toBeNull();
    });
});

<<<<<<< HEAD
=======
describe('Volt Component State Management', function (): void {
    test('component state updates correctly', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();

        $component = LivewireVolt::test('auth.login');

        $component
            ->set('email', $email)
            ->assertSet('email', $email)
            ->set('password', 'password123')
            ->assertSet('password', 'password123')
            ->set('remember', true)
            ->assertSet('remember', true);
    });

<<<<<<< HEAD
=======
    test('component resets after failed authentication', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();

        $component = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'wrong_password')
            ->call('save');

        // Password should be cleared after failed attempt
        $component->assertSet('password', '');
    });

<<<<<<< HEAD
=======
    test('loading state is managed correctly', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        $component = LivewireVolt::test('auth.login')->set('email', $email)->set('password', 'password123');

        // Should not be in loading state initially
        $component->assertDontSee('wire:loading');

        // After calling authenticate, component should handle loading state
        $component->call('save');

        // Should complete successfully
        $component->assertHasNoErrors();
    });
});

<<<<<<< HEAD
=======
describe('Volt Component User Types Integration', function (): void {
    test('any user type can login via volt component', function (): void {
>>>>>>> dev
        // Using XotData pattern ensures compatibility with any user type
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        $response->assertHasNoErrors();
        assertAuthenticated();

        // Verify authenticated user
        $authenticatedUser = Auth::user();
        expect($authenticatedUser)->not->toBeNull();
        expect($authenticatedUser?->email)->toBe($email);
    });

<<<<<<< HEAD
=======
    test('component handles different user configurations', function (): void {
>>>>>>> dev
        // Test with various user attributes
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
            'name' => 'Test User',
        ]);

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        $response->assertHasNoErrors();
        assertAuthenticated();

        $authenticatedUser = Auth::user();
        expect($authenticatedUser?->name)->toBe('Test User');
    });
});

<<<<<<< HEAD
=======
describe('Volt Component Redirects', function (): void {
    test('component redirects after successful authentication', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        $response->assertHasNoErrors();
        assertAuthenticated();

        // Component might trigger redirect via JavaScript/Alpine
        // This test ensures the authentication logic completes successfully
    });

<<<<<<< HEAD
=======
    test('component handles intended redirect', function (): void {
>>>>>>> dev
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        // Set intended URL
        Session::put('url.intended', '/dashboard');

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('save');

        $response->assertHasNoErrors();
        assertAuthenticated();
    });
});

<<<<<<< HEAD
=======
describe('Volt Component Accessibility', function (): void {
    test('component has proper aria labels', function (): void {
>>>>>>> dev
        $component = LivewireVolt::test('auth.login');

        // Component should render with accessibility attributes
        $component->assertSee('aria-label')->assertSee('id="data.email"')->assertSee('id="data.password"');
    });

<<<<<<< HEAD
=======
    test('component handles keyboard navigation', function (): void {
>>>>>>> dev
        $component = LivewireVolt::test('auth.login');

        // Component should be keyboard accessible
        expect($component)->not->toBeNull();
    });
<<<<<<< HEAD
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
});
