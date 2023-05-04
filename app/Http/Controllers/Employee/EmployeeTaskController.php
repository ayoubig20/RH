<?php

namespace App\Http\Controllers\Employee;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Notifications\workFinshed;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class EmployeeTaskController extends Controller
{
    //
    public function index(Request $request, $status = 'all')
    {
        $viewData = [];
        $employeeId = auth()->user()->id;
        $tasks = Task::where('assigned_to', $employeeId);

        if ($request->has('status')) {
            $status = $request->input('status');
            if ($status === 'to do') {
                $tasks = $tasks->where('status', 'to do');
            } elseif ($status === 'in_progress') {
                $tasks = $tasks->where('status', 'in progress');
            } elseif ($status === 'done') {
                $tasks = $tasks->where('status', 'done');
            }
        }

        $viewData['tasks'] = $tasks->get();
        $viewData['employee'] = auth()->user();
        $viewData['projects'] =Project::where('assigned_to', $employeeId);

        if ($request->has('view') && $request->get('view') == 'card') {
            return view('employee.tasks.indexCards', ['viewData' => $viewData]);
        } else {
            return view('employee.tasks.indexList', ['viewData' => $viewData]);
        }
    }

    public function update(Request $request, Task $task)
    {
        Task::validate($request);
        $updatedData = $request->all();
        $task->update($updatedData);
        $task->save();
        if ($task->status === 'done') {
            $employee = auth()->user();
            $users = User::all();
            $task = Task::latest()->first();
            Notification::send($users, new workFinshed($task,$employee));
        }
        session()->flash('Update', 'Task updated successfully!');

        return back();
    }
    // public function show(Task $task)
    // {
    //     $viewData = [];
    //     $viewData['task'] = $task; // Pass $task variable to the view
    //     $viewData['employees'] = Employee::all();
    //     $viewData['projects'] = Project::all();
    //     return view('employee.tasks.show', compact('viewData'));
    // }

    public function edit(Task $task)
    {
        $viewData = [];
        $viewData['employees'] = Employee::all();
        $viewData['projects'] = Project::all();
        session()->flash('edit', 'Task updated successfully');
        return view('employee.tasks.edit', compact(['task', 'viewData']));
    }
    public function statusUpdate($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'status' => $request->status,
        ]);
        if ($task->status === 'done') {
            $employee = auth()->user();
            $users = User::all();
            $task = Task::latest()->first();
            Notification::send($users, new workFinshed($task,$employee));
        }
    
        session()->flash('statusUpdate', 'Status updated successfully');
        return back();
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
        $taskId=$task->id;
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


        //sende to employe assiegned task
        // $user=$employee;
        return back()->with([
                 'success' => 'Task created successfully!','viewData' => $viewData
                ]);
    }
       public function destroy(Task $task)
    {
        $task->delete();
        session()->flash('delete', 'Task deleted successfully!');

        return back();
    }
}
