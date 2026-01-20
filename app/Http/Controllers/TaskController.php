<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function task(Request $request){
        $data = Task::all();
        // dd($data);
        return view('principal.pages.task',compact('data'));
    }

    public function allTask(){
        $data = Task::all();
        return response()->json([
            'data'=>$data,
            'response_code'=> '200'
        ]);
    }

    public function updateTask(Request $request){
        $data = Task::where('id',$request->id)->first();
        
        return view('principal.pages.updateTask',compact('data'));
    }

    public function updateStatus(Request $request){
        $data = Task::where('id',$request->id)->update([
            'status'=>$request->status
        ]);
        
        return redirect()->back();
        return redirect()->route('principal.pages.task');
        // return response()->json([
        //     'redirect'=> $request->header('referer'),
        //     'message'=>'Task Updated Successfully',
        //     'response_code'=> '200'
        // ]);
    }

    public function createTask(Request $request) {
        try{
            if(!$request->id){
                $fee = new Task();
                $fee->title = $request->title;
                $fee->description = $request->description;
                $fee->remark = $request->remark;
                $fee->status = 0;
                $fee->admin_username = $this->currentUser->username;
                $fee->save();
            } else {
                $fee = Task::where('id',$request->id)->first();
                $fee->title = $request->title;
                $fee->description = $request->description;
                $fee->remark = $request->remark;
                // $fee->status = 0;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Task Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

}
