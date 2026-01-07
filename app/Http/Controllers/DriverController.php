<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    //
    public function driver(){
        $data = Driver::where('status',1)->get();
        // dd($staff);
        return view('admin.pages.driver',compact('data'));
    }

    public function staffFilter(Request $request){

        $data = Driver::join('subjects','subjects.id','staff.subject')
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

    public function allDriver(){
        try {
            
            $staff = Driver::join('classes','staff.class','=','classes.id')
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

    public function addDriver(){
        return view('admin.pages.addDriver');
    }

    public function createDriver(Request $request){
        // dd($request->all());
        try {
            $s_id = Driver::max('id') + 1;
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                $request->photo = 'driver/'.$s_id.'/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'driver/'.$s_id.'/'.'id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload front of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'driver/'.$s_id.'/'.'id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload back of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'driver/'.$s_id.'/'.'other_document/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');
                } else{
                    $request->other_document = null;
                }

            } else{
                $request->photo = null;
            }
            $staff = new Driver();
            $staff->photo = $request->photo;
            $staff->id_proof_front = $request->id_proof_front;
            $staff->id_proof_back = $request->id_proof_back;
            $staff->other_document = $request->other_document;
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->address = $request->address;
            $staff->gender = $request->gender;
            $staff->salary = $request->salary;
            $staff->joining_date = $request->joining_date;
            $staff->status = 1;
            $staff->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Driver added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function updateDriver(Request $request){
        $data = Driver::where('id',$request->id)->first();
        return view('admin.pages.updateDriver',compact('data'));
    }

    public function manageDriver(Request $request){
        // dd($request->all());
        try {
            $staff = Driver::where('id',$request->id)->first();
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                $request->photo = 'staff/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 

                $staff->photo = $request->photo;  

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'staff/id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                    $staff->id_proof_front = $request->id_proof_front;                    
                } else{
                    
                    $request->id_proof_front = $staff->id_proof_front;
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'staff/id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                    $staff->id_proof_back = $request->id_proof_back;                    
                } else{
                    
                    $request->id_proof_back = $staff->id_proof_back;
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'staff/other_document/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');
                    $staff->other_document = $request->other_document;                    
                } else{
                    
                    $request->other_document = $staff->other_document;
                }

            } else{
                $request->photo = $staff->photo;
            }
            
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->address = $request->address;
            $staff->gender = $request->gender;
            $staff->salary = $request->salary;
            $staff->joining_date = $request->joining_date;
            $staff->status = 1;
            $staff->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Driver Updated successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
    
    public function driverDetail(Request $request){
        $student = Driver::join('subjects','subjects.id','staff.subject')
        ->select('staff.*','subjects.subject')
        ->where('staff.id',$request->id)
        ->first();
        return view('admin.pages.driverDetail',compact('student'));
    }
    
}
