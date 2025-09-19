@extends('layouts.app')
@section("title", __('cart/index.title'))
@section("subtitle", __('cart/index.subtitle'))
@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>{{ __('cart/index.itemList') }}</h1>
      <ul>
        @if (!$viewData["cartItems"])
          <li>{{ __('cart/index.emptyCart') }}</li>
        @else
          @foreach($viewData["cartItems"] as $key => $item)
            <li>
              {{ __('cart/index.itemName') }} {{ $item["name"] }} -
              {{ __('cart/index.itemDescription') }} {{ $item["description"] }} -
              {{ __('cart/index.itemQuantity') }} {{ $item["quantity"] }} -
              {{ __('cart/index.itemPrice') }} {{ $item["price"] }}
            </li>
          @endforeach
        @endif
      </ul>
      <a href="{{ route('cart.checkout') }}">{{ __('cart/index.checkout') }}</a>
      <a href="{{ route('cart.removeAll') }}">{{ __('cart/index.removeAll') }}</a>
    </div>
  </div>
</div>
@endsection