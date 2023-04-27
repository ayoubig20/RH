<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Employee;
use App\Models\Department;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


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
        $data['password'] = Hash::make($request->input('password'));

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
        $employee = Employee::create($data);

        if ($request->input('role') == 'departmentHead') {
            $departmentId = $request->input('department_id');
            $department = Department::findOrFail($departmentId);
            // Update the previous department head's role
            $prevDepartmentHeadId = $department->departmentHead;
            if ($prevDepartmentHeadId) {
                $prevDepartmentHead = Employee::findOrFail($prevDepartmentHeadId);
                $prevDepartmentHead->role = 'employee';
                $prevDepartmentHead->save();
            }
            $department->departmentHead = $employee->id;
            $department->save();
        }
        session()->flash('success', 'Employee created successfully!');

        return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully!');
    }
    public function edit(Employee $employee)
    {
        $viewData = [];
        $viewData["title"] = "edit employee";
        $viewData['departments'] = Department::all();

        return view('admin.employees.edit', ['employee' => $employee, 'viewData' => $viewData]);
    }
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('employees')->ignore($employee->id),
            ],
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'martialStatus' => 'required|string|max:255',
            'fatteningDate' => 'required|date',
            'DateOfBirth' => 'required|date',
            'salary' => 'required|numeric|gt:0',
            'department_id' => 'required',
            'role' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
        ]);

        if (!$request->hasFile('image')) {
            $validatedData['image'] = 'default-avatar.png';
        } else {
            // Save the uploaded image to storage
            $imageName = uniqid() . '.' . $request->file('image')->extension();
            Storage::disk('public')->put(
                'assets/users/' . $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $validatedData['image'] = $imageName;
        }
        // Check if password is provided, if not, keep the old password
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        if ($request->input('role') != $employee->role) {
            $employee->role = 'employee';
        }

        $employee->update($validatedData);
        if ($request->input('role') == 'departmentHead') {
            $departmentId = $request->input('department_id');
            // Update the previous department head's role
            $department = Department::findOrFail($departmentId);
            $prevDepartmentHeadId = $department->departmentHead;
            if ($prevDepartmentHeadId) {
                $prevDepartmentHead = Employee::findOrFail($prevDepartmentHeadId);
                $prevDepartmentHead->role = 'employee';
                $prevDepartmentHead->save();
            }
            $department->departmentHead = $employee->id;
            $department->update();
        }
        session()->flash('edit', 'Employee updated successfully!');


        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully!');
        // dd($validatedData);
    }
    public function destroy(Employee $employee, Request $request)
    {
        $assigned_tasks = Task::where("assigned_to", $employee->id)->pluck('assigned_to');
        if ($assigned_tasks->isEmpty()) {
            if ($employee) {
                $employee->delete();
                session()->flash('success', 'Employee archived successfully.');
            }
        } else {
            session()->flash('error', 'Cannot archive employee - they have assigned tasks.');
        }
        return redirect()->route('admin.employees.index');
    }
}
