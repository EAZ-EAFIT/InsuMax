<?php

namespace App\Providers;

use App\Interfaces\ProductSearch;
use App\Utils\BaseSearch;
use App\Utils\VectorSearch;
use Illuminate\Support\ServiceProvider;

class ProductSearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductSearch::class, VectorSearch::class);
    }
}