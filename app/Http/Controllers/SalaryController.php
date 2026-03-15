<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Salary;
use App\Models\StaffAttendance;
use App\Models\User;

class SalaryController extends Controller
{
    //

    public function inventory(){
        $data = Salary::leftJoin('staff','salaries.staff_id','staff.phone')
        ->leftJoin('drivers','salaries.staff_id','drivers.phone')
        ->select('salaries.*','staff.name','drivers.name as driver_name');

        
        if(isset($request->staff) && $request->staff){
            $exam = $exam->where('staff.name', 'LIKE','%'.$request->staff.'%');
        }
        if(isset($request->driver) && $request->driver){
            $exam = $exam->where('drivers.name', 'LIKE','%'.$request->driver.'%');
        }
        
        $data = $data->where('salaries.status',1)->get();
        
        $staff = Staff::where('status','!=',0)->get();
        $drivers = Driver::where('status','!=',0)->get();
        // dd($data);
        return view('admin.pages.salary',compact('data','staff','drivers'));
    }

    public function staffSalary(Request $request){
        $data = Salary::join('staff','salaries.staff_id','staff.phone')
        ->select('salaries.*','staff.name')
        ->where('staff.phone',$this->currentUser->username)
        ->where('salaries.status',1)
        ->get();

        $deposit = $data->sum('security_deposit');
        // $staff = Staff::where('status',1)->get();
        // dd($data);
        return view('staff.pages.salary',compact('data','deposit'));
    }

    public function inventoryFilter(Request $request){
        $inventoryCategory = InventoryCategory::join('classes','inventory_categories.class_id','classes.id')
        ->select('inventory_categories.*','classes.class')
        ->where('inventory_categories.status',1)->get();

        $students = Student::join('classes','students.class','classes.id')
        ->select('students.*','classes.class')
        ->where('students.status',1)->get();

        $data = Inventory::join('inventory_categories','inventories.category_id','inventory_categories.id')
        ->join('classes','inventories.class_id','classes.id')
        ->select('inventories.*','inventory_categories.category','classes.class');

        if($request->name){
            $data = $data->where('inventory_categories.category','like','%'.$request->name.'%');
        }
        if($request->class_id){
            $data = $data->where('inventories.class_id',$request->class_id);
        }
        $data = $data->get();

        return view('admin.pages.inventory',compact('data','inventoryCategory','students'));
    }

    public function createInventory(Request $request){
        try{
            if(!$request->id){
                $fee = new Salary();
                if($request->staff_id){
                    $fee->staff_id = $request->staff_id;
                } else{
                        $fee->staff_id = $request->driver_id;
                        
                }
                $fee->total_present = $request->total_present;
                $fee->total_half_day = $request->total_half_day;
                $fee->total_late = $request->total_late;
                $fee->total_leave = $request->total_leave;
                $fee->total_absent = $request->total_absent;
                $fee->monthly_salary = $request->monthly_salary;
                $fee->security_deposit = $request->security_deposit;
                $fee->total_salary = $request->total_salary;
                $fee->salary_date = $request->salary_date;
                $fee->save();
            } else {
                $fee = Salary::where('id',$request->id)->first();
                $fee->staff_id = $request->staff_id;
                $fee->total_present = $request->total_present;
                $fee->total_half_day = $request->total_half_day;
                $fee->total_late = $request->total_late;
                $fee->total_leave = $request->total_leave;
                $fee->total_absent = $request->total_absent;
                $fee->monthly_salary = $request->monthly_salary;
                $fee->security_deposit = $request->security_deposit;
                $fee->total_salary = $request->total_salary;
                $fee->salary_date = $request->salary_date;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Salary Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function updateInventory(Request $request){
        $data = Salary::join('staff','salaries.staff_id','staff.id')
        ->select('salaries.*','staff.name')
        ->where('salaries.id',$request->id)->first();

        $staff = Staff::where('status','!=',0)->get();
        return view('admin.pages.updateSalary',compact('data','staff'));
    }
    
    public function printSalary(Request $request){
        $data = Salary::join('staff','salaries.staff_id','staff.id')
        ->select('salaries.*','staff.name')
        ->where('salaries.id',$request->id)->first();

        return view('admin.pages.printSalary',compact('data'));
    }

}
