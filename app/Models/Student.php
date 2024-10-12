<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'country',
        'streetaddress',
        'city',
        'region',
        'postalcode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //TODO n to n 

    public function teacher(){
        
    }
}
