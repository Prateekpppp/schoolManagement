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

        return view('admin.pages.promote',compact('data','request'));


    }

    public function promotionById(Request $request){

        $data = (new StudentController)->studentFilterData($request);

        $data = $data->getData()->data;
        if($request->promotion_id){
            $data->promotion_id  = $request->promotion_id;
        } else{
            $data->promotion_id = null;
            
        }

        // dd($data);

        $allSessions = Datasession::all();

        $studentSessions = Datasession::where('id',$data->session_id)->first();

        $StudentClasses = Classes::where('id',$data->class_id)->first();

        return view('admin.pages.promotionById',compact('data','allSessions','studentSessions','StudentClasses'));

    }

    public function create(Request $request){
        
        try{
            // check the related data if present or not before creation
            $student = Student::where('id',$request->student_id)->first();
            
            $promotion = Promotion::where('student_id',$request->student_id)->where('to_session_id',$request->to_session_id)->first();
            
            if($request->id){
                $promotion = Promotion::where('id',$request->id)->first();
                $promotion->student_id = $request->student_id;
                $promotion->from_session_id = $request->from_session_id;
                $promotion->to_session_id = $request->to_session_id;
                $promotion->from_class_id = $request->from_class_id;
                $promotion->to_class_id = $request->to_class_id;
                $promotion->session_id = $request->session_id;
                $promotion->save();


            } else{
                if(!$promotion){
                    $promotion = Promotion::where('student_id',$request->student_id)->delete();
                    $promotion = new Promotion();
                    $promotion->student_id = $request->student_id;
                    $promotion->from_session_id = $request->from_session_id;
                    $promotion->to_session_id = $request->to_session_id;
                    $promotion->from_class_id = $request->from_class_id;
                    $promotion->to_class_id = $request->to_class_id;
                    $promotion->session_id = $request->session_id;
                    $promotion->save();
                } else{
                    return 'Already Promoted to this session!';
                }

            }

            $student->class = $request->to_class_id;
            $student->session_id = $request->to_session_id;
            $student->save();
            
            return True;

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }

    public function promoteStudent(Request $request){

        try{
            $promote = $this->create($request);
            if($promote == True){
                return response()->json([
                    'redirect'=> route('admin.pages.promote'),
                    'message' => 'Student has been Promoted Successfully',
                    'response_code' => '200'
                ]);
            } else{
                return response()->json([
                    'message' => $promote,
                    'response_code' => '407'
                ]);
            }

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
    }
    
    public function promoteStudents(Request $request){

        try{
            if(!$request->from_class_id){
                return response()->json([
                    'message' => 'Please filter students first based on class!',
                    'response_code' => '405'
                ]);
            }
            $to_session_id = Datasession::where('id','>',session('session_id'))->first();
            
            if(!$to_session_id){
                return response()->json([
                    'message' => 'Next Session not Found, Please Add!',
                    'response_code' => '405'
                ]);
            }

            $to_class_id = Classes::where('id','>',$request->from_class_id)->first();
            
            if(!$to_class_id){
                return response()->json([
                    'message' => 'Next Class not Found',
                    'response_code' => '405'
                ]);
            }

            $to_session_id = $to_session_id->id;
            $to_class_id = $to_class_id->id;
            $from_session_id = session('session_id');
            $session_id = session('session_id');

            $request->merge([
                'to_class_id' => $to_class_id,
                'from_session_id' => $from_session_id,
                'to_session_id' => $to_session_id,
                'session_id' => $session_id,
            ]);

            foreach($request->ids as $id){
                
                $request->merge([
                    'student_id' => $id,
                ]);

                if(!$this->create($request)){
                    continue;
                }

            }

            return response()->json([
                'redirect'=> $request->header('referer'),
                'message' => 'Selected students are Promoted Successfully',
                'response_code' => '200'
            ]);

        } catch (\Exception $e){
            return response()->json([
                'message'=> 'Something went wrong: '.$e->getMessage(),
                'response_code'=> '500',
            ]);
        }
        
    }
}
