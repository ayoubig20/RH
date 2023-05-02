<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         \App\Models\User::factory()->create([
            'name' => 'Test admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
         ]);
        //  Employee::factory()->create([
        //     'firstName' => 'kamal',
        //     'lastName' => 'kamal',
        //     'gender' =>'Male' ,
        //     'email' =>'emp@emp.com',
        //     'phone' => '+1 (848) 296-6625',
        //     'address' => 'Omnis sint voluptas',
        //     'job' => '7',
        //     'martialStatus' => 'Single',
        //     'fatteningDate' => '2020-08-27',
        //     'DateOfBirth' => '2010-12-29',
        //     'salary' => '30000',
        //     'department_id' => '6',
        //     'status' => 'intern',
        //     'password' => bcrypt('admin1234'),
        //     'role' => 'employee',
        //  ]);
        DB::table('employees')->insert([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'gender' => 'Male',
            'DateOfBirth' => '1980-01-01',
            'email' => 'emp@emp.com',
            'phone' => '123-456-7890',
            'address' => '123 Main St',
            'image' => 'default.png',
            'role' => 'Employee',
            'martialStatus' => 'Single',
            'fatteningDate' => '2020-01-01',
            'salary' => '50000.00',
            'status' => 'intern',
            'password' => bcrypt('123456'),
            'is_active' => 1,
            'department_id' => 1,
            'job_id' => 1,
        ]);
    }
}
