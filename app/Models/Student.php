<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'class_id',
        'enrollment_number',
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'gender',
        'address',
        'phone',
        'parent_name',
        'parent_phone',
        'blood_group',
        'roll_number',
        'gpa',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    protected $casts = [
        'date_of_birth' => 'date',
        'gpa' => 'decimal:2',
    ];

   
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

  
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

   
    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

 
    public function scopeByClass(Builder $query, $classId)
    {
        return $query->where('class_id', $classId);
    }

  
    public function scopeByGender(Builder $query, $gender)
    {
        return $query->where('gender', $gender);
    }

   
    public function scopeTopStudents(Builder $query)
    {
        return $query->where('gpa', '>=', 3.50)
                     ->orderByDesc('gpa');
    }
}
