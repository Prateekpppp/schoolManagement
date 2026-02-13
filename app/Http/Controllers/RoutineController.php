<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    //

    public function index(Request $request){

        $tcList = Routine::where('routines.session_id',session('session_id'));

        $tcList = $tcList->join('classes','classes.id','routines.class')
        ->join('sections','sections.id','routines.section')
        ->select('routines.*','classes.class as class_name','sections.section as section_name');

        $tcList = $tcList->get();

        if($request->id){
            $data = Routine::where('id',$request->id)->first();
            if($data){
                return view('admin.pages.routines', compact('data','tcList'));
            }
        }
        return view('admin.pages.routines', compact('tcList'));
    }

    public function create(Request $request){
        try{
            if($request->id){
                $data = Routine::where('id',$request->id)->first();
            } else{
                $data = new Routine();
            }
            
            $data->class = $request->class;
            $data->section = $request->section;
            $data->date = $request->date;
            $data->description = $request->description;
            $data->session_id = session('session_id');
            $data->save();

            return response()->json([
                'message'=> 'Routine Updated Successfully',
                'response_code'=> '200',
            ]);

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function view(Request $request){

        $data = Routine::where('custom_certificates.session_id',session('session_id'));

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
