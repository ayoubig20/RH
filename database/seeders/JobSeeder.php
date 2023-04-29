<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->delete();
        $departments = [
            'Marketing' => [
                'Marketing Coordinator',
                'Social Media Specialist',
                'Brand Manager',
                'Marketing Manager',
                'Digital Marketing Manager',
                'Content Marketing Manager',
                'Market Research Analyst',
            ],
            'Sales' => [
                'Sales Representative',
                'Account Executive',
                'Business Development Manager',
                'Sales Manager',
                'Key Account Manager',
                'Sales Director',
            ],
            'Finance' => [
                'Financial Analyst',
                'Accountant',
                'Budget Analyst',
                'Tax Specialist',
                'Financial Manager',
                'Chief Financial Officer (CFO)',
            ],
            'Human Resources' => [
                'HR Coordinator',
                'Recruiter',
                'Training and Development Specialist',
                'Benefits Administrator',
                'HR Manager',
                'Chief Human Resources Officer (CHRO)',
            ],
            'Operations' => [
                'Operations Coordinator',
                'Supply Chain Analyst',
                'Logistics Manager',
                'Production Supervisor',
                'Operations Director',
                'Chief Operating Officer (COO)',
            ],
            'Product Management' => [
                'Product Manager',
                'Technical Product Manager',
                'Product Owner',
                'Senior Product Manager',
                'Director of Product Management',
            ],
            'Engineering' => [
                'Software Engineer',
                'Mechanical Engineer',
                'Electrical Engineer',
                'Civil Engineer',
                'Manufacturing Engineer',
                'Chief Technology Officer (CTO)',
            ],
            'Customer Support' => [
                'Customer Service Representative',
                'Technical Support Specialist',
                'Customer Success Manager',
                'Customer Support Manager',
                'Director of Customer Experience',
            ],
            'Business Development' => [
                'Business Development Associate',
                'Partnership Manager',
                'Strategic Account Manager',
                'Business Development Manager',
                'Director of Business Development',
            ],
            'Design' => [
                'Graphic Designer',
                'UI/UX Designer',
                'Web Designer',
                'Creative Director',
                'Art Director',
            ],
            'IT' => [
                'Network Administrator',
                'Systems Administrator',
                'Database Administrator',
                'IT Manager',
                'Chief Information Officer (CIO)',
            ],
            'Public Relations' => [
                'Public Relations Coordinator',
                'Public Relations Specialist',
                'Public Relations Manager',
                'Director of Communications',
            ],
            'Legal' => [
                'Paralegal',
                'Contract Manager',
                'Corporate Counsel',
                'General Counsel',
                'Director of Legal',
            ],
            'Research and Development' => [
                'Research Assistant',
                'Scientist',
                'Research Engineer',
                'Research Director',
                'Chief Scientific Officer (CSO)',
            ],
            'Quality Assurance' => [
                'Quality Assurance Analyst',
                'Quality Assurance Manager',
                'Director of Quality Assurance',
            ],
            'Supply Chain Management' => [
                'Supply Chain Coordinator',
                'Procurement Specialist',
                'Supply Chain Manager',
                'Director of Supply Chain',
            ],
            'Information Security' => [
                'Information Security Analyst',
                'Information Security Manager',
                'Chief Information Security Officer (CISO)',
            ],
            'Content Creation' => [
                'Content Writer',
                'Copywriter',
                'Content Strategist',
                'Editor',
                'Content Marketing Manager'
            ]
        ];

        foreach ($departments as $department => $jobs) {
            switch ($department) { // Fixed variable name here
                case 'Marketing':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Marketing department.',
                            'department_id' => 1
                        ]);
                    }
                    break;

                case 'Sales':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Sales department.',
                            'department_id' => 2
                        ]);
                    }
                    break;

                case 'Finance':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Finance department.',
                            'department_id' => 3
                        ]);
                    }
                    break;
                case 'Human Resources':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Human Resources department.',
                            'department_id' => 4
                        ]);
                    }
                    break;
                case 'Operations':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Operations department.',
                            'department_id' => 5
                        ]);
                    }
                    break;
                case 'Product Management':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Product Management department.',
                            'department_id' => 6
                        ]);
                    }
                    break;
                case 'Engineering':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Engineering department.',
                            'department_id' => 7
                        ]);
                    }
                    break;
                case 'Customer Support':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Customer Support department.',
                            'department_id' => 8
                        ]);
                    }
                    break;
                case 'Business Development':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Business Development department.',
                            'department_id' => 9
                        ]);
                    }
                    break;
                case 'Design':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Design department.',
                            'department_id' => 10
                        ]);
                    }
                    break;
                case 'IT':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the IT department.',
                            'department_id' => 11
                        ]);
                    }
                    break;
                case 'Public Relations':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Public Relations department.',
                            'department_id' => 12
                        ]);
                    }
                    break;

                case 'Legal':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Legal department.',
                            'department_id' => 13
                        ]);
                    }
                    break;

                case 'Research and Development':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Research and Development department.',
                            'department_id' => 14
                        ]);
                    }
                    break;
                case 'Quality Assurance':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Quality Assurance department.',
                            'department_id' => 15
                        ]);
                    }
                    break;
                case 'Supply Chain Management':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Supply Chain Management department.',
                            'department_id' => 16
                        ]);
                    }
                    break;
                case 'Information Security':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Information Security department.',
                            'department_id' => 17
                        ]);
                    }
                    break;
                case 'Content Creation':
                    foreach ($jobs as $jobTitle) {
                        Job::create([
                            'title' => $jobTitle,
                            'description' => 'This is a job in the Content Creation department.',
                            'department_id' => 18
                        ]);
                    }
                    break;


                default:
                    break;
            }
        }
    }
}
