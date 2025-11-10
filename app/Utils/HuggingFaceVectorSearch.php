<?php

namespace App\Utils;

use App\Interfaces\ProductSearch;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class HuggingFaceVectorSearch implements ProductSearch
{
    public function search(string $query, int $productsPerPage): LengthAwarePaginator
    {
        $SIMILARITY_THRESHOLD = 0.2;
        $products = Product::all(['id', 'description']);
        $productIds = $products->pluck('id')->toArray();
        $productDescriptions = $products->pluck('description')->toArray();

        $apiKey = env('HUGGINGFACE_API_KEY');
        $model = env('HUGGINGFACE_MODEL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$apiKey,
            'Content-Type' => 'application/json',
        ])->post("https://router.huggingface.co/hf-inference/models/{$model}/pipeline/sentence-similarity", [
            'inputs' => [
                'source_sentence' => $query,
                'sentences' => $productDescriptions,
            ],
        ]);

        $jsonResponse = $response->json();
        $orderedFilteredResponse = collect($productIds)
            ->combine($jsonResponse)
            ->filter(fn ($similarity) => $similarity > $SIMILARITY_THRESHOLD)
            ->sortDesc();

        $rankedIdArray = $orderedFilteredResponse->keys();
        $similarProducts = Product::whereIn('id', $rankedIdArray)->get()
            ->sortBy(fn ($product) => $rankedIdArray->search($product->getId()))
            ->values();

        return new LengthAwarePaginator($similarProducts, $similarProducts->count(), $productsPerPage, 1);
    }
}
