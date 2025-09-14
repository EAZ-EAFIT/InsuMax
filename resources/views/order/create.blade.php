@extends('layouts.app')
@section('title', 'Create Order')
@section('content')
    <header>
        <h1>Create Order</h1>
    </header>
    <form action="{{ route('order.save') }}" method="POST">
        @csrf
        <label for="customer_id">Customer:</label>
        <select name="customer_id" id="customer_id" required>
            @foreach ($viewData['customers'] as $customer)
                <option value="{{ $customer->getId() }}">{{ $customer->getName() }}</option>
            @endforeach
        </select>
        <label for="payment_type">Payment Type:</label>
        <input type="text" name="payment_type" id="payment_type" required>
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" min="0" required>
        <label for="has_shipped">Has Shipped:</label>
        <select name="has_shipped" id="has_shipped">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('order.index') }}" class="btn btn-secondary">Back</a>
@endsection