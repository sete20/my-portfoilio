<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
use Storage;
class portfolioManger extends Controller
{
    public function index(){
        $exists = Storage::disk('public')->exists('CV.pdf');
            if ($exists) {
            $file = Storage::disk('public')->get('CV.pdf');
            }
            // dd($file);
        return view('fiels.index');
    }

    public function contactMeessage(request $request){
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required'
            ]);
            // dd(
            //     $request->all()
            // );
            $contact = contact::create([
                'name'=>$request->name,
                'subject'=>$request->subject,
                'email'=>$request->email,
                'message'=>$request->message
                
                ]);
                \Mail::send('emails.contactus',
                array(
                    'name'=>$request->name,
                    'subject'=>$request->subject,
                    'email'=>$request->email,
                    'messages'=>$request->message
                ), function($message) use ($request)
            {
               $message->from($request->email);
               $message->to('Abdoghazy2016@gmail.com');
            });
           return back()->with('success', 'Thanks for contacting us!');
    }
}
