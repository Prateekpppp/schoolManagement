<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Principalmessage;
use App\Models\Staff;

class AppController extends Controller
{
    //
    public function index(){
        $banners = Banner::where('status',1)->get();
        $notices = Notice::where('status',1)->get();
        $galleries = Gallery::where('status',1)->limit(6)->get();
        $message = Principalmessage::first();
        return view('pages.index',compact('banners','galleries','notices','message'));
    }
    
    public function ourteam(){
        $data = Staff::where('status',4)->get();
        return view('pages.ourteam',compact('data'));
    }
}
