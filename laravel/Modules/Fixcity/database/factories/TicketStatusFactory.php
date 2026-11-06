<?php

declare(strict_types=1);

/**
 * Class TicketStatusFactory.
 */
return new class extends \Modules\Xot\Database\Factories\XotBaseModelFactory {
    /**
     * Define the model's default attributes.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'color' => $this->faker->hexColor(),
            'order' => $this->faker->numberBetween(0, 10),
        ];
    }
};
