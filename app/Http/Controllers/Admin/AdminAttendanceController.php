<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class AdminAttendanceController extends Controller
{
    //
   

    // public function viewAttendance()
    // {
    //     $attendances = auth()->guard('employee')->user()->attendances;

    //     return view('attendance.index', ['attendances' => $attendances]);
    // }
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "List attendance employees";
        $viewData['employees']= Employee::all();
        $viewData['attendances']=Attendance::all();
        return view("admin.attendance.index")->with("viewData", $viewData);
    }
}

