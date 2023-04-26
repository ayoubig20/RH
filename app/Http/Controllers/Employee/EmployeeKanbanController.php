<?php

namespace App\Http\Controllers\Employee;

use App\Models\Task;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeKanbanController extends Controller
{
    //
    public function updateStatus(Request $request, $id)
    {
        // dd($id); // Print the value of $id
    
        $task = Task::findOrFail($id);
    
        $task->status = $request->input('status');
        $task->save();
         return $request;
    
    }
    public function index()
    {
        $viewData = [];
        $employeeId = auth()->user()->id;
        $viewData['tasks']  = Task::where('assigned_to', $employeeId)->get();
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();
    
        return view('employee.kanban.index', compact('viewData')); 
    }
    
}
