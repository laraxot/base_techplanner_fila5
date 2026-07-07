<?php

declare(strict_types=1);

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
});
