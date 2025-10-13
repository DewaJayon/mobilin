<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{

    /**
     * Index page
     *
     * @return \Inertia\Response
     */
    public function index()
    {

        $cars = Car::with('category')->latest()->limit(6)->get();

        return Inertia::render('Home/Index', [
            'cars' => $cars
        ]);
    }
}
