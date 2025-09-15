@extends('layouts.app')
@section('title', 'Order Details')
@section('content')
    <header>
        <h1>Order #{{ $viewData['order']->getId() }}</h1>
    </header>
    <div>
        <p><strong>Date:</strong> {{ $viewData['order']->getCreatedAt() }}</p>
        <p><strong>Total:</strong> ${{ $viewData['order']->getTotal() }}</p>
        <p><strong>Payment Type:</strong> {{ $viewData['order']->getPaymentType() }}</p>
        <p><strong>Status:</strong> {{ $viewData['order']->getHasShipped() ? 'Shipped' : 'Pending' }}</p>
        <p><strong>Customer:</strong> {{ $viewData['order']->getCustomer()->getName() }}</p>
        <h3>Items</h3>
        <ul>
            @foreach ($viewData['order']->getItems() as $item)
                <li>
                    {{ $item->getProduct()->getName() }} - Quantity: {{ $item->getQuantity() }} - Price: ${{ $item->getPrice() }}
                </li>
            @endforeach
        </ul>
        <a href="{{ route('order.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection