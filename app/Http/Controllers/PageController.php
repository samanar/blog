<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Mail;

class PageController extends Controller
{
    public function getIndex()
    {
        return view('home');
    }

    public function getAbout()
    {
        return view('about');
    }

    public function getContact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'description' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'description' => $request->description
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('ahmadianrad.saman@gmail.com');
            $message->subject('Contact form');
        });

        return redirect()->route('contact');

    }

}
