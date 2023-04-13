<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{

    use SoftDeletes;

    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'assigned_to',
        'project_id',
        'status',
        'value_status',
        'start_date',
        'end_date',
        'created_by'
    ];
    public static function validate($request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'assigned_to' => 'required|exists:employees,id',
            'project_id' => 'nullable|exists:projects,id',
            'status' => 'required',
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
        return $this->belongsTo(Employee::class, 'assigned_to');
    }
 

    public function getId()
    {
        return $this->attributes["id"];
    }
    public function setId($id)
    {
        $this->attributes["id"] = $id;
    }

    public function getEndDate()
    {
        return $this->attributes['end_date'];
    }

    public function setEndDate($value)
    {
        $this->attributes['end_date'] = $value;
    }
    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($value)
    {
        $this->attributes['name'] = $value;
    }
    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescriptin($value)
    {
        $this->attributes['description'] = $value;
    }
    public function getAssigned()
    {
        return $this->attributes['assigned_to'];
    }

    public function setAssigned($value)
    {
        $this->attributes['assigned_to'] = $value;
    }
    public function getProjectId()
    {
        return $this->attributes['project_id'];
    }

    public function setPojectId($value)
    {
        $this->attributes['project_id'] = $value;
    }
    public function getStartDate()
    {
        return $this->attributes['start_date'];
    }

    public function setStartDate($value)
    {
        $this->attributes['start_date'] = $value;
    }
    //     public function assignedUsers()
    // {
    //     return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
    // }
    // public function other_employees()
    //     {
    //         return $this->project->tasks()->employee()->where('id', '<>', $this->employee->id)->get();
    //     }
}
