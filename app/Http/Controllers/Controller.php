<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Student;
use App\Models\User;

abstract class Controller
{
    //
    public $currentUser;
    public $currentLogin;

    public function __construct(){
        $this->currentUser = User::getCurrentUser();

        if($this->currentUser){

            if($this->currentUser->status > 2 && $this->currentUser->status < 5){
                $this->currentLogin = Staff::where('phone',$this->currentUser->username)->first();
            }elseif($this->currentUser->status == 5){
                $this->currentLogin = Student::where('father_phone',$this->currentUser->username)->first();
            }
        }
    }

}
