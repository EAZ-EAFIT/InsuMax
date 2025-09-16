<?php

/*
--------------------------------------------------------------------------
 Code developed by Daniel Arcila
--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Notification;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['notifications'] = Notification::with(['product', 'customer'])->get();

        return view('notification.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $notification = Notification::with(['product', 'customer'])->findOrFail($id);

        $viewData = [];
        $viewData['notification'] = $notification;

        return view('notification.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();
        $viewData['customers'] = Customer::all();

        return view('notification.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Notification::validate($request);

        Notification::create([
            'notification_date' => $request->notification_date,
            'time_interval' => $request->time_interval,
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'customer_id' => $request->customer_id,
        ]);

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
}
