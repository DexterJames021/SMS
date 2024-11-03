<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable  = [
        'firstname',
        'lastname',
        'email',
        'country',
        'streetaddress',
        'city',
        'region',
        'postalcode',
    ];

    //TODO n to n 
    public function student(){
        return $this->belongsTo(Student::class, 'teacher_id');
    }

}
