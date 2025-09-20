<?php

/*
--------------------------------------------------------------------------
 Code developed by Mateo Pineda
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($id);

        return view('product.show')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $search = $request->input('query');

        $viewData = [];
        $viewData['products'] = Product::where('name', 'like', '%'.$search.'%')->paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }
}
