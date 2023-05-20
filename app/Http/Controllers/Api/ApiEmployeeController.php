<?php
namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'message'=>'ok',
            'status'=>200,
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
        Employee::validate($request);
        $employee = new Employee();
        $data = $request->all();
        Employee::create($data);
        $employee->setImage("1.png");
        $employee->save();

        if ($request->hasFile('image')) {
            $imageName = $employee->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $employee->setImage($imageName);
            $employee->save();
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

    public function destroy(Employee $employee)
    {
        $employee->forceDelete();
        return response()->json(['success' => true, 'message' => 'Employee deleted successfully!']);
    }
    
    
}
