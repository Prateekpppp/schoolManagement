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
        // $fee = Feeinvoice::join('students','feeinvoices.student_id','students.id')
        // ->join('classes','students.class','classes.id')
        // ->join('sections','students.section','sections.id')
        // ->join('transactions','transactions.student_id','students.id')
        // // ->join('transactions',\DB::raw('month(transactions.date)'),\DB::raw('month(feeinvoices.month)'))
        // ->select('feeinvoices.feeinvoice_no','feeinvoices.student_id','feeinvoices.month','feeinvoices.year','students.roll_no','students.name','students.father_name','classes.class','students.admission_no','sections.section')
        // ->groupBy('feeinvoices.id','feeinvoices.feeinvoice_no','feeinvoices.student_id','feeinvoices.month','feeinvoices.year')
        // ->whereColumn('transactions.month','feeinvoices.month')
        // ->get();
    // dd($fee);
        // $fee = StudentFee::join('students','students.student_id','student.id')
        // ->select('students.*','student_fees.fee')
        // ->join('fees','fees.id','student_fees.fee_id')
        // dd($fee);

        $fee = \DB::table('feeinvoices')
        ->join('students','students.id','feeinvoices.student_id')
        ->join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->leftJoin('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        ->select(
            'feeinvoices.id',
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
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status',
            'students.name',
            'students.father_name',
            'students.admission_no',
            'classes.class',
            'sections.section',
        )
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
            $totalFee = StudentFee::where('student_id',$value)->sum('fee');
            // dd($totalFee);
            $feeInvoice = Feeinvoice::where('student_id',$value)
            ->where('month',$month)
            ->first();

            if($feeInvoice){
                continue;
            }
            
            // dd(date('M Y',$studentFee->created_at)==now()->format('M Y'));

            $feeInvoice = new Feeinvoice();
            $feeInvoice->feeinvoice_no = 'INV_'.substr(time(),-6).rand(000,111);
            $feeInvoice->student_id = $value;
            // $feeInvoice->class_id = $request->class_id;
            $feeInvoice->month = $month;
            // $feeInvoice->year = date('Y');
            $feeInvoice->total_amount = $totalFee;
            // $feeInvoice->payable = $totalFee;
            $feeInvoice->invoice_date = now();
            $feeInvoice->status = 0;
            $feeInvoice->session_id = session('session_id');
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
            ->where('month',$request->month)
            ->first();

            $due_amount = Transaction::where('invoice_id',$feeInvoice->feeinvoice_no)->latest()->first();

            if($due_amount){
                $due_amount = $due_amount->due_amount;
            } else{
                $due_amount = 0;
            }
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
                $transaction->due_amount =  $due_amount - $request->transaction_amount;
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
                if($transaction->due_amount == 0){
                    $feeInvoice->status = 2;
                } else{
                    $feeInvoice->status = 1;
                }

                $transaction->save();
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
