<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Gate;
>>>>>>> 6ed19256f (.)

/**
 * AuthServiceProvider dell'applicazione.
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
<<<<<<< HEAD
=======

>>>>>>> 6ed19256f (.)
