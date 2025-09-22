<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Utils\Utils;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $productsInCart = [];

        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Utils::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['products'] = $productsInCart;
        $viewData['total'] = $total;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, int $id): RedirectResponse
    {
        $products = $request->session()->get('products');

        if (! isset($products) || ! array_key_exists($id, $products) || $products[$id] == 0) {
            $products[$id] = Utils::validateCartProductQuantity($request, $id);
        } else {
            $additionalQuantity = Utils::validateCartProductQuantity($request, $id);
            $products[$id] = $products[$id] + $additionalQuantity;
        }

        $request->session()->put('products', $products);

        return back()->with('success', __('messages.addToCartSuccess'));
    }

    public function remove(Request $request, int $id): RedirectResponse
    {
        $products = $request->session()->get('products');

        if (isset($products[$id])) {
            unset($products[$id]);
            $request->session()->put('products', $products);
        }

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('products');

        return back();
    }

    public function checkout(Request $request): View
    {
        $user = Auth::user();
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Utils::sumPricesByQuantities($productsInCart, $productsInSession);
            $order = Order::create([
                'has_shipped' => false,
                'user_id' => $user->getId(),
                'total' => $total,
            ]);

            foreach ($productsInCart as $product) {
                Item::create([
                    'product_id' => $product->getId(),
                    'order_id' => $order->getId(),
                    'quantity' => $productsInSession[$product->getId()],
                    'price' => $product->getPrice() * 100,
                    // Revisar el getPrice de product que siempre se divide por 100
                ]);
                Utils::updateProductInventory($request, $product->getId());
            }

            $newBalance = $user->getBalance() - $total;
            $user->setBalance($newBalance);
            $user->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['order'] = $order;

            return view('cart.checkout')->with('viewData', $viewData);
        } else {
            return view('cart.index');
        }
    }
}
