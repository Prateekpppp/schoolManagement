<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\CrudController;
use App\Models\Job;
use App\Models\Appdata;

class JobController extends Controller
{
    //
    function createJob(Request $request){

        $modelObject = new Job();
        $modelObject->title = $request->title;
        $modelObject->salary = $request->salary;
        $modelObject->openings = $request->openings;
        $modelObject->education = $request->education;
        $modelObject->experience = $request->experience;
        $modelObject->english_level = $request->english_level;
        $modelObject->gender = $request->gender;
        // $modelObject->work_type = $request->work_type;
        $modelObject->working_hours = $request->working_hours;
        $modelObject->description = $request->description;
        $modelObject->status = 1;
        
        $modelObject->save();

        // $tableName = $modelObject->getTable();
        // $columns = Schema::getColumnListing($tableName);
        // array_splice($columns, 0, 1);
        // array_splice($columns, count($columns)-3, 3);
        // // dd($request->all());
        // foreach ($columns as $key => $value) {
        //     dd($modelObject);
        //     // dd(property_exists($modelObject,$value));
        //     if(property_exists($modelObject,$value)){
        //         $modelObject->{$value} = $request->{$value};
        //     }
        // }

        // $modelObject->save();
        // $request->merge(["model"=>"Job"]);

        // $create = (new CrudController())->createData($request);
        // if($create){
            
            return response()->json([
                'redirect'=> route('admin.jobs'),
                'response_code'=>'200',
                'message'=>'Data updated successfully'
            ]);
        // } else{
            
        //     return response()->json([
        //         'redirect'=> `{{route('admin.jobs')}}`,
        //         'response_code'=>'501',
        //         'message'=>'Data not updated successfully'
        //     ]);
        // }
    }

    public function jobs(){
        $jobs = Job::all();
        return view('admin.pages.jobs',compact('jobs'));
    }
    
    public function allJobs(){
        $jobs = Job::all();
        $appdata = Appdata::all();
        return response()->json([
            'data'=> $jobs,
            'appdata'=> $appdata,
            'response_code'=>'200'
        ]);
    }
}
