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
            'description' => $this->faker->paragraph,
            'stock' => $this->faker->numberBetween(0, 100),
            'purchase_date' => $this->faker->date(),
            'last_used_date' => $this->faker->date(),
            'location' => $this->faker->address,
            'status' => $this->faker->randomElement(['available', 'in use', 'maintenance']),
        ];
    }
}
