<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Project;

class AdminTaskController extends Controller
{
    public function index($status='all')
    {
        $viewData=[];
        if ($status === 'all') {
            $viewData['tasks'] = Task::all();
        } else {
            $viewData['tasks'] = Task::where('status','=', $status)->get();
        }
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();
        return view('admin.tasks.indexList', compact('viewData', 'status')); 
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
        $task = Task::create($creationData);
    
        // Get the employee and project IDs from the request
        $employeeId = $request->input('assigned_to');
        $projectId = $request->input('project_id');
    
        // Attach the task to the employee and project using the pivot table
        $employee = Employee::findOrFail($employeeId);
        $employee->projects()->attach($projectId, ['created_at' => now(), 'updated_at' => now()]);
        $employee->tasks()->attach($task->id, ['created_at' => now(), 'updated_at' => now()]);
    
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();
    
        return redirect()->route('admin.tasks.index')->with([
            'success' => 'Task created successfully!',
            'viewData' => $viewData 
        ]);
    
        // return  $request ;
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
    
        // Update project ID for task
        $projectId = $request->input('project_id');
        $task->projects()->sync([$projectId=> ['updated_at' => now()]]);
    
        // Update employee ID for task
        $employeeId = $request->input('assigned_to');
        $task->employees()->sync([$employeeId=> ['updated_at' => now()]]);
    
        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully!');
    }
    

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully!');
    }
}

