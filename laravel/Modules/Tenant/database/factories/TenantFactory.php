<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\Tenant\Models\Tenant;
=======
use Modules\User\Models\Tenant;
>>>>>>> dev

/**
 * @extends Factory<Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Tenant>
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'name' => ['Test Studio', 'Sample Company', 'Demo Business', 'Example Enterprise', 'Sample Organization'][array_rand(['Test Studio', 'Sample Company', 'Demo Business', 'Example Enterprise', 'Sample Organization'])],
            'domain' => ['example.com', 'test.com', 'demo.org', 'sample.net', 'example.it'][array_rand(['example.com', 'test.com', 'demo.org', 'sample.net', 'example.it'])],
            'database' => 'tenant_'.strtolower(str_replace([' ', '_'], '-', ['main', 'primary', 'default', 'production', 'staging'][array_rand(['main', 'primary', 'default', 'production', 'staging'])])),
            'is_active' => (bool) random_int(0, 1),
            'settings' => [
                'timezone' => ['Europe/Rome', 'Europe/London', 'America/New_York'][array_rand(['Europe/Rome', 'Europe/London', 'America/New_York'])],
                'locale' => ['it', 'en', 'de'][array_rand(['it', 'en', 'de'])],
                'currency' => ['EUR', 'USD', 'GBP'][array_rand(['EUR', 'USD', 'GBP'])],
            ],
            'created_at' => \Carbon\Carbon::now()->subDays(random_int(1, 365)),
            'updated_at' => \Carbon\Carbon::now()->subDays(random_int(0, 30)),
=======
            'name' => $this->faker->company(),
            'domain' => $this->faker->domainName(),
            'database' => 'tenant_'.$this->faker->unique()->slug(),
            'is_active' => $this->faker->boolean(80),
            'settings' => [
                'timezone' => $this->faker->randomElement(['Europe/Rome', 'Europe/London', 'America/New_York']),
                'locale' => $this->faker->randomElement(['it', 'en', 'de']),
                'currency' => $this->faker->randomElement(['EUR', 'USD', 'GBP']),
            ],
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
>>>>>>> dev
        ];
    }

    /**
     * Indicate that the tenant is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $_attributes) => [
            'is_active' => true,
        ]);
    }

    /**
     * Indicate that the tenant is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $_attributes) => [
            'is_active' => false,
        ]);
    }
}
