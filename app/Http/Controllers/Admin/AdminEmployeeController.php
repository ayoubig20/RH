<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminEmployeeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "List employees";
        $viewData["employees"] = Employee::all();
        $viewData['departments'] = Department::all();
        return view('admin.employees.index', ['viewData' => $viewData]);
    }

    public function create()
    {
        $viewData = [];
        $viewData["title"] = "create employee";
        $viewData['departments'] = Department::all();

        return view('admin.employees.create')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        echo "$request";
        Employee::validate($request);
        $employee = new Employee();
        // $employee->setFirstName($request->input('firstName'));
        // $employee->setLastName($request->input('lastName'));
        // $employee->setGender($request->input('gender'));
        // $employee->setEmail($request->input('email'));
        // $employee->setPhone($request->input('phone'));
        // $employee->setAddress($request->input('address'));
        // $employee->setJob($request->input('job'));
        // $employee->setMartialStatus($request->input('martialStatus'));
        // $employee->setFatteningDate($request->input('fatteningDate'));
        // $employee->setDateOfBirth($request->input('DateOfBirth'));
        // $employee->setSalary($request->input('salary'));
        // $employee->setDepartmentId($request->input('department'));
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
    

        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully!');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully!');
    }
}
