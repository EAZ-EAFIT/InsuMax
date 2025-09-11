<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();
        // TEST USER, ALWAYS THE SAME
        $viewData['customer'] = Customer::findOrFail(1);

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($id);
        // TEST USER, ALWAYS THE SAME
        $viewData['customer'] = Customer::findOrFail(1);

        return view('product.show')->with('viewData', $viewData);
    }
}
