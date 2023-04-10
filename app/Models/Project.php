<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of Project
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'document',
        'start_date',
        'end_date',
        'budget',
        'priority',
        'description',
        'progression'
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

    /**
     * Summary of users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function users()
    // {
    //     return $this->belongsToMany(Employee::class, 'project_user', 'project_id', 'Employee_id');
    // }
    // public function team()
    // {
    //     return $this->hasMany(Item::class);
    // }
    // public function getItems()
    // {
    //     return $this->items;
    // }
    // public function setItems($items)
    // {
    //     $this->items = $items;
    // }
    // public function team()
    // {
    //     return $this->belongsTo(Team::class);
    // }
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
   

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($value)
    {
        $this->attributes['category'] = $value;
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

    public function getDescription ()
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
}
