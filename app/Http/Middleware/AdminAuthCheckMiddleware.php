<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Appdata;
use App\Models\Datasession;
use App\Models\Classes;
use App\Models\Driver;
use App\Models\Notification;
use App\Models\Staff;
use App\Models\Student;

class AdminAuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::get('admin_username')) {
            return redirect()->route('admin.login');
        }
            
        $currentUser = User::getCurrentUser();
        View::share('currentUser',$currentUser);
    
        // if($currentUser->status > 2 && $currentUser->status < 5){
        if($currentUser->status == 3 || $currentUser->status == 4 || $currentUser->status == 8){
            $currentLogin = Staff::where('phone',$currentUser->username)->first();
            View::share('currentLogin',$currentLogin);
        }elseif($currentUser->status == 5){
            $currentLogin = Student::where('father_phone',$currentUser->username)->first();
            View::share('currentLogin',$currentLogin);
        }elseif($currentUser->status == 6){
            $currentLogin = Driver::where('phone',$currentUser->username)->first();
            View::share('currentLogin',$currentLogin);
        }

        // $notification = Notification::where('status',0)->where('role',$currentUser->status)->count();
        // View::share('notification',$notification);
    

        return $next($request);
    }
}
