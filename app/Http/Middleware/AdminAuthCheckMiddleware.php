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
    
        if($currentUser->status > 2 && $currentUser->status < 5){
            $currentStaff = Staff::where('phone',$currentUser->username)->first();
            View::share('currentStaff',$currentStaff);
        }

        if($currentUser->status == 5){
            $currentStudent = Student::where('father_phone',$currentUser->username)->first();
            View::share('currentStudent',$currentStudent);
        }

        return $next($request);
    }
}
