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
            
            if(strtotime(now()) > strtotime('8:30 am')){
                if(strtotime(now()) > strtotime('2:30 pm')){
                    return response()->json([
                        'message'=>'You are too late!',
                        'response_code'=> '405'
                    ]);
                } else{
                    $request->status = 2;
                }
            }

            $fee = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereDate('date',Carbon::today()->format('Y-m-d'))->first();
            
            // dd($request->status);

            if(!$fee){
                $fee = new StaffAttendance();
                $fee->staff_id = $this->currentLogin->id;
                $fee->date = $request->date;
                $fee->status = $request->status;
                $fee->session_id = session('session_id');
                $fee->save();
            } else{
                return response()->json([
                    'message'=>'Attendance already marked for today!',
                    'response_code'=> '205'
                ]);
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
            $data = StaffAttendance::join('staff','staff.id','staff_attendances.staff_id')
            // ->leftJoin('salaries','salaries.staff_id','staff_attendances.staff_id')
            ->select('staff.name','staff_attendances.*');
            
            $present = 0;
            $absent = 0;
            $late = 0;

            if($this->currentUser->status > 2){
                $data = $data->where('staff_attendances.staff_id',$this->currentLogin->id);
                $present = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',Carbon::now()->month)->where('status',1)->count();
                $absent = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',Carbon::now()->month)->where('status',0)->count();
                $late = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',Carbon::now()->month)->where('status',2)->count();
            }
            
            $data = $data->get();

            
            return view('staff.pages.staffAttendance',compact('data','present','absent','late'));
            
        } catch (\Exception $e){
            return view('staff.pages.staffAttendance');
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }
}
