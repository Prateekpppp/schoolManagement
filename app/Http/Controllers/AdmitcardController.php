<?php

namespace App\Http\Controllers;

use App\Models\Admitcard;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class AdmitcardController extends Controller
{
    //
    public function filterGenerateAdmitCard(Request $request){
        
        $exam_code = $request->exam_code;

        $exams = Exam::where('status',1)->get();

        if(!$request->exam_code){
            return view('admin.pages.filterGenerateAdmitCard', compact('exams'));
        }

        $exam = Exam::where('exam_code',$exam_code)->first();
        // dd($exam->class);
        $students = Student::join('classes','students.class','=','classes.id')
            ->join('sections','students.section','=','sections.id')
            ->whereNotExists(function ($query) use ($exam_code) {
                $query->select(\DB::raw(1))
                    ->from('admitcards')
                    ->whereColumn('admitcards.student_id', 'students.id')
                    ->where('admitcards.exam_code', $exam_code);
            })
            ->where('students.status',1)
            // ->where('students.class',$exam->class)
            ->where('students.session_id',session('session_id'));

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

        return view('admin.pages.filterGenerateAdmitCard',compact('exams','students','request'));
    }

    public function genrateAdmitCard(Request $request){
        
        $students = $request->students;
        
        $exam_code = $request->exam_code;
        foreach ($students as $k=>$value) {
            // dd($value);

            // assigned admitcard data

            $feeInvoice = Admitcard::where('student_id',$value)
            ->where('exam_code',$exam_code)
            ->first();

            if($feeInvoice){
                continue;
            }

            $feeInvoice = new Admitcard();
            $feeInvoice->student_id = $value;
            $feeInvoice->exam_code = $exam_code;
            $feeInvoice->status = 1;
            $feeInvoice->session_id = session('session_id');
            $feeInvoice->save();

        }
        // dd($data);
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=>'Admit Card Generated Successfully',
            'response_code'=> '200'
        ]);
    }

    public function admitCard(Request $request){
        $students = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.status',1)
        ->where('students.session_id',session('session_id'))
        ->select('students.*','admitcards.id as card_id');

        $data = Admitcard::joinSub($students,'students',function($join){
            $join->on('admitcards.student_id','students.id');
        })
        ->join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->select('students.*','admitcards.id as card_id','classes.class','sections.section');

        $data = $data->get();

        return view('admin.pages.admitCard',compact('data','request'));
    }

    public function print_admitcard(Request $request){
        
        $students = Student::where('students.status',1)
        ->where('students.id',$request->id)
        ->where('students.session_id',session('session_id'));

        // $exam = Exam
        $data = Admitcard::joinSub($students,'students',function($join){
            $join->on('admitcards.student_id','students.id');
        })
        ->join('exams','admitcards.exam_code','exams.exam_code')
        ->join('subjects','subjects.id','=','exams.subject')
        ->select('students.*','exams.date','admitcards.id as card_id','admitcards.exam_code','subjects.subject');

        $data = $data->get();

        $students = $students->join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->select('students.*','classes.class','sections.section');

        $students = $students->first();
        // dd($data);

        return view('admin.pages.print_admitcard',compact('students','data','request'));
    }
}
