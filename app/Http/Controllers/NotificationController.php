<?php

/*
--------------------------------------------------------------------------
 Code developed by Daniel Arcila
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['notifications'] = Notification::with('product')->where('user_id', Auth::user()->getId())->get();

        return view('notification.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['products'] = Product::paginate(9);

        return view('notification.create')->with('viewData', $viewData);
    }

    public function set(int $id): View
    {
        $viewData = [];
        $viewData['product'] = Product::findOrFail($id);
        $viewData['user'] = Auth::user();

        return view('notification.set')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        Notification::validate($request);

        Notification::create([
            'date' => $request->date,
            'time_interval' => $request->timeInterval,
            'quantity' => $request->quantity,
            'product_id' => $request->productId,
            'user_id' => Auth::user()->getId(),
        ]);

        $viewData = [];
        $viewData['date'] = $request->date;
        $viewData['timeInterval'] = $request->timeInterval;
        $viewData['quantity'] = $request->quantity;
        $viewData['product'] = Product::findOrFail($request->productId);

        return view('notification.save')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['notification'] = Notification::findOrFail($id);

        return view('notification.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Notification::validate($request);

        $notification = Notification::findOrFail($id);

        $notification->setQuantity($request->input('quantity'));
        $notification->setTimeInterval($request->input('timeInterval'));
        $notification->save();

        return redirect()->route('notification.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Notification::destroy($id);

        return redirect()->route('notification.index');
    }

    public function notify(int $id): RedirectResponse
    {
        $notification = Notification::findOrFail($id);
        $notification->notify();

        return redirect()->route('notification.show', ['id' => $id]);
    }

    public function show(int $id): View
    {
        $notification = Notification::with(['product', 'customer'])->findOrFail($id);

        $viewData = [];
        $viewData['notification'] = $notification;

        return view('notification.show')->with('viewData', $viewData);
    }
}
