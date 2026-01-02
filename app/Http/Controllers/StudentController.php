<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\Classes;
use App\Models\ClassSection;
use App\Models\Appdata;
use App\Models\Fee;

class StudentController extends Controller
{
    //
    public function students(){
        $students = Student::join('classes','students.class','=','classes.id')
        // ->join('class_sections','staff.section','=','class_sections.id')
        ->get(['students.*','classes.class']);
        // dd($students);
        $fees = Fee::all();
        return view('admin.pages.students',compact('students','fees'));
    }

    public function allStudents(){
        try {
            $students = Student::all();
            return response()->json([
                'data'=>$students,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addStudent(){
        $classes = Classes::where('status',1)->get();
        $sections = ClassSection::where('status',1)->get();
        return view('admin.pages.addStudent',compact('classes','sections'));
    }

    public function createStudent(Request $request){
        
        try{
            
            // dd($request->dob);
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                $request->photo = 'students/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'students/id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload front of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'students/id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload back of Adhar',
                        'response_code'=> '103',
                    ]);
                }

            } else{
                $request->photo = null;
            }

            $appdata = Appdata::where('status',1)->first();
            $firstLetters = $appdata->school_code;

            $student = new Student();

            // student details
            $student->enrollment_no =  $firstLetters.time().rand(1111,9999);
            $student->admission_no = $request->admission_no;
            $student->photo = $request->photo;
            $student->name = $request->name;
            $student->dob = date('d-m-Y',strtotime($request->dob));
            // $student->dob = $request->dob;
            $student->gender = $request->gender;
            $student->religion = $request->religion;
            $student->blood_group = $request->blood_group;
            $student->caste = $request->caste;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->city = $request->city;
            $student->state = $request->state;
            $student->address = $request->address;
            $student->password = Hash::make($request->password);

            // class details
            $student->class = $request->class;
            $student->section = $request->section;
            $student->roll_no = $request->roll_no;

            // dd($request->father_phone);
            // parent details
            $student->father_name = $request->father_name;
            $student->father_phone = $request->father_phone;
            $student->father_occupation = $request->father_occupation;
            $student->mother_name = $request->mother_name;
            $student->mother_phone = $request->mother_phone;
            $student->mother_occupation = $request->mother_occupation;
            $student->parent_email = $request->parent_email;
            $student->parent_password = Hash::make($request->parent_password);
            
            // id proofs
            $student->id_proof_front = $request->id_proof_front;
            $student->id_proof_back = $request->id_proof_back;
            $student->status = 1;
            $student->save();  

            foreach($request->fee as $fee){
                $studentFee = new StudentFee();
                $studentFee->student_id = $student->id;
                $studentFee->fee_id = $fee;
                $studentFee->save();
            }

            return response()->json([
                'redirect'=> route('admin.pages.students'),
                'message'=> 'Data updated successfully',
                'response_code'=> '200',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
    
    public function studentDetail(Request $request){
        $student = Student::where('id',$request->id)->first();
        return view('admin.pages.studentDetail',compact('student'));
    }
    
    public function studentDetailByEnrollNo(Request $request){
        try {
            $studentDetail = Student::where('enrollment_no',$request->enrollment_no)->first();
            if(!$studentDetail){
                return response()->json([
                    'message'=>'No Data Found',
                    'response_code'=>'200'
                ]);
            }
            return response()->json([
                'data'=>$studentDetail,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
        
    }
}
