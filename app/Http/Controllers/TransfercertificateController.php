<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transfercertificate;
use Illuminate\Http\Request;

class TransfercertificateController extends Controller
{
    //

    public function index(Request $request){

        $tcList = Transfercertificate::where('transfercertificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.*','classes.class as class_name','sections.section as section_name');
        
        $tcList = $tcList->joinSub($allstudents,'allstudents',function($join){
            $join->on('transfercertificates.student_id','allstudents.id');
        })
        ->select('transfercertificates.tc_no','transfercertificates.issue_date','transfercertificates.id as tc_id','allstudents.*');
        $tcList = $tcList->get();

        $students = $allstudents->get();

        if($request->tc_no){
            $data = Transfercertificate::where('tc_no',$request->tc_no)->first();
            if($data){
                return view('admin.pages.tc', compact('data','students','tcList'));
            }
        }
        return view('admin.pages.tc', compact('students','tcList'));
    }

    public function create(Request $request){
        try{
            $data = Transfercertificate::where('tc_no',$request->tc_no)->first();

            if(!$data){
                $data = new Transfercertificate();
            }
            
            $data->tc_no = $request->tc_no;
            $data->application_date = $request->application_date;
            $data->issue_date = $request->issue_date;
            $data->student_id = $request->student_id;
            $data->start_class = $request->start_class;
            $data->end_class = $request->end_class;
            $data->ncc = $request->ncc;
            $data->game_played = $request->game_played;
            $data->feedue = $request->feedue;
            $data->concession = $request->concession;
            $data->failed_last_class = $request->failed_last_class;
            $data->reason = $request->reason;
            $data->behaviour = $request->behaviour;
            $data->remark = $request->remark;
            $data->nationality = $request->nationality;
            $data->last_exam = $request->last_exam;
            $data->status = 1;
            $data->session_id = session('session_id');
            $data->save();

            return response()->json([
                'message'=> 'TC Updated Successfully',
                'response_code'=> '200',
            ]);

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function printTC(Request $request){

        $data = Transfercertificate::where('transfercertificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.id AS student_id','students.*','classes.class as class_name','sections.section as section_name');
        
        $data = $data->joinSub($allstudents,'allstudents',function($join){
            $join->on('transfercertificates.student_id','allstudents.id');
        })
        ->select(
        'transfercertificates.*',
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

        $data = $data->where('transfercertificates.tc_no',$request->tc_no)->first();
        return view('admin.pages.transferCertificate',compact('data'));
    }
}
