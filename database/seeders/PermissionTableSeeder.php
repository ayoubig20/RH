<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'list-statistics',
            'list-employees',
            'list-adminstrator',
            'list-projects',
            'list-tasks',
            'list-kanban',
            'list-department',
            'list-setting',
            'list-category',
            'list-job',
            'list-roles',
            'archive',
            'archive-employee',
            'archive-projects',
            'attendances',
            'Report',
            'report-projects',
            'report-attendances',
            'add-Category-Project',
            'edit-Category-Project',
            'delete-Category-Project',
            'add-Department',
            'edit-Department',
            'delete-Department',
            

            ];
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
            }
    }
}
