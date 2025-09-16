<?php

/*
--------------------------------------------------------------------------
 Code developed by Mateo Pineda
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminHomeController extends Controller
{
    public function index(): View
    {
        return view('admin.home.index');
    }
}
