<?php

declare(strict_types=1);

beforeEach(function (): void {
    if (! function_exists('moduleEnabled')) {
<<<<<<< .merge_file_9nNZqc
        $this->markTestSkipped('moduleEnabled() helper not available.');
    }
    if (! moduleEnabled('Cms')) {
=======
<<<<<<< HEAD
=======
        /* @phpstan-ignore-next-line property.notFound, method.nonObject */
        $this->markTestSkipped('moduleEnabled() helper not available.');
    }
    if (! moduleEnabled('Cms')) {
        /* @phpstan-ignore-next-line property.notFound, method.nonObject */
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_RvrmbF
        $this->markTestSkipped('Module Cms is disabled');
    }
});

it('redirects root / to /{locale}', function (): void {
    $locale = app()->getLocale();
<<<<<<< .merge_file_9nNZqc
    $response = $this->get('/');
=======
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $response = $this->get('/');
    /* @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_RvrmbF
    $response->assertRedirect('/'.$locale);
});

it('serves localized homepage at /{locale}', function (): void {
    $locale = app()->getLocale();
<<<<<<< .merge_file_9nNZqc
    $response = $this->get('/'.$locale);
=======
<<<<<<< HEAD
=======
    /** @phpstan-ignore-next-line property.notFound */
    $response = $this->get('/'.$locale);
    /* @phpstan-ignore-next-line method.nonObject */
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_RvrmbF
    $response->assertStatus(200);
});
