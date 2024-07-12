<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Employee;
use App\Models\Task;
use App\Models\Tool;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeTask>
 */
class EmployeeTaskFactory extends Factory
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
            'employee_id' => \App\Models\Employee::factory(),
            'task_id' => \App\Models\Task::factory(),
            'asset_id' => \App\Models\Asset::factory(),
            'tool_id' => \App\Models\Tool::factory(),
            'assigned_date' => $this->faker->date(),
        ];
    }
}
