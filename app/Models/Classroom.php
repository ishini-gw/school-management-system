<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Classroom extends Model
{
  
    protected $fillable = [
        'name',
        'section',
        'academic_year',
        'capacity',
        'class_teacher',
        'room_number',
        'description',
        'is_active',
    ];
    
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

   
    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    
    public function scopeByYear(Builder $query, $year)
    {
        return $query->where('academic_year', $year);
    }
}
