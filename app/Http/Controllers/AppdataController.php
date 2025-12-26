<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appdata;

class AppdataController extends Controller
{
    //
    public function updateAppdata(Request $request){
        $appdata = Appdata::where('status',1)->first();
        if($appdata){
            // $appdata->admin_username = $request->admin_username;
            $appdata->title = $request->title;
            $appdata->address = $request->address;

            if (!empty($request->allFiles())) {
                $file = $request->file('logo');
                $request->logo = 'img/'.time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->logo, 'public_uploads'); 

                $appdata->logo = $request->logo;
            } else{
                $appdata->logo = null;
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
}
