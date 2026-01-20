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
        // dd($appdata->stamp);
        $dataSession = Datasession::where('status',1)->get();
        View::share('dataSession',$dataSession);
        
        $globalClasses = Classes::where('status',1)->get();
        View::share('globalClasses',$globalClasses);


        return $next($request);
    }
}
