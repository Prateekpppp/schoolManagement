<?php

namespace App\Http\Controllers;

use App\Models\StaffAttendance;
use Illuminate\Http\Request;

class StaffAttendanceController extends Controller
{
    //
    public function create(Request $request){
        try{
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
