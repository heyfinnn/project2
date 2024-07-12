<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'due_date' => $this->faker->date(),
            'location' => $this->faker->address,
            'status' => $this->faker->randomElement(['pending', 'in progress', 'completed']),
        ];
    }
}
