<?php

namespace App\Utils;

use App\Models\Product;
use Carbon\Carbon;
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
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }

    public static function convertToDollars(int $priceInCents): float
    {
        return $priceInCents / 100;
    }

    public static function calculateBalance(int $currentBalance, int $amount): int
    {
        if ($currentBalance - $amount < 0) {
            return -1;
        }

        return $currentBalance - $amount;
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
        $requestedQuantity = $request->input('quantity');

        if ($requestedQuantity > $maxQuantity) {
            return $maxQuantity;
        } else {
            return $requestedQuantity;
        }
    }

    public static function updateNotificationsDate(Collection $notifications): void
    {

        foreach ($notifications as $notification) {
            $originalDate = $notification->getDate();
            $notificationDate = Carbon::parse($notification->getDate());

            while ($notificationDate->lessThan(Carbon::today())) {
                $notificationDate->addDays($notification->getTimeInterval());
                $notification->setDate($notificationDate->toDateString());
            }

            if ($notification->getDate() !== $originalDate) {
                $notification->save();
            }
        }
    }

    public static function retrieveExpiringNotifications(Collection $notifications): array
    {
        $nextNotifications = [];

        foreach ($notifications as $notification) {
            $notificationDate = Carbon::parse($notification->getDate());
            if ($notificationDate->lessThan(Carbon::today()->addDays(6))) {
                $remainingDays = Carbon::today()->diffInDays($notificationDate, false);
                $nextNotifications[$notification->getProduct()->getName()] = $remainingDays;
            }
        }

        return $nextNotifications;
    }
}
