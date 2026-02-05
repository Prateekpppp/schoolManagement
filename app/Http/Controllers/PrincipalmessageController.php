<?php

namespace App\Http\Controllers;

use App\Models\Principalmessage;
use Illuminate\Http\Request;

class PrincipalmessageController extends Controller
{
    //
    public function read(Request $request){
        $data = Principalmessage::first();
        // dd($data);
        return view('admin.pages.principalmessage',compact('data'));
    }

    public function principalmessage(){
        $data = Principalmessage::first();
        return response()->json([
            'data'=>$data,
            'response_code'=> '200'
        ]);
    }

    public function update(Request $request){
        $data = Principalmessage::where('id',$request->id)->first();
        
        return view('admin.pages.principalmessage',compact('data'));
    }

    public function create(Request $request) {
        try{

            $file = $request->file('photo');
            if($file){
                $request->photo = 'img/'.'principal/'. $file->getClientOriginalName();
                $filePath = $file->storeAs('', $request->photo, 'public_uploads'); 
            } else{
                $request->photo = null;
            }

            if(!$request->id){
                $fee = new Principalmessage();
                $fee->name = $request->name;
                $fee->photo = $request->photo;
                $fee->description = $request->description;
                $fee->save();
            } else {
                $fee = Principalmessage::where('id',$request->id)->first();
                $fee->name = $request->name;
                if($request->photo){
                    $fee->photo = $request->photo;
                }
                $fee->description = $request->description;
                // $fee->status = 0;
                $fee->save();
            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Data Updated Successfully',
                'response_code'=> '200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500'
            ]);
        }
    }

}
