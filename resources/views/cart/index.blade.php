@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/cart/index.css') }}">
@endsection
@section('title', __('cart/index.title'))
@section('content')
<h1 class="dark-blue">{{ __('cart/index.subtitle') }}</h1>

@if (count($viewData['products']))
<form action="" method="post">
  @csrf
  @method('POST')
  <div class="cart-header grid">
    <p class="dark-blue bold">{{ __('cart/index.product') }}</p>
    <p class="dark-blue bold">{{ __('cart/index.price') }}</p>
    <p class="dark-blue bold">{{ __('cart/index.quantity') }}</p>
  </div>
  @foreach ($viewData['products'] as $product)
  <div class="product-wrapper flex column">
    <div class="grid">
      <div class="product-container flex column center">
        <img src="{{ $product->getImage() }}" alt="{{ $product->getName() }}">
        <p class="light-blue semibold">{{ $product->getName() }}</p>
      </div>

      <span class="light-blue">{{ __('cart/index.currency') }}{{ $product->getPrice() }}</span>

      <span class="light-blue">{{ session('products')[$product->getId()] }}</span>
    </div>

    <form action="" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="delete-btn brown flex center">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
          <path d="M4.75 9.5H7.91667H33.25" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M30.0832 9.49984V31.6665C30.0832 32.5064 29.7495 33.3118 29.1557 33.9057C28.5618 34.4995 27.7564 34.8332 26.9165 34.8332H11.0832C10.2433 34.8332 9.43786 34.4995 8.844 33.9057C8.25013 33.3118 7.9165 32.5064 7.9165 31.6665V9.49984M12.6665 9.49984V6.33317C12.6665 5.49332 13.0001 4.68786 13.594 4.094C14.1879 3.50013 14.9933 3.1665 15.8332 3.1665H22.1665C23.0064 3.1665 23.8118 3.50013 24.4057 4.094C24.9995 4.68786 25.3332 5.49332 25.3332 6.33317V9.49984" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M15.8335 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M22.1665 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        {{ __('cart/index.removeProduct') }}
      </button>
    </form>
  </div>
  @endforeach
  <div class="checkout-container flex column">
    <p class="light-blue">
      {{ __('cart/index.total') }}
      <span class="dark-blue semibold">
        {{ __('cart/index.currency') }}{{ $viewData["total"] }}
      </span>
    </p>
    <button type="submit" class="btn-checkout btn-dark-blue">
      {{ __('cart/index.checkout') }}
    </button>
    <a href="" class="btn-remove-all btn-dark-blue semibold">
      {{ __('cart/index.removeAllProducts') }}
    </a>
  </div>
</form>
@else
<div class="flex center light-blue">
  <h3>{{ __('cart/index.empty') }}</h3>
</div>
@endif
@endsection