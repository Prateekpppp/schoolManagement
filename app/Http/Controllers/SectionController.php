<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSection;
use App\Models\ClassSubject;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Fee;

class SectionController extends Controller
{
    //
    public function section(){
        $section = Section::where('status',1)->get();
        return view('admin.pages.section',compact('section'));
    }

    public function allSection(){
        try {
            $section = Section::where('status',1)->get();
            return response()->json([
                'data'=>$section,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addSection(){
        $section = Section::where('status',1)->get();
        return view('admin.pages.addSection',compact('section'));
    }

    public function createSection(Request $request){
        try{
            // dd($request->id);
            if(isset($request->id)){
                // Section::updateOrCreate(
                //     ['id'=>$request->id],
                //     $request->all()
                // );
                $section = Section::where('id',$request->id)->first();
                $section->section = $request->section;
                $section->status = 1;
                $section->save();
            } else{
                $section = new Section();
                $section->section = $request->section;
                $section->status = 1;
                $section->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Section Updated successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function manageSection(Request $request){
        $classSection = Section::where('id',$request->id)->first();
        return view('admin.pages.section',compact('section'));
    }

    public function getSectionsByClass(Request $request){
        $section = ClassSection::join('sections','class_sections.section_id','sections.id')
        ->select('sections.*','class_sections.class_id')
        ->where('class_id',$request->class_id)->get();

        $subject = ClassSubject::join('subjects','class_subjects.subject_id','subjects.id')
        ->select('subjects.*','class_subjects.class_id')
        ->where('class_id',$request->class_id)->get();
        
        $fees = Classes::join('fees','fees.class','classes.id')
        ->select('fees.*','classes.id')
        ->where('classes.id',$request->class_id)
        ->get();

        return response()->json([
            'section'=>$section,
            'subject'=>$subject,
            'fee'=>$fees,
            'response_code'=>'200'
        ]);
    }
}
