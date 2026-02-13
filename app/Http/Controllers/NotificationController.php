<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //

    public function index(Request $request){

        $tcList = Notification::where('status',0);

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

            $data = new Notification();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->date = $request->date;
            $data->role = $this->currentUser->status;
            $data->status = 0;
            $data->session_id = session('session_id');
            $data->save();

            return response()->json([
                'message'=> 'Notification Created Successfully',
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
