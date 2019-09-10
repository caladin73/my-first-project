<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {  

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to('test@test.com')->send(new ContactFormMail($data));

        //opret session og bruge flash til at sende en besked til brugeren at email er sendt
        //session()->flash('message', 'Thanks for your message. We will be in touch.');

        //redirect til contact med besked til brugeren
        //return redirect('contact');

        //anden måde sende besked på via session, i kun en linje ved hjælp af with, den virker kun en gang
        return redirect('contact')->with('message', 'Thanks for your message. We will be in touch.');

    }
}
