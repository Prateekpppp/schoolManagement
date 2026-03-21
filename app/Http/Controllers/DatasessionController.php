<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datasession;
use App\Models\User;

class DatasessionController extends Controller
{
    //
    public function dataSession(){
        $data = Datasession::all();
        return view('admin.pages.dataSession',compact('data'));
    }

    public function allDatasession(){
        try {
            $data = Datasession::where('status',1)->get();
            return response()->json([
                'data'=>$data,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addDatasession(){
        return view('admin.pages.addDatasession');
    }

    public function createDatasession(Request $request){
        try{
            $admin = User::getCurrentUser();
            // dd($admin);
            $class = new Datasession();
            $class->session_name = $request->session_name;
            $class->start_date = $request->start_date;
            $class->end_date = $request->end_date;
            $class->admin_username = $admin->username;
            $class->status = 1;
            $class->save();

            return response()->json([
                'message'=>'Session added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function changeSession(Request $request){

        $data = Datasession::where('session_name','!=',$request->session_name)->update([
            'status'=>0
        ]);
        $data = Datasession::where('session_name',$request->session_name)->first();
        $data->status = 1;
        $data->save();
        session(['session_name'=>$request->session_name]);
        session(['session_id'=>$data->id]);
        return redirect()->back();
    }
}
