<?php

namespace App\Http\Controllers;

use App\Models\Staff;
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
            $ScLatitude = $this->appdata->latitude;
            $ScLongitute = $this->appdata->altitude;
            // dd($request->location);
            $request->location = json_decode($request->location);
            if(!isset($request->location->latitude) || !isset($request->location->longitude)){
                return response()->json([
                    'message'=>'Unable to get the location access!',
                    'response_code'=> '405'
                ]);
            }
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
                if($fee){
                    return response()->json([
                        'message'=>'Attendance Already marked for today!',
                        'response_code'=> '405'
                    ]);
                }
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
                if($fee->checkout){
                    return response()->json([
                        'message'=>'Already checked out!',
                        'response_code'=> '405'
                    ]);
                }
                if(strtotime(now()) < strtotime('+2 hours',strtotime($fee->date))){
                    return response()->json([
                        'message'=>'Can\'t checkout before 2 hours!',
                        'response_code'=> '405'
                    ]);
                }
                // dd(strtotime($this->appdata->school_hours. 'hours',strtotime($this->appdata->school_time)));
                if(strtotime(now()) < strtotime('+'.$this->appdata->school_hours. 'hours',strtotime($this->appdata->school_time))){
                    $request->status = 3;
                } else{
                    $request->status = $fee->status;
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
                'message'=>'Issue with location access!',
                'response_code'=> '405'
            ]);
        }
    }

    public function read(Request $request){
        try{
            $monthFlag = true;
            if(!$request->month){
                $monthFlag = 0;
                $request->month = Carbon::now()->month;
            }

            $data = StaffAttendance::join('staff','staff.id','staff_attendances.staff_id')
            // ->leftJoin('salaries','salaries.staff_id','staff_attendances.staff_id')
            ->select('staff.name','staff_attendances.*');
            
            if($request->date){
                $request->date = Carbon::parse($request->date);
                $data = $data->whereDate('date',$request->date);
            } else{
                $data = $data->whereMonth('date',$request->month);
                if(!$monthFlag){
                    $data = $data->whereDate('date',Carbon::today()->format('Y-m-d'));
                }
            }

            $present = 0;
            $absent = 0;
            $halfday = 0;
            $late = 0;

            if($this->currentUser->status > 3){
                $data = $data->where('staff_attendances.staff_id',$this->currentLogin->id)->orderBy('staff_attendances.id','desc');
                
                $data = $data->get();
                
                $present = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',$request->month)->where('status',1)->count();
                $absent = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',$request->month)->where('status',0)->count();
                $halfday = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',$request->month)->where('status',3)->count();
                $late = StaffAttendance::where('staff_id',$this->currentLogin->id)->whereMonth('date',$request->month)->where('status',2)->count();
                return view('staff.pages.staffAttendance',compact('data','present','absent','halfday','late'));
            }
            
            if($request->name){
                $data = $data->where('staff.name','like','%'.$request->name.'%');
            }

            $data = $data->orderBy('staff_attendances.id','desc')->get();

            return view('admin.pages.staffAttendance',compact('data','present','absent','late','request'));
            
        } catch (\Exception $e){
            return view('staff.pages.staffAttendance');
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function changeStatus(Request $request){
        try {
            $data = StaffAttendance::where('id',$request->id)->update(['status'=>$request->status]);
            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Attendance Updated Successfully',
                'response_code'=> '200'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message'=> 'Something went wrong!',
                'response_code'=> '500'
            ]);
        }
    }

    public function absent(Request $request){
        $staff = Staff::whereIn('staff.status',[3,4]);
        $present = StaffAttendance::whereDate('date',Carbon::today()->format('Y-m-d'));

        $staff = $staff->leftJoinSub($present,'present',function($join){
            $join->on('present.staff_id','staff.id');
        });
        $staff = $staff->whereNull('date')->get(['staff.id']);

        // dd($staff);
        foreach($staff as $data){
            $item = new StaffAttendance();
            $item->date = now();
            $item->staff_id = $data->id;
            $item->status = 0;
            $item->save();
        }
        
    }

    public function getAttendanceData(Request $request){
        try {
            $month = Carbon::parse($request->salary_date)->month;
            $year = Carbon::parse($request->salary_date)->year;
            
            $data = StaffAttendance::join('staff','staff.id','staff_attendances.staff_id')
            ->where('staff.phone',$request->staff_id)
            ->whereMonth('date',$month)
            ->whereYear('date',$year)
            ->select(
                \DB::raw("SUM(CASE WHEN staff_attendances.status = 1 THEN 1 ELSE 0 END) AS total_present"),
                \DB::raw("SUM(CASE WHEN staff_attendances.status = 0 THEN 1 ELSE 0 END) AS total_absent"),
                \DB::raw("SUM(CASE WHEN staff_attendances.status = 2 THEN 1 ELSE 0 END) AS total_late"),
                \DB::raw("SUM(CASE WHEN staff_attendances.status = 3 THEN 1 ELSE 0 END) AS total_half_day"),
                \DB::raw("SUM(CASE WHEN staff_attendances.status = 4 THEN 1 ELSE 0 END) AS total_leave"),
                'staff.salary'
            )
            ->groupBy('staff.salary')
            // ->where('staff.id',$request->staff_id)
            ->first();
            // dd($data);
            return response()->json([
                'data'=>$data,
                'response_code'=> '200'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }
}
