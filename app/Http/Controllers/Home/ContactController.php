<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
