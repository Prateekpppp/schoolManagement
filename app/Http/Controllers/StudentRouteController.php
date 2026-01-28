<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\DriverRoute;
use App\Models\StudentRoute;
use App\Models\ScRoute;
use App\Models\Student;
use App\Models\Vehicle;

class StudentRouteController extends Controller
{
    //

    public function assignedStudentRoute(){
        $data = StudentRoute::join('students','student_routes.student_id','students.id')
        ->join('sc_routes','student_routes.sc_route_id','sc_routes.id')
        ->get(['students.name','students.roll_no','student_routes.*','sc_routes.route_name']);
        return view('admin.pages.assignedStudentRoute',compact('data'));
    }

    public function assignStudentRoute(Request $request){
        $students = Student::where('status',1)->get();
        $routes = ScRoute::where('status',1)->get();
        return view('admin.pages.assignStudentRoute',compact('students','routes'));
    }

    public function createStudentRoute(Request $request){
        // dd($request->all());
        try {
            if($request->id){
                $driverRoute = StudentRoute::where('id',$request->id)->first();
                $driverRoute->sc_route_id = $request->sc_route_id;
                $driverRoute->student_id = $request->student_id;
                $driverRoute->save();

                return response()->json([
                    'redirect'=> $request->header('referer'),
                    'message'=>'Route updated for Student successfully',
                    'response_code'=>'200'
                ]);
            }
            $driverRoute = new StudentRoute();
            $driverRoute->sc_route_id = $request->sc_route_id;
            $driverRoute->student_id = $request->student_id;
            $driverRoute->status = 1;
            $driverRoute->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Route assigned to Student successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function updateStudentRoute(Request $request){
        $data = StudentRoute::where('id',$request->id)->first();
        dd($data);
        $student = Student::where('id',$data->student_id)->get();
        // dd($student);
        $routes = ScRoute::where('status',1)->get();
        return view('admin.pages.assignStudentRoute',compact('data','student','routes'));
    }
}
