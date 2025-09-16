<?php

/*
--------------------------------------------------------------------------
 Code developed by Esteban Álvarez
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['items'] = Item::all();

        return view('item.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $item = Item::findOrFail($id);
        $viewData['item'] = $item;

        return view('item.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('item.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Item::validate($request);

        Item::create([
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return back();
    }

    public function delete(string $id): RedirectResponse
    {
        Item::destroy($id);

        return redirect()->route('item.index');
    }
}
