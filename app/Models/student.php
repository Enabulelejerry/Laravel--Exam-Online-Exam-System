<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table ="students";
    protected $primaryKey ="id";
    protected $fillable =['name','email','mobile_no','exam', 'password','gender', 'dob', 'status',];
    use HasFactory;
}
