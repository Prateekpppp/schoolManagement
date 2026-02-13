<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    //

    public function index(Request $request){

        $tcList = Syllabus::where('syllabi.session_id',session('session_id'));

        $tcList = $tcList->join('classes','classes.id','syllabi.class')
        ->join('subjects','subjects.id','syllabi.subject')
        ->select('syllabi.*','classes.class as class_name','subjects.subject as subject_name');

        $tcList = $tcList->get();

        if($request->id){
            $data = Syllabus::where('id',$request->id)->first();
            if($data){
                return view('admin.pages.syllabus', compact('data','tcList'));
            }
        }
        return view('admin.pages.syllabus', compact('tcList'));
    }

    public function create(Request $request){
        try{
            if($request->id){
                $data = Syllabus::where('id',$request->id)->first();
            } else{
                $data = new Syllabus();
            }
            
            $data->class = $request->class;
            $data->subject = $request->subject;
            $data->topic = $request->topic;
            $data->date = $request->date;
            $data->description = $request->description;
            $data->session_id = session('session_id');
            $data->save();

            return response()->json([
                'message'=> 'Syllabus Updated Successfully',
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
