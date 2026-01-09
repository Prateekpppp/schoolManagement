<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryCategory;

class InventoryCategoryController extends Controller
{
    //
    public function inventoryCategory(){
        $data = InventoryCategory::join('classes','inventory_categories.class_id','classes.id')
        ->select('inventory_categories.*','classes.class')
        ->where('inventory_categories.status',1)->get();
        return view('admin.pages.inventoryCategory',compact('data'));
    }

    public function inventoryCategoryFilter(Request $request){
        $data = InventoryCategory::join('classes','inventory_categories.class_id','classes.id')
        ->select('inventory_categories.*','classes.class')
        ->where('inventory_categories.class_id',$request->class_id)->get();
        return view('admin.pages.inventoryCategory',compact('data'));
    }

    public function createInventoryCategory(Request $request){
        try{
            if(!$request->id){
                $fee = new InventoryCategory();
                $fee->category = $request->category;
                $fee->class_id = $request->class_id;
                $fee->amount = $request->amount;
                $fee->status = 1;
                $fee->save();
            } else {
                $fee = InventoryCategory::where('id',$request->id)->first();
                $fee->category = $request->category;
                $fee->class_id = $request->class_id;
                $fee->amount = $request->amount;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Category Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

    public function updateInventoryCategory(Request $request){
        $data = InventoryCategory::where('id',$request->id)->first();
        return view('admin.pages.updateInventoryCategory',compact('data'));
    }

    public function getClassByInventoryCategory(Request $request){
        $inventoryCategory = InventoryCategory::join('classes','inventory_categories.class_id','classes.id')
        ->select('inventory_categories.*','classes.class','classes.id as class_id')
        ->where('inventory_categories.id',$request->id)->first();
        return response()->json([
            'inventoryCategory'=>$inventoryCategory,
            'response_code'=> '200'
        ]);
    }
}
