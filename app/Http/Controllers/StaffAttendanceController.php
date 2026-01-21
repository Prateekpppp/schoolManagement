<?php

namespace App\Http\Controllers;

use App\Models\StaffAttendance;
use Illuminate\Http\Request;

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
            $ScLatitude = '25.588613';
            $ScLongitute = '85.159859';

            $request->location = json_decode($request->location);
            $distance = $this->haversine_distance($ScLatitude, $ScLongitute, $request->location->latitude, $request->location->longitude,'m');

            // dd($distance);

            if($distance < 30){
                return response()->json([
                    // 'redirect'=> $request->header('referer'),
                    'message'=>'Not under the required school area!',
                    'response_code'=> '405'
                ]);
            }
            
            if($distance < 30){
                return response()->json([
                    // 'redirect'=> $request->header('referer'),
                    'message'=>'Not under the required school area!',
                    'response_code'=> '405'
                ]);
            }

            if(!$request->staff_id){
                $fee = new StaffAttendance();
                $fee->staff_id = $this->currentLogin->id;
                $fee->date = $request->date;
                $fee->status = $request->status;
                $fee->save();
            } else {
                $fee = StaffAttendance::where('staff_id',$this->currentLogin->id)->first();
                $fee->date = $request->date;
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
        $data = StaffAttendance::join('staff','staff.id','staff_attendances.staff_id')
        ->leftJoin('salaries','salaries.staff_id','staff_attendances.staff_id')
        ->select('staff.name','staff_attendances.*','salaries.monthly_salary');

        if($this->currentUser->status > 2){
            $data = $data->where('staff_attendances.staff_id',$this->currentLogin->id);
        }
        
        $data = $data->get();
        return view('staff.pages.staffAttendance',compact('data'));
    }
}
