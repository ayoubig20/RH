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

        // Check if the selected month is in the future
        $currentYear = date('Y');
        $currentMonth = date('m');
        if ($year > $currentYear || ($year == $currentYear && $month > $currentMonth)) {
            return response()->json([
                'error' => 'Selected month is in the future.',
            ]);
        }

        // Get a list of all employees
        $employees = Employee::all();

        $attendanceReports = [];

        // Loop through each employee and generate an attendance report
        foreach ($employees as $employee) {
            // Calculate the total number of working days, holidays, and Sundays for the selected month
            $workingDays = Working_days::where('year', $year)->where('month', $month)->value('working_days');
            $holidays = Working_days::where('year', $year)->where('month', $month)->value('holidays');
            $sundays = Working_days::where('year', $year)->where('month', $month)->value('sundays');

            // Calculate the total number of present days for the selected month
            $presentDays =0;

            // If the current month hasn't ended yet, calculate missed days until the current date
            if ($year == $currentYear && $month == $currentMonth) {
                $today = Carbon::today();
                $missedDays = max($workingDays - $presentDays, 0);
                for ($day = 1; $day <= $today->day; $day++) {
                    $date = Carbon::create($year, $month, $day);
                        if (Attendance::where('employee_id', $employee->id)
                            ->whereDate('created_at', $date)
                            ->exists()
                        ) {
                            $presentDays++;
                        }
                        $missedDays = max($workingDays - $presentDays, 0); 
                }
            } else {
                // Calculate the total number of missed days for the selected month
                $missedDays = max($workingDays - $presentDays, 0);
            }

            // Calculate the missed percentage
            $missedPercentage = $workingDays > 0 ? round(($missedDays / $workingDays) * 100, 2) : 0;

            // Store the attendance report data for the employee in an array
            $attendanceReports[] = [
                'employeeId' => $employee->id,
                'employeeFirstName' => $employee->firstName,
                'employeeLastName' => $employee->lastName,
                'workingDays' => $workingDays,
                'holidays' => $holidays,
                'sundays' => $sundays,
                'missedDays' => $missedDays,
                'presentDays' => $presentDays,
                'missedPercentage' => $missedPercentage,
            ];
        }

        // Return the attendance report data as a JSON response
        return response()->json([
            'attendanceReports' => $attendanceReports,
        ]);
    }
}
