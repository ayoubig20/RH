<?php

namespace Database\Factories;

use Faker\Core\DateTime;
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
     */ public function definition(): array
    {
        return [
            'name' => $this->generateName(),
            'category_id' => $this->generateCategoryId(),
            'start_date' => $this->generateStartDate(),
            'end_date' => $this->generateEndDate(),
            'description' => $this->generateDescription(),
            // 'image' => $this->generateImageUrl(),
        ];
    }

    private function generateName(): string
    {
        return $this->faker->name();
    }

    private function generateCategoryId(): int
    {
        return CategoryProject::factory()->create()->id;
    }

    private function generateStartDate()
    {
        return $this->faker->dateTimeBetween('-1 year', '+1 year');
    }

    private function generateEndDate()
    {
        return $this->faker->dateTimeBetween('now', '+2 years');
    }

    private function generateDescription(): string
    {
        return $this->faker->paragraph(3);
    }

    private function generateImageUrl(): string
    {
        return $this->faker->imageUrl();
    }
}
