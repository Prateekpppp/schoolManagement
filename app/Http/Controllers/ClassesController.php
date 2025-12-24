<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    //
    public function classes(){
        $classes = Classes::where('status',1)->get();
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
        return view('admin.pages.addClass');
    }

    public function createClass(Request $request){
        try{
            $class = new Classes();
            $class->class_name = $request->class_name;
            $class->status = 1;
            $class->save();

            return response()->json([
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
}
