<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Department;
use App\Models\CategoryProject;
use App\Models\Working_days;
use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\CategoryProjectSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
      
            
          
        // Employee::factory()->count(10);
        $this->call(DepartmentSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(CategoryProjectSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(HolidaysTableSeeder::class);
        Working_days::initializeWorkingDaysTable();

    }
}
