<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    //
    public function driver(){
        $data = Vehicle::where('status',1)->get();
        // dd($staff);
        return view('admin.pages.vehicle',compact('data'));
    }

    public function staffFilter(Request $request){

        $data = Vehicle::join('subjects','subjects.id','staff.subject')
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
            
            $staff = Vehicle::join('classes','staff.class','=','classes.id')
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
        return view('admin.pages.addVehicle');
    }

    public function createDriver(Request $request){
        // dd($request->all());
        try {
            $s_id = Vehicle::max('id') + 1;
            if (!empty($request->allFiles())) {

                $file = $request->file('vehicle_document');
                if($file){
                    $request->vehicle_document = 'vehicle/'.$s_id.'/'.'vehicle_document/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->vehicle_document, 'public_uploads');
                } else{
                    $request->vehicle_document = null;
                }

            } else{
                $request->photo = null;
            }
            $staff = new Vehicle();
            $staff->vehicle_no = $request->vehicle_no;
            $staff->vehicle_document = $request->vehicle_document;
            $staff->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Vehicle added successfully',
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
        $data = Vehicle::where('id',$request->id)->first();
        return view('admin.pages.updateVehicle',compact('data'));
    }

    public function manageDriver(Request $request){
        // dd($request->all());
        try {
            $staff = Vehicle::where('id',$request->id)->first();
            if (!empty($request->allFiles())) {

                $file = $request->file('vehicle_document');
                if($file){
                    $request->vehicle_document = 'vehicle/'.$s_id.'/'.'vehicle_document/'.time().rand(000,111) . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->vehicle_document, 'public_uploads');
                } else{
                    $request->vehicle_document = $staff->vehicle_document;
                }

            } else{
                $request->vehicle_document = $staff->vehicle_document;
            }
            
            $staff->vehicle_no = $request->vehicle_no;
            $staff->vehicle_document = $request->vehicle_document;
            $staff->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Vehicle added successfully',
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
        $student = Vehicle::join('subjects','subjects.id','staff.subject')
        ->select('staff.*','subjects.subject')
        ->where('staff.id',$request->id)
        ->first();
        return view('admin.pages.driverDetail',compact('student'));
    }
    
}
