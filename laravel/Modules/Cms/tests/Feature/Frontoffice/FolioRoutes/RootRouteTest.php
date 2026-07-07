<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

it('GET / redirects to /{locale}', function (): void {
    $locale = app()->getLocale();
<<<<<<< HEAD
=======
    /* @phpstan-ignore-next-line property.notFound */
>>>>>>> 6ed19256f (.)
    $this->get('/')->assertRedirect('/'.$locale);
});
