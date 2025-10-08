<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatalogController extends Controller
{

    /**
     * Display the catalog view.
     */
    public function index()
    {
        return Inertia::render('Catalog/Index');
    }
}
