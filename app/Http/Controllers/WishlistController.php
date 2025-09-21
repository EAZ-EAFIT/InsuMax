<?php

/*
--------------------------------------------------------------------------
 Code developed by Esteban Álvarez
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['wishlists'] = Wishlist::with('products')->where('user_id', Auth::user()->getId())->get();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function addOptions(int $productId): View|RedirectResponse
    {
        $viewData = [];
        $viewData['wishlists'] = Wishlist::where('user_id', Auth::user()->getId())->get();
        $viewData['product'] = Product::findOrFail($productId);

        return view('wishlist.addOptions')->with('viewData', $viewData);
    }

    public function addProduct(Request $request): RedirectResponse
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->getId())->where('id', $request->wishlistId)->firstOrFail();
        $product = Product::findOrFail($request->productId);
        $wishlist->addProduct($product);
        $wishlist->save();

        return redirect()->route('product.index');
    }

    public function deleteProduct(Request $request): RedirectResponse
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->getId())->where('id', $request->wishlistId)->firstOrFail();
        $product = Product::findOrFail($request->productId);
        $wishlist->removeProduct($product);
        $wishlist->save();

        return back();
    }

    public function create(): View
    {
        return view('wishlist.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Wishlist::validate($request);
        Wishlist::create(['name' => $request->name, 'user_id' => Auth::user()->getId()]);

        return redirect()->route('wishlist.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Wishlist::destroy($id);

        return redirect()->route('wishlist.index');
    }
}
