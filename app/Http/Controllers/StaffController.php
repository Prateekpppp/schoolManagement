<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Classes;
use App\Models\ClassSection;
use App\Models\Subject;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function staff(){
        $staff = Staff::join('classes','staff.class','=','classes.id')
        ->join('class_sections','staff.section','=','class_sections.id')
        ->get(['staff.*','classes.class_name','class_sections.section_name']);

        $staff = Staff::join('subjects','subjects.id','staff.subject')
        ->select('staff.*','subjects.subject')
        ->where('staff.status',1)->get();
        // dd($staff);
        return view('admin.pages.staff',compact('staff'));
    }

    public function allStaff(){
        try {
            
            $staff = Staff::join('classes','staff.class','=','classes.id')
            ->join('class_sections','staff.section','=','class_sections.id')
            ->get(['staff.*','classes.class_name','class_sections.section_name']);
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
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                $request->photo = 'staff/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'staff/id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload front of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'staff/id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload back of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'staff/other_document/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');
                } else{
                    $request->other_document = null;
                }

            } else{
                $request->photo = null;
            }
            $staff = new Staff();
            $staff->photo = $request->photo;
            $staff->id_proof_front = $request->id_proof_front;
            $staff->id_proof_back = $request->id_proof_back;
            $staff->other_document = $request->other_document;
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->email = $request->email;
            $staff->address = $request->address;
            $staff->gender = $request->gender;
            $staff->religion = $request->religion;
            $staff->blood_group = $request->blood_group;
            $staff->salary = $request->salary;
            $staff->joining_date = $request->joining_date;
            $staff->qualification = $request->qualification;
            // $staff->class = $request->class;
            $staff->class = json_encode($request->class);
            // $staff->section = $request->section;
            $staff->subject = $request->subject;
            $staff->status = 1;
            $staff->save();

            return response()->json([
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

}
