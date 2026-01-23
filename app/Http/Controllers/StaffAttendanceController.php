<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\StaffAttendance;

class StaffAttendanceController extends Controller
{
    //
    function haversine_distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $unit = 'K') {
    // Convert degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

    // Earth's radius
    $earthRadius = 6371; // Kilometers

    if ($unit == 'M') {
        // Convert to miles (1 km = 0.621371 miles approx, but the source uses 3959 for radius)
        // Using common conversion factor: 1 mile = 1.609344 km
        $earthRadius = 3959; 
    } elseif ($unit == 'N') {
        // Convert to nautical miles (1 km = 0.539957 nautical miles approx)
        $earthRadius = 3440; 
    } elseif($unit == 'm'){
        $earthRadius = 6371000;
    }

    return $angle * $earthRadius;
}

    public function create(Request $request){
        try{
            $ScLatitude = ' 25.003839';
            $ScLongitute = '84.575035';

            $request->location = json_decode($request->location);
            $distance = $this->haversine_distance($ScLatitude, $ScLongitute, $request->location->latitude, $request->location->longitude,'m');

            // dd($distance);

            if($distance > 30){
                return response()->json([
                    'message'=>'Not under the required school area!',
                    'response_code'=> '405'
                ]);
            }
          
            $fee = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereDate('date',Carbon::today()->format('Y-m-d'))->first();
              
            if(strtotime(now()) <= strtotime($this->appdata->late_time)){
                // check in part
                if(strtotime(now()) > strtotime($this->appdata->school_time)){
                    $request->status = 2;
                } else{
                    $request->status = 1;
                }
            } else {
                // check out part  
                if(!$fee){
                    return response()->json([
                        'message'=>'No Attendance Present for today!',
                        'response_code'=> '405'
                    ]);
                }
                if(strtotime(now()) < strtotime($this->appdata->school_time) + strtotime($this->appdata->school_hours)){
                    $request->status = 2;
                } else{
                    $request->status = 1;
                }
            }

            if(!$fee){
                $fee = new StaffAttendance();
                $fee->staff_id = $this->currentLogin->id;
                $fee->date = now();
                $fee->status = $request->status;
                $fee->session_id = session('session_id');
                $fee->save();
            } else{
                $fee->checkout = now();
                $fee->status = $request->status;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Attendance Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function read(Request $request){
        try{
            if(!$request->month){
                $request->month = Carbon::now()->month;
            }

            $data = StaffAttendance::join('staff','staff.id','staff_attendances.staff_id')
            // ->leftJoin('salaries','salaries.staff_id','staff_attendances.staff_id')
            ->select('staff.name','staff_attendances.*')
            ->whereMonth('date',$request->month);
            

            $present = 0;
            $absent = 0;
            $late = 0;

            if($this->currentUser->status > 2){
                $data = $data->where('staff_attendances.staff_id',$this->currentLogin->id);
                
                $data = $data->get();
                
                $present = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',$request->month)->where('status',1)->count();
                $absent = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',$request->month)->where('status',0)->count();
                $late = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',$request->month)->where('status',2)->count();
                return view('staff.pages.staffAttendance',compact('data','present','absent','late'));
            }
            
            $data = $data->get();

            
            return view('admin.pages.staffAttendance',compact('data','present','absent','late'));
            
        } catch (\Exception $e){
            return view('staff.pages.staffAttendance');
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }
}
