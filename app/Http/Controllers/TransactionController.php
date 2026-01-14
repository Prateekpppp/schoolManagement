<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Feeinvoice;
use App\Models\StudentFee;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //

    function print_invoice(Request $request){

        $data = Feeinvoice::where('id',$request->id)->where('month',$request->month)->first();
        // dd($data);
        $latestData = Feeinvoice::where('student_id',$data->student_id)->latest()->first();
        $currentMonth = $data->month;
        $currentYear = $data->year;
        // dd($currentMonth);
        
        $student = Student::join('classes','classes.id','students.class')
        ->select('students.*','classes.class')
        ->where('students.id',$data->student_id)
        ->first();

        $oldData = Feeinvoice::join('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        ->where('feeinvoices.student_id',$data->student_id)->where('feeinvoices.month','<',$currentMonth)->where('year','=',$currentYear)->sum('transactions.transaction_amount');
        // dd($oldData);
        
        // $oldData = Feeinvoice::leftJoin('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        // ->select(
        //     'feeinvoices.id',
        //     'feeinvoices.month',
        //     'feeinvoices.total_amount',
        //     'feeinvoices.status',
        //     \DB::raw('sum(transactions.transaction_amount) as transaction_amount')
        // )
        // ->groupBy(
        //     'feeinvoices.id',
        //     'feeinvoices.student_id',
        //     'feeinvoices.month',
        //     'feeinvoices.total_amount'
        // )
        // ->where('feeinvoices.id',$request->id)
        // ->where('feeinvoices.month',$request->month)
        // ->first();


        $fees = Fee::join('student_fees','fees.id','student_fees.fee_id')
        ->join('students','student_fees.student_id','students.id')
        ->select('students.roll_no','students.name','students.class','fees.name as feeName','fees.amount','student_fees.id','student_fees.paid','student_fees.created_at','student_fees.status')
        ->where('student_fees.student_id',$data->student_id)->get();


        // dd($fee);
        return view('admin.pages.print_invoice',compact('data','student','fees','oldData'));
    }

    function print_receipt(Request $request){

        $data = Transaction::where('transactions.id',$request->id)->first();

        $student = Student::join('classes','classes.id','students.class')
        ->select('students.*','classes.class')
        ->where('students.id',$data->student_id)
        ->first();
        // dd($data);
        return view('admin.pages.print_receipt',compact('data','student'));
    }
}
