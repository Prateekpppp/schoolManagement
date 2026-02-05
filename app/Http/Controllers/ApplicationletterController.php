<?php

namespace App\Http\Controllers;

use App\Models\Applicationletter;
use Illuminate\Http\Request;

class ApplicationletterController extends Controller
{
    //
    public function read(Request $request){
        $data = Applicationletter::join('staff','applicationletters.admin_username','=','staff.phone')
        ->select('applicationletters.*','staff.name as staff_name');
        if($this->currentUser->status > 3){
            $data = $data->where('applicationletters.admin_username',$this->currentLogin->phone);
        }
        $data = $data->orderBy('applicationletters.id','desc')->get();
        // dd($data);
        return view('admin.pages.applicationletter',compact('data'));
    }

    public function allTask(){
        $data = Applicationletter::all();
        return response()->json([
            'data'=>$data,
            'response_code'=> '200'
        ]);
    }

    public function updateApplicationletter(Request $request){
        $data = Applicationletter::where('id',$request->id)->first();
        
        return view('admin.pages.updateApplicationletter',compact('data'));
    }

    public function create(Request $request) {
        try{

            if(!$request->id){
                $fee = new Applicationletter();
                $fee->title = $request->title;
                $fee->description = $request->description;
                $fee->date = $request->date;
                $fee->admin_username = $this->currentLogin->phone;
                $fee->status = 0;
                $fee->save();
            } else {
                $fee = Applicationletter::where('id',$request->id)->first();
                $fee->title = $request->title;
                $fee->description = $request->description;
                $fee->date = $request->date;
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
