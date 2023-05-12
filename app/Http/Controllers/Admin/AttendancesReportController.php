<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendancesReportController extends Controller
{
    //
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "List attendance employees";
        $viewData['employees'] = Employee::all();
    
        // Get the selected month and year from the request parameters
        $selectedMonth = $request->input('month');
        $selectedYear = $request->input('year');
    
        // If a month and year were selected, filter the attendance data by that date range
        if ($selectedMonth && $selectedYear) {
            $attendanceData = Attendance::whereYear('login_time',$selectedYear)
                                        ->whereMonth('login_time',date($selectedMonth))
                                        ->get();
        } else {
            $attendanceData = Attendance::all();
        }
    
        // Group the attendance data by employee ID and date
        $groupedAttendanceData = $attendanceData->groupBy(['employee_id', 'login_time']);
    
        // Pass the attendance data to the view
        $viewData['attendanceData'] = $groupedAttendanceData;
    
        return view('admin.report-attendances.index')->with("viewData", $viewData);
    
    }
    
}
