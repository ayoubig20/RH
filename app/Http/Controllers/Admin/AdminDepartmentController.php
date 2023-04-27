<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Alert;
use App\Models\Employee;

class AdminDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List departements";
        // $viewData['departments']= Department::paginate(10);
        $viewData['departments']= Department::all();
        $viewData["employees"]=Employee::all();
        if ($request->has('view') && $request->get('view') == 'card') {
            return view('admin.Department.indexCards', ['viewData' => $viewData]);
        } else {
            return view('admin.Department.indexList', ['viewData' => $viewData]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $viewData=[];
        $viewData["title"]='create Department';
        return view("admin.department.create")->with("viewData", $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {        
        Department::validate($request);
        $dep = new Department();
        $dep->setName($request->input("name"));
        $dep->setDescription($request->input("description"));
        $dep->save();
        session()->flash('Add', 'Section added successfully');

        return redirect()->route("admin.department.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $viewData = [];
        $viewData["title"] = " Edit Categry ";
        $viewData['departments']= Department::findOrFail($id);

        return view("admin.department.edit")->with("viewData", $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
     public function update(Request $request, $id)
     {
         $this->validate($request, [
             "name" => "required|max:255|unique:departments,name,$id",
         ], [
             'name.required' => 'Please enter the department name.',
             'name.unique' => 'The department name has already been taken.',
         ]);    
         
         $department = Department::findOrFail($id);
         $department->setName($request->input("name"));
         $department->setDescription($request->input("description"));
         
         // Update department head if it has changed
         $newDepartmentHeadId = $request->input('departmentHead');
         if ($newDepartmentHeadId != $department->departmentHead) {
             // Update the old department head's role
             if ($department->departmentHead) {
                 $prevDepartmentHead = Employee::findOrFail($department->departmentHead);
                 $prevDepartmentHead->role = 'employee';
                 $prevDepartmentHead->save();
             }
             // Assign new department head and update their role
             $newDepartmentHead = Employee::findOrFail($newDepartmentHeadId);
             $newDepartmentHead->role = 'departmentHead';
             $newDepartmentHead->save();
             $department->departmentHead = $newDepartmentHeadId;
         }
         
         $department->save();
         session()->flash('edit', 'Department updated successfully');
     
         return redirect()->route("admin.department.index");
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);
        session()->flash('delete', 'Department deleted successfully');

        return back();
    }
}
