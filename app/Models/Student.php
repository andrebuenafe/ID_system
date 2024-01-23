<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [

        'fname',
        'lname',
        'address',
        'qr',
        'signature',
        'school_id',
        'course',
        'img',
        'parents_name',
        'em_contact',
        'bday',
        'sy_started',
        'course_color'
    ];
}
