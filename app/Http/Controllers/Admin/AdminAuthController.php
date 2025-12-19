<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AdminAuthController extends Controller
{
    //
    public function login(Request $request){
        
        $user = User::where('username',$request->username)
        ->whereIn('status', [0])
        ->first();
        
        if(empty($user)){
            return redirect()->route('admin.login')->with([
                'message'=> 'Wrong User Credentials',
                'code'=> '304'
            ]);
        }

        if(Hash::check($request->password,$user->password)){
            Session::put([
                'admin_username'=>$user->username
            ]);
            return redirect()->route('admin.index');
        } else{
            return redirect()->route('admin.login')->with([
                'message'=> 'Wrong User Credentials',
                'code'=> '304'
            ]);
        }
    }
}
