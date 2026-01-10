<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Feeinvoice;
use App\Models\StudentFee;
use App\Models\Transaction;


class FeeinvoiceController extends Controller
{
    //

    public function feeInvoice(){
        $fee = Feeinvoice::join('students','feeinvoices.student_id','students.id')
        ->join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->select('students.roll_no','students.name','students.father_name','classes.class','feeinvoices.*','students.admission_no','sections.section')
        // ->where('feeinvoices.status',1)
        ->get();

        // $fee = StudentFee::join('students','students.student_id','student.id')
        // ->select('students.*','student_fees.fee')
        // ->join('fees','fees.id','student_fees.fee_id')
        // dd($fee);
        return view('admin.pages.feeInvoice',compact('fee'));
    }

    public function genrateFeeInvoice(Request $request){
        // dd($request->all());
        $data = [];
        // $students = explode(',',$request->students);
        $students = $request->students;
        // dd($students);
        foreach ($students as $k=>$value) {

            // assigned fees data
            $totalFee = StudentFee::where('student_id',$value)->sum('fee');
            // dd($totalFee);
            $feeInvoice = Feeinvoice::where('student_id',$value)
            ->where('month',date('M'))
            ->first();

            if($feeInvoice){
                continue;
            }
            
            // dd(date('M Y',$studentFee->created_at)==now()->format('M Y'));

            $feeInvoice = new Feeinvoice();
            $feeInvoice->student_id = $value;
            // $feeInvoice->class_id = $request->class_id;
            $feeInvoice->month = date('M');
            $feeInvoice->total_amount = $totalFee;
            $feeInvoice->payable = $totalFee;
            $feeInvoice->invoice_date = now();
            $feeInvoice->status = 0;
            $feeInvoice->save();
        }
        // dd($data);
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Fee Invoice Generated Successfully',
            'response_code'=> '200'
        ]);
    }

    public function createFeeInvoice($request){
        try{

            $feeInvoice = Feeinvoice::where('student_id',$request->student_id)
            ->where('month',$request->month)
            ->first();

            if(!$feeInvoice){
                $feeInvoice = new Feeinvoice();
                $feeInvoice->student_id = $request->student_id;
                // $feeInvoice->class_id = $request->class_id;
                $feeInvoice->month = $request->month;
                $feeInvoice->payable = $request->payable;
                $feeInvoice->invoice_date = $request->invoice_date;
                $feeInvoice->save();
            }

            return response()->json([
                'message'=> 'Fee Invoice Created Successfully',
                'response_code'=> '200',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function createFeeInvoiceOld(Request $request){
        try{
            $feeInvoice = Feeinvoice::where('student_id',$request->student_id)
            ->where('month',$request->month)
            ->first();

            if(!$feeInvoice){
                $feeInvoice = new Feeinvoice();
                $feeInvoice->student_id = $request->student_id;
                // $feeInvoice->class_id = $request->class_id;
                $feeInvoice->month = $request->month;
                $feeInvoice->payable = $request->payable;
                $feeInvoice->invoice_date = $request->invoice_date;
                $feeInvoice->save();
            }

            return response()->json([
                'message'=> 'Fee Invoice Created Successfully',
                'response_code'=> '200',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
    
    public function updateFeeInvoice(Request $request){
        $data = Feeinvoice::where('id',$request->id)->first();
        $student = Student::join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->select('students.*','classes.class','sections.section')
        ->where('students.id',$data->student_id)->first();
        $lateFee = Fee::where('period',5)->first()->amount ?? 0;
        $transactions = Transaction::where('student_id', $data->student_id)->get();
        return view('admin.pages.updateFeeInvoice', compact('data', 'student', 'transactions','lateFee'));
    }

    public function manageFeeInvoice(Request $request){
        try{
            // $data = Feeinvoice::where('id',$request->id)->first();
            $feeInvoice = Feeinvoice::where('student_id',$request->student_id)
            ->first();
            
            $feeInvoice->payable = $feeInvoice->payable - $request->transaction_amount;
            if($request->late_fine){
                $feeInvoice->payable += $request->late_fine;
            }
            if($request->due_date){
                $feeInvoice->due_date = $request->due_date;
            }
            $feeInvoice->paid = $request->transaction_amount;
            $feeInvoice->due_date = $request->due_date;
            $feeInvoice->save();

            if($request->transaction_amount){

                $transaction = new Transaction();
                $transaction->receipt_no = 'INV_'.substr(time(),-6);
                $transaction->title = 'Fee Submission';
                $transaction->student_id = $request->student_id;
                $transaction->transaction_amount = $request->transaction_amount;
                $transaction->due_amount =  $feeInvoice->payable;
                $transaction->due_date = $request->due_date;
                $transaction->late_fine = $request->late_fine;
                $transaction->total_dues = $feeInvoice->payable;

                if($request->transaction_id){
                    $transaction->transaction_id = $request->transaction_id;
                }
                if($request->payment_method){
                    $transaction->payment_method = $request->payment_method;
                }
                $transaction->date = $request->date;
                $transaction->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=> 'Fee Invoice Updated Successfully',
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
