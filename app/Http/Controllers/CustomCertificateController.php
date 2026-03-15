<?php

namespace App\Http\Controllers;

use App\Models\CustomCertificate;
use App\Models\Student;
use Illuminate\Http\Request;

class CustomCertificateController extends Controller
{
    //

    public function index(Request $request){

        $tcList = CustomCertificate::where('custom_certificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.*','classes.class as class_name','sections.section as section_name');
        
        $tcList = $tcList->joinSub($allstudents,'allstudents',function($join){
            $join->on('custom_certificates.student_id','allstudents.id');
        })
        ->select('custom_certificates.ctm_no','custom_certificates.id as ctm_id','custom_certificates.issue_date','allstudents.*');
        $tcList = $tcList->get();

        $students = $allstudents->get();

        if($request->ctm_no){
            $data = CustomCertificate::where('ctm_no',$request->ctm_no)->first();
            if($data){
                return view('admin.pages.ctm', compact('data','students','tcList'));
            }
        }
        return view('admin.pages.ctm', compact('students','tcList'));
    }

    public function create(Request $request){
        try{
            $data = CustomCertificate::where('ctm_no',$request->ctm_no)->first();

            if(!$data){
                $data = new CustomCertificate();
            }
            
            $data->ctm_no = $request->ctm_no;
            $data->title = $request->title;
            $data->issue_date = $request->issue_date;
            $data->student_id = $request->student_id;
            $data->description = $request->description;
            $data->session_id = session('session_id');
            $data->save();

            return response()->json([
                'message'=> 'Certificate Updated Successfully',
                'response_code'=> '200',
            ]);

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function printCtm(Request $request){

        $data = CustomCertificate::where('custom_certificates.session_id',session('session_id'));

        $allstudents = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.session_id','=',session('session_id'))
        ->where('students.status',1)
        ->select('students.id AS student_id','students.*','classes.class as class_name','sections.section as section_name');
        
        $data = $data->joinSub($allstudents,'allstudents',function($join){
            $join->on('custom_certificates.student_id','allstudents.id');
        })
        ->select(
        'custom_certificates.*',
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

        $data = $data->where('custom_certificates.ctm_no',$request->ctm_no)->first();
        return view('admin.pages.customCertificate',compact('data'));
    }
}
