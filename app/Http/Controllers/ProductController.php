<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

// PARA BORRAR
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($id);

        return view('product.show')->with('viewData', $viewData);
    }

    // Funciones de testing para Notification BORRAR!!!!!
    public function test(): View
    {
        $viewData = [];
        $viewData['products'] = Product::paginate(9);

        return view('notification.create')->with('viewData', $viewData);
    }

    public function test2(int $id): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($id);

        return view('notification.set')->with('viewData', $viewData);
    }

    public function test3(Request $request): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($request->productId);
        $viewData['quantity'] = $request->quantity;
        $viewData['date'] = $request->date;
        $viewData['frequency'] = $request->frequency;

        return view('notification.save')->with('viewData', $viewData);
    }

    public function test4(): View
    {
        $notif1 = [];
        $notif1['product'] = Product::findOrFail(1);
        $notif1['quantity'] = 12;
        $notif1['nextDate'] = '2025-09-19';
        $notif1['frequency'] = 4;

        $notif2 = [];
        $notif2['product'] = Product::findOrFail(1);
        $notif2['quantity'] = 12;
        $notif2['nextDate'] = '2025-09-19';
        $notif2['frequency'] = 4;
        
        $viewData = [];
        $viewData['notifications'] = [$notif1, $notif2];

        return view('notification.index')->with('viewData', $viewData);
    }

    public function test5(): View
    {
        $notif1 = [];
        $notif1['product'] = Product::findOrFail(1);
        $notif1['quantity'] = 12;
        $notif1['nextDate'] = '2025-09-19';
        $notif1['frequency'] = 4;
        
        $viewData = [];
        $viewData['notification'] = $notif1;

        return view('notification.edit')->with('viewData', $viewData);
    }
}
