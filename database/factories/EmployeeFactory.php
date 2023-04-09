<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $attributes = [
        'role' => 'employee',
        'status'=>'Full-time'
    ];
    public function definition(): array
    {
        return [
            //
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'job' => $this->faker->jobTitle(),
            'martialStatus' => $this->faker->randomElement(['Married', 'Single']),
            'fatteningDate' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'DateOfBirth' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'salary' => $this->faker->numberBetween(1000, 5000),
            'department_id' => function() {
                return Department::factory()->create()->id;
            },
            'status' =>$this->faker->randomElement(['full-time','intern','seasonal','part-time','contarctor']),
            'image' => $this->faker->imageUrl(),
            'password' => bcrypt('admin1234'),
            'role' => 'employee',        
        ];
    }
}
