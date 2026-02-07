<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Datasession;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    //
    
    public function index(Request $request){
        $data = (new StudentController)->studentFilterData($request);

        $data = $data->getData()->data;

        return view('admin.pages.promote',compact('data'));


    }

    public function promotionById(Request $request){

        $data = (new StudentController)->studentFilterData($request);

        $data = $data->getData()->data;
        if($request->promotion_id){
            $data['promotion_id'] = $request->promotion_id;
        } else{
            $data['promotion_id'] = null;
            
        }
        $allSessions = Datasession::all();

        $studentSessions = Datasession::where('id',$data->session_id)->first();

        $StudentClasses = Classes::where('id',$data->class)->first();

        return view('admin.pages.promotionById',compact('data','allSessions','studentSessions','StudentClasses'));

    }

    public function create(Request $request){

        // check the related data if present or not before creation
        $student = Student::where('id',$request->student_id)->first();
        $to_session_id = $student->session_id;
        $promotion = Promotion::where('student_id',$request->student_id)->where('to_session_id',$to_session_id)->first();
        
        if($request->id){
            $promotion = Promotion::where('id',$request->id)->first();

        } else{
            if($promotion){
                return response()->json([
                    'message' => 'Already Promoted!',
                    'response_code' => '402'
                ]);
            }

            $promotion = new Promotion();

        }
    }
}
