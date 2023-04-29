<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminKanbanController extends Controller
{
    //
    public function updateStatus(Request $request, $id)
    {
    // dd($id); // Print the value of $id

        $task = Task::findOrFail($id);

        $task->status = $request->input('status');
        $task->save();
    // return $request;
    }
    public function index()
    {
        $viewData = [];
        $viewData['tasks']  = Task::all();

        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();

        return view('admin.kanban.index', compact('viewData'));
    }
}
