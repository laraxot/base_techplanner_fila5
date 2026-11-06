<?php

declare(strict_types=1);

namespace Modules\Fixcity\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class FixcityDatabaseSeeder.
 */
return new class extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            TicketStatusSeeder::class,
        ]);
    }
};

