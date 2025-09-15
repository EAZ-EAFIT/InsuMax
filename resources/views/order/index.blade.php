@extends('layouts.app')
@section('title', 'Orders')
@section('content')
    <header>
        <h1>Orders</h1>
    </header>
    <div>
        <a href="{{ route('order.create') }}">Create Order</a>
        <ul>
            @foreach ($viewData['orders'] as $order)
                <li>
                    <a href="{{ route('order.show', $order->getId()) }}">
                        Order #{{ $order->getId() }} - {{ $order->getCreatedAt() }} - ${{ $order->getTotal() }}
                    </a>
                    <form action="{{ route('order.delete', $order->getId()) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    @if(!$order->getHasShipped())
                        <form action="{{ route('order.cancel', $order->getId()) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Cancel</button>
                        </form>
                        <form action="{{ route('order.pay', $order->getId()) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Pay</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection