<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Driver;
use App\Models\DriverRoute;
use App\Models\ScRoute;
use App\Models\Vehicle;

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
            $s_id = $request->employ_code;
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                if($file){
                    $request->photo = 'driver/'.$s_id.'/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 
                } else{
                    return response()->json([
                        'message'=> 'Please upload Photo',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'driver/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload front of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'driver/'.$s_id.'/'.'id_proof_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                } else{
                    return response()->json([
                        'message'=> 'Please upload back of Adhar',
                        'response_code'=> '103',
                    ]);
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'driver/'.$s_id.'/'.'other_document_'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');
                } else{
                    $request->other_document = null;
                }

            }
            $staff = new Driver();
            $staff->photo = $request->photo;
            $staff->password = $request->password;
            $staff->id_proof_front = $request->id_proof_front;
            $staff->id_proof_back = $request->id_proof_back;
            $staff->other_document = $request->other_document;
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->address = $request->address;
            $staff->gender = $request->gender;
            $staff->salary = $request->salary;
            $staff->joining_date = $request->joining_date;
            $staff->driving_license = $request->driving_license;
            $staff->status = 1;
            
            $userData = new \stdClass();
            $userData->name = $staff->name;
            $userData->username = $staff->phone;
            $userData->password = $staff->password;
            $userData->status = 6;
            $user = (new AppdataController)->addUser($userData);

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
            $s_id = $staff->id;
            if (!empty($request->allFiles())) {
                $file = $request->file('photo');
                if($file){
                    $request->photo = 'driver/'.$s_id.'/'.'photo/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 
                    $staff->photo = $request->photo; 
                } else{
                    $staff->photo = $staff->photo;  
                }

                $file = $request->file('id_proof_front');
                // dd($file);
                if($file){
                    $request->id_proof_front = 'driver/'.$s_id.'/'.'id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_front, 'public_uploads');
                    $staff->id_proof_front = $request->id_proof_front;                    
                } else{
                    
                    $staff->id_proof_front = $staff->id_proof_front;
                }

                $file = $request->file('id_proof_back');
                if($file){
                    $request->id_proof_back = 'driver/'.$s_id.'/'.'id_proof/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->id_proof_back, 'public_uploads');
                    $staff->id_proof_back = $request->id_proof_back;                    
                } else{
                    
                    $staff->id_proof_back = $staff->id_proof_back;
                }

                $file = $request->file('other_document');
                if($file){
                    $request->other_document = 'driver/'.$s_id.'/'.'other_document/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->other_document, 'public_uploads');
                    $staff->other_document = $request->other_document;                    
                } else{
                    
                    $staff->other_document = $staff->other_document;
                }

            }
            
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            if($request->password){
                $staff->password = $request->password;
            }
            $staff->address = $request->address;
            $staff->gender = $request->gender;
            $staff->salary = $request->salary;
            $staff->joining_date = $request->joining_date;
            $staff->driving_license = $request->driving_license;
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
        $student = Driver::where('id',$request->id)->first();
        return view('admin.pages.driverDetail',compact('student'));
    }

    
}
