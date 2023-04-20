<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Department;
use App\Models\CategoryProject;
use Illuminate\Database\Seeder;

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
        // Department::factory()
        //     ->count(5)
        //     ->has(
        //         Employee::factory()
        //             ->count(10)
        //     )
        //     ->has(
        //         Project::factory()
        //             ->count(3)
        //             ->has(
        //                 Task::factory()
        //                     ->count(5)
        //                     ->state(function (array $attributes, Project $project) {
        //                         return [
        //                             'project_id' => $project->id,
        //                             'assigned_to' => Employee::factory()->create([
        //                                 'department_id' => $project->department->id,
        //                             ])->id,
        //                         ];
        //                     })
        //             )
        //     );
        // ->create();

        // Seed departments
        // Seed departments
        Department::factory()->count(10)->create();

        // Seed employees with projects and tasks
        Employee::factory()
            ->count(10)
            ->create()
            ->each(function ($employee) {
                $projects = Project::factory()
                    ->count(rand(1, 3))
                    ->create(['department_id' => $employee->department_id]);

                foreach ($projects as $project) {
                    Task::factory()
                        ->count(rand(1, 5))
                        ->create([
                            'project_id' => $project->id,
                            'assigned_to' => $employee->id,
                        ]);
                }
            });

        // Seed category projects
        CategoryProject::factory()->count(10)->create();
    }
}
