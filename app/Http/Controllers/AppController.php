<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Notice;

class AppController extends Controller
{
    //
    public function index(){
        $banners = Banner::where('status',1)->get();
        $notices = Notice::where('status',1)->get();
        $galleries = Gallery::where('status',1)->limit(6)->get();
        return view('pages.index',compact('banners','galleries','notices'));
    }
}
