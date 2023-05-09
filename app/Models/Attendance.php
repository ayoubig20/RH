<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'login_time',
        'logout_time',
        'status',
        'ip_address',
    ];
    public function getLoginTime()
    {
        return Carbon::parse($this->attributes['login_time'])
            ->format('m/d/Y h:i A');
    }
    public function getLogoutTime()
    {
        return $this->attributes['logout_time'];
           // ->format('m/d/Y h:i A');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public static function markAttendance(Request $request)
    {
        $employee =auth()->guard('employee')->user();

        $attendance = new Attendance;
        $attendance->employee_id = $employee->id;
        $attendance->login_time = now();
        $attendance->status =1;
        $attendance->ip_address = $request->ip();
        ;
        $attendance->save();
        return redirect()->back()->with('success', 'Attendance marked successfully!');
    }
    public static function markLogout(Request $request)
    {
        $employee = auth()->guard('employee')->user();

        if ($employee) {
            $attendance = Attendance::where('employee_id', $employee->id)->latest()->first();
    
            if ($attendance) {
                $attendance->logout_time = now();
                // $attendance->status = 'left';
                $attendance->save();
            }
        }
    }
}
