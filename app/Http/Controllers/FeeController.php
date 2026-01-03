<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Classes;
use App\Models\StudentFee;
use App\Models\Transaction;

class FeeController extends Controller
{
    //
    public function feeHead(Request $request){
        $fee = Fee::join('classes','classes.id','fees.class')
        ->select('fees.*','classes.class')
        ->where('fees.status',1)->get();
        $classes = Classes::where('status',1)->get();
        return view('admin.pages.feeHead',compact('fee','classes'));
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
                $fee->class = $request->class;
                $fee->period = $request->period;
                $fee->amount = $request->amount;
                $fee->status = 1;
                $fee->save();
            } else {
                $fee = Fee::where('id',$request->id)->first();
                $fee->name = $request->name;
                $fee->class = $request->class;
                $fee->period = $request->period;
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

    public function generateFee(Request $request){
        $fee = Fee::where('status',1)->get();
        $students = Student::where('status',1)->get();
        return view('admin.pages.generateFee',compact('fee','students'));
    }

    public function assignFee(Request $request){
        // dd($request->all());
        $fee = Fee::where('status',1)->get();
        $data = [];
        // $students = explode(',',$request->students);
        $students = $request->students;
        foreach ($students as $k=>$value) {
            $data['student_id'] = $value;
            foreach($fee as $feetype){
                // $data['fee_id'] = $feetype->id;
                // $studentFee = StudentFee::where('student_id',$data['student_id'])->where('fee_id',$feetype->id)->where('status',1)->first();
                $studentFee = StudentFee::where('student_id',$data['student_id'])->where('fee_id',$feetype->id)->first();
                dd($studentFee);
                if($studentFee){
                    if(date('M Y',$studentFee->created_at) != now()->format('M Y')){
                        // update fee
                        if($studentFee->status==1){
                            $studentFee->fee += $feetype->amount;
                            $studentFee->save();
                        }
                    } else{
                        continue;
                    }
                }
                
                // dd(date('M Y',$studentFee->created_at)==now()->format('M Y'));

                $studentFee = new StudentFee();
                $studentFee->student_id = $data['student_id'];
                $studentFee->fee_id = $feetype->id;
                $studentFee->fee = $feetype->amount;
                $studentFee->save();
            }
        }
        // dd($data);
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

        $transactionData = Transaction::max('id') + 1;
        
        $transaction = new Transaction();
        $transaction->receipt_no = sprintf('%06d', $transactionData);
        $transaction->title = $fee->name;
        $transaction->student_id = $feeCollect->student_id;
        $transaction->transaction_amount = $request->paid;
        $transaction->transaction_id = $request->transaction_id;
        $transaction->date = $request->date;
        $transaction->payment_method = $request->payment_method;
        $transaction->save();

        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Fee Collected Successfully',
            'response_code'=> '200'
        ]);
        
    }

    public function receipt(Request $request){
        $data = Transaction::all();
        return view('admin.pages.receipt',compact('data'));
    }

    public function feeHistory(Request $request){
        
    }
}
