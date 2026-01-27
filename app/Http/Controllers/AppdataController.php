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
            // $appdata->school_code = $request->school_code;
            $appdata->title = $request->title;
            $appdata->director_name = $request->director_name;                
            $appdata->contact_person = $request->contact_person;                
            $appdata->phone = $request->phone;                                 
            $appdata->email = $request->email;                            
            $appdata->address = $request->address;                            
            $appdata->latitude = $request->latitude;                            
            $appdata->altitude = $request->altitude;                            
            $appdata->school_hours = $request->school_hours;                            
            $appdata->school_time = $request->school_time;                            
            $appdata->late_time = $request->late_time;                            
            $appdata->session_id = session('session_id');                            
            
            if (!empty($request->allFiles())) {
                $file = $request->file('logo');
                if($file){
                    $request->logo = 'img/'.time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->logo, 'public_uploads'); 
    
                    $appdata->logo = $request->logo;
                }
                $file = $request->file('signature');
                if($file){
                    $request->signature = 'img/'.time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->signature, 'public_uploads'); 
    
                    $appdata->signature = $request->signature;
                }
                $file = $request->file('stamp');
                if($file){
                    $request->stamp = 'img/'.time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('', $request->stamp, 'public_uploads'); 
    
                    $appdata->stamp = $request->stamp;
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

    public function inactive(Request $request){
        $model = 'App\\Models\\' . $request->model;
        $model = app($model);
        $item = $model->where('id',$request->id)->update(['status'=>0]);
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=> 'Data updated successfully',
            'response_code'=> '200',
        ]);
        dd($model);
    }

    public function restore(Request $request){
        $model = 'App\\Models\\' . $request->model;
        $model = app($model);
        $item = $model->where('id',$request->id)->update(['status'=>1]);
        return response()->json([
            'redirect'=> $request->header('referer'),
            'message'=> 'Data updated successfully',
            'response_code'=> '200',
        ]);
        dd($model);
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
    
    public function updateUser($request){
        try {
            
            $user = User::where('username',$request->username)->first();
            $user->name = $request->name;
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
