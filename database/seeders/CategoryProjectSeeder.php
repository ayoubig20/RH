<?php

namespace Database\Seeders;

use App\Models\CategoryProject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('category_projects')->delete();
        $categories = [
            "Software Development",
            "Web Development",
            "Mobile App Development",
            "Game Development",
            "Data Science",
            "Artificial Intelligence / Machine Learning",
            "Robotics",
            "Cybersecurity",
            "Networking",
            "Cloud Computing",
            "Internet of Things (IoT)",
            "E-commerce",
            "Marketing",
            "Social Media",
            "Content Creation",
            "Graphic Design",
            "Video Production",
            "Music Production",
            "Education",
            "Healthcare"
        ];
        foreach ($categories as $categorie) {
            CategoryProject::create([
              'name' => $categorie,
            ]);
        }
    }
}
