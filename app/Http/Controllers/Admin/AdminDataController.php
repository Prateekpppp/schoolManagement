<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Schema;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\DynamicModel;

class AdminDataController extends Controller
{
    //

    // function getModelByTablename($tableName) {
    //     return new 'App'.'\\'.studly_case(strtolower(str_singular($tableName)));
    // }

    public function checkMasterPassword($masterPassword){
            
        $user = User::getCurrentUser();
        if(!Hash::check($masterPassword,$user->password)){
            return false;
        }
        return true;
    }
    
    public function index(){
        // $user = User::getCurrentUser();
        
        return view('admin.pages.index');
    }
    
    public function createData(Request $request){

        // $tableName = (new User())->getTable();

        $tableName = $request->tableName;

        $modelObject = new DynamicModel;
        $modelObject->setTable($tableName);

        $columns = Schema::getColumnListing($tableName);
        array_splice($columns, 0, 1);
        array_splice($columns, count($columns)-2, 2);

        foreach ($columns as $key => $value) {
            $modelObject->{$value} = $request->{$value};
        }

        $modelObject->save();

        return response()->json([
            // 'redirect'=> $request->previous_url,
            'response_code'=>'200',
            'message'=>'Data updated successfully'
        ]);
    }
    

}
