<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    //
    public function banner(){
        $banners = Banner::where('status',1)->get();
        return view('admin.pages.banner',compact('banners'));
    }

    public function allBanner(){
        try {
            $banners = Banner::where('status',1)->get();
            return response()->json([
                'data'=>$banners,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addBanner(){
        return view('admin.pages.addBanner');
    }

    public function createBanner(Request $request){
        try{
            if ($request->file('image')) {
                $imageNames = [];

                foreach($request->file('image') as $image){
                    $imageName = 'banner/'.time().rand(000,111) . '_' . $image->getClientOriginalName();
                    $filePath = $image->storeAs('', $imageName, 'public_uploads');
                    $imageNames[] = $imageName;
                    
                    $gallery = new Banner();
                    $gallery->image = $imageName;
                    $gallery->status = 1;
                    $gallery->save();

                }

            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message'=>'Banner images added successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
}
