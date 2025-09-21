<?php

/*
--------------------------------------------------------------------------
 Code developed by Mateo Pineda
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Item;
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
        $viewData['products'] = Product::where('name', 'like', '%'.$search.'%')->orWhere('keywords', 'like', '%'.$search.'%')->paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }

    public function sortPrice(): View
    {
        $viewData = [];
        $viewData['products'] = Product::orderBy('price', 'asc')->paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }

    public function sortName(): View
    {
        $viewData = [];
        $viewData['products'] = Product::orderBy('name', 'asc')->paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }

    public function sortInventory(): View
    {
        $viewData = [];
        $viewData['products'] = Product::orderByDesc('inventory')->paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }

    public function sortRecentlyAdded(): View
    {
        $viewData = [];
        $viewData['products'] = Product::orderByDesc('created_at')->paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }
}
