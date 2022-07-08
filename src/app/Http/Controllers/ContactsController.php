<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    //
    public function contact()
    {
        return view('properties.show');
    }

    public function confirm(ContactFormRequest $request)
    {
        $contact = $request->all();

        return view('properties.show')->with([
            'contact' => $contact
        ]);
    }

    public function send(ContactFormRequest $request)
    {
        // $contact = $request->all();
        // Mail::to('your_address@example.com')->send(new ContactSendmail($contact));
        // $request->session()->regenerateToken();
        // return view('contact.thanks');
    }
}
