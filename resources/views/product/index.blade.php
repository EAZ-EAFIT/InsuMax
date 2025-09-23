@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <header>
        <h1>Products</h1>
    </header>
    @if(isset($viewData['bannerNotifications']) && $viewData['bannerNotifications']->count())
        <div class="notification-banner">
            @foreach($viewData['bannerNotifications'] as $notification)
                <div class="banner-message">
                    {{ __('You have a reminder for product') }}: <b>{{ $notification->getProduct()->getName() }}</b>
                    ({{ $notification->getNotificationDate() }})
                </div>
            @endforeach
        </div>
    @endif
    <div>
        @foreach ($viewData['products'] as $product)
            <div>
                <span>{{ $product->getName() }}</span>
                <img src="{{ $product->getImage() }}" alt="{{ $product->getName() }}" style="width:100px;height:100px;">
                <span>{{ $product->getPrice() }}</span>
                <a href="{{ route('product.show', $product->getId()) }}">View Details</a>

                @if(!empty($product) && $product->getId())
                    <a href="{{ route('wishlist.addOptions', ['productId' => $product->getId()]) }}">
                        Add to Wishlist
                    </a>
                @endif
            </div>
        @endforeach
    </div>
@endsection
