<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\InventoryCategory;
use App\Models\Student;

class InventoryController extends Controller
{
    //
    public function inventory(){
        $inventoryCategory = InventoryCategory::join('classes','inventory_categories.class_id','classes.id')
        ->select('inventory_categories.*','classes.class')
        ->where('inventory_categories.status',1)->get();
        $students = Student::join('classes','students.class','classes.id')
        ->select('students.*','classes.class')
        ->where('students.status',1)->get();
        $data = Inventory::join('inventory_categories','inventories.category_id','inventory_categories.id')
        ->join('classes','inventories.class_id','classes.id')
        ->join('students','inventories.student_id','students.id')
        ->select('inventories.*','inventory_categories.category','classes.class','students.name as student_name','students.admission_no')
        // ->where('inventories.status',1)
        ->get();
        // dd($data);
        return view('admin.pages.inventory',compact('data','inventoryCategory','students'));
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
                $fee = new Inventory();
                $fee->invoice_no = $request->invoice_no;
                $fee->category_id = $request->category_id;
                $fee->class_id = $request->class_id;
                $fee->student_id = $request->student_id;
                $fee->amount = $request->amount;
                $fee->payment_method = $request->payment_method;
                $fee->discount = $request->discount;
                $fee->total_amount = $request->total_amount;
                $fee->invoice_date = $request->invoice_date;
                $fee->save();
            } else {
                $fee = Inventory::where('id',$request->id)->first();
                $fee->invoice_no = $request->invoice_no;
                $fee->category_id = $request->category_id;
                $fee->class_id = $request->class_id;
                $fee->student_id = $request->student_id;
                $fee->amount = $request->amount;
                $fee->payment_method = $request->payment_method;
                $fee->discount = $request->discount;
                $fee->total_amount = $request->total_amount;
                $fee->invoice_date = $request->invoice_date;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Inventory Updated Successfully',
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
        $inventoryCategory = InventoryCategory::join('classes','inventory_categories.class_id','classes.id')
        ->select('inventory_categories.*','classes.class')
        ->where('inventory_categories.status',1)->get();
        $students = Student::join('classes','students.class','classes.id')
        ->select('students.*','classes.class')
        ->where('students.status',1)->get();
        $data = Inventory::where('id',$request->id)->first();
        return view('admin.pages.updateInventory',compact('data','inventoryCategory','students'));
    }
    
    public function printInventory(Request $request){
        $inventoryCategory = InventoryCategory::join('classes','inventory_categories.class_id','classes.id')
        ->select('inventory_categories.*','classes.class')
        ->where('inventory_categories.status',1)->get();
        $students = Student::join('classes','students.class','classes.id')
        ->select('students.*','classes.class')
        ->where('students.status',1)->get();
        $data = Inventory::join('inventory_categories','inventories.category_id','inventory_categories.id')
        ->join('classes','inventories.class_id','classes.id')
        ->join('students','inventories.student_id','students.id')
        ->select('inventories.*','inventory_categories.category','classes.class','students.name as student_name','students.admission_no')
        ->where('inventories.id',$request->id)->first();
        return view('admin.pages.printInventory',compact('data','inventoryCategory','students'));
    }
}
