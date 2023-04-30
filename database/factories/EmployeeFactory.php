<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
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
        // 'status'=>'full-time'
     ];
     public function definition(): array
     {
         return [
          
            'id' => $this->faker->unique()->numberBetween(1,100),
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'DateOfBirth' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'image' => 'default-avatar.png',
            'role' => 'employee',
            'martialStatus' => $this->faker->randomElement(['Single', 'Married']),
            'fatteningDate' => $this->faker->dateTimeBetween('-10 years', '-1 year')->format('Y-m-d'),
            'salary' => $this->faker->randomFloat(2, 2900, 10000),
            'status' => $this->faker->randomElement(['full-time','intern','seasonal','part-time','contarctor']),
            'deleted_at' => null,
            'password' => bcrypt('password'),
            'is_active' => true,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'department_id' => $this->faker->numberBetween(1, 10),
            'job_id' => $this->faker->numberBetween(1, 10),
         ];
     }
    

}
