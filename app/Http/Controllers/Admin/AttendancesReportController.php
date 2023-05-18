<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Employee;
use Carbon\CarbonPeriod;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Working_days;

class AttendancesReportController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.report-attendances.index');
    }
    public function genrateAttendances(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        // Get a list of all employees
        $employees = Employee::all();

        $attendanceReports = [];

        // Loop through each employee and generate an attendance report
        foreach ($employees as $employee) {
            // Calculate the total number of working days for the selected month
            $totalWorkingDays = $this->getWorkingDaysForMonth($year, $month);

            // Calculate the total number of missed days for the selected month
            $missedDays = 0;
            $attendances = Attendance::where('employee_id', $employee->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
            if ($attendances->isEmpty()) {
                $missedDays = $totalWorkingDays; // no attendance records, so set missed days to 0
            }
            else {
                foreach ($attendances as $attendance) {
                    if ($attendance) {
                        $missedDays++;
                    }
                }
            }
            // Calculate the missed percentage
            $missedPercentage = $totalWorkingDays > 0 ? round(($missedDays / $totalWorkingDays) * 100, 2) : 0;

            // Store the attendance report data for the employee in an array
            $attendanceReports[] = [
                'employeeId' => $employee->id,
                'employeeFirstName' => $employee->firstName,
                'employeeLastName' => $employee->lastName,
                'workingDays' => $totalWorkingDays,
                'missedDays' => $missedDays,
                'missedPercentage' => $missedPercentage,
            ];
        }

        // Return the attendance report data as a JSON response
        return response()->json([
            'attendanceReports' => $attendanceReports,
        ]);
    }

    private function getWorkingDaysForMonth($year, $month)
    {
        $workingDays = 0;
        $totalDays = Working_days::getWorkingDaysInMonth($year, $month);
        for ($i = 1; $i <= $totalDays; $i++) {
            $date = sprintf('%04d-%02d-%02d', $year, $month, $i);
            if (date('N', strtotime($date)) < 6) {
                $workingDays++;
            }
        }
        return $workingDays;
    }
}