<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Classes;
use App\Models\ClassSection;
use App\Models\ClassTeacher;
use App\Models\Subject;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function staff(){
        $staff = Staff::join('classes','staff.class','=','classes.id')
        ->join('sections','staff.section','=','sections.id')
        ->get(['staff.*','classes.class','sections.section']);

        $data = Staff::join('subjects','subjects.id','staff.subject')
        ->select('staff.*','subjects.subject')
        ->where('staff.status','!=',0)->get();
        // dd($staff);
        return view('admin.pages.staff',compact('data'));
    }

    public function staffFilter(Request $request){

        $data = Staff::join('subjects','subjects.id','staff.subject')
        ->leftJoin('classes','staff.class','=','classes.id')
        ->leftJoin('sections','staff.section','=','sections.id')
        ->select('staff.*','subjects.subject','classes.id as class_id','sections.id as section_id');
        
        if($request->name){
            $data = $data->where('staff.name', 'LIKE','%'.$request->name.'%');
        } 
        if($request->class_id){
            $data = $data->where('classes.id',$request->class_id);
        } 
        // dd($data->get());
        if($request->section_id){
            $data = $data->where('sections.id',$request->section_id);
        }
        $data = $data->get();

        // dd($data);
        return view('admin.pages.staff',compact('data'));
    }

    public function allStaff(){
        try {
            
            $staff = Staff::join('classes','staff.class','=','classes.id')
            ->join('sections','staff.section','=','sections.id')
            ->get(['staff.*','classes.class','sections.section']);
            return response()->json([
                'data'=>$staff,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addStaff(){
        $subject = Subject::where('status',1)->get();
        $classes = Classes::where('status',1)->get();
        $sections = ClassSection::where('status',1)->get();
        return view('admin.pages.addStaff',compact('subject','classes','sections'));
    }

    public function createStaff(Request $request){
        // dd($request->all());
        try {
            $s_id = $request->employ_code;
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                if($file){
                    $request->photo = 'staff/'.$s_id.'/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->photo, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload photo',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'staff/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload front of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'staff/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload back of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'staff/'.$s_id.'/'.'other_document_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');
                } else{
                    $request->other_document = null;
                }

            } else{
                return response()->json([
                    'message'=> 'Please upload photo',
                    'response_code'=> '103',
                ]);
            }
            $staff = new Staff();
            $staff->photo = $request->photo;
            $staff->employ_code = $request->employ_code;
            $staff->id_proof_front = $request->id_proof_front;
            $staff->id_proof_back = $request->id_proof_back;
            $staff->other_document = $request->other_document;
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->email = $request->email;
            $staff->address = $request->address;
            $staff->aadhaar_no = $request->aadhaar_no;
            $staff->gender = $request->gender;
            $staff->religion = $request->religion;
            $staff->blood_group = $request->blood_group;
            $staff->salary = $request->salary;
            $staff->joining_date = $request->joining_date;
            $staff->qualification = $request->qualification;
            $staff->class = $request->class;
            // $staff->class = json_encode($request->class);
            $staff->section = $request->section;
            $staff->subject = $request->subject;
            $staff->status = $request->status;
            $staff->password = $request->password;

            $userData = new \stdClass();
            $userData->name = $staff->name;
            $userData->username = $staff->phone;
            $userData->password = $staff->password;
            $userData->status = $request->status;
            $user = (new AppdataController)->addUser($userData);

            $staff->save();

            // store files
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

            // dd($staff->id);
            $classTeacher = new ClassTeacher();
            $classTeacher->staff_id = $staff->id;
            $classTeacher->class_id = $staff->class;
            $classTeacher->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Staff added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function updateStaff(Request $request){
        $data = Staff::join('classes','staff.class','=','classes.id')
        ->leftJoin('sections','staff.section','=','sections.id')
        ->leftJoin('subjects','staff.subject','=','subjects.id')
        ->select('staff.*','classes.class','sections.section','classes.id as class_id','sections.id as section_id','subjects.subject','subjects.id as subject_id')
        ->where('staff.id',$request->id)->first();
        // dd($data);
        // dd($data->subject_id);
        return view('admin.pages.updateStaff',compact('data'));
    }

    public function manageStaff(Request $request){
        // dd($request->all());
        try {
            $staff = Staff::where('id',$request->id)->first();
            $s_id = $staff->employ_code;
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                if($file){
                    $request->photo = 'staff/'.$s_id.'/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 
                    $staff->photo = $request->photo; 
                } else{
                    $request->photo = $staff->photo;
                }


                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'staff/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                    $staff->id_proof_front = $request->id_proof_front;                    
                } else{
                    
                    $request->id_proof_front = $staff->id_proof_front;
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'staff/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                    $staff->id_proof_back = $request->id_proof_back;                    
                } else{
                    
                    $request->id_proof_back = $staff->id_proof_back;
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'staff/'.$s_id.'/other_document_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');
                    $staff->other_document = $request->other_document;                    
                } else{
                    
                    $request->other_document = $staff->other_document;
                }

            } else{
                $request->photo = $staff->photo;
                $request->id_proof_front = $staff->id_proof_front;
                $request->id_proof_back = $staff->id_proof_back;
                $request->other_document = $staff->other_document;
            }
            
            // $staff->employ_code = $request->employ_code;
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->email = $request->email;
            $staff->address = $request->address;
            $staff->aadhaar_no = $request->aadhaar_no;
            $staff->gender = $request->gender;
            $staff->religion = $request->religion;
            $staff->blood_group = $request->blood_group;
            $staff->salary = $request->salary;
            $staff->joining_date = $request->joining_date;
            $staff->qualification = $request->qualification;
            $staff->class = $request->class;
            // $staff->class = json_encode($request->class);
            $staff->section = $request->section;
            $staff->subject = $request->subject;
            $staff->status = 1;

            if($request->password){
                $staff->password = $request->password;
            }

            $userData = new \stdClass();
            $userData->name = $staff->name;
            $userData->username = $staff->phone;
            $userData->password = $staff->password;
            $userData->status = $request->status;
            $user = (new AppdataController)->updateUser($userData);

            $staff->save();

            // dd($staff->id);
            $classTeacher = ClassTeacher::where('staff_id',$staff->id)->first();
            $classTeacher->class_id = $staff->class;
            $classTeacher->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Staff Updated successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
    
    public function staffDetail(Request $request){
        // not secure as it taking the id in get request, will update in next version
        
        $student = Staff::join('subjects','subjects.id','staff.subject')
        ->select('staff.*','subjects.subject')
        ->where('staff.id',$request->id)
        ->first();
        return view('admin.pages.staffDetail',compact('student'));
    }
    
    public function staffIdcard(Request $request){
        $data = Staff::join('classes','staff.class','=','classes.id')
        ->select('staff.*','classes.class');
        if($request->id){
            $data = $data->where('staff.id',$request->id)->first();
        }
        return view('admin.pages.staffIdcard',compact('data'));
    }
    
}
