<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function submitContactForm(Request $request){
        // dd($request->all());
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return response()->json([
            'redirect'=> url('/'),
            'message'=> 'Your message has been sent successfully',
            'response_code'=> '200',
        ]);
    }

    public function contact(){
        $contact = Contact::all();

        return view('admin.pages.contact',compact('contact'));
    }
}
