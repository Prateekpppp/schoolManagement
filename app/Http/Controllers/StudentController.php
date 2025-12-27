<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Classes;
use App\Models\ClassSection;
use App\Models\Appdata;

class StudentController extends Controller
{
    //
    public function students(){
        $students = Student::join('classes','students.class','=','classes.id')
        ->join('class_sections','staff.section','=','class_sections.id')
        ->get(['students.*','classes.class_name','class_sections.section_name']);
        return view('admin.pages.students',compact('students'));
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
            
         
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                $request->photo = 'students/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 

            } else{
                $request->photo = null;
            }

            $appdata = Appdata::where('status',1)->first();
            $firstLetters = preg_replace('/\b(\w)/', '$1', $appdata->title);

            $student = new Student();

            // student details
            $student->enrollment_no =  $firstLetters.time().rand(1111,9999);
            $student->admission_no = $request->admission_no;
            $student->photo = $request->photo;
            $student->name = $request->name;
            $student->dob = date('Y-m-d H:i:s',strtotime($request->dob));
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
            $file = $request->file('id_proof_front');
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
            $student->status = 1;
            $student->save();  

            return response()->json([
                'redirect'=> url(),
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
        $studentDetail = Student::where('id',$request->id)->first();
        return view('admin.pages.studentDetail',compact('studentDetail'));
    }
}
