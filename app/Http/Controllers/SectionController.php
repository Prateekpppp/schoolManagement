<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    //
    public function section(){
        $section = Section::where('status',1)->get();
        return view('admin.pages.section',compact('section'));
    }

    public function allsection(){
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
        return view('admin.pages.addSection');
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
                $section->section_name = $request->section_name;
                $section->status = 1;
                $section->save();
            } else{
                $section = new Section();
                $section->section_name = $request->section_name;
                $section->status = 1;
                $section->save();
            }

            return response()->json([
                'redirect'=> route('admin.pages.section'),
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

    public function manageSection(Request $request){
        $classSection = Section::where('id',$request->id)->first();
        return view('admin.pages.section',compact('section'));
    }
}
