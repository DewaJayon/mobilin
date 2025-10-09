<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{


    /**
     *  Display the about view.
     *
     * @return \Inertia\Response
     */

    public function index()
    {
        return Inertia::render('About/Index');
    }
}
