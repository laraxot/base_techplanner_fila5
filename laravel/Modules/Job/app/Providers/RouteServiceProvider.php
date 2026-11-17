<?php

declare(strict_types=1);

namespace Modules\Job\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
<<<<<<< HEAD
    public string $name = 'Job';

=======

    public string $name = 'Job';
>>>>>>> 6ed19256f (.)
    protected string $moduleNamespace = 'Modules\Job\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
