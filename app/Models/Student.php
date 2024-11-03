<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [ ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    public function admission(){
        return $this->hasOne(Admission::class);
    }
    // teacher can have many students
    //if advisery so 1 teacher for many students
    // 
}
