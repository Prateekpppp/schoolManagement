<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\Classes;
use App\Models\ClassSection;
use App\Models\Appdata;
use App\Models\Fee;
use App\Models\Feeinvoice;
use App\Models\User;
use FeeController;
// use AppdataController;

class StudentController extends Controller
{
    //
    public function students(){
        $students = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.status',1)
        ->orderBy('students.id','desc');
        // dd(session('session_id'));
        $students = $students->where('students.session_id',session('session_id'));
        $students = $students->get(['students.*','classes.class','sections.section']);
        // dd($students);
        // $students = Student::where('status',1)->get();
        $fees = Fee::all();
        return view('admin.pages.students',compact('students','fees'));
    }

    public function inactiveStudents(){
        $students = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->where('students.status',0)
        ->get(['students.*','classes.class','sections.section']);
        // dd($students);
        // $students = Student::where('status',1)->get();
        $fees = Fee::all();
        return view('admin.pages.inactiveStudents',compact('students','fees'));
    }

    public function studentFilter(Request $request){
        $students = Student::join('classes','students.class','=','classes.id');
        // ->join('class_sections','staff.section','=','class_sections.id')
        if($request->name){
            $students = $students->where('students.name', 'LIKE','%'.$request->name.'%');
        } 
        if($request->class_id){
            $students = $students->where('students.class',$request->class_id);
        } 
        if($request->section_id){
            $students = $students->where('students.section',$request->section_id);
        }
        $students = $students->get(['students.*','classes.class']);
        // ->get(['students.*','classes.class']);
        // dd($students);
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
        $fees = Fee::where('status',1)->get();
        return view('admin.pages.addStudent',compact('classes','sections','fees'));
    }

    public function updateStudent(Request $request){
        $data = Student::where('id',$request->id)->first();
        $classes = Classes::where('status',1)->get();
        $sections = ClassSection::where('status',1)->get();
        $fees = StudentFee::join('fees','fees.id','student_fees.fee_id')
        ->select('fees.*','student_fees.student_id')
        ->where('student_fees.student_id',$request->id)->get();
        // dd($fees);
        // dd($data->father_occupation);
        return view('admin.pages.updateStudent',compact('classes','sections','data','fees'));
    }

