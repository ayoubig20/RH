<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use File;


/**
 * Summary of Project
 */
class Project extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'document',
        'start_date',
        'end_date',
        'budget',
        'priority',
        'description',
        'progression',
        'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }
    public function getDocument()
    {
        return $this->attributes['document'];
    }

    public function setDocument($document)
    {
        $this->attributes['document'] = $document;
    }
    public function getId()
    {
        return $this->attributes["id"];
    }
    public function setId($id)
    {
        $this->attributes["id"] = $id;
    }
    public function getStatus()
    {
        return $this->attributes["status"];
    }
    public function setStatus($status)
    {
        $this->attributes["status"] = $status;
    }
    public function getName()
    {
        return $this->attributes["name"];
    }
    public function setName($name)
    {
        $this->attributes["name"] = $name;
    }

    public function category()
    {

        return $this->belongsTo(CategoryProject::class, 'category_id');
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($value)
    {
        $this->attributes['category_id'] = $value;
    }

    public function getStartDate()
    {
        return $this->attributes['start_date'];
    }

    public function setStartDate($value)
    {
        $this->attributes['start_date'] = $value;
    }

    public function getEndDate()
    {
        return $this->attributes['end_date'];
    }

    public function setEndDate($value)
    {
        $this->attributes['end_date'] = $value;
    }

    public function getBudget()
    {
        return $this->attributes['budget'];
    }

    public function setBudget($value)
    {
        $this->attributes['budget'] = $value;
    }

    public function getPriority()
    {
        return $this->attributes['priority'];
    }

    public function setPriority($value)
    {
        $this->attributes['priority'] = $value;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($value)
    {
        $this->attributes['description'] = $value;
    }

    public function getProgression()
    {
        return $this->attributes['progression'];
    }

    public function setProgression($value)
    {
        $this->attributes['progression'] = $value;
    }
    public function progression()
    {
        $totalTasks = $this->tasks()->count();
        $doneTasks = $this->tasks()->where('status', '=', 'done')->count();
        $inProgressTasks = $this->tasks()->where('status', '=', 'in progress')->count();
        $todoTasks = $this->tasks()->where('status', '=', 'to do')->count();

        if ($totalTasks == 0) {
            return 0;
        }

        return intval(($doneTasks + $inProgressTasks / 2) / $totalTasks * 100);
    }
    public function Totaltasks()
    {

        $totalTasks = $this->tasks()->count();
        return $totalTasks;
    }
    public function TotalEmployees()
    {

        $totalEmployees = 0;

        // Retrieve all tasks for this project
        $tasks = $this->tasks;

        // Loop through each task and count the employees assigned to it
        foreach ($tasks as $task) {
            $employees = $task->employee()->count();
            $totalEmployees += $employees;
        }

        return $totalEmployees;
    }
 

}
