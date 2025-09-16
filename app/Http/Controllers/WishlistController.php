<?php

/*
--------------------------------------------------------------------------
 Code developed by Esteban Álvarez
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];

        // TEST USER, ALWAYS THE SAME
        $viewData['user'] = Auth::user();
        $viewData['wishlists'] = Wishlist::with('products')->where('user_id', $viewData['user']->getId())->get();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        // TEST USER, ALWAYS THE SAME
        $user = User::findOrFail(1);

        $wishlist = Wishlist::with('products')->where('user_id', $user->getId())->where('id', $id)->firstOrFail();

        $viewData = [];
        $viewData['wishlist'] = $wishlist;
        $viewData['user'] = $user;

        return view('wishlist.show')->with('viewData', $viewData);
    }

    public function addOptions(int $productId): View|RedirectResponse
    {
        // TEST USER, ALWAYS THE SAME
        $user = User::findOrFail(1);

        $wishlists = Wishlist::where('user_id', $user->getId())->get();
        $product = Product::findOrFail($productId);

        $viewData = [];
        $viewData['wishlists'] = $wishlists;
        $viewData['user'] = $user;
        $viewData['product'] = $product;

        return view('wishlist.addOptions')->with('viewData', $viewData);
    }

    public function addProduct(Request $request): RedirectResponse
    {
        // TEST USER, ALWAYS THE SAME
        $user = User::findOrFail(1);

        $wishlistId = $request->input('wishlistId');
        $productId = $request->input('productId');

        $wishlist = Wishlist::where('user_id', $user->getId())->where('id', $wishlistId)->firstOrFail();
        $product = Product::findOrFail($productId);
        $wishlist->addProduct($product);
        $wishlist->save();

        return redirect()->route('product.index');
    }

    public function deleteProduct(Request $request): RedirectResponse
    {
        // TEST USER, ALWAYS THE SAME
        $user = User::findOrFail(1);

        $wishlistId = $request->input('wishlistId');
        $productId = $request->input('productId');

        $wishlist = Wishlist::where('user_id', $user->getId())->where('id', $wishlistId)->firstOrFail();
        $product = Product::findOrFail($productId);
        $wishlist->removeProduct($product);
        $wishlist->save();

        return back();
    }

    public function create(): View
    {
        // TEST USER, ALWAYS THE SAME
        $viewData = [];
        $viewData['user'] = User::findOrFail(1);

        return view('wishlist.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {

        $user = User::findOrFail(1); // TEST USER, ALWAYS THE SAME
        Wishlist::validate($request);
        Wishlist::create(['name' => $request->name, 'user_id' => $user->getId()]);

        return redirect()->route('wishlist.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Wishlist::destroy($id);

        return redirect()->route('wishlist.index');
    }
}
