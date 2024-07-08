<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'asset_name' => $this->faker->word,
            'asset_type' => $this->faker->randomElement(['consumable', 'tool']),
            'description' => $this->faker->sentence,
            'purchase_date' => $this->faker->date,
            'last_used_date' => $this->faker->optional()->date,
            'status' => $this->faker->randomElement(['available', 'in use', 'maintenance']),
        ];
    }
}
