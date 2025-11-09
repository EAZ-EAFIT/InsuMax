<?php

namespace App\Utils;

use App\Interfaces\ProductSearch;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseSearch implements ProductSearch
{
    public function search(String $searchString): LengthAwarePaginator
    {
        $searchResults = Product::where('name', 'like', '%'.$searchString.'%')->orWhere('keywords', 'like', '%'.$searchString.'%')->paginate(18);
        return $searchResults;
    }
}