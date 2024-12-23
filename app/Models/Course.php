<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course',
        'course_mdl_id',
        'enrollment_key',
        'description'
    ];

    public function student(){
        return $this->hasMany(Student::class);
    }
    public function admission()
    {
        return $this->hasMany(Admission::class);
    }
}
