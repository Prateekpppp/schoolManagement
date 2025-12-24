<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function gallery(){
        $galleries = Gallery::where('status',1)->get();
        return view('admin.pages.gallery',compact('galleries'));
    }

    public function allGallery(){
        try {
            $galleries = Gallery::where('status',1)->get();
            return response()->json([
                'data'=>$galleries,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addGallery(){
        return view('admin.pages.addGallery');
    }

    public function createGallery(Request $request){
        try{
            if ($request->file('image')) {
                $imageNames = [];

                foreach($request->file('image') as $image){
                    $imageName = '/gallery/'.time().rand(000,111) . '_' . $image->getClientOriginalName();
                    $filePath = $image->storeAs('', $imageName, 'public');
                    $imageNames[] = $imageName;
                    
                    $gallery = new Gallery();
                    $gallery->image = $imageName;
                    $gallery->status = 1;
                    $gallery->save();

                }

            }

            return response()->json([
                'message'=>'Gallery images added successfully',
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
