<?php

namespace App\Http\Controllers\Admin\ArchiveEmp;

use App\Models\Task;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\AdminEmpArchive;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminEmpArchiveController extends Controller
{
    //
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List employees";
        $viewData["employees"] = Employee::onlyTrashed()->get();
        // $viewData['departments'] = Department::all();

        return view('admin.employees.archive.index', compact('viewData'));
        // return $request;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        Employee::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_employee');
        return redirect('/admin/employees');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::withTrashed()->where('id', $id)->first();
        $employee->forceDelete();
        session()->flash('delete', 'Employee deleted successfully');
        return redirect('/admin/archiveEmp');
    }
    public function deleteAll(Request $request)
    {
        $delete_all_id = json_decode($request->ids);
        $employee = Employee::withTrashed()->whereIn('id', $delete_all_id);
        $employee->forceDelete();
        session()->flash('delete', 'Employees deleted successfully');
        return redirect('/admin/archiveEmp');
    }
}
