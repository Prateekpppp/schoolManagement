<?php

namespace App\Http\Controllers;

use App\Models\Driveractivity;
use App\Models\DriverRoute;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DriveractivityController extends Controller
{
    //
    public function driverRoutes(Request $request){
        $data = DriverRoute::join('sc_routes','sc_routes.id','driver_routes.sc_route_id')
        ->leftjoin('driveractivities','driveractivities.sc_route_id','sc_routes.id')
        ->select('sc_routes.*','driveractivities.status as driver_status','driveractivities.id as activity_id');

        if($request->name){
            $data = $data->where('sc_routes.route_name','like','%'.$request->name.'%');
        }

        if($request->date){
            $request->date = Carbon::parse($request->date);
            $data = $data->whereDate('driveractivities.created_at',$request->date);
        }

        if($this->currentUser->status == 6){
            $data = $data->where('driver_routes.driver_id',$this->currentLogin->id);
        }
        

        $data = $data->get();

        return view('driver.pages.driverRoutes',compact('data','request'));
    }

    public function updateDriverStatus(Request $request){

        $driverActivity = Driveractivity::where('sc_route_id',$request->sc_route_id)
        ->where('driver_id',$this->currentLogin->id)
        ->first();

        if(!$driverActivity){
            $driverActivity = new Driveractivity();
        }
        
        $driverActivity->driver_id = $this->currentLogin->id;
        $driverActivity->sc_route_id = $request->sc_route_id;
        $driverActivity->status = $request->status;
        $driverActivity->save();

        return redirect()->route('driver.pages.driverRoutes')->with('success','Driver status updated Successfully');
    }
}
