<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datasession;

class DatasessionController extends Controller
{
    //
    public function dataSession(){
        $data = Datasession::where('status',1)->get();
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
            $class = new Datasession();
            $class->session_name = $request->session_name;
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
}
