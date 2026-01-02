<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    //
    protected $fillable = [
        // 'id',
        'class_id',
        'subject_id',
        'status'
    ];
}
