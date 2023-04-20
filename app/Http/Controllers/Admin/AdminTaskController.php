<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminTaskController extends Controller
{
    public function index(Request $request, $status = 'all')
    {
        $viewData = [];
        $viewData['tasks']  = Task::all();

        if ($request->has('status')) {
            $status = $request->input('status');
            if ($status === 'to do') {
                $viewData['tasks']  = $viewData['tasks']->where('status', 'to do');
            } elseif ($status === 'in_progress') {
                $viewData['tasks']  = $viewData['tasks']->where('status', 'in progress');
            } elseif ($status === 'done') {
                $viewData['tasks']  = $viewData['tasks']->where('status', 'done');
            }
        }
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();

        // return view('admin.tasks.indexList', compact('viewData', 'status')); 
        if ($request->has('view') && $request->get('view') == 'card') {
            return view('admin.tasks.indexCards', ['viewData' => $viewData]);
        } else {
            return view('admin.tasks.indexList', ['viewData' => $viewData]);
        }
    }



    public function create()
    {
        $viewData = [];
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();
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
        $employee->projects()->attach($projectId, ['created_at' => now(), 'updated_at' => now(), 'created_by' => (Auth::user()->name)]);
        $employee->tasks()->attach($task->id, [
            'created_at' => now(), 'updated_at' => now(), 'created_by' => (Auth::user()->name),
        ]);

        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();

        // return redirect()->route('admin.tasks.index')->with([
        //     'success' => 'Task created successfully!',
        //     'viewData' => $viewData
        // ]);
        return back()->with([
                 'success' => 'Task created successfully!','viewData' => $viewData
                ]);
    }


    public function show(Task $task)
    {
        $viewData = [];
        $viewData['task'] = $task; // Pass $task variable to the view
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();
        return view('admin.tasks.show', compact('viewData'));
    }

    public function edit(Task $task)
    {
        $viewData = [];
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();
        return view('admin.tasks.edit', compact(['task', 'viewData']));
    }

    public function update(Request $request, Task $task)
    {
        Task::validate($request);
        $updatedData = $request->all();
        $task->update($updatedData);
        // Update employee ID for task
        $employeeId = $request->input('assigned_to');
        $employee = Employee::findOrFail($employeeId);

        // Update project ID for task
        $projectId = $request->input('project_id');
        $task->project()->associate($projectId);
        $employee->projects()->attach($projectId, ['created_at' => now(), 'updated_at' => now(), 'created_by' => (Auth::user()->name)]);
        $task->save();

        // Dissociate old employee from task
        $task->employee()->disassociate();

        // Associate new employee with task
        $task->employee()->associate($employeeId);
        $employee->tasks()->attach($task->id, [
            'created_at' => now(), 'updated_at' => now(), 'created_by' => (Auth::user()->name),
        ]);
        $task->save();

        return back()->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back()->with('success', 'Task deleted successfully!');
    }
    public function statusUpdate($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'status' => $request->status,
        ]);
        session()->flash('Status_Update');
        return back();
    }
}
