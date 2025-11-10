<?php

namespace App\Utils;

use App\Interfaces\ProductSearch;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseSearch implements ProductSearch
{
    public function search(string $searchString, int $perPage): LengthAwarePaginator
    {
        $searchResults = Product::where('name', 'like', '%'.$searchString.'%')->orWhere('keywords', 'like', '%'.$searchString.'%')->paginate($perPage);

        return $searchResults;
    }
}
