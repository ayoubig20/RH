<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'assigned_to',
        'project_id',
        'status',
        'start_date',
        'end_date',
    ];
    public static function validate($request){
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'assigned_to' => 'required|exists:employees,id',
            'project_id' => 'nullable|exists:projects,id',
            // 'status' => 'required|in:Not Started,In Progress,Completed',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
   
    public function employee()
    {
        return $this->belongsTo(Employee::class,'assigned_to');
    }
}
