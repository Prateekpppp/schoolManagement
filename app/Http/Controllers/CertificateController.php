<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    //

    public function certificate(Request $request){
        $data = Student::join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->select('students.*','classes.class','sections.section');

        $data = $data->where('students.id',$request->id)->first();
        // dd($request->type);
        if($request->type == 'tc'){
            return view('admin.pages.transferCertificate',compact('data'));
        } elseif ($request->type == 'cc'){
            return view('admin.pages.characterCertificate',compact('data'));
        } elseif($request->type == 'mg'){
            return view('admin.pages.migrationCertificate',compact('data'));
                
        }
    }
}
