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

    
        $masterData = \DB::table('feeinvoices')
        ->join('students','students.id','feeinvoices.student_id')
        ->join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->leftJoin('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        ->select(
            'feeinvoices.id',
            'feeinvoices.feeinvoice_no',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status',
            'feeinvoices.student_id',
            'feeinvoices.month',
            'feeinvoices.session_id',
            'students.name',
            'students.father_name',
            'students.admission_no',
            'classes.class',
            'sections.section',
            \DB::raw('sum(transactions.transaction_amount) as transaction_amount')
        )
        ->groupBy(
            'feeinvoices.id',
            'feeinvoices.feeinvoice_no',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.student_id',
            'feeinvoices.status',
            'feeinvoices.month',
            'feeinvoices.session_id',
            'students.name',
            'students.father_name',
            'students.admission_no',
            'classes.class',
            'sections.section',
        );

        $data = $masterData->where('feeinvoices.id',$request->id)->first();
        // ->get();
    // dd($data);
        // $data = Feeinvoice::where('id',$request->id)->first();

        // $currentTransactions = Transaction::where('invoice_id',$data->feeinvoice_no)
        // ->latest()->first();
        // if($currentTransactions){
        //     $currentTransactions = $currentTransactions->due_amount;
        // } else{
        //     $currentTransactions = $data->total_amount;
        // }
        // dd($data);
        // $latestData = Feeinvoice::where('student_id',$data->student_id)->latest()->first();
        $currentMonth = $data->month;
        // $currentYear = $data->year;
        // dd($currentMonth);
        
        $student = Student::join('classes','classes.id','students.class')
        ->select('students.*','classes.class')
        ->where('students.id',$data->student_id)
        ->first();

        // $oldData = Feeinvoice::leftJoin('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        // ->select(\DB::raw('sum(transactions.transaction_amount) as transaction_amount'))
        // ->where('feeinvoices.student_id',$data->student_id)
        // ->where('feeinvoices.month','<',$currentMonth)
        // ->where('feeinvoices.session_id',$data->session_id)
        // ->get();
        // ->sum('transactions.due_amount');
        // it will give zero for multiple generated fee as no transaction has been done till now
        // ->sum('transactions.due_amount');
        
        $oldData = \DB::table('feeinvoices')
        ->join('students','students.id','feeinvoices.student_id')
        ->join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->leftJoin('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        ->select(
            'feeinvoices.id',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status',
            'feeinvoices.student_id',
            'feeinvoices.month',
            'feeinvoices.session_id',
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
            'feeinvoices.student_id',
            'feeinvoices.status',
            'feeinvoices.month',
            'feeinvoices.session_id',
            'students.name',
            'students.father_name',
            'students.admission_no',
            'classes.class',
            'sections.section',
        );
        $oldData = $oldData->where('feeinvoices.student_id',$data->student_id)
        ->where('feeinvoices.month','<',$currentMonth)
        ->where('feeinvoices.session_id',$data->session_id)
        ->first();
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
