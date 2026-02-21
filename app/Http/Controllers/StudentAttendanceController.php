<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentAttendanceController extends Controller
{
    //
    public function create(Request $request){
        try{

            $request->date = Carbon::parse($request->date)->format('d-m-Y');
            dd($request->all());

            foreach ($request->data as $k => $value) {
                $data = StudentAttendance::updateOrCreate(
                    [
                        'student_id'=>$k,
                        'date'=>$request->date
                    ],
                    [
                        'student_id'=>$k,
                        'status'=>$value,
                        'date'=>$request->date,
                        'session_id'=>session('session_id')
                    ]
                );
            }
            
            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Attendance Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function createSingle(Request $request){
        try{

            // dd($request->all());

            foreach ($request->data as $k => $value) {
                $data = StudentAttendance::updateOrCreate(
                    [
                        'student_id'=>$k,
                        'date'=>$request->date
                    ],
                    [
                        'student_id'=>$k,
                        'status'=>$value,
                        'date'=>$request->date,
                        'session_id'=>session('session_id')
                    ]
                );
            }
            
            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Attendance Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function read(Request $request){

        try{

            if(!$request->date){
                return view('admin.pages.studentAttendance');
            }
            $request->date = Carbon::parse($request->date)->format('d-m-Y');
            $attendance = StudentAttendance::where('date',$request->date);

            $data = Student::join('classes','students.class','=','classes.id')
            ->join('sections','students.section','=','sections.id')
            ->leftJoinSub($attendance,'attendance',function($join){
                $join->on('students.id','attendance.student_id');
            })
            ->select('students.*','classes.class','sections.section','attendance.status as attendStatus')
            ->where('students.status',1);
            // ->get();
            
            if($request->name){
                $data = $data->where('students.name','like','%'.$request->name.'%');
            } 
            
            if($request->class_id){
                $data = $data->where('students.class',$request->class_id);
            }
            
            if($request->section_id){
                $data = $data->where('students.section',$request->section_id);
            }

            if($request->id){
                $data = $data->where('students.id',$request->id);
            }
            
            $data = $data->get();
            // dd($data);
            return view('admin.pages.studentAttendance',compact('data','request'));
            
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function attendanceById(Request $request){

        dd(now()->month);
        try{
            $request->student_id = $this->currentLogin->id;

            $data = StudentAttendance::where('student_id',$request->student_id);

            return view('admin.pages.studentAttendance',compact('data','request'));

        } catch(\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }
}
