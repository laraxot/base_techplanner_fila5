<?php

declare(strict_types=1);

namespace Modules\Gdpr\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6ed19256f (.)
use Modules\Gdpr\Models\Consent;
use Modules\Xot\Datas\XotData;

/**
 * @extends Factory<Consent>
 */
class ConsentFactory extends Factory
{
    /**
     * @var class-string<Consent>
     */
    protected $model = Consent::class;

    /**
<<<<<<< .merge_file_Z5AclP
=======
     * Define the model's default state.
<<<<<<< HEAD
>>>>>>> .merge_file_AfcrOF
     *
     * @return array<string, string>
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => fake()->uuid(),
            'user_type' => XotData::make()->getUserClass(),
            'user_id' => fake()->uuid(),
            'type' => 'privacy_policy',
            'accepted_at' => now()->toDateTimeString(),
            'ip_address' => '127.0.0.1',
            'user_agent' => fake()->userAgent(),
        ];
=======
     */
    public function definition(): array
    {
        return [];
>>>>>>> 6ed19256f (.)
    }
}
