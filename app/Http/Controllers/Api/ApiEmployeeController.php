<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApiEmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $departments = Department::all();
        return response()->json([
            'title' => 'List employees',
            'employees' => $employees,
            'departments' => $departments,
            'message' => 'ok',
            'status' => 200,
        ]);
    }

    public function create()
    {
        $departments = Department::all();
        return response()->json([
            'title' => 'Create employee',
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        // $ata = $request->validate([
        //     'firstName' => 'required|string|max:255',
        //     'lastName' => 'required|string|max:255',
        //     'gender' => 'required|string',
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //     ],
        //     'phone' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'status' => 'required|string|max:255',
        //     'job_id' => 'required|string|max:255',
        //     'martialStatus' => 'required|string|max:255',
        //     'fatteningDate' => 'required|date',
        //     'DateOfBirth' => ['required', 'date', 'before:' . date('Y-m-d', strtotime('-18 years'))],
        //     'salary' => 'required|numeric|gt:0',
        //     'department_id' => 'required',
        //     'role' => 'required',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'password' => 'nullable|min:8',
        //     'password_confirmation' => 'nullable|same:password',
        // ]);
        $data['password'] = Hash::make($request->input('password'));
        // Use the default image if no image is provided
        if (!$request->hasFile('image')) {
            if ($request->input('gender') == 'Female') {
                $data['image'] = 'default-avatar-female.jpeg';
            } else {
                $data['image'] = 'default-avatar.jpg';
            }
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
        return response()->json(['success' => true, 'message' => 'Employee created successfully!']);
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return response()->json([
            'title' => 'Edit employee',
            'employee' => $employee,
            'departments' => $departments,
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        Employee::validate($request);
        if ($request->hasFile('image')) {
            $imageName = $employee->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $employee->setImage($imageName);
        }
        $data = $request->all();
        $employee->update($data);

        return response()->json(['success' => true, 'message' => 'Employee updated successfully!']);
    }

    public function destroy($id)
    {

        Employee::destroy($id);

        return response()->json(['success' => true, 'message' => 'Employee deleted successfully!']);
    }
}
