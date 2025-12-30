<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;

class FeeController extends Controller
{
    //
    public function feeHead(Request $request){
        $fee = Fee::where('status',1)->get();
        return view('admin.pages.feeHead',compact('fee'));
    }

    public function allFeeHead(){
        $fee = Fee::where('status',1)->get();
        return response()->json([
            'data'=>$fee,
            'response_code'=> '200'
        ]);
    }

    public function createFeeHead(Request $request) {
        try{
            if(!$request->id){
                $fee = new Fee();
                $fee->name = $request->name;
                // $fee->amount = $request->amount;
                $fee->status = 1;
                $fee->save();
            } else {
                $fee = Fee::where('id',$request->id)->first();
                $fee->name = $request->name;
                // $fee->amount = $request->amount;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Fee Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function generateFee(){
        $students = 
        return view('admin.pages.generateFee',compact('fee'));
    }
}
