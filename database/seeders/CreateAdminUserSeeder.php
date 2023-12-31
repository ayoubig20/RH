<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'kamal Nadir',
            'email' => 'kamal01nadir@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        
        $role = Role::create(['name' => 'SuperAdmin']);
        $permissions = Permission::get()->pluck('id')->toArray();
        $role->syncPermissions($permissions);
        
        $user->assignRole([$role->id]);
    }
}
