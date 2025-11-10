<?php

namespace App\Providers;

use App\Interfaces\ProductSearch;
use App\Utils\BaseSearch;
use App\Utils\HuggingFaceVectorSearch;
use Illuminate\Support\ServiceProvider;

class ProductSearchServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductSearch::class, function ($app, $params) {
            if ($params['type']) {
                return new HuggingFaceVectorSearch;
            }

            return new BaseSearch;
        });
    }
}
