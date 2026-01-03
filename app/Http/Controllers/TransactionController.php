<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Classes;
use App\Models\StudentFee;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //

    function print_invoice(Request $request){

        $data = Fee::join('student_fees','fees.id','student_fees.fee_id')
        ->join('students','student_fees.student_id','students.id')
        ->select('students.roll_no','students.name','students.class','fees.name as feeName','fees.amount','student_fees.id','student_fees.paid','student_fees.created_at','student_fees.status')
        ->where('fees.id',$request->id)->first();
        // dd($data);
        return view('admin.pages.print_invoice',compact('data'));
    }

    function print_receipt(Request $request){

        $data = Transaction::join('students','transactions.student_id','students.id')
        ->select('transactions.*','students.name')
        ->where('transactions.id',$request->id)->first();
        // dd($data);
        return view('admin.pages.print_receipt',compact('data'));
    }
}
