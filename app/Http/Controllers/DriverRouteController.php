<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\DriverRoute;
use App\Models\ScRoute;
use App\Models\Vehicle;

class DriverRouteController extends Controller
{
    //

    public function assignedRouteVehicle(){
        $data = DriverRoute::join('drivers','driver_routes.driver_id','drivers.id')
        ->join('vehicles','driver_routes.vehicle_id','vehicles.id')
        ->join('sc_routes','driver_routes.sc_route_id','sc_routes.id')
        ->get(['driver_routes.*','drivers.name as driver_name','vehicles.vehicle_no','sc_routes.route_name']);
        return view('admin.pages.assignedRouteVehicle',compact('data'));
    }

    public function assignRouteVehicle(Request $request){
        $drivers = Driver::where('status',1)->get();
        $vehicles = Vehicle::where('status',1)->get();
        $routes = ScRoute::where('status',1)->get();
        return view('admin.pages.assignRouteVehicle',compact('drivers','vehicles','routes'));
    }

    public function assignRouteVehicleDriver(Request $request){
        // dd($request->all());
        try {
            if($request->id){
                $driverRoute = DriverRoute::where('id',$request->id)->first();
                $driverRoute->driver_id = $request->driver_id;
                $driverRoute->vehicle_no = $request->vehicle_no;
                $driverRoute->sc_route_id = $request->sc_route_id;
                $driverRoute->save();

                return response()->json([
                    'redirect'=> $request->header('referer'),
                    'message'=>'Route and Vehicle updated for Driver successfully',
                    'response_code'=>'200'
                ]);
            }
            $driverRoute = new DriverRoute();
            $driverRoute->driver_id = $request->driver_id;
            $driverRoute->vehicle_no = $request->vehicle_no;
            $driverRoute->sc_route_id = $request->sc_route_id;
            $driverRoute->status = 1;
            $driverRoute->save();

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Route and Vehicle assigned to Driver successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function updateAssignRouteVehicle(Request $request){
        $data = DriverRoute::where('id',$request->id)->first();
        $drivers = Driver::where('status',1)->get();
        $vehicles = Vehicle::where('status',1)->get();
        $routes = ScRoute::where('status',1)->get();
        return view('admin.pages.assignRouteVehicle',compact('data','drivers','vehicles','routes'));
    }
}
