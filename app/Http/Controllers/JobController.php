<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\CrudController;
use App\Models\Job;

class JobController extends Controller
{
    //
    function createJob(Request $request){

        $modelObject = new Job();
        $tableName = $modelObject->getTable();
        $columns = Schema::getColumnListing($tableName);
        array_splice($columns, 0, 1);
        array_splice($columns, count($columns)-3, 3);
        // dd($request->all());
        foreach ($columns as $key => $value) {
            dump($value);
            dd(property_exists($modelObject,$value));
            if(property_exists($modelObject,$value)){
                $modelObject->{$value} = $request->{$value};
            }
        }

        $modelObject->save();
        $request->merge(["model"=>"Job"]);

        $create = (new CrudController())->createData($request);
        if($create){
            
            return response()->json([
                // 'redirect'=> $request->previous_url,
                'response_code'=>'200',
                'message'=>'Data updated successfully'
            ]);
        } else{
            
            return response()->json([
                'redirect'=> `{{route('admin.jobs')}}`,
                'response_code'=>'501',
                'message'=>'Data not updated successfully'
            ]);
        }
    }
}
