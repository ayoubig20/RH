<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeCalendarController extends Controller
{
    
    
public function index()
{
    $projects = Project::where('assigned_to', $employeeId);

    $event_list = [];
    foreach ($projects as $project) {
        $project_list[] = Calendar::event(
            $project->title,
            true,
            new \DateTime($project->start_date),
            new \DateTime($project->end_date.' +1 day'),
            null,
            [
                'description' => $event->description,
            ]
        );
    }

    $calendar_details = Calendar::addEvents($event_list);

    return view('calendar.index', compact('calendar_details'));
}
}
