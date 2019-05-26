<?php

namespace App\Http\Controllers\OthersControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Session;
use App\Modules\Mail\ContactMail;

class MailController extends Controller
{
    public function index() {
        return view('modules.others.pdf.billing');
    }

    public function contactMail(Request $request)
    {
        $this->validate($request,[
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
        ]);

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to("omar.carrasco@usach.cl")->send( new ContactMail($name, $email, $subject, $message) );
        Mail::to("guillermo.campos@usach.cl")->send( new ContactMail($name, $email, $subject, $message) );
        Mail::to("eduardo.pailemilla@usach.cl")->send( new ContactMail($name, $email, $subject, $message) );
        Session::flash("success");
        
        return back();
    }
}
