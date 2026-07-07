<?php

declare(strict_types=1);

use Modules\Xot\Tests\TestCase;

// Use the project's base TestCase
uses(TestCase::class);

beforeEach(function (): void {
    if (! function_exists('moduleEnabled')) {
<<<<<<< HEAD
=======
        /* @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->markTestSkipped('moduleEnabled() helper not available.');
    }
    if (! moduleEnabled('Cms')) {
        /* @phpstan-ignore-next-line property.notFound, method.nonObject */
>>>>>>> 6ed19256f (.)
        $this->markTestSkipped('Module Cms is disabled');
    }
});

it('redirects root / to /{locale}', function (): void {
    $locale = app()->getLocale();
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $response = $this->get('/');
    /* @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
    $response->assertRedirect('/'.$locale);
});

it('serves localized homepage at /{locale}', function (): void {
    $locale = app()->getLocale();
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $response = $this->get('/'.$locale);
    /* @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
    $response->assertStatus(200);
});
