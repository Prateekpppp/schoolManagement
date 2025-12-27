<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Classes;

class SubjectController extends Controller
{
    //
    public function subject(){
        $subject = Subject::where('status',1)->get();
        return view('admin.pages.subject',compact('subject'));
    }

    public function allSubject(){
        try {
            $subject = Subject::where('status',1)->get();
            return response()->json([
                'data'=>$subject,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addSubject(){
        $classes = Classes::where('status',1)->get();
        return view('admin.pages.addSubject',compact('classes'));
    }

    public function createSubject(Request $request){
        // dd($request->all());
        $request->class = json_encode($request->class);
        // dd($request->class);
        try{
            if(!isset($request->id)){
                // $class = Subject::create(
                //     $request->all()
                // );
                $subject = new Subject();
                $subject->subject = $request->subject;
                $subject->class = $request->class;
                $subject->status = 1;
                $subject->save();
            } else{
                $class = Subject::updateOrCreate(
                    ['id'=>$request->id],
                    $request->all()
                );
                return response()->json([
                    'message'=>'Subject Updated successfully',
                    'response_code'=>'200'
                ]);
            }

            return response()->json([
                'message'=>'Subject added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function manageSubject(Request $request){
        $subject = Subject::where('id',$request->id)->first();
        $classes = [];
        $subject->class = json_decode($subject->class);
        // dd($subject->class);
        foreach ($subject->class as $key => $value) {
            $classes[$value] = Classes::where('id',$value)->first()->class_name;
        }
        $class = Classes::where('status',1)->get();
        // dd($classes);
        return view('admin.pages.manageSubject',compact('subject','class','classes'));
    }

    public function removeClass(Request $request){
        // dd($request->all());
        $subject = Subject::where('id',$request->subject_id)->first();
        $class = json_decode($subject->class, true);
        $class = array_diff($class, [$request->class_id]);
        $class = json_encode($class);
        // unset($cSections[$request->section_id]);
        $subject->class = $class;
        $subject->save();
        
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Class Removed successfully',
            'response_code'=>'200'
        ]);
        dd($cSections);

    }
}
