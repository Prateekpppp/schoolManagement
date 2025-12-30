<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function fee(){
        return $this->belongsToMany(Fee::class);
    }
}
