<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appdata;
use App\Models\ClassSection;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AppdataController extends Controller
{
    //
    public function updateAppdata(Request $request){
        $appdata = Appdata::where('status',1)->first();
        if($appdata){
            // $appdata->admin_username = $request->admin_username;
            $appdata->school_code = $request->school_code;
            $appdata->title = $request->title;
            $appdata->address = $request->address;

            if (!empty($request->allFiles())) {
                $file = $request->file('logo');
                if($file){
                    $request->logo = 'img/'.time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->logo, 'public_uploads'); 
    
                    $appdata->logo = $request->logo;
                }
            }
            
            $appdata->save();
            return response()->json([
                // 'redirect'=> url(),
                'message'=> 'Data updated successfully',
                'response_code'=> '200',
            ]);
        } else{
            return response()->json([
                'message'=> 'Unable to find data',
                'response_code'=> '101',
            ]);
        }
    }

    public function delete(Request $request){
        $model = 'App\\Models\\' . $request->model;
        $model = app($model);
        $item = $model->where('id',$request->id)->delete();
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=> 'Data updated successfully',
            'response_code'=> '200',
        ]);
        dd($model);
    }

    public function addUser($request){
        try {
            $admin = User::getCurrentUser();
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->admin_username = $admin->username;
            if(isset($request->email)){
                $user->email = $request->email;
            }
            $user->password = $request->password;
            // $user->role = $request->role;
            $user->status = $request->status;
            $user->save();
            return response()->json([
                'message'=> 'User added successfully',
                'response_code'=> '200',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }
    
    // public function addUser(Request $request){
    //     $admin = User::getCurrentUser();
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->username = $request->username;
    //     $user->admin_username = $admin->username;
    //     if($request->email){
    //         $user->email = $request->email;
    //     }
    //     $user->password = $request->password;
    //     $user->role = $request->role;
    //     $user->status = $request->status;
    //     $user->save();
    //     return response()->json([
    //         'message'=> 'User added successfully',
    //         'response_code'=> '200',
    //     ]);
    // }
}
