<?php

namespace App\Http\Controllers\Employee;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeHomeController extends Controller
{
    //
    public function index()
    {
        // stats tasks
        $employeeId = auth()->user()->id;
        $Tasks = Task::where('assigned_to', $employeeId)->get();
        $numTasks = Task::where('assigned_to', $employeeId)->count();
        $numCompletedTasks = Task::where('assigned_to', $employeeId)->where('status', 'done')->count();
        $numProgerssTasks = Task::where('assigned_to', $employeeId)->where('status', 'in progress')->count();
        $numToDOTasks = Task::where('assigned_to', $employeeId)->where('status', 'to do')->count();
        // priority tasks
        $priorityHighTasks = Task::where('assigned_to', $employeeId)->where('priority', 'high')->count();
        $priorityMediumTasks = Task::where('assigned_to', $employeeId)->where('priority', 'Medium')->count();
        $priorityLowTasks = Task::where('assigned_to', $employeeId)->where('priority', 'low')->count();
        // stats project
        $TasksId = Task::where('assigned_to', $employeeId)->get()->pluck('project_id');
        $Projects = Project::whereIn('id', $TasksId)->get();
        $numProject = $Projects->count('id');
        $numCompletedPoject = $Projects->where('status', 'Finshed')->count();
        $numProgerssPoject = $Projects->where('status', 'In progress')->count();
        $numToDOTPoject = $Projects->where('status', 'Panding')->count();

        $viewData = [
            'title' => "Dashboard Employee",
            'numTasks' => $numTasks,
            'numCompletedTasks' => $numCompletedTasks,
            'numProgressTasks' => $numProgerssTasks,
            'numToDOTasks' => $numToDOTasks,
            'numProject' => $numProject,
            'numCompletedPoject' => $numCompletedPoject,
            'numProgerssPoject' => $numProgerssPoject,
            'numToDOTPoject' => $numToDOTPoject,
            'priorityHighTasks' => $priorityHighTasks,
            'priorityMediumTasks' => $priorityMediumTasks,
            'priorityLowTasks' => $priorityLowTasks,
            'tasks' => $Tasks
        ];

        return view('employee.home.index')->with("viewData", $viewData);
    }
}
