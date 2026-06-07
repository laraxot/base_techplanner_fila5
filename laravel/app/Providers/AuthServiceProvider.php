<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Gate;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

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
<<<<<<< HEAD
=======

>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
