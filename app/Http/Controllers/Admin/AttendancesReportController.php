<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendancesReportController extends Controller
{
    //
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "List attendance employees";
        $viewData['employees']= Employee::all();
        return view('admin.report-attendances.index')->with("viewData", $viewData);
    }
}
