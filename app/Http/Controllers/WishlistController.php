<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];

        // TEST USER, ALWAYS THE SAME
        $viewData['customer'] = Customer::findOrFail(1);
        $viewData['wishlists'] = Wishlist::with('products')->where('customer_id', $viewData['customer']->getId())->get();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        // TEST USER, ALWAYS THE SAME
        $customer = Customer::findOrFail(1);

        $wishlist = Wishlist::with('products')->where('customer_id', $customer->getId())->where('id', $id)->firstOrFail();

        $viewData = [];
        $viewData['wishlist'] = $wishlist;
        $viewData['customer'] = $customer;

        return view('wishlist.show')->with('viewData', $viewData);
    }

    public function addOptions(int $productId): View | RedirectResponse
    {
        // TEST USER, ALWAYS THE SAME
        $customer = Customer::findOrFail(1);

        $wishlists = Wishlist::where('customer_id', $customer->getId())->get();
        $product = Product::findOrFail($productId);

        $viewData = [];
        $viewData['wishlists'] = $wishlists;
        $viewData['customer'] = $customer;
        $viewData['product'] = $product;

    return view('wishlist.addOptions')->with('viewData', $viewData);

    }

    public function addProduct(Request $request): RedirectResponse
    {
        // TEST USER, ALWAYS THE SAME
        $customer = Customer::findOrFail(1);

        $wishlistId = $request->input('wishlistId');
        $productId = $request->input('productId');

        $wishlist = Wishlist::where('customer_id', $customer->getId())->where('id', $wishlistId)->firstOrFail();
        $product = Product::findOrFail($productId);
        $wishlist->addProduct($product);
        $wishlist->save();

        return redirect()->route('product.index');
    }

    public function deleteProduct(Request $request): RedirectResponse
    {
        // TEST USER, ALWAYS THE SAME
        $customer = Customer::findOrFail(1);

        $wishlistId = $request->input('wishlistId');
        $productId = $request->input('productId');

        $wishlist = Wishlist::where('customer_id', $customer->getId())->where('id', $wishlistId)->firstOrFail();
        $product = Product::findOrFail($productId);
        $wishlist->removeProduct($product);
        $wishlist->save();

        return back();
    }



    public function create(): View
    {
        // TEST USER, ALWAYS THE SAME
        $viewData = [];
        $viewData['customer'] = Customer::findOrFail(1);

        return view('wishlist.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {

        $customer = Customer::findOrFail(1); // TEST USER, ALWAYS THE SAME
        Wishlist::validate($request);
        Wishlist::create(['name' => $request->name, 'customer_id' => $customer->getId()]);

        return redirect()->route('wishlist.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Wishlist::destroy($id);

        return redirect()->route('wishlist.index');
    }
}
