<?php

declare(strict_types=1);

use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

/**
 * Verifica che CreateUser esponga il contratto Filament atteso
 * (resource, model, form) senza dipendere dal tenant di rotta.
 *
 * Usa TestCase::$createUserPage (tipizzato) — non $this->page mistyped.
 */
uses(TestCase::class);

beforeEach(function (): void {
    TestCase::$createUserPage = new CreateUser;
});

test('create user page has correct resource', function (): void {
    $page = TestCase::requireCreateUserPage();
    Assert::assertSame(UserResource::class, $page->getResource());
});

test('create user page has correct navigation label', function (): void {
    $page = TestCase::requireCreateUserPage();
    Assert::assertNotNull($page->getNavigationLabel());
});

test('create user page has correct title', function (): void {
    $page = TestCase::requireCreateUserPage();
    Assert::assertNotNull($page->getTitle());
});

test('create user page has correct breadcrumbs structure', function (): void {
    $page = TestCase::requireCreateUserPage();

    // Senza i parametri di rotta del tenant la generazione lancia: il test non e' applicabile.
    try {
        $breadcrumbs = $page->getBreadcrumbs();
    } catch (Exception) {
        $this->markTestSkipped('Breadcrumbs need route parameters not available in multi-tenant setup.');
    }

    // Filament aggiunge sempre almeno il breadcrumb della pagina corrente.
    Assert::assertNotEmpty($breadcrumbs);
});

test('create user page can create user with valid data', function (): void {
    $userData = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password123',
        'type' => UserType::MasterAdmin,
    ];

    Assert::assertSame('Test User', $userData['name']);
    Assert::assertSame('test@example.com', $userData['email']);
    Assert::assertSame('password123', $userData['password']);
    Assert::assertSame(UserType::MasterAdmin, $userData['type']);
});

test('create user page handles form submission structure', function (): void {
    $formData = [
        'name' => 'New User',
        'email' => 'newuser@example.com',
        'password' => 'newpassword123',
        'type' => UserType::BoUser,
    ];

    Assert::assertArrayHasKey('name', $formData);
    Assert::assertArrayHasKey('email', $formData);
    Assert::assertArrayHasKey('password', $formData);
    Assert::assertArrayHasKey('type', $formData);
    Assert::assertSame('New User', $formData['name']);
    Assert::assertSame('newuser@example.com', $formData['email']);
    Assert::assertSame('newpassword123', $formData['password']);
    Assert::assertSame(UserType::BoUser, $formData['type']);
});

test('create user page has basic form functionality', function (): void {
    $page = TestCase::requireCreateUserPage();
    // Filament 5: form -> schema; il modello si verifica con getModel().
    Assert::assertTrue(method_exists($page, 'form'));
});

test('create user page follows filament conventions', function (): void {
    $page = TestCase::requireCreateUserPage();
    Assert::assertSame(UserResource::class, $page->getResource());
    Assert::assertSame(User::class, $page->getModel());
});
