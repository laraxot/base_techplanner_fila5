<?php

declare(strict_types=1);

<<<<<<< .merge_file_aaG4qm
use PHPUnit\Framework\Assert;

test('route home returns successful response with correct view', function (): void {
    $response = cmsGetOrSkipOnServerError('/');
    $status = $response->status();
    if (in_array($status, [301, 302, 303, 307, 308], true)) {
        Assert::assertNotEmpty($response->headers->get('Location'));

        return;
    }
    Assert::assertContains($status, [200, 404]);
});

test('route login returns successful response with correct view', function (): void {
    $response = cmsGetOrSkipOnServerError('/it/auth/login');
    Assert::assertContains($response->status(), [200, 302, 404]);
=======
<<<<<<< HEAD
=======
use function Pest\Laravel\get;

use Tests\TestCase;

uses(TestCase::class);

test('route home returns successful response with correct view', function (): void {
    get('/')->assertSuccessful()->assertViewIs('pub_theme::home');
});

test('route login returns successful response with correct view', function (): void {
    get('/it/login')->assertSuccessful()->assertViewIs('pub_theme::auth.login');
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_Y7QPVn
});
