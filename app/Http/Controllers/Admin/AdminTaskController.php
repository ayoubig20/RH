<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Project;

class AdminTaskController extends Controller
{

    public function index()
    {
        
        $viewData=[];
        $viewData['tasks']= Task::all();
        $viewData['employees']= Employee::all();
        $viewData['projects']= Project::all();

        return view('admin.tasks.index', compact('viewData'));
    }

    public function create()
    {
        $viewData=[];
        $viewData['employees']= Employee::all();
        $viewData['projects']=Project::all();
        return view('admin.tasks.create', compact('viewData'));
    }

    public function store(Request $request)
    {
        Task::validate($request);
        $creationData = $request->all();
        Task::create($creationData);
        $viewData['employees']= Employee::all();
        $viewData['projects']=Project::all();
        return redirect()->route('admin.tasks.index')->with([
            'success' => 'Task created successfully!',
            'viewData' => $viewData // Passing $viewData to the redirected route
        ]);
    }
    
    
    public function show(Task $task)
    {
        $viewData=[];
        $viewData['task'] = $task; // Pass $task variable to the view
        $viewData['employees']= Employee::all();
        $viewData['projects']=Project::all();
        return view('admin.tasks.show', compact('viewData'));
    }

    public function edit(Task $task)
    {
        $viewData=[];
        $viewData['employees']= Employee::all();
        $viewData['projects']= Project::all();
        return view('admin.tasks.edit', compact(['task','viewData']));
    }

    public function update(Request $request, Task $task)
    {
        Task::validate($request);
        $updatedData = $request->all();
        $task->update($updatedData);
    

        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully!');
    }
}

