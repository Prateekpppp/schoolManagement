<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\Subject;

class ExamController extends Controller
{
    //
    public function exam(){
        $exam = Exam::join('classes','exams.class','classes.id')
        ->join('subjects','exams.subject','subjects.id')
        ->select('exams.*','classes.class','subjects.subject')
        ->where('exams.status',1)->get();
        $classes = Classes::where('status',1)->get();
        $subject = Subject::where('status',1)->get();
        
        return view('admin.pages.exam',compact('exam','classes','subject'));
    }
    
    public function allExam(){
        try {
            $classes = Classes::where('status',1)->get();
            return response()->json([
                'data'=>$classes,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
    
    public function updateExam(Request $request){
        $data = Exam::where('exams.id',$request->id)->first();
        $classes = Classes::where('status',1)->get();
        $subject = Subject::where('status',1)->get();
        
        return view('admin.pages.updateExam',compact('data','classes','subject'));
    }

    public function createExam(Request $request){
        // dd($request->all());
        
        try{
            if(!isset($request->id)){
                // $class = Classes::create(
                //     $request->all()
                // );
                $class = new Exam();
                $class->exam_code = $request->exam_code;
                $class->subject = $request->subject;
                $class->class = $request->class;
                $class->date = $request->date;
                $class->room_code = $request->room_code;
                $class->time = $request->time;
                $class->status = 1;
                $class->save();
            } else{
                $class= Exam::where('id',$request->id)->first();
                $class->exam_code = $request->exam_code;
                $class->subject = $request->subject;
                $class->class = $request->class;
                $class->date = $request->date;
                $class->room_code = $request->room_code;
                $class->time = $request->time;
                $class->save();
                // $class = Classes::updateOrCreate(
                //     ['id'=>$request->id],
                //     $request->all()
                // );
                return response()->json([
                    'redirect'=> $request->header('referer'),
                    'message'=>'Exam Updated successfully',
                    'response_code'=>'200'
                ]);
            }

            return response()->json([
                'redirect'=> route('admin.pages.exam'),
                'message'=>'Exam added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
}
