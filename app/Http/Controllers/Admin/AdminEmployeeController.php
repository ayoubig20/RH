<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Employee;
use App\Models\Department;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminEmployeeController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List employees";
        $viewData["employees"] = Employee::all();
        $viewData['departments'] = Department::all();
        if ($request->has('view') && $request->get('view') == 'card') {
            // Display employees in card view
            return view('admin.employees.indexCards', ['viewData' => $viewData]);
        } else {
            // Display employees in list view
            return view('admin.employees.indexList', ['viewData' => $viewData]);
        }
    }

    public function create()
    {
        $viewData = [];
        $viewData["title"] = "create employee";
        $viewData['departments'] = Department::all();

        return view('admin.employees.create')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        $tasks = Task::where('assigned_to', '=', $employee->id)->get();
        return view('admin.employees.show', compact('employee', 'tasks'));
    }
    public function store(Request $request)
    {
        Employee::validate($request);
    
        $data = $request->all();
    
        // Use the default image if no image is provided
        if (!$request->hasFile('image')) {
            $data['image'] = 'default-avatar.png';
        } else {
            // Save the uploaded image to storage
            $imageName = uniqid() . '.' . $request->file('image')->extension();
            Storage::disk('public')->put(
                'assets/users/' . $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $data['image'] = $imageName;
        }
        
        // Set the task_id field in the employee record
        $data['task_id'] = $request->input('task_id');
    
        Employee::create($data);
    
        return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully!');
    } 
    public function edit(Employee $employee)
    {
        $viewData = [];
        $viewData["title"] = "edit employee";
        $viewData['departments'] = Department::all();
        return view('admin.employees.edit', ['employee' => $employee, 'viewData' => $viewData]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully!');
    }
}
