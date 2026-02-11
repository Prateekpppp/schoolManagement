<?php

namespace App\Http\Controllers;

use App\Models\Migratecertificate;
use App\Models\Student;
use Illuminate\Http\Request;

class MigratecertificateController extends Controller
{
    //

    public function index(Request $request){

        $tcList = Migratecertificate::where('migratecertificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.*','classes.class as class_name','sections.section as section_name');
        
        $tcList = $tcList->joinSub($allstudents,'allstudents',function($join){
            $join->on('migratecertificates.student_id','allstudents.id');
        })
        ->select('migratecertificates.mg_no','migratecertificates.id as mg_id','allstudents.*');
        $tcList = $tcList->get();

        $students = $allstudents->get();

        if($request->mg_no){
            $data = Migratecertificate::where('mg_no',$request->mg_no)->first();
            if($data){
                return view('admin.pages.mg', compact('data','students','tcList'));
            }
        }
        return view('admin.pages.mg', compact('students','tcList'));
    }

    public function create(Request $request){
        try{
            $data = Migratecertificate::where('mg_no',$request->mg_no)->first();

            if(!$data){
                $data = new Migratecertificate();
            }
            
            $data->mg_no = $request->mg_no;
            $data->application_date = $request->application_date;
            $data->issue_date = $request->issue_date;
            $data->student_id = $request->student_id;
            $data->from_date = $request->from_date;
            $data->to_date = $request->to_date;
            $data->session_id = session('session_id');
            $data->save();

            return response()->json([
                'message'=> 'Migration Updated Successfully',
                'response_code'=> '200',
            ]);

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function printMg(Request $request){

        $data = Migratecertificate::where('migratecertificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.id AS student_id','students.*','classes.class as class_name','sections.section as section_name');
        
        $data = $data->joinSub($allstudents,'allstudents',function($join){
            $join->on('migratecertificates.student_id','allstudents.id');
        })
        ->select(
        'migratecertificates.*',
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

        $data = $data->where('migratecertificates.mg_no',$request->mg_no)->first();
        return view('admin.pages.migrationCertificate',compact('data'));
    }
}
