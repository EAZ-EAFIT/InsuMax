<?php

/*
--------------------------------------------------------------------------
 Code developed by Daniel Arcila
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Order::with(['user', 'items'])->get();

        return view('order.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $order = Order::with(['user', 'items'])->findOrFail($id);

        $viewData = [];
        $viewData['order'] = $order;

        return view('order.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['users'] = User::all();

        return view('order.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validate($request);

        $order = Order::create([
            'total' => $request->total,
            'has_shipped' => $request->has_shipped,
            'payment_type' => $request->payment_type,
            'user_id' => $request->user_id,
        ]);

        if ($request->has('items')) {
            foreach ($request->items as $itemData) {
                $item = new Item($itemData);
                $item->order_id = $order->id;
                $item->save();
            }
        }

        return redirect()->route('order.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Order::destroy($id);

        return redirect()->route('order.index');
    }

    public function cancel(int $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->cancelOrder();

        return redirect()->route('order.show', ['id' => $id]);
    }

    public function pay(int $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->pay();

        return redirect()->route('order.show', ['id' => $id]);
    }
}
