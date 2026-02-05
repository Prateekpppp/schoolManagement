<?php

namespace App\Http\Controllers;

use App\Models\Expanse;
use Illuminate\Http\Request;

class ExpanseController extends Controller
{
    //
    public function read(Request $request){
        $data = Expanse::leftJoin('staff','expanses.admin_username','=','staff.phone')
        ->select('expanses.*','staff.name as staff_name');
        if($this->currentUser->status > 3){
            $data = $data->where('expanses.admin_username',$this->currentUser->username);
        }
        $data = $data->orderBy('expanses.id','desc')->get();
        // dd($data);
        return view('admin.pages.expanse',compact('data'));
    }

    public function allTask(){
        $data = Expanse::all();
        return response()->json([
            'data'=>$data,
            'response_code'=> '200'
        ]);
    }

    public function update(Request $request){
        $data = Expanse::where('id',$request->id)->first();
        
        return view('admin.pages.updateExpanse',compact('data'));
    }

    public function create(Request $request) {
        try{

            if(!$request->id){
                $fee = new Expanse();
                $fee->title = $request->title;
                $fee->description = $request->description;
                $fee->date = $request->date;
                $fee->amount = $request->amount;
                $fee->admin_username = $this->currentUser->username;
                $fee->status = 0;
                $fee->save();
            } else {
                $fee = Expanse::where('id',$request->id)->first();
                $fee->title = $request->title;
                $fee->description = $request->description;
                $fee->date = $request->date;
                $fee->amount = $request->amount;
                // $fee->status = 0;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Data Updated Successfully',
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
