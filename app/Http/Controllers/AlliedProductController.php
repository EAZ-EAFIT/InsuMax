<?php

/*
--------------------------------------------------------------------------
 Code developed by Daniel Arcila
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AlliedProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['alliedProducts'] = [];

        $response = Http::timeout(5)->get('http://cellhub.store/api/mobilePhones');
        if ($response->ok()) {
            $viewData['alliedProducts'] = $response->json('data', []);
        }

        return view('allied.index')->with('viewData', $viewData);
    }
}
