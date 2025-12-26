<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Classes;
use App\Models\ClassSection;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function staff(){
        $staff = Staff::join('classes','staff.class','=','classes.id')
        ->join('class_sections','staff.section','=','class_sections.id')
        ->get(['staff.*','classes.class_name','class_sections.section_name']);
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
        $classes = Classes::where('status',1)->get();
        $sections = ClassSection::where('status',1)->get();
        return view('admin.pages.addStaff',compact('classes','sections'));
    }

    public function createStaff(Request $request){
        // dd($request->all());
        try {
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                $request->photo = 'staff/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 

            } else{
                $request->photo = null;
            }
            $staff = new Staff();
            $staff->photo = $request->photo;
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->email = $request->email;
            $staff->gender = $request->gender;
            $staff->address = $request->address;
            $staff->religion = $request->religion;
            $staff->blood_group = $request->blood_group;
            $staff->class = $request->class;
            $staff->section = $request->section;
            // $staff->subject = $request->subject;
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
