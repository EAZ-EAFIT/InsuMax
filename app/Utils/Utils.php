<?php

namespace App\Utils;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Utils
{
    public static function processKeywords(string $keywords): string
    {
        return str_replace(' ', '', $keywords);
    }

    public static function storeImage(Request $request, Product $product): void
    {
        if ($request->hasFile('image')) {
            $imageName = $product->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
            $product->save();
        }
    }

    public static function sumPricesByQuantities(Collection $products, array $productsInSession): float
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * 100 * $productsInSession[$product->getId()]);
        }

        return $total / 100;
    }

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
        $requestedQuantity = $request->quantity;

        if ($requestedQuantity > $maxQuantity) {
            return $maxQuantity;
        } else {
            return $requestedQuantity;
        }
    }
}
