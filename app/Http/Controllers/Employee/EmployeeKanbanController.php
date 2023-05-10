<?php

namespace App\Http\Controllers\Employee;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Notifications\workFinshed;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class EmployeeKanbanController extends Controller
{
    //
    public function updateStatus(Request $request, $id)
    {
        // dd($id); // Print the value of $id
    
        $task = Task::findOrFail($id);
    
        $task->status = $request->input('status');
        $task->save();
        if ($task->status === 'done') {
            $employee = auth()->user();
            $users = User::all();
            $task = Task::latest()->first();
            Notification::send($users, new workFinshed($task, $employee));
        }
         return $request;
    }
    public function index()
    {
        $viewData = [];
        $employeeId = auth()->user()->id;
        $viewData['tasks']  = Task::where('assigned_to', $employeeId)->get();
        $viewData['employee'] = auth()->user();
        $viewData['projects'] = Project::all();
    
        return view('employee.kanban.index', compact('viewData'));
    }
}
