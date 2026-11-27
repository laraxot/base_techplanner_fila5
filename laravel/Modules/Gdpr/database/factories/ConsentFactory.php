<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gdpr\Models\Consent;

/**
 * @extends Factory<Consent>
 */
class ConsentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Consent>
     */
    protected $model = Consent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Solo colonne reali di `consents`: `subject_type`, `consent_type` e `accepted` non esistono
            // (l'interessato e' `user_id` + `user_type`, l'accettazione e' `accepted_at`).
            'subject_id' => fake()->uuid(),
            'type' => 'privacy_policy',
            'accepted_at' => now(),
            'ip_address' => '127.0.0.1',
            'user_agent' => fake()->userAgent(),
        ];
    }
}
