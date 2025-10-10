<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{

    /**
     *  Display the contact view.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Contact/Index');
    }

    /**
     * Send the contact message to the admin email.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'telephone' => 'required|numeric',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        Mail::to('dev-jayon@dewajayon.my.id')->send(new ContactMessageMail($data));

        return redirect()->route('contact')->with('success', 'Pesan Anda telah dikirim.');
    }
}
