<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classes;
use App\Models\ClassSection;

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
                $request->photo = '/students/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public'); 

            } else{
                $request->photo = null;
            }

            $student = new Student();
            $student->photo = $request->photo;
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->dob = date('Y-m-d H:i:s',strtotime($request->dob));
            $student->blood_group = $request->blood_group;
            $student->religion = $request->religion;
            $student->parent = $request->parent;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->class = $request->class;
            $student->section = $request->section;
            $student->address = $request->address;
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
