<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use \Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['customers'] = Customer::all();

        return view('customer.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $customer = Customer::findOrFail($id);
        $viewData['customer'] = $customer;

        return view('customer.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('customer.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Customer::validate($request);
        
        Customer::create([
            'username' => $request->username,
            'password' => $request->password,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return back();
    }

    public function delete(string $id): RedirectResponse
    {
        Customer::destroy($id);

        return redirect()->route('customer.index');
    }
}
