<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["products"] = Product::paginate(10);

        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function create(): View
    {
        return view('admin.product.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Product::validate($request);

        // Falta el procesamiento de keywords. No se si se peuda aquí o toque en Utils

        if ($request->hasFile('image')) {
            $imageName = str_replace(' ', '', $request->name) . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'image' => $imageName,
            'inventory' => $request->inventory,
            'price' => $request->price,
        ]);

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
        $viewData["product"] = Product::findOrFail($id);

        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Product::validate($request);

        $product = Product::findOrFail($id);

        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setKeywords($request->input('keywords'));
        if ($request->hasFile('image')) {
            $imageName = str_replace(' ', '', $product->getName()) . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }
        $product->setInventory($request->input('inventory'));
        $product->setPrice($request->input('price'));
        $product->save();

        return redirect()->route('admin.product.index');
    }
}
