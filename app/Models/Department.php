<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','departmentHead'];
    public static function validate($request)
    {
        $request->validate([
            "name" => "required|unique:departments|max:255", 
        ],[

            'name.required' => 'Please enter the department name.',
            'name.unique' => 'The department name has already been taken.'
        ]);
    } 
    public function getId()
    {
        return $this->attributes["id"];
    }
    public function setId($id)
    {
        $this->attributes["id"] = $id;
    } 
     public function getName()
    {
        return $this->attributes["name"];
    }
    public function setName($name)
    {
        $this->attributes["name"] = $name;
    } 
    public function getDescription() {
        return $this->attributes["description"];
    }
    public function setDescription($description) {
        $this->attributes["description"] = $description;
    }
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
     public function employeeDepartmentHead()
    {
        return $this->belongsTo(Employee::class,'departmentHead');
    }
}