    public function createStudent(Request $request){
        
        try{
            
            $s_id = $request->admission_no;
            // dd($request->dob);
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                if($file){
                    $request->photo = 'students/'.$s_id.'/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 
                } else{
                    return response()->json([
                        'message'=> 'Please upload photo',
                        'response_code'=> '103',
                    ]);
                }
                // dd($request->photo);
                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'students/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload front of ID Proof',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'students/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload back of ID Proof',
                        'response_code'=> '103',
                    ]);
                }
                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'students/'.$s_id.'/'.'other_document_'.time().rand(000,111) . '_' . $file->getClientOriginalName();  
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');                 
                } else{
                    
                    $request->other_document = null;
                }

            } else{
                return response()->json([
                    'message'=> 'Please upload photo',
                    'response_code'=> '103',
                ]);
                $request->photo = null;
                $request->id_proof_front = null;
                $request->id_proof_back = null;
                $request->other_document = null;
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
            // $student->email = $request->email;
            $student->city = $request->city;
            $student->state = $request->state;
            $student->address = $request->address;
            $student->password = $request->password;

            // class details
            $student->class = $request->class;
            $student->section = $request->section;
            $student->roll_no = $request->roll_no;

            // dd($request->father_phone);
            // sibling details
            if($request->enrollment_no){
                $student->sibling_id = $request->enrollment_no;
            }
            // parent details
            $student->father_name = $request->father_name;
            $student->father_phone = $request->father_phone;
            $student->father_occupation = $request->father_occupation;
            $student->mother_name = $request->mother_name;
            $student->mother_phone = $request->mother_phone;
            $student->mother_occupation = $request->mother_occupation;
            $student->parent_email = $request->parent_email;
            // $student->parent_password = $request->parent_password;
            
            // id proofs
            $student->id_proof_front = $request->id_proof_front;
            $student->id_proof_back = $request->id_proof_back;

            // qrcode part
            $fileName = 'my-qr-code-' . time() . '.png';

            // relative path (store this in DB)
            $relativePath = 'students/' . $s_id . '/' . $fileName;

            // save ONLY this in DB
            $student->qrcode = $relativePath;

            $admin = User::getCurrentUser();
            $student->admin_username = $admin->username;
            $student->status = 1;
            $student->session_id = session('session_id');
            // dd(new AppdataController);
            
            // create user
            $userData = new \stdClass();
            $userData->name = $request->name;
            // $userData->username = $request->father_phone;
            $userData->username = $student->enrollment_no;
            $userData->password = $request->password;
            $userData->status = 5;
            $user = (new AppdataController)->addUser($userData);
            // dd($user);
            $student->save();
            
            // store files
            // dd($request->photo);
            // if($request->photo){
            //     $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 
            // }
            // if($request->id_proof_front){
            //     $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
            // }
            // if($request->id_proof_back){
            //     $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
            // }
            // if($request->other_document){
            //     $filePath = $file->storeAs('', $request->other_document, 'public_uploads');   
            // }

            // absolute filesystem path (for saving file)
            $fullPath = public_path($relativePath);

            // create directory if not exists
            // if (!file_exists(public_path('students/' . $s_id))) {
            //     mkdir(public_path('students/' . $s_id), 0755, true);
            // }
            $url = route('admin.pages.studentDetail',$student->id);

            // generate QR code
            QrCode::format('png')
                ->size(300)
                ->generate($url, $fullPath);

            if($request->fee){
                foreach($request->fee as $fee){
                    $fees = Fee::where('id',$fee)->first();
                    $studentFee = new StudentFee();
                    $studentFee->student_id = $student->id;
                    $studentFee->fee_id = $fee;
                    $studentFee->fee = $fees->amount;
                    $studentFee->status = 1;
                    $studentFee->session_id = session('session_id');
                    $studentFee->save();
                }

            }


            return response()->json([
                'redirect'=> $request->header('referer'),
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
    
    public function manageStudent(Request $request){
        
        try{
            
            $student = Student::where('id',$request->id)->first();
            $s_id = $student->admission_no;
            // dd($request->dob);
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                if($file){
                    $request->photo = 'students/'.$s_id.'/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 
                } else{
                    $request->photo = $student->photo;  

                }

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'students/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                } else{
                    $request->id_proof_front = $student->id_proof_front;
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'students/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                } else{
                    $request->id_proof_back = $student->id_proof_back;
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'students/'.$s_id.'/'.'other_document_'.time().rand(000,111) . '_' . $file->getClientOriginalName();  
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');              
                } else{
                    
                    $request->other_document = $student->other_document;
                }

            } else{
                $request->photo = $student->photo;
                $request->id_proof_front = $student->id_proof_front;
                $request->id_proof_back = $student->id_proof_back;
                $request->other_document = $student->other_document;
            }

            // $appdata = Appdata::where('status',1)->first();
            // $firstLetters = $appdata->school_code;

            // $student = new Student();

            // student details
            // $student->enrollment_no =  $firstLetters.time().rand(1111,9999);
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
            // $student->email = $request->email;
            $student->city = $request->city;
            $student->state = $request->state;
            $student->address = $request->address;
            if($request->password){
                $student->password = $request->password;
            }

            // class details
            $student->class = $request->class;
            $student->section = $request->section;
            $student->roll_no = $request->roll_no;

            // dd($request->father_phone);
            // sibling details
            if($request->enrollment_no){
                $student->sibling_id = $request->enrollment_no;
            }
            // parent details
            $student->father_name = $request->father_name;
            $student->father_phone = $request->father_phone;
            $student->father_occupation = $request->father_occupation;
            $student->mother_name = $request->mother_name;
            $student->mother_phone = $request->mother_phone;
            $student->mother_occupation = $request->mother_occupation;
            $student->parent_email = $request->parent_email;
            // if($request->parent_password){
            //     $student->password = $request->parent_password;
            // }
            
            // id proofs
            $student->id_proof_front = $request->id_proof_front;
            $student->id_proof_back = $request->id_proof_back;
            $student->other_document = $request->other_document;
            $student->status = 1;
            $student->save();  

            if(isset($request->fee)){
                $studentFee = StudentFee::where('student_id',$student->id)->delete();
                foreach($request->fee as $fee){
                    $fees = Fee::where('id',$fee)->first();
                    $studentFee = new StudentFee();
                    $studentFee->student_id = $student->id;
                    $studentFee->fee_id = $fee;
                    $studentFee->fee = $fees->amount;
                    $studentFee->save();
                }

            }

            return response()->json([
                'redirect'=> $request->header('referer'),
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
        $student = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->select('students.*','classes.class','sections.section');
        if($request->id){
            $student = $student->where('students.id',$request->id)->first();
        } else{
            $student = $student->where('students.father_phone',$this->currentUser->username)->first();
        }
        // dd($student->id);
        $studentFeeInvoice = Feeinvoice::where('student_id',$student->id)->where('status','!=',2)->first();
        return view('admin.pages.studentDetail',compact('student','studentFeeInvoice'));
    }
    
    public function studentIdcard(Request $request){
        $student = Student::join('classes','students.class','=','classes.id')
        ->join('sections','students.section','=','sections.id')
        ->select('students.*','classes.class','sections.section');
        if($request->id){
            $student = $student->where('students.id',$request->id)->first();
        }
        // dd($student->id);
        $studentFeeInvoice = Feeinvoice::where('student_id',$student->id)->where('status','!=',2)->first();
        return view('admin.pages.studentIdcard',compact('student','studentFeeInvoice'));
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
