<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 4b6b99016 (first commit)
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
<<<<<<< HEAD
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => fake()->uuid(),
            'subject_type' => 'Modules\User\Models\User',
            'consent_type' => 'privacy_policy',
            'accepted' => true,
            'ip_address' => '127.0.0.1',
            'user_agent' => fake()->userAgent(),
        ];
=======
     */
    public function definition(): array
    {
        return [];
>>>>>>> 4b6b99016 (first commit)
    }
}
