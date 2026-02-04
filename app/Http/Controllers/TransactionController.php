<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Feeinvoice;
use App\Models\ScRoute;
use App\Models\StudentFee;
use App\Models\StudentRoute;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    //

    function paymentHistory(Request $request){
        $transactions = Student::join('transactions','transactions.student_id','students.id')
        ->select('transactions.*')
        ->where('student_id',$request->id)->get();
        // dd($paymentHistory);
        return view('admin.pages.paymentHistory',compact('transactions'));
    }

    function print_invoice(Request $request){

        $data = Feeinvoice::where('id',$request->id)
        // ->join('transactions','transactions.invoice_id','feeinvoices.feeinvoice_no')
        // ->select(\DB::raw('select sum(transaction_amount) from transactions as transaction_amount where transactions.invoice_id=feeinvoices.feeinvoice_no'))
        ->first();

        $currentPaid = Transaction::where('invoice_id',$data->feeinvoice_no)->sum('transaction_amount');

        $date = Carbon::parse($data->invoice_date);
        
        $invoice_date = $date->format('d-M-Y');
        $invoice_date = Carbon::parse($data->invoice_date)->format('d-M-Y');

        $month = $date->format('m');
        
        $previous_invoices = Feeinvoice::where('month','<',$month)->where('student_id',$data->student_id)->get();

        $previous_amount = Feeinvoice::where('month','<',$month)->where('student_id',$data->student_id)->sum('total_amount');
        
        $total_paid = 0;

        foreach ($previous_invoices as $key => $value) {
            
            $total_paid += Transaction::where('invoice_id',$value->feeinvoice_no)->where('student_id',$data->student_id)->sum('transaction_amount');
        }
        
        $previous_due_amount = $previous_amount - $total_paid;
        
        $student = Student::join('classes','classes.id','students.class')
        ->join('sections','sections.id','students.section')
        ->select('students.*','classes.class','sections.section')
        ->where('students.id',$data->student_id)
        ->first();

        $studentFee = StudentFee::where('student_id',$data->student_id);

        $fees = Fee::joinSub($studentFee,'studentFee',function($join){
            $join->on('studentFee.fee_id','fees.id');
        })
        ->select('fees.*')
        ->get();

        $invoiceMonth = $data->month;
        
        $scRoute = StudentRoute::where('student_id',$data->student_id)->first();

        if($scRoute){
            $scRoute = ScRoute::where('id',$scRoute->sc_route_id)->first();
        }

        return view('admin.pages.print_invoice',compact(
            'data',
            'currentPaid',
            'date',
            'invoice_date',
            'month',
            'previous_amount',
            'total_paid',
            'previous_due_amount',
            'student',
            'fees',
            'invoiceMonth',
            'scRoute'
        ));

    }

    function print_receipt(Request $request){

        $data = Transaction::where('id',$request->id)->first();
        $date = Carbon::parse($data->date);
        $payment_date = $date->format('d-M-Y');
        
        // select transaction amount from transaction where feeinvoice_id = INV_55725081

        $feeInvoice = Feeinvoice::where('feeinvoice_no',$data->invoice_id)->first()->total_amount;

        // total paid amount
        $total_transaction = Transaction::where('invoice_id',$data->invoice_id)->sum('transaction_amount');

        // dd($feeInvoice);
        
        $student = Student::join('classes','classes.id','students.class')
        ->join('sections','sections.id','students.section')
        ->select('students.*','classes.class','sections.section')
        ->where('students.id',$data->student_id)
        ->first();
        // dd($data);
        return view('admin.pages.print_receipt',compact('data','student','feeInvoice','total_transaction','payment_date'));
    }
}
