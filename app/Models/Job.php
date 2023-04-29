<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'department_id'
    ];
    public function getId()
    {
        return $this->attributes["id"];
    }
    public function settId($id)
    {
        return $this->attributes["id"] = $id;
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function getDescription()
    {
        return $this->attributes["description"];
    }
    public function getDepartmentId()
    {
        return $this->attributes["department_id"];
    }
    public function setDescription($description)
    {
        $this->attributes["description"] = $description;
    }
    public function employees(){
        $this->hasMany(Job::class,'job');
    }
}
