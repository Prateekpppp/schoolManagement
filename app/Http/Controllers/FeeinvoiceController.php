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

        $fee = \DB::table('feeinvoices')
        ->join('students','students.id','feeinvoices.student_id')
        ->join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->leftJoin('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        ->select(
            'feeinvoices.id',
            'feeinvoices.invoice_date',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status',
            'students.name',
            'students.father_name',
            'students.admission_no',
            'classes.class',
            'sections.section',
            \DB::raw('sum(transactions.transaction_amount) as transaction_amount')
        )
        ->groupBy(
            'feeinvoices.id',
            'feeinvoices.invoice_date',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status',
            'students.name',
            'students.father_name',
            'students.admission_no',
            'classes.class',
            'sections.section',
        )
        // ->where('feeinvoices.status',1)
        ->orderBy('feeinvoices.id','desc')
        ->get();
        // dd($fee);
        return view('admin.pages.feeInvoice',compact('fee'));
    }

    public function genrateFeeInvoice(Request $request){
        // dd($request->all());
        $data = [];
        // $students = explode(',',$request->students);
        $students = $request->students;
        $month = explode('/',$request->month)[1];
        // dd($students);
        foreach ($students as $k=>$value) {

            // assigned fees data

            $feeInvoice = Feeinvoice::where('student_id',$value)
            ->where('month',$month)
            ->first();

            if($feeInvoice){
                continue;
            }

            $oneTimeFee = Feeinvoice::where('student_id',$value)->first();
            if($oneTimeFee){
                $oneTimeFee = 0;
            } else{
                $oneTimeFee = StudentFee::join('fees','fees.id','student_fees.fee_id')
                ->select('student_fees.*','fees.period')
                ->where('student_fees.student_id',$value)
                ->where('student_fees.status',1)
                ->where('fees.period',0)
                ->sum('fees.amount');
            }
            
            $annualFee = Feeinvoice::where('student_id',$value)->where('month',$month)->first();
            if($annualFee){
                $annualFee = 0;
            } else{
                $annualFee = StudentFee::join('fees','fees.id','student_fees.fee_id')
                ->select('student_fees.*','fees.period','fees.month','fees.amount')
                ->where('student_fees.student_id',$value)
                ->where('student_fees.status',1)
                ->where('fees.period',2)
                ->where('fees.month',$month)
                ->sum('fees.amount');
            }

            $monthlyFee = StudentFee::join('fees','fees.id','student_fees.fee_id')
            ->select('student_fees.*','fees.period')
            ->where('student_fees.student_id',$value)
            ->where('student_fees.status',1)
            ->where('fees.period',1)
            ->sum('fees.amount');
            
            $monthlyFee = $monthlyFee ?? 0;

            // dd($oneTimeFee,$annualFee,$monthlyFee );
            $totalFee = $oneTimeFee + $monthlyFee + $annualFee;

            // dd($totalFee);
            
            // dd(date('M Y',$studentFee->created_at)==now()->format('M Y'));

            $feeInvoice = new Feeinvoice();
            $feeInvoice->feeinvoice_no = 'INV_'.substr(time(),-6).rand(000,111);
            $feeInvoice->student_id = $value;
            // $feeInvoice->class_id = $request->class_id;
            $feeInvoice->month = $month;
            // $feeInvoice->year = date('Y');
            $feeInvoice->total_amount = $totalFee;
            // $feeInvoice->payable = $totalFee;
            $feeInvoice->invoice_date = $request->month;
            $feeInvoice->status = 1;
            $feeInvoice->session_id = session('session_id');
            $feeInvoice->save();

            // update student_fee table for applied period of fee type
            // $removeFee = StudentFee::join('fees','fees.id','student_fees.fee_id')
            // ->select('student_fees.*','fees.period','fees.month')
            // ->where('student_id',$value)
            // ->where('fees.period',1)
            // ->orWhere('fees.month',$month)
            // ->update(['student_fees.status'=>0]);

            // ==================================== //
            // -- The Code --
            // ->get(['student_fees.id']);
            
            // $removeFee = StudentFee::whereIn('id',$removeFee)->update('status',0);

            // ==================================== //

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
                $feeInvoice->feeinvoice_no = 'INV_'.substr(time(),-6);
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
        // $data = Feeinvoice::where('id',$request->id)->first();
        $data = Feeinvoice::leftJoin('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        ->select(
            'feeinvoices.id',
            'feeinvoices.student_id',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status',
            \DB::raw('sum(transactions.transaction_amount) as transaction_amount')
        )
        ->groupBy(
            'feeinvoices.id',
            'feeinvoices.student_id',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status'
        )
        ->where('feeinvoices.id',$request->id)
        ->first();

        $student = Student::join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->join('student_fees','students.id','student_fees.student_id')
        ->select('students.*','classes.class','sections.section','student_fees.fee_id')
        ->where('students.id',$data->student_id)->first();
        // $feetype = Fee::where('id',$student->fee_id)->first();
        $lateFee = Fee::where('period',5)->first()->amount ?? 0;
        $transactions = Transaction::where('student_id', $data->student_id)->get();
        return view('admin.pages.updateFeeInvoice', compact('data', 'student', 'transactions','lateFee'));
    }

    public function manageFeeInvoice(Request $request){
        try{
            // $data = Feeinvoice::where('id',$request->id)->first();
            $feeInvoice = Feeinvoice::where('student_id',$request->student_id)
            ->where('month',$request->month)
            ->first();


            $paid_amount = Transaction::where('invoice_id',$feeInvoice->feeinvoice_no)->sum('transaction_amount');
            
            $due_amount = $feeInvoice->total_amount - $paid_amount - $request->transaction_amount;
            // dd($feeInvoice);
            // $feeInvoice->payable = $feeInvoice->payable - $request->transaction_amount;
            // dd($feeInvoice->payable);
            // if($request->late_fine){
            //     $feeInvoice->payable += $request->late_fine;
            // }
            if($request->due_date){
                $feeInvoice->due_date = $request->due_date;
            }
            // $feeInvoice->paid = $request->transaction_amount;
            // $feeInvoice->due_date = $request->due_date;

            if($request->transaction_amount){

                $transaction = new Transaction();
                $transaction->invoice_id = $feeInvoice->feeinvoice_no;
                $transaction->receipt_no = 'INV_'.substr(time(),-6);
                $transaction->title = 'Fee Submission';
                $transaction->student_id = $request->student_id;
                $transaction->payable_amount = $feeInvoice->total_amount;
                $transaction->transaction_amount = $request->transaction_amount;
                $transaction->due_amount =  $feeInvoice->total_amount - $paid_amount - $request->transaction_amount;
                $transaction->due_date = $request->due_date;
                $transaction->late_fine = $request->late_fine;
                $transaction->total_dues = $transaction->due_amount + $transaction->late_fine;
                $transaction->session_id = session('session_id');

                if($request->transaction_id){
                    $transaction->transaction_id = $request->transaction_id;
                }
                if($request->payment_method){
                    $transaction->payment_method = $request->payment_method;
                }
                $transaction->date = $request->date;
                // dd($transaction->due_amount);

                $transaction->save();
            }

            
            if($due_amount == 0){
                $feeInvoice->status = 2;
            } else{
                $feeInvoice->status = 0;
            }
            $feeInvoice->save();

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
