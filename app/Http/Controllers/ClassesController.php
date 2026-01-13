<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSection;
use App\Models\ClassSubject;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Section;

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
        $section = Section::where('status',1)->get();
        return view('admin.pages.addClass',compact('section'));
    }

    public function createClass(Request $request){
        // dd($request->all());
        
        try{
            if(!isset($request->id)){
                // $class = Classes::create(
                //     $request->all()
                // );
                $class = new Classes();
                $class->class = $request->class;
                $class->status = 1;
                $class->save();
            } else{
                dd($request->subject);
                $class= Classes::where('id',$request->id)->first();
                $class->class = $request->class;
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
                'redirect'=> $request->header('referer'),
                'message'=>'Class Added successfully',
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
        
        $sections = Section::where('status',1)->get();
        $subjects = Subject::where('status',1)->get();

        $section = ClassSection::join('sections','class_sections.section_id','sections.id')
        ->select('sections.section','class_sections.id')
        ->where('class_id',$request->id)->get();
        
        $subject = ClassSubject::join('subjects','class_subjects.subject_id','subjects.id')
        ->select('subjects.subject','class_subjects.id')
        ->where('class_id',$request->id)->get();

        return view('admin.pages.manageClass',compact('class','sections','subjects','section','subject'));
    }

    public function updateClass(Request $request){
        
        try{
            if(!isset($request->id)){
                return response()->json([
                    'message'=> 'Something went wrong',
                    'response_code'=> '500',
                ]);
            } else{
                // dd($request->section);
                $class= Classes::where('id',$request->id)->first();
                $class->class = $request->class;
                $class->save();
                // ClassSection::where('class_id',$request->id)->delete();
                // ClassSubject::where('class_id',$request->id)->delete();
                // dd($request->section);
                if(isset($request->section)){
                    foreach ($request->section as $key => $value) {
                        // dd('$value',$value);
                        // ClassSection::create([
                        //     'class_id'=>$request->id,
                        //     'section_id'=>$value
                        // ]);
                        $classSection = ClassSection::where('section_id',$value)->where('class_id',$class->id)->first();
                        // dd($classSection);
                        if($classSection){
                            continue;
                        }else{
                            $classSection = new ClassSection();
                            $classSection->class_id = $request->id;
                            $classSection->section_id = $value;
                            $classSection->save();
                        }
                    }
                }

                if(isset($request->subject)){
                    foreach ($request->subject as $key => $value) {
                        
                        // ClassSubject::create([
                        //     'class_id'=>$request->id,
                        //     'subject_id'=>$value
                        // ]);
                        $classSection = ClassSubject::where('subject_id',$value)->where('class_id',$class->id)->first();
                        if($classSection){
                            continue;
                        }else{
                            $classSection = new ClassSubject();
                            $classSection->class_id = $request->id;
                            $classSection->subject_id = $value;
                            $classSection->save();
                        }
                    }
                }
                $classSections = ClassSection::where('section_id',$request->id)->get();
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
                'message'=>'Class Added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
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
