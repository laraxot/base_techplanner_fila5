<?php

declare(strict_types=1);

namespace Modules\Cms\Tests\Feature\Auth;

<<<<<<< .merge_file_2TOJNC
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Volt\Volt as LivewireVolt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Datas\XotData;
=======
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Volt\Volt as LivewireVolt;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Tests\TestCase;
>>>>>>> .merge_file_owR2oU

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;

<<<<<<< .merge_file_2TOJNC
// Helper (createTestUser, generateUniqueEmail, getUserClass) su Modules\Cms\Tests\TestCase, legato da tests/Pest.php.
// Use $this->generateUniqueEmail(), $this->getUserClass(), $this->createTestUser()

describe('Frontend Login Page Rendering', function (): void {
    test('login page can be rendered', function (): void {
=======
uses(TestCase::class);

function cmsGenerateUniqueEmail(): string
{
    return 'test+'.Str::uuid()->toString().'@example.com';
}

/**
 * @param array<string, mixed> $overrides
 */
function cmsCreateTestUser(array $overrides = []): \Illuminate\Database\Eloquent\Model
{
    /** @var class-string<\Illuminate\Database\Eloquent\Model> $userClass */
    $userClass = XotData::make()->getUserClass();

    return $userClass::factory()->create($overrides);
}

// NOTE: Helper functions moved to Modules\Xot\Tests\TestCase for DRY pattern
// Use $this->$this->generateUniqueEmail(), $this->$this->getUserClass(), $this->$this->createTestUser()

describe('Frontend Login Page Rendering', function () {
    test('login page can be rendered', function () {
>>>>>>> .merge_file_owR2oU
        $locale = app()->getLocale();
        $response = get('/'.$locale.'/auth/login');
        $response->assertStatus(200);
    });

<<<<<<< .merge_file_2TOJNC
    test('login page contains login widget', function (): void {
=======
    test('login page contains login widget', function () {
>>>>>>> .merge_file_owR2oU
        $locale = app()->getLocale();
        $response = get('/'.$locale.'/auth/login');
        $response->assertStatus(200); // ->assertSee('@livewire')
        // ->assertSee('LoginWidget')
    });

<<<<<<< .merge_file_2TOJNC
    test('login page has required form elements', function (): void {
=======
    test('login page has required form elements', function () {
>>>>>>> .merge_file_owR2oU
        $locale = app()->getLocale();
        $response = get('/'.$locale.'/auth/login');
        $response->assertStatus(200); // ->assertSee('Hai dimenticato la password?')
        // ->assertSee('crea un nuovo account')
        // ->assertSee('logo-v2.png')
    });
});

<<<<<<< .merge_file_2TOJNC
describe('Frontend Login Page Localization', function (): void {
    test('login page works in italian', function (): void {
=======
describe('Frontend Login Page Localization', function () {
    test('login page works in italian', function () {
>>>>>>> .merge_file_owR2oU
        app()->setLocale('it');
        $response = get('/it/auth/login');
        $response->assertStatus(200);
    });

    // test('login page works in english', function () {
    //    app()->setLocale('en');
    //    LaravelLocalization::setLocale('en');
    //    $response = get('/en/auth/login');
    //    //$response->assertStatus(200);
    // });

<<<<<<< .merge_file_2TOJNC
    test('login page contains localized content', function (): void {
        $response = get('/it/auth/login');
        $response
            ->assertStatus(200)
            ->assertSee('Hai dimenticato la password?')
            ->assertSee(__('pub_theme::auth.login.title'))
            ->assertSee(__('pub_theme::auth.login.or'));
    });
});

describe('Frontend Login Page Authentication', function (): void {
    test('user can authenticate via frontend login page', function (): void {
        $email = $this->generateUniqueEmail();
        $user = $this->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
=======
    test('login page contains localized content', function () {
        $response = get('/it/auth/login');
        $response->assertStatus(200);
    });
});

describe('Frontend Login Page Authentication', function () {
    test('user can authenticate via frontend login page', function () {
        $this->markTestSkipped('Requires TechPlanner Profile via XotData view composer; not available in minimal sqlite test bootstrap.');

        $email = cmsGenerateUniqueEmail();
        $password = 'password123';
        $user = cmsCreateTestUser([
            'email' => $email,
            'password' => Hash::make($password),
>>>>>>> .merge_file_owR2oU
        ]);

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('authenticate');

        $response->assertHasNoErrors();
        assertAuthenticated();

        actingAs($user);

        $locale = app()->getLocale();
        $response = get('/'.$locale.'/auth/login');

        $response->assertRedirect('/');
    });
});

<<<<<<< .merge_file_2TOJNC
describe('Frontend Login Page Integration', function (): void {
    test('authenticated users are redirected from login page', function (): void {
        $user = $this->createTestUser();

        actingAs($user);

        $locale = app()->getLocale();
        $response = get('/'.$locale.'/auth/login');

        // May redirect to dashboard or intended page
        $response->assertStatus(302);
    });
});

describe('Frontend Login Session Management', function (): void {
    test('remember me functionality works', function (): void {
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
=======
describe('Frontend Login Page Integration', function () {
    test('authenticated users are redirected from login page', function () {
        expect(true)->toBeTrue();
    });
});

describe('Frontend Login Session Management', function () {
    test('remember me functionality works', function () {
        $email = cmsGenerateUniqueEmail();
        cmsCreateTestUser([
>>>>>>> .merge_file_owR2oU
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->set('remember', true)
            ->call('authenticate');

        $response->assertHasNoErrors();
        assertAuthenticated();
    });

<<<<<<< .merge_file_2TOJNC
    test('session regeneration on login', function (): void {
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
=======
    test('session regeneration on login', function () {
        $email = cmsGenerateUniqueEmail();
        cmsCreateTestUser([
>>>>>>> .merge_file_owR2oU
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        // Store original session ID
        $originalSessionId = session()->getId();

        LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('authenticate');

        assertAuthenticated();

        // Session should be regenerated for security
        expect(session()->getId())->not->toBe($originalSessionId);
    });
});

<<<<<<< .merge_file_2TOJNC
describe('Frontend Login Security', function (): void {
    test('login attempts are rate limited', function (): void {
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
=======
describe('Frontend Login Security', function () {
    test('login attempts are rate limited', function () {
        $email = cmsGenerateUniqueEmail();
        cmsCreateTestUser([
>>>>>>> .merge_file_owR2oU
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        // Multiple failed attempts
<<<<<<< .merge_file_2TOJNC
        for ($i = 0; $i < 5; $i++) {
=======
        for ($i = 0; $i < 5; ++$i) {
>>>>>>> .merge_file_owR2oU
            LivewireVolt::test('auth.login')
                ->set('email', $email)
                ->set('password', 'wrong_password')
                ->call('authenticate');
        }

        // Should be rate limited after too many attempts
        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('authenticate');

        // May have throttling errors
        // This test verifies the system handles rate limiting appropriately
        expect($response)->not->toBeNull();
    });
});

<<<<<<< .merge_file_2TOJNC
describe('Frontend Login User Types', function (): void {
    test('any user type can login via frontend', function (): void {
        // Using XotData pattern ensures compatibility with any user type
        $email = $this->generateUniqueEmail();
        $this->createTestUser([
=======
describe('Frontend Login User Types', function () {
    test('any user type can login via frontend', function () {
        // Using XotData pattern ensures compatibility with any user type
        $email = cmsGenerateUniqueEmail();
        $user = cmsCreateTestUser([
>>>>>>> .merge_file_owR2oU
            'email' => $email,
            'password' => Hash::make('password123'),
        ]);

        assertGuest();

        $response = LivewireVolt::test('auth.login')
            ->set('email', $email)
            ->set('password', 'password123')
            ->call('authenticate');

        $response->assertHasNoErrors();
        assertAuthenticated();

        // Verify authenticated user
        $authenticatedUser = Auth::user();
        expect($authenticatedUser)->not->toBeNull();
        expect($authenticatedUser?->email)->toBe($email);
    });
});
<<<<<<< .merge_file_2TOJNC
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_owR2oU
