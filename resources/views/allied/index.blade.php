@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/product/index.css') }}">
@endsection
@section('title', 'Allied products')
@section('content')
<main>
  <h1 class="dark-blue">{{ __('allied/index.title') }}</h1>

  @if (count($viewData['alliedProducts']))
  <div class="products-container grid">
    @foreach ($viewData['alliedProducts'] as $product)
    <div class="product-card dark-blue-bg">
      <div class="product-card-img">
        <img src="{{ asset('/images/no-image.png') }}" alt="{{ $product['name'] }}">
      </div>
      <div class="product-card-details flex center">
        <div class="product-text flex column">
          <p class="yellow">{{ $product['name'] }}</p>
          <p class="white">{{ __('product/index.currency') }}{{ $product['price'] }}</p>
          <p class="white small">{{ $product['brand'] }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <div class="flex center light-blue">
    <h3>{{ __('allied/index.no_products') }}</h3>
  </div>
  @endif
</main>
@endsection