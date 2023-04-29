<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    DB::table('departments')->delete();
    // $departments = ['Marketing', 'Sales', 'Finance', 'Human Resources', 'Operations', 'Product Management', 'Engineering', 'Customer Support', 'Business Development', 'Design', 'IT', 'Public Relations', 'Legal', 'Research and Development', 'Quality Assurance', 'Supply Chain Management', 'Information Security', 'Content Creation', 'Project Management'];
    $departments = [
      'Marketing' => 'Handles promotion and advertising of company products or services',
      'Sales' => 'Responsible for selling the company\'s products or services to customers',
      'Finance' => 'Manages financial resources and ensures the company is financially stable',
      'Human Resources' => 'Handles recruitment, training, and management of employees',
      'Operations' => 'Oversees the day-to-day operations of the company',
      'Product Management' => 'Responsible for the development and management of company products',
      'Engineering' => 'Designs and develops new technology and maintains existing systems',
      'Customer Support' => 'Provides assistance and support to customers who have problems with the company\'s products or services',
      'Business Development' => 'Identifies new business opportunities and develops strategies for growth',
      'Design' => 'Develops creative designs for the company\'s products or services',
      'IT' => 'Manages the company\'s information technology infrastructure',
      'Public Relations' => 'Maintains and manages the company\'s public image and reputation',
      'Legal' => 'Provides legal advice and guidance to the company and ensures legal compliance',
      'Research and Development' => 'Conducts research and development activities to improve company products and processes',
      'Quality Assurance' => 'Ensures that the company products or services meet quality standards',
      'Supply Chain Management' => 'Manages the flow of goods and services from suppliers to customers',
      'Information Security' => 'Protects the company\'s information from unauthorized access or theft',
      'Content Creation' => 'Creates and manages content for the company\'s marketing and communication channels',
      'Project Management' => 'Manages projects and ensures they are completed on time and within budget'
    ];

    foreach ($departments as $name => $description) {
      Department::create([
        'name' => $name,
        'description' => $description
      ]);
    }
  }
}
