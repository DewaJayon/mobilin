<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SecurityController extends Controller
{

    /**
     * Display the profile security view.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('ProfileSecurity/Index');
    }
}
