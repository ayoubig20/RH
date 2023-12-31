<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
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
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(3),
            'employee_id' => Employee::factory(),
            'status' => $this->faker->randomElement(['to do', 'in progress', 'done']),
            'priority' => $this->faker->randomElement(['high', 'medium', 'low']),
            'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'project_id' => Project::factory(),
        ];
    }
}
