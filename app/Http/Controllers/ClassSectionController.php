<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSection;

class ClassSectionController extends Controller
{
    //
    public function classSections(){
        $classSections = ClassSection::where('status',1)->get();
        return view('admin.pages.classSections',compact('classSections'));
    }

    public function allClassSections(){
        try {
            $classSections = ClassSection::where('status',1)->get();
            return response()->json([
                'data'=>$classSections,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addClassSection(){
        return view('admin.pages.addClassSection');
    }

    public function createClassSection(Request $request){
        try{
            // dd($request->id);
            if(isset($request->id)){
                ClassSection::updateOrCreate(
                    ['id'=>$request->id],
                    $request->all()
                );
            } else{
                $section = new ClassSection();
                $section->section_name = $request->section_name;
                $section->status = 1;
                $section->save();
            }

            return response()->json([
                'redirect'=> route('admin.pages.classSections'),
                'message'=>'Class Section added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function editClassSection(Request $request){
        $classSection = ClassSection::where('id',$request->id)->first();
        return view('admin.pages.addClassSection',compact('classSection'));
    }
}
