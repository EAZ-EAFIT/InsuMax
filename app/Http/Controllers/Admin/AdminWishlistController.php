<?php

/*
--------------------------------------------------------------------------
 Code developed by Esteban Álvarez
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminWishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['wishlists'] = Wishlist::paginate(10);

        return view('admin.wishlist.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.wishlist.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Wishlist::validate($request);

        // Falta el procesamiento de keywords. No se si se peuda aquí o toque en Utils

        Wishlist::create([
            'name' => $request->name,
            'user_id' => $request->userId,
        ]);

        return redirect()->route('admin.wishlist.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Wishlist::destroy($id);

        return back();
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['wishlist'] = Wishlist::findOrFail($id);

        return view('admin.wishlist.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Wishlist::validate($request);

        $wishlist = Wishlist::findOrFail($id);

        $wishlist->setName($request->input('name'));
        $wishlist->save();

        return redirect()->route('admin.wishlist.index');
    }
}
