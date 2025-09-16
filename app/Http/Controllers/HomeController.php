<?php

/*
--------------------------------------------------------------------------
 Code developed by Esteban Álvarez
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }
}
