<?php

declare(strict_types=1);

namespace Modules\Fixcity\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Fixcity\Models\TicketStatus;

final class TicketStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'open', 'description' => 'Ticket is open', 'color' => '#FFA500', 'order' => 1],
            ['name' => 'in_progress', 'description' => 'Ticket is in progress', 'color' => '#0000FF', 'order' => 2],
            ['name' => 'closed', 'description' => 'Ticket is closed', 'color' => '#008000', 'order' => 3],
            ['name' => 'pending', 'description' => 'Ticket is pending', 'color' => '#808080', 'order' => 4],
            ['name' => 'rejected', 'description' => 'Ticket is rejected', 'color' => '#FF0000', 'order' => 5],
        ];

        foreach ($statuses as $status) {
            TicketStatus::updateOrCreate(['name' => $status['name']], $status);
        }
    }
}
