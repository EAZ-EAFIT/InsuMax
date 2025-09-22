<?php

/*
--------------------------------------------------------------------------
 Code developed by Mateo Pineda
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Utils\Utils;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::paginate(10);

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.product.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Product::validate($request);

        $newProduct = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'keywords' => Utils::processKeywords($request->keywords),
            'image' => 'none',
            'inventory' => $request->inventory,
            'price' => $request->price,
        ]);

        Utils::storeImage($request, $newProduct);

        return redirect()->route('admin.product.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Product::destroy($id);

        return back();
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($id);

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Product::validate($request);

        $product = Product::findOrFail($id);

        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setKeywords($request->input('keywords'));
        Utils::storeImage($request, $product);
        $product->setInventory($request->input('inventory'));
        $product->setPrice($request->input('price'));
        $product->save();

        return redirect()->route('admin.product.index');
    }
}
