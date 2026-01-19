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

class CustomAdminSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(session('session_id'));
        $appdata = Appdata::where('status',1)->first();
        View::share('appdata',$appdata);
        
        $dataSession = Datasession::where('status',1)->get();
        View::share('dataSession',$dataSession);
        
        $globalClasses = Classes::where('status',1)->get();
        View::share('globalClasses',$globalClasses);

        $currentUser = User::getCurrentUser();
        View::share('currentUser',$currentUser);

        if($currentUser->status == 3){
            $currentPrincipal = Staff::where('phone',$currentUser->username)->first();
            View::share('currentPrincipal',$currentPrincipal);
        }
        
        if($currentUser->status == 4){
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
