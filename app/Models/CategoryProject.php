<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProject extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public static function validate($request)
    {
        $request->validate([
            "name" => "required|unique:category_projects|max:255",
        ], [

            'name.required' => 'Please enter the Category Project name.',
            'name.unique' => 'The Category Project name has already been taken.'
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
   
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
