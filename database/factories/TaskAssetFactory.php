<?php

namespace Database\Factories;

use App\Models\TaskAsset;
use App\Models\Task;
use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskAsset>
 */
class TaskAssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'task_id' => Task::factory(),
            'asset_id' => Asset::factory(),
        ];
    }
}
