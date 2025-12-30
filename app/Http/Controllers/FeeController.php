<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\StudentFee;

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

    // public function addFee(){
    //     $fee = Fee::where('status',1)->get();
    //     return view('admin.pages.addFee',compact('fee'));
    // }

    public function createFeeHead(Request $request) {
        try{
            if(!$request->id){
                $fee = new Fee();
                $fee->name = $request->name;
                $fee->amount = $request->amount;
                $fee->status = 1;
                $fee->save();
            } else {
                $fee = Fee::where('id',$request->id)->first();
                $fee->name = $request->name;
                $fee->amount = $request->amount;
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
        $fee = Fee::where('status',1)->get();
        $students = Student::where('status',1)->get();
        return view('admin.pages.generateFee',compact('fee','students'));
    }

    public function assignFee(Request $request){
        // dd($request->all());
        $data = [];
        $students = explode(',',$request->students);
        foreach ($students as $k=>$value) {
            $data[$k]['fee_id'] = $request->name;
            $data[$k]['student_id'] = $value;
        }
        // dd($data);
        $students = \DB::table('student_fees')->insert($data);
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Fee Assigned Successfully',
            'response_code'=> '200'
        ]);
    }
    
    public function generatedFee(){
        $fee = Fee::join('student_fees','fees.id','student_fees.fee_id')
        ->join('students','student_fees.student_id','students.id')
        ->select('students.roll_no','students.name','students.class','fees.amount','student_fees.id','student_fees.paid','student_fees.created_at','student_fees.status')
        ->where('student_fees.status',1)
        ->get();
        // dd($fee);
        return view('admin.pages.generatedFee',compact('fee'));
    }

    public function collectFee(Request $request){
        $feeCollect = StudentFee::where('id',$request->id)->first();
        $fee = Fee::where('id',$feeCollect->fee_id)->first();

        $feeCollect->paid += $request->paid;
        $feeCollect->updated_at = $request->updated_at;

        if($feeCollect->paid >= $fee->amount){
            $feeCollect->status = 2;
        }
        $feeCollect->save();
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Fee Collected Successfully',
            'response_code'=> '200'
        ]);
        
    }
}
