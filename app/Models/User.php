<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    //
    
    public static function getCurrentUser($key=NULL,$value=NULL){
        if($key != NULL && $value != NULL){

            return static::where($key, $value)->first();

        }
        
        $userData = Session::get('username');
        if(!empty($userData)){
            return static::where('username', $userData)->first();
        } else if($userData = Session::get('admin_username')){
            return static::where('username', $userData)->first();
        } else{
            return False;
            // return response()->json([
            //     'message'=>'User Not Found',
            //     'code'=>'404'
            // ]);
        }
    }
}
