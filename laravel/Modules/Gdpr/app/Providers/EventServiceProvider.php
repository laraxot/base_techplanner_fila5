<?php

declare(strict_types=1);

namespace Modules\Gdpr\Providers;

use Modules\Xot\Providers\XotBaseEventServiceProvider;
<<<<<<< HEAD
=======
use Override;
>>>>>>> 6ed19256f (.)

class EventServiceProvider extends XotBaseEventServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [];

    /**
     * Indicates if events should be discovered.
<<<<<<< HEAD
=======
     *
     * @var bool
>>>>>>> 6ed19256f (.)
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * Configure the proper event listeners for email verification.
     */
<<<<<<< HEAD
=======
    #[Override]
>>>>>>> 6ed19256f (.)
    protected function configureEmailVerification(): void
    {
    }
}
