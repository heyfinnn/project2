<?php

namespace Database\Factories;

use App\Models\AssetUsage;
use App\Models\Asset;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetUsage>
 */
class AssetUsageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'asset_id' => Asset::factory(),
            'employee_id' => Employee::factory(),
            'use_date' => $this->faker->date,
            'return_date' => $this->faker->optional()->date,
            'purpose' => $this->faker->sentence,
        ];
    }
}
