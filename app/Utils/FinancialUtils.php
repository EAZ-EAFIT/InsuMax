<?php

namespace App\Utils;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class FinancialUtils
{
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


}