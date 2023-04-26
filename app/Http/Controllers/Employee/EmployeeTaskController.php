<?php

namespace App\Http\Controllers\Employee;

use App\Models\Task;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    $viewData['employees'] = Employee::all();
    $viewData['projects'] = Project::all();

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
    session()->flash('Update','Task updated successfully!');

    return back();
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
    session()->flash('edit', 'Task updated successfully');
    return view('admin.tasks.edit', compact(['task', 'viewData']));
}
public function statusUpdate($id, Request $request)
{
    $task = Task::findOrFail($id);
    $task->update([
        'status' => $request->status,
    ]);
    session()->flash('statusUpdate','Status updated successfully');
    return back();
}

}
