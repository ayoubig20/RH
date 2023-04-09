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

}
