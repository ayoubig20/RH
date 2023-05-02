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
        // priority Project
        $priorityHighProject = Project::all()->where('priority', 'high')->count();
        $priorityMediumProject = Project::all()->where('priority', 'medium')->count();
        $priorityLowProject = Project::all()->where('priority', 'low')->count();
        // stats project
        // $TasksId = Task::where('assigned_to', $employeeId)->get()->pluck('project_id');
        $Projects = Project::all();
        $numProject = $Projects->count();
        $numCompletedPoject = $Projects->where('status', 'Finshed')->count();
        $numProgerssPoject = $Projects->where('status', 'In progress')->count();
        $numToDOTPoject = $Projects->where('status', 'Panding')->count();
        $budgets = Project::sum('budget');
        // stats Employees
        $employees = Employee::all();
        $numEmployes = $employees->count();
        // $departmentHead = $employees->where('role', 'department head');




        $viewData = [
            'title' => "Dashboard Admin",
            'numTasks' => $numTasks,
            'numCompletedTasks' => $numCompletedTasks,
            'numProgressTasks' => $numProgerssTasks,
            'numToDOTasks' => $numToDOTasks,
            'numProject' => $numProject,
            'numEmployes' => $numEmployes,
            'numCompletedPoject' => $numCompletedPoject,
            'numProgerssPoject' => $numProgerssPoject,
            'numToDOTPoject' => $numToDOTPoject,
            'priorityHighProject' => $priorityHighProject,
            'priorityMediumProject' => $priorityMediumProject,
            'priorityLowProject' => $priorityLowProject,
            'tasks' => $Tasks,
            'Projects' => $Projects,
            'budgets' => $budgets ,
        ];
        return view('admin.home.index')->with("viewData", $viewData,);
    }
}
