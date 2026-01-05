<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studenthomework;
use App\Models\Homework;
use App\Models\Classes;
use App\Models\User;

class StudenthomeworkController extends Controller
{
    //
    public function studentHomework(Request $request){
        $data = Studenthomework::whereIn('status',[0,1])->get();
        
        // dd($data);
        return view('admin.pages.studentHomework',compact('data'));
    }

    public function studentHomeworkFilter(Request $request){
        // $homework = Homework::where('status',0)->get();
        $data = Studenthomework::join('classes','homework.class_id','classes.id')
        ->join('sections','homework.section_id','sections.id')
        ->select('homework.*','classes.class','sections.section','classes.id as c_id','sections.id as s_id')
        ->where('homework.status',1);

        if($request->name){
            $data = $data->where('homework.title', 'LIKE','%'.$request->name.'%');
        } 
        if($request->class_id){
            $data = $data->where('classes.id',$request->class_id);
        } 
        if($request->section_id){
            $data = $data->where('sections.id',$request->section_id);
        }
        $data = $data->get();
        // dd($data);
        return view('admin.pages.homework',compact('data'));
    }

    public function allStudentHomework(){
        try {
            $data = Studenthomework::all();
            return response()->json([
                'data'=>$data,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addStudentHomework(){
        $classes = Classes::where('status',1)->get();
        
        return view('admin.pages.addStudentHomework',compact('classes'));
    }

    public function updateStudentHomework(Request $request){
        $data = Homework::where('id',$request->id)->first();
        $classes = Classes::where('status',1)->get();
        
        return view('admin.pages.updateStudentHomework',compact('classes','data'));
    }
    public function createStudentHomework(Request $request){
        
        try{
            
            // dd($request->dob);
            if (!empty($request->allFiles())) {
                $file = $request->file('upload');
                $request->upload = 'homework/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->upload, 'public_uploads'); 

            } else{
                $request->upload = null;
            }

            $user = User::getCurrentUser();

            if($request->id){
                $student = Studenthomework::where('id',$request->id)->first();
            } else{
                $student = new Studenthomework();
            }

            $student->title = $request->title;
            $student->admin_username = $user->username;
            $student->class_id = $request->class_id;
            $student->section_id = $request->section_id;
            $student->subject_id = $request->subject_id;
            $student->due_date = date('d-m-Y',strtotime($request->due_date));
            $student->description = $request->description;

            $student->upload = $request->upload;
            $student->save();  

            return response()->json([
            'redirect'=> $request->header('referer'),
                'message'=> 'Data updated successfully',
                'response_code'=> '200',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
    
}
