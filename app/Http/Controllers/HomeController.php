<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }
}
