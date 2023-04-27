<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $Tasks = Task::all();
        $numTasks = Task::all()->count();
        $numCompletedTasks = Task::all()->where('status', 'done')->count();
        $numProgerssTasks = Task::all()->where('status', 'in progress')->count();
        $numToDOTasks = Task::all()->where('status', 'to do')->count();
        // priority tasks
        $priorityHighTasks = Task::all()->where('priority', 'high')->count();
        $priorityMediumTasks = Task::all()->where('priority', 'Medium')->count();
        $priorityLowTasks = Task::all()->where('priority', 'low')->count();
        // stats project
        // $TasksId = Task::where('assigned_to', $employeeId)->get()->pluck('project_id');
        $Projects = Project::all();
        $numProject = $Projects->count();
        $numCompletedPoject = $Projects->where('status', 'Finshed')->count();
        $numProgerssPoject = $Projects->where('status', 'In progress')->count();
        $numToDOTPoject = $Projects->where('status', 'Panding')->count();

        // stats Employees
        $employees=Employee::all();
        $numProject = $employees->count();
        // $departmentHead = $employees->where('role', 'department head');




        $viewData = [
            'title' => "Dashboard Admin",
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
        return view('admin.home.index')->with("viewData", $viewData);
    }
}
