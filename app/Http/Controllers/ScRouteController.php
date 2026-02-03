<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScRoute;

class ScRouteController extends Controller
{
    //
    public function driver(){
        $data = ScRoute::where('status',1)->get();
        // dd($staff);
        return view('admin.pages.allRoutes',compact('data'));
    }

    public function staffFilter(Request $request){

        $data = ScRoute::join('subjects','subjects.id','staff.subject')
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
            
            $staff = ScRoute::join('classes','staff.class','=','classes.id')
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
        return view('admin.pages.addRoute');
    }

    public function createDriver(Request $request){
        // dd($request->all());
        try {
            $staff = new ScRoute();
            $staff->route_name = $request->route_name;
            $staff->starting_location = $request->starting_location;
            $staff->ending_location = $request->ending_location;
            $staff->route_fare = $request->route_fare;
            $staff->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Route added successfully',
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
        $data = ScRoute::where('id',$request->id)->first();
        return view('admin.pages.updateRoute',compact('data'));
    }

    public function manageDriver(Request $request){
        // dd($request->all());
        try {
            $staff = ScRoute::where('id',$request->id)->first();
            $staff->route_name = $request->route_name;
            $staff->starting_location = $request->starting_location;
            $staff->ending_location = $request->ending_location;
            // $staff->route_fare = $request->route_fare;
            $staff->save();


            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Route added successfully',
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
