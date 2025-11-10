<?php

/*
--------------------------------------------------------------------------
 Code developed by Mateo Pineda
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Interfaces\ProductSearch;
use App\Models\Notification;
use App\Models\Product;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::paginate(18);
        $viewData['expiringNotifications'] = [];

        if (Auth::check()) {
            $notifications = Notification::where('user_id', Auth::user()->getId())->get();
            Utils::updateNotificationsDate($notifications);
            $viewData['expiringNotifications'] = Utils::retrieveExpiringNotifications($notifications);
        }

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($id);

        return view('product.show')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $search = $request->input('query');
        $naturalLanguageProcessing = $request->input('naturalLanguageProcessing', false);

        $viewData = [];
        $viewData['products'] = app(ProductSearch::class, ['type' => $naturalLanguageProcessing])->search($search, 18);

        return view('product.index')->with('viewData', $viewData);
    }

    public function sortProduct(string $sortAttribute, string $sortMethod): View
    {
        $viewData = [];
        $viewData['products'] = Product::orderBy($sortAttribute, $sortMethod)->paginate(18);

        return view('product.index')->with('viewData', $viewData);
    }
}
