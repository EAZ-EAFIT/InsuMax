<?php

namespace App\Utils;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryUtils
{
    public static function updateProductInventory(Request $request, int $id): void
    {
        $productsInCart = $request->session()->get('products');
        $purchasedProduct = Product::findOrFail($id);
        $purchasedUnits = $productsInCart[$id];

        $purchasedProduct->setInventory($purchasedProduct->getInventory() - $purchasedUnits);
        $purchasedProduct->save();
    }

    public static function validateCartProductQuantity(Request $request, int $id): int
    {
        $savedProduct = Product::findOrFail($id);
        $maxQuantity = $savedProduct->getInventory();
        $requestedQuantity = $request->input('quantity');

        if ($requestedQuantity > $maxQuantity) {
            return $maxQuantity;
        } else {
            return $requestedQuantity;
        }
    }

    public static function validateInventoryBeforeCheckout(Request $request, Collection $productsInCart, array $productsInSession): bool
    {
        foreach ($productsInCart as $product) {
            $requestedQuantity = $productsInSession[$product->getId()];
            if ($requestedQuantity > $product->getInventory()) {
                return false;
            }
        }
        return true;
    }
}