<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Summary of Employee
 */
class Employee extends Model
{

    use SoftDeletes;

    use HasFactory;
        protected $fillable = [
        'firstName', 'lastName', 'gender', 'email', 'phone', 'address', 'job', 'fatteningDate', 'department_id', 'martialStatus', 'salary', 'DateOfBirth', 'status', 'image', 'password', 'role'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public static function validate($request)
    {
        $request->validate([

            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $request->id,
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'martialStatus' => 'required|string|max:255',
            'fatteningDate' => 'required|date',
            'DateOfBirth' => 'required|date',
            'salary' => 'required|numeric|gt:0',
            'department_id' => 'required',
            'role' => 'required',
            'image' => 'image',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
    }

    public function getId()
    {
        return $this->attributes["id"];
    }
    public function settId($id)
    {
        return $this->attributes["id"] = $id;
    }
    public function getFirstName()
    {
        return $this->attributes["firstName"];
    }

    public function setFirstName($firstName)
    {
        $this->attributes["firstName"] = $firstName;
    }


    public function getLastName()
    {
        return $this->attributes["lastName"];
    }

    public function setLastName($lastName)
    {
        $this->attributes["lastName"] = $lastName;
    }
    public function getGender()
    {
        return $this->attributes["gender"];
    }

    public function setGender($gender)
    {
        $this->attributes["gender"] = $gender;
    }
    public function getEmail()
    {
        return $this->attributes["email"];
    }

    public function setEmail($email)
    {
        $this->attributes["email"] = $email;
    }
    public function getPhone()
    {
        return $this->attributes["phone"];
    }

    public function setPhone($phone)
    {
        $this->attributes["phone"] = $phone;
    }
    public function getStatus()
    {
        return $this->attributes["status"];
    }

    public function setStatus($status)
    {
        $this->attributes["status"] = $status;
    }
    public function getAddress()
    {
        return $this->attributes["address"];
    }

    public function setAddress($address)
    {
        $this->attributes["address"] = $address;
    }
    public function getJob()
    {
        return $this->attributes["job"];
    }

    public function setJob($job)
    {
        $this->attributes["job"] = $job;
    }
    public function getMartialStatus()
    {
        return $this->attributes["martialStatus"];
    }

    public function setMartialStatus($martialStatus)
    {
        $this->attributes["martialStatus"] = $martialStatus;
    }
    public function getSalary()
    {
        return $this->attributes["salary"];
    }

    public function setSalary($salary)
    {
        $this->attributes["salary"] = $salary;
    }
    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getFatteningDate()
    {
        return Carbon::parse($this->attributes['fatteningDate'])->format('m/d/Y');
    }


    public function setFatteningDate($value)
    {
        $this->attributes['fatteningDate'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function getDateOfBirth()
    {
        return Carbon::parse($this->attributes['DateOfBirth'])->format('m/d/Y');
    }


    public function setDateOfBirth($value)
    {
        $this->attributes['DateOfBirth'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function getAge()
    {
        $dob = Carbon::parse($this->attributes['DateOfBirth']);
        $now = Carbon::now();
        $age = $now->diffInYears($dob);
        return $age;
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function getDepartmentId()
    {
        return $this->attributes['department_id'];
    }
    public function setDepartmentId($id)
    {
        $this->attributes['department_id'] = $id;
    }
    public function projects()
    {
        return $this->hasMany(Projet::class);
    }
    public function getProjectsId()
    {
        return $this->attributes['project_id'];
    }
    public function setProjectsId($id)
    {
        $this->attributes['project_id'] = $id;
    }
    /**
     * Summary of teams
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function teams() {
    //     return $this->belongsTo(Team::class);
    // }
    // public function getTeamsId()
    // {
    //     return $this->attributes['team_id'];
    // }
    // public function setTeamsId($id)
    // {
    //     $this->attributes['team_id'] = $id;
    // }
}
