<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Cms\Tests\Feature\Frontoffice;

>>>>>>> dev
use Modules\Xot\Tests\TestCase;

// Use the project's base TestCase
uses(TestCase::class);

beforeEach(function (): void {
    if (! function_exists('moduleEnabled')) {
<<<<<<< HEAD
        /* @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->markTestSkipped('moduleEnabled() helper not available.');
    }
    if (! moduleEnabled('Cms')) {
        /* @phpstan-ignore-next-line property.notFound, method.nonObject */
=======
        $this->markTestSkipped('moduleEnabled() helper not available.');
    }
    if (! moduleEnabled('Cms')) {
>>>>>>> dev
        $this->markTestSkipped('Module Cms is disabled');
    }
});

it('redirects root / to /{locale}', function (): void {
    $locale = app()->getLocale();
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
    $response = $this->get('/');
    /* @phpstan-ignore-next-line method.nonObject */
=======
    $response = $this->get('/');
>>>>>>> dev
    $response->assertRedirect('/'.$locale);
});

it('serves localized homepage at /{locale}', function (): void {
    $locale = app()->getLocale();
<<<<<<< HEAD
    /** @phpstan-ignore-next-line property.notFound */
    $response = $this->get('/'.$locale);
    /* @phpstan-ignore-next-line method.nonObject */
=======
    $response = $this->get('/'.$locale);
>>>>>>> dev
    $response->assertStatus(200);
});
