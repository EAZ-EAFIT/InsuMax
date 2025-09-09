<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['wishlists'] = Item::all();

        return view('item.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $wishlist = Wishlist::findOrFail($id);
        $viewData['wishlist'] = $wishlist;

        return view('wishlist.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('wishlist.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Wishlist::validate($request);

        Wishlist::create([
            'name' => $request->name,
        ]);

        return back();
    }

    public function delete(string $id): RedirectResponse
    {
        Wishlist::destroy($id);

        return redirect()->route('wishlist.index');
    }
}
