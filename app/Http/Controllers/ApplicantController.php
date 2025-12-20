<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    //
    public function applyNow(Request $request){
        $applicant = new Applicant();
        $applicant->name = $request->name;
        $applicant->job_id = $request->job_id;
        $applicant->email = $request->email;
        $applicant->phone = $request->phone;
        $applicant->gender = $request->gender;
        
        if (!empty($request->allFiles())) {
            $file = $request->file('uploads');
            $request->uploads = '/uploads/'.time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('', $request->uploads, 'public'); // Store in 'public/uploads'

            $applicant->uploads = $request->uploads;
        } else{
            return response()->json([
                'message'=> 'Please upload your resume',
                'response_code'=> '101',
            ]);
        }
        $applicant->save();
        return response()->json([
            'redirect'=> url('/'),
            'message'=> 'Application submitted successfully',
            'response_code'=> '200',
        ]);
    }
    
    public function applicants(){
        $applicants = Applicant::leftJoin('jobs', 'applicants.job_id', '=', 'jobs.id')
        ->select('applicants.*', 'jobs.title')
        ->get();
        // dd($applicants);
        return view('admin.pages.applicants',compact('applicants'));
    }
}
