<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    //
    protected $fillable = [
        'student_id',
        'date',
        // 'month',
        'status',
        'session_id'
    ];
}
