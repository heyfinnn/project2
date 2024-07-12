<?php

namespace Database\Factories;

use App\Models\Tool;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tool_name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'purchase_date' => $this->faker->date(),
            'last_used_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['available', 'in use', 'maintenance']),
        ];
    }
}
