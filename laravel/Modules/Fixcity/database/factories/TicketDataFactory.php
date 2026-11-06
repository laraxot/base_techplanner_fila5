<?php

declare(strict_types=1);

/**
 * Class TicketDataFactory.
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
            'field_name' => $this->faker->word(),
            'field_value' => $this->faker->sentence(),
            'ticket_id' => null,
        ];
    }
};
