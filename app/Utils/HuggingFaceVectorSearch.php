<?php

namespace App\Utils;

use App\Interfaces\ProductEmbed;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class HuggingFaceProductEmbed implements ProductEmbed
{
    public function embed(Request $request): JsonResponse{
        //$query = $request->input('product');
        $query = "Orthopedic and bone related devices";
        // Example: products loaded from DB
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

        dd($response->json(), $productTexts);

        $scores = $response->json();                
        $ranked = collect($productIds)
            ->combine($scores)                      
            ->sortDesc()                            
            ->take(10)                              
            ->keys()                           
            ->toArray();

        dd($ranked);
        return response()->json([
            'ranked' => $ranked
        ]);
    }

    public function embedMany(Request $request): JsonResponse{
        $products = $request->input('products');
        $apiKey = env('HUGGINGFACE_API_KEY');
        $model = 'sentence-transformers/all-MiniLM-L6-v2';
        $embeddings = [];
        foreach ($products as $product) {
            $response = $this->embed(new Request(['product' => $product]));
            $embeddings[] = $response->json('embedding');
        }

        return response()->json([
            'products' => $products,
            'embeddings' => $embeddings
        ]);
    }
}