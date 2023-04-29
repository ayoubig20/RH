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
        'status'=>'Full-time'
     ];
     public function definition(): array
     {
         return [
            'firstName' => $this->generateFirstName(),
            'lastName' => $this->generateLastName(),
            'gender' => $this->generateGender(),
            'email' => $this->generateEmail(),
            'phone' => $this->generatePhoneNumber(),
            'address' => $this->generateAddress(),
            'job' => $this->generateJobTitle(),
            'martialStatus' => $this->generateMaritalStatus(),
            'fatteningDate' => $this->generateFatteningDate(),
            'DateOfBirth' => $this->generateDateOfBirth(),
            'salary' => $this->generateSalary(),
            'department_id' => $this->generateDepartmentId(),
            'project_id' => $this->generateProjectId(),
            'task_id' => $this->generateTaskId(),
            'status' => $this->generateStatus(),
            'image' => $this->generateImageUrl(),
            'password' => bcrypt('admin1234'),
            'role' => 'employee',
         ];
     }
    
     private function generateFirstName(): string
     {
         return $this->faker->firstName();
     }
    
     private function generateLastName(): string
     {
         return $this->faker->lastName();
     }
    
     private function generateGender(): string
     {
         return $this->faker->randomElement(['Male', 'Female']);
     }
    
     private function generateEmail(): string
     {
         return $this->faker->unique()->safeEmail();
     }
    
     private function generatePhoneNumber(): string
     {
         return $this->faker->phoneNumber();
     }
    
     private function generateAddress(): string
     {
         return $this->faker->address();
     }
    
     private function generateJobTitle(): string
     {
         return $this->faker->jobTitle();
     }
    
     private function generateMaritalStatus(): string
     {
         return $this->faker->randomElement(['Married', 'Single']);
     }
    
     private function generateFatteningDate()
     {
         return $this->faker->dateTimeBetween('-5 years', 'now');
     }
    
     private function generateDateOfBirth()
     {
         return $this->faker->dateTimeBetween('-60 years', '-18 years');
     }
    
     private function generateSalary(): int
     {
         return $this->faker->numberBetween(1000, 5000);
     }
    
     private function generateDepartmentId(): int
     {
         return Department::factory()->create()->id;
     }
    
     private function generateProjectId(): int
     {
         return Project::factory()->create()->id;
     }
    
     private function generateTaskId(): int
     {
         return Task::factory()->create()->id;
     }
    
     private function generateStatus(): string
     {
         return $this->faker->randomElement(['full-time','intern','seasonal','part-time','contarctor']);
     }
    
     private function generateImageUrl(): string
     {
         return $this->faker->imageUrl();
     }
}
