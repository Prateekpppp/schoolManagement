<?php

namespace App\Http\Controllers;

use App\Models\Appdata;
use App\Models\Driver;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Session;

abstract class Controller
{
    //
    public $currentUser;
    public $currentLogin;
    public $appdata;

    public function __construct(){
        $this->currentUser = User::getCurrentUser();
        $this->appdata = Appdata::where('status',1)->first();

        if($this->currentUser){

            if($this->currentUser->status == 3 || $this->currentUser->status == 4 || $this->currentUser->status == 8){
                $this->currentLogin = Staff::where('phone',$this->currentUser->username)->first();
            }elseif($this->currentUser->status == 5){
                $this->currentLogin = Student::where('father_phone',$this->currentUser->username)->first();
            }elseif($this->currentUser->status == 6){
                $this->currentLogin = Driver::where('phone',$this->currentUser->username)->first();
            }
        }
    }

    public function logoutUser($message){ 
        Session::flush();
        // session('message',$message);
        return redirect()->route('admin.login')->with([
            'message'=> $message,
            'code'=> '304'
        ]);
        // return redirect()->route('admin.login');
    }

}
