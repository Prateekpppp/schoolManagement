<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\DynamicModel;

class CrudController extends Controller
{
    //
     
    public function createData(Request $request){

        $request->model = "App\Models\/".$request->model;

        // $tableName = $request->tableName;

        $modelObject = new $request->model();

        $tableName = modelObject->getTable();

        $modelObject->setTable($tableName);

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

        return True;
        return response()->json([
            // 'redirect'=> $request->previous_url,
            'response_code'=>'200',
            'message'=>'Data updated successfully'
        ]);
    }
}
