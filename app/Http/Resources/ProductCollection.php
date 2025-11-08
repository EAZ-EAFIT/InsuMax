<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($product) {
                return [
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'description' => $product->getDescription(),
                    'price' => $product->getPrice(),
                ];
            }),
            'additionalData' => [
                'storeName' => 'InsuMax',
                'storeProductsLink' => 'http://insumax.zone.id/products',
            ],
        ];
    }
}
