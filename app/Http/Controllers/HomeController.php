<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // TEST USER, ALWAYS THE SAME
        $customer = Customer::findOrFail(1);
        $viewData = ['customer' => $customer];

        return view('home.index')->with('viewData', $viewData);
    }
}
