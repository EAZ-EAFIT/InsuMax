<?php

namespace App\Utils;

use App\Interfaces\ProductSearch;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class HuggingFaceVectorSearch implements ProductSearch
{
    private function productRankPosition($product, $ranked)
    {
        return $ranked->search($product->id);
    }

    public function search(String $query): LengthAwarePaginator {

        $products = Product::all(['id', 'description']);
        $productIds   = $products->pluck('id')->toArray();
        $productTexts = $products->pluck('description')->toArray();

        $apiKey = env('HUGGINGFACE_API_KEY');
        $model = 'sentence-transformers/all-MiniLM-L6-v2';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type'  => 'application/json',
        ])->post("https://router.huggingface.co/hf-inference/models/{$model}/pipeline/sentence-similarity", [
            'inputs' => [
                'source_sentence' => $query,
                'sentences' => $productTexts,
            ],
        ]);

        $jsonResponse = $response->json();
        $orderedFilteredResponse = collect($productIds)
            ->combine($jsonResponse)
            ->filter(fn($similarity) => $similarity > 0.2)
            ->sortDesc()
            ->take(6);

        $rankedIdArray = $orderedFilteredResponse->keys();
        $similarProducts = Product::whereIn('id', $rankedIdArray)->get()
            ->sortBy(fn($product) => $rankedIdArray->search($product->getId()))
            ->values();

        return new LengthAwarePaginator($similarProducts, $similarProducts->count(), 6, 1);
    }
}