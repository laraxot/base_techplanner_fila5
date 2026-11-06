<?php

declare(strict_types=1);

/**
 * Class TicketFactory.
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
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['open', 'in_progress', 'closed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'category' => $this->faker->word(),
            'due_date' => $this->faker->date(),
            'assignee_id' => null,
        ];
    }
};
