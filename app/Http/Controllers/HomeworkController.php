<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Models\Classes;
use App\Models\User;

class HomeworkController extends Controller
{
    //
    public function homework(Request $request){
        $data = Homework::join('classes','homework.class_id','classes.id')
        ->join('sections','homework.section_id','sections.id')
        ->select('homework.*','classes.class','sections.section');

        if($this->currentUser->status == 4){
            $data = $data->where('homework.admin_username',$this->currentUser->username);
        }
        if($this->currentUser->status == 5){
            $data = $data->where('homework.class_id',$this->currentLogin->class)
            ->where('homework.section_id',$this->currentLogin->section);
        }
        $data = $data->where('homework.status',1)->get();
        
        // dd($data);
        return view('admin.pages.homework',compact('data'));
    }

    public function homeworkFilter(Request $request){
        // $homework = Homework::where('status',0)->get();
        $data = Homework::join('classes','homework.class_id','classes.id')
        ->join('sections','homework.section_id','sections.id')
        ->select('homework.*','classes.class','sections.section','classes.id as c_id','sections.id as s_id')
        ->where('homework.admin_username',$this->currentUser->username)
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
        if($this->currentUser->status > 2){
            $data = $data->where('homework.admin_username',$this->currentUser->username);
        }
        $data = $data->where('homework.status',1)->get();
        // dd($data);
        return view('admin.pages.homework',compact('data'));
    }

    public function allHomework(){
        try {
            $data = Homework::all();
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

    public function addHomework(){
        $classes = Classes::where('status',1)->get();
        
        return view('admin.pages.addHomework',compact('classes'));
    }

    public function updateHomework(Request $request){
        $data = Homework::join('classes','homework.class_id','classes.id')
        ->join('sections','homework.section_id','sections.id')
        ->join('subjects','homework.subject_id','subjects.id')
        ->select('homework.*','classes.class','sections.section','subjects.subject','sections.id as section_id','classes.id as class_id','subjects.id as subject_id')
        ->where('homework.id',$request->id)->first();
        $classes = Classes::where('status',1)->get();
        
        return view('admin.pages.updateHomework',compact('classes','data'));
    }
    
    public function createHomework(Request $request){
        
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
                $student = Homework::where('id',$request->id)->first();
            } else{
                $student = new Homework();
            }
            // dd($student);
            $student->title = $request->title;
            $student->admin_username = $user->username;
            $student->class_id = $request->class_id;
            $student->section_id = $request->section_id;
            $student->subject_id = $request->subject_id;
            $student->date = date('d-m-Y',strtotime($request->due_date));
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
