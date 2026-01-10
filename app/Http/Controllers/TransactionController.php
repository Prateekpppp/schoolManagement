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
        $student = Student::join('classes','classes.id','students.class')
        ->select('students.*','classes.class')
        ->where('students.id',$data->student_id)
        ->first();

        $fees = Fee::join('student_fees','fees.id','student_fees.fee_id')
        ->join('students','student_fees.student_id','students.id')
        ->select('students.roll_no','students.name','students.class','fees.name as feeName','fees.amount','student_fees.id','student_fees.paid','student_fees.created_at','student_fees.status')
        ->where('student_fees.student_id',$data->student_id)->get();


        // dd($fee);
        return view('admin.pages.print_invoice',compact('data','student','fees'));
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
