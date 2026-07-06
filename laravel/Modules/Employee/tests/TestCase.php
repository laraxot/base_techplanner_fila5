<?php

declare(strict_types=1);

namespace Modules\Employee\Tests;

use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\ServiceProvider;
use Modules\Employee\Models\Employee;
use Modules\Employee\Models\User;
use Modules\Employee\Models\WorkHour;
use Modules\Employee\Providers\EmployeeServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

/**
 * Base test case per il modulo Employee.
 *
 * ✅ Configurato per Pest
 * ✅ Performance ottimizzate
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions; // ✅ SEMPRE - Performance 100x migliori

    public ?Employee $employee = null;

    public ?WorkHour $workHour = null;

    public ?User $user = null;

    public ?Carbon $today = null;

    protected function setUp(): void
    {
        parent::setUp();

        // ✅ NO migrate manuale - DatabaseTransactions gestisce tutto
        // ✅ NO seeding manuale - Factories gestiscono i dati

        // Setup specifico del modulo se necessario
        $this->withoutExceptionHandling();
    }

    /**
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            ...parent::getPackageProviders($app),
            EmployeeServiceProvider::class,
        ];
    }
}
