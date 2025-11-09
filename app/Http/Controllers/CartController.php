<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Utils\FinancialUtils;
use App\Utils\InventoryUtils;
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
            $total = FinancialUtils::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['products'] = $productsInCart;
        $viewData['total'] = FinancialUtils::convertToDollars($total);

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, int $id): RedirectResponse
    {
        $products = $request->session()->get('products');

        if (! isset($products) || ! array_key_exists($id, $products) || $products[$id] == 0) {
            $products[$id] = InventoryUtils::validateCartProductQuantity($request, $id);
        } else {
            $additionalQuantity = InventoryUtils::validateCartProductQuantity($request, $id);
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

    public function checkout(Request $request): View|RedirectResponse
    {
        $user = Auth::user();
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = FinancialUtils::sumPricesByQuantities($productsInCart, $productsInSession);

            $newBalance = FinancialUtils::calculateBalance($user->getBalance(), $total);
            if ($newBalance < 0) {
                return back()->with('error', __('messages.checkoutError'));
            }

            $availableInventory = InventoryUtils::validateInventoryBeforeCheckout($request, $productsInCart, $productsInSession);
            if (! $availableInventory) {
                return back()->with('error', __('messages.insufficientInventory'));
            }

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
                    'price' => $product->getPrice(),
                ]);
                InventoryUtils::updateProductInventory($request, $product->getId());
            }

            $user->setBalance($newBalance);
            $user->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['order'] = $order;

            return view('cart.checkout')->with('viewData', $viewData);
        }

        return view('cart.index');
    }
}
