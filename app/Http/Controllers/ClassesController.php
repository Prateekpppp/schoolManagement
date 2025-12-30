<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSection;
use App\Models\Classes;
use App\Models\Subject;

class ClassesController extends Controller
{
    //
    public function classes(){
        $classes = Classes::where('status',1)->get();
        
        // dd($classes);
        // foreach ($classes as $key => $value) {
        //     $section_d = json_decode($value->sections,true)[0];
        //     $section_d = ClassSection::where('id',$section_d)->first();
        //     dd($section_d->section_name);
        // }
        // $section_d = 
        return view('admin.pages.classes',compact('classes'));
    }

    public function allClasses(){
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

    public function addClass(){
        $classSections = ClassSection::where('status',1)->get();
        return view('admin.pages.addClass',compact('classSections'));
    }

    public function createClass(Request $request){
        // dd($request->all());
        
        try{
            if(!isset($request->id)){
                // $class = Classes::create(
                //     $request->all()
                // );
                $class = new Classes();
                $class->class_name = $request->class_name;
                $class->sections = json_encode($request->sections);
                $class->status = 1;
                $class->save();
            } else{
                $class= Classes::where('id',$request->id)->first();
                $class->sections = json_encode($request->sections);
                $class->subject = json_encode($request->subject);
                $class->class_name = $request->class_name;
                $class->save();
                // $class = Classes::updateOrCreate(
                //     ['id'=>$request->id],
                //     $request->all()
                // );
                return response()->json([
                    'redirect'=> $request->header('referer'),
                    'message'=>'Class Updated successfully',
                    'response_code'=>'200'
                ]);
            }

            return response()->json([
                'redirect'=> route('admin.pages.classes'),
                'message'=>'Class added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function manageClass(Request $request){
        $class = Classes::where('id',$request->id)->first();
        $cSections = [];
        $class->sections = json_decode($class->sections);
        if($class->sections){
            foreach ($class->sections as $key => $value) {
                $cSections[$value] = ClassSection::where('id',$value)->first()->section_name;
            }
        }
        $classSections = ClassSection::where('status',1)->get();
        
        $cSubject = [];
        $class->subject = json_decode($class->subject);
        if($class->subject){
            foreach ($class->subject as $key => $value) {
                $cSubject[$value] = Subject::where('id',$value)->first()->subject;
            }
        }
        $subject = Subject::where('status',1)->get();

        return view('admin.pages.manageClass',compact('class','classSections','cSections','subject','cSubject'));
    }

    public function remove_cSection(Request $request){
        // dd($request->all());
        $class = Classes::where('id',$request->class_id)->first();
        $cSections = json_decode($class->sections, true);
        $cSections = array_diff($cSections, [$request->section_id]);
        $cSections = json_encode($cSections);
        // unset($cSections[$request->section_id]);
        $class->sections = $cSections;
        $class->save();
        
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Section Removed successfully',
            'response_code'=>'200'
        ]);
        dd($cSections);

    }

    public function remove_cSubject(Request $request){
        // dd($request->all());
        $class = Classes::where('id',$request->class_id)->first();
        $cSections = json_decode($class->subject, true);
        $cSections = array_diff($cSections, [$request->subject_id]);
        $cSections = json_encode($cSections);
        // unset($cSections[$request->section_id]);
        $class->subject = $cSections;
        $class->save();
        
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Subject Removed successfully',
            'response_code'=>'200'
        ]);
        dd($cSections);

    }
}
