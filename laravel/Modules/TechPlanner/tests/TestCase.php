<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Tests;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
=======
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\TechPlanner\Providers\TechPlannerServiceProvider;
>>>>>>> 6ed19256f (.)
use Modules\Xot\Tests\CreatesApplication;

/**
 * Base test case for TechPlanner module tests.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
