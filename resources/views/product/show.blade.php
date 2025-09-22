@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/product/show.css') }}">
@endsection
@section('title', __('product/show.title'))
@section('content')
<div class="product-container flex">
  <img src="{{ $viewData['product']->getImage() }}" alt="{{ $viewData['product']->getName() }}">
  <div class="product-details flex column center">
    <h1 class="white semibold">{{ $viewData['product']->getName() }}</h1>
    <p class="white">{{ $viewData['product']->getDescription() }}</p>

    <div class="qty-price-container flex center">
      <form id="product-qty" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="id" value="{{ $viewData['product']->getId() }}">
        <div class="flex center">
          <button class="qty-btn flex center" id="decrement" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M5 12H19" stroke="#1B2632" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>

          <div class="qty-container flex center">
            <input type="number" id="quantity" name="quantity" min="1" max="{{ $viewData['product']->getInventory() }}" value="1">
          </div>

          <button class="qty-btn flex center" id="increment" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12 5V19" stroke="#1B2632" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M5 12H19" stroke="#1B2632" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </form>
      <p class="white semibold">{{ __('product/show.currency') }}{{ $viewData['product']->getPrice() }}{{ __('product/show.unit') }}</p>
    </div>

    @if ($viewData['product']->getInventory() > 0)
    <button type="submit" form="product-qty" class="btn">{{ __('product/show.addCart') }}</button>
    @if(session('success'))
    <p class="yellow">
      {{ session('success') }}
    </p>
    @endif
    @else
    <p class="yellow">{{ __('product/show.noStock') }}</p>
    @endif

    <a href="{{ route('wishlist.addOptions', $viewData['product']->getId()) }}" class="white flex center">
      <div class="heart-btn white-bg flex center">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
          <path d="M34.7335 7.68332C33.8822 6.83167 32.8715 6.15607 31.759 5.69513C30.6466 5.23419 29.4543 4.99695 28.2501 4.99695C27.046 4.99695 25.8536 5.23419 24.7412 5.69513C23.6288 6.15607 22.618 6.83167 21.7668 7.68332L20.0001 9.44999L18.2335 7.68332C16.514 5.96384 14.1818 4.99784 11.7501 4.99784C9.3184 4.99784 6.98627 5.96384 5.26678 7.68332C3.5473 9.40281 2.5813 11.7349 2.5813 14.1667C2.5813 16.5984 3.5473 18.9305 5.26678 20.65L7.03345 22.4167L20.0001 35.3833L32.9668 22.4167L34.7335 20.65C35.5851 19.7987 36.2607 18.788 36.7216 17.6756C37.1826 16.5632 37.4198 15.3708 37.4198 14.1667C37.4198 12.9625 37.1826 11.7702 36.7216 10.6577C36.2607 9.5453 35.5851 8.53458 34.7335 7.68332Z" stroke="#1B2632" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
      <p>{{ __('product/show.addWishlist') }}</p>
    </a>
  </div>
</div>
<a href="{{ route('product.index') }}" class="btn-dark-blue">{!! __('product/show.back') !!}</a>
@endsection
@section('scripts')
<script src="{{ asset('/js/product/show.js') }}"></script>
@endsection