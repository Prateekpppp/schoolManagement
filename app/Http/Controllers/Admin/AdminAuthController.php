<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Datasession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class AdminAuthController extends Controller
{
    //
    public function login(Request $request){
        
        $user = User::where('username',$request->username)
        // ->where('status', '>', 0)
        // ->whereIn('status', [1])
        ->where('status', '!=', 0)
        ->first();
        // dd($request->remember_me);
        if(empty($user)){
            return redirect()->route('admin.login')->with([
                'message'=> 'Wrong User Credentials',
                'code'=> '304'
            ]);
        }

        // if(Hash::check($request->password,$user->password)){
        if($request->password == $user->password){
            Session::put([
                'admin_username'=>$user->username
            ]);
            if($request->remember_me == 'on'){
                Cookie::queue('admin_username', $user->username, 21900);
            }
            // $currentDate
            $data = Datasession::latest()->first();
            session(['session_name'=>$data->session_name]);
            session(['session_id'=>$data->id]);
            return redirect()->route('admin.index');
        } else{
            return redirect()->route('admin.login')->with([
                'message'=> 'Wrong User Credentials',
                'code'=> '304'
            ]);
        }
    }
}
