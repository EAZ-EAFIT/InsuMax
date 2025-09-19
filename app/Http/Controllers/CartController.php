<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cartItems = $request->session()->get('cart_item_data');

        $viewData = [];
        $viewData['cartItems'] = $cartItems;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request): RedirectResponse
    {

        $productId = $request->id;
        $quantity = $request->quantity;
        $product = Product::findOrFail($productId);

        $item = [
            'product_id' => $productId,
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'quantity' => $quantity,
        ];

        $cartItemData = $request->session()->get('cart_item_data');
        $item['price'] = $product->getPrice() * $item['quantity'];

        $cartItemData[$item['product_id']] = $item;

        $request->session()->put('cart_item_data', $cartItemData);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_item_data');

        return back();
    }

    public function checkout(Request $request): RedirectResponse
    {
        $cartItems = $request->session()->get('cart_item_data');
        $orderItems = [];

        $order = Order::create([
            'has_shipped' => false,
            'user_id' => auth()->id(),
            'total' => 0, // Will be calculated later
        ]);

        foreach ($cartItems as $itemData) {
            $product = Product::findOrFail($itemData['product_id']);
            $item = Item::create([
                'product_id' => $itemData['product_id'],
                'order_id' => $order->getId(),
                'quantity' => $itemData['quantity'],
                'price' => $itemData['price'],
            ]);
            $item->save();
            $orderItems[] = $item;
        }

        $order->setItems(new Collection($orderItems));
        $order->calculateTotal();
        $order->save();

        $request->session()->forget('cart_item_data');

        return redirect()->route('cart.index');
    }
}
