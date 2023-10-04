<?php

namespace App\Http\Controllers\employee;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeCalendarController extends Controller
{
    
    
public function index()
{
    $projects = Project::where('assigned_to', $employeeId);

    $project_list = [];
    foreach ($projects as $project) {
        $project_list[] = Calendar::event(
            $project->title,
            true,
            new \DateTime($project->start_date),
            new \DateTime($project->end_date.' +1 day'),
            null,
            [
                'description' =>$project->description,
            ]
        );
    }

    $calendar_details = Calendar::addEvents($project_list);

    return view('calendar.index', compact('calendar_details'));
}
}
