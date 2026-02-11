<?php

namespace App\Http\Controllers;

use App\Models\Eventcertificate;
use App\Models\Student;
use Illuminate\Http\Request;

class EventcertificateController extends Controller
{
    //

    public function index(Request $request){

        $tcList = Eventcertificate::where('eventcertificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.*','classes.class as class_name','sections.section as section_name');
        
        $tcList = $tcList->joinSub($allstudents,'allstudents',function($join){
            $join->on('eventcertificates.student_id','allstudents.id');
        })
        ->select('eventcertificates.ev_no','eventcertificates.id as ev_id','allstudents.*');
        $tcList = $tcList->get();

        $students = $allstudents->get();

        if($request->ev_no){
            $data = Eventcertificate::where('ev_no',$request->ev_no)->first();
            if($data){
                return view('admin.pages.ev', compact('data','students','tcList'));
            }
        }
        return view('admin.pages.ev', compact('students','tcList'));
    }

    public function create(Request $request){
        try{
            $data = Eventcertificate::where('ev_no',$request->ev_no)->first();

            if(!$data){
                $data = new Eventcertificate();
            }
            
            $data->ev_no = $request->ev_no;
            $data->event = $request->event;
            $data->issue_date = $request->issue_date;
            $data->student_id = $request->student_id;
            $data->achievment_in = $request->achievment_in;
            $data->rank = $request->rank;
            $data->session_id = session('session_id');
            $data->save();

            return response()->json([
                'message'=> 'Event Updated Successfully',
                'response_code'=> '200',
            ]);

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function printEv(Request $request){

        $data = Eventcertificate::where('eventcertificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.id AS student_id','students.*','classes.class as class_name','sections.section as section_name');
        
        $data = $data->joinSub($allstudents,'allstudents',function($join){
            $join->on('eventcertificates.student_id','allstudents.id');
        })
        ->select(
        'eventcertificates.*',
        'allstudents.name',
        'allstudents.father_name',
        'allstudents.mother_name',
        'allstudents.religion',
        'allstudents.caste',
        'allstudents.dob',
        'allstudents.admission_no',
        'allstudents.class_name',
        'allstudents.section_name',
        'allstudents.created_at',
        );

        $data = $data->where('eventcertificates.ev_no',$request->ev_no)->first();
        return view('admin.pages.EventCertificate',compact('data'));
    }
}
