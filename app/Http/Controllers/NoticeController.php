<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    //
    public function notice(){
        $notice = Notice::where('status',1)->get();
        return view('admin.pages.notice',compact('notice'));
    }

    public function allSection(){
        try {
            $section = Section::where('status',1)->get();
            return response()->json([
                'data'=>$section,
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function addSection(){
        $section = Notice::where('status',1)->get();
        return view('admin.pages.addSection',compact('section'));
    }

    public function createNotice(Request $request){
        try{
            // dd($request->id);
            if(isset($request->id)){
                // Section::updateOrCreate(
                //     ['id'=>$request->id],
                //     $request->all()
                // );
                $section = Notice::where('id',$request->id)->first();
                $section->notice = $request->notice;
                $section->status = 1;
                $section->save();
            } else{
                $section = new Notice();
                $section->notice = $request->notice;
                $section->status = 1;
                $section->save();
            }

            return response()->json([
                'redirect'=> route('admin.pages.notice'),
                'message'=>'Notice Updated successfully',
                'response_code'=>'200'
            ]);
        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function manageSection(Request $request){
        $classSection = Notice::where('id',$request->id)->first();
        return view('admin.pages.section',compact('section'));
    }

}
