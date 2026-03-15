<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Feeinvoice;
use App\Models\StudentFee;
use App\Models\Transaction;

class FeeController extends Controller
{
    //
    public function feeHead(Request $request){
        $data = Fee::join('classes','classes.id','fees.class_id')
        ->select('fees.*','classes.class')
        ->where('fees.status',1)
        ->orderBy('fees.id','desc')
        ->get();
        // dd($data);
        $classes = Classes::where('status',1)->get();
        return view('admin.pages.feeHead',compact('data','classes'));
    }

    public function feeHeadFilter(Request $request){
        $data = Fee::join('classes','classes.id','fees.class_id')
        ->select('fees.*','classes.class');
        
        if($request->name){
            $data = $data->where('fees.name', 'LIKE','%'.$request->name.'%');
        } 
        if($request->class_id){
            $data = $data->where('classes.id',$request->class_id);
        } 
        if($request->section_id){
            $data = $data->where('sections.id',$request->section_id);
        }
        $data = $data->get();

        $classes = Classes::where('status',1)->get();
        return view('admin.pages.feeHead',compact('data','classes'));
    }

    public function allFeeHead(){
        $fee = Fee::where('status',1)->get();
        return response()->json([
            'data'=>$fee,
            'response_code'=> '200'
        ]);
    }

    public function updateFeeHead(Request $request){
        $data = Fee::join('classes','classes.id','fees.class_id')
        ->select('fees.*','classes.class','classes.id as class_id')
        ->where('fees.id',$request->id)->first();
        
        return view('admin.pages.updateFeeHead',compact('data'));
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
                $fee->class_id = $request->class_id;
                $fee->month = $request->month;
                $fee->period = $request->period;
                $fee->amount = $request->amount;
                $fee->status = 1;
                $fee->save();
            } else {
                $fee = Fee::where('id',$request->id)->first();
                $fee->name = $request->name;
                $fee->class_id = $request->class_id;
                $fee->month = $request->month;
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
        $students = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->select('students.*','classes.class','sections.section')
        ->where('students.status',1)->get();
        return view('admin.pages.generateFee',compact('fee','students'));
    }

    public function filterGenerateFee(Request $request){
        // dd($request->month);
        // dd($month);
        if(!$request->month){
            return view('admin.pages.generateFee');
        }
        $fee = Fee::where('status',1)->get();
        
        // $searchDate = $request->month;
        // $month = explode('/',$request->month)[1];
        // $month = date('M', strtotime($request->month));
        $month = $request->month;
// $year  = date('Y', strtotime($request->month));

        $students = Student::join('classes','students.class','=','classes.id')
            ->join('sections','students.section','=','sections.id')
            ->whereNotExists(function ($query) use ($month) {
                $query->select(\DB::raw(1))
                    ->from('feeinvoices')
                    ->whereColumn('feeinvoices.student_id', 'students.id')
                    ->where('feeinvoices.month', $month);
                    // ->where('feeinvoices.year', $year);
            })->where('students.status',1);


        // $month = date('M',strtotime($request->month));
        // $year = date('Y',strtotime($request->month));
        // dd($month);
        // $students = Student::join('classes','students.class','=','classes.id')
        // ->join('sections','students.section','=','sections.id')
        // ->leftJoin('feeinvoices','feeinvoices.student_id','students.id')
        // // ->select('students.*','classes.class','sections.section','feeinvoices.month')
        // // ->where('feeinvoices.month','!=',$month)
        // // ->orWhereNull('feeinvoices.month');
        // ->where(function ($query) use ($month) {
        //     $query->where('feeinvoices.month', '!=', $month)
        //         ->orWhereNull('feeinvoices.month');
        // });
        // $students = $students->get(['students.*','classes.class','sections.section']);
        // $students = $students->toSql();
        // dd($students);
        if($request->name){
            $students = $students->where('students.name', 'LIKE','%'.$request->name.'%');
        } 
        if($request->class_id){
            $students = $students->where('students.class',$request->class_id);
        } 
        if($request->section_id){
            $students = $students->where('students.section',$request->section_id);
        }
        
        // $students = $students->where('feeinvoices.month','!=',$month)
        // ->orWhereNull('feeinvoices.month');
        $students = $students->get(['students.*','classes.class','sections.section']);
        // dd($students);

        return view('admin.pages.generateFee',compact('fee','students','request'));
    }

    public function assignFee(Request $request){
        // dd($request->all());
        $data = [];
        // $students = explode(',',$request->students);
        $students = $request->students;
        // dd($students);
        foreach ($students as $k=>$value) {
            $data['student_id'] = $value;

            // assigned fees data
            $fee = StudentFee::where('student_id',$value)->get();
            dd($fee);
            foreach($fee as $feetype){
                
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
        $fee = Feeinvoice::join('students','feeinvoices.student_id','students.id')
        ->join('classes','students.class','classes.id')
        ->select('students.roll_no','students.name','students.father_name','classes.class','feeinvoices.total_amount','feeinvoices.paid','feeinvoices.invoice_date','feeinvoices.status')
        // ->where('feeinvoices.status',1)
        ->get();

        // $fee = StudentFee::join('students','students.student_id','student.id')
        // ->select('students.*','student_fees.fee')
        // ->join('fees','fees.id','student_fees.fee_id')
        dd($fee);
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
        $data = Transaction::join('students','students.id','=','transactions.student_id');
        $data = $data->join('classes','classes.id','students.class')
        ->select('transactions.*','classes.class','students.name');

        $data = $data->get();
        return view('admin.pages.receipt',compact('data'));
    }

    public function feeHistory(Request $request){
        
    }
}
