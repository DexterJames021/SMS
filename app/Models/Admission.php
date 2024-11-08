<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    // protected $table = 'admissions';
    // protected $fillable = [
    //     'firstname',
    //     'lastname',
    //     'middlename',
    //     'course',
    //     'email',
    //     'contactnumber',
    //     'country',
    //     'streetaddress',
    //     'city',
    //     'streetaddress',
    //     'fathername',
    //     'mothername',
    //     'guardiancontactnumber',
    // ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
