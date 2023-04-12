<?php

namespace Database\Factories;

use App\Models\CategoryProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'name' => $this->faker->name(),
            'category' =>  function() {
                return CategoryProject::factory()->create()->id;},
            'start_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'end_date' => $this->faker->dateTimeBetween('now', '+2 years'),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),

        ];
    }
}
