@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/wishlist/index.css') }}">
@endsection
@section('title', __('wishlist/index.title'))
@section('content')
<div class="title-container flex center">
  <h1 class="dark-blue">{{ __('wishlist/index.subtitle') }}</h1>
  @guest
  @else
  <a href="{{ route('wishlist.create') }}" class="btn-dark-blue flex center">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
      <path d="M24.9998 45.8332C36.5058 45.8332 45.8332 36.5058 45.8332 24.9998C45.8332 13.4939 36.5058 4.1665 24.9998 4.1665C13.4939 4.1665 4.1665 13.4939 4.1665 24.9998C4.1665 36.5058 13.4939 45.8332 24.9998 45.8332Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M25 16.6665V33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M16.6665 25H33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    {{ __('wishlist/index.create') }}
  </a>
  @endguest
</div>

@guest
<div class="guest flex center light-blue">
  <h3>{{ __('wishlist/index.guest') }}</h3>
</div>
@else
@forelse ($viewData['wishlists'] as $wishlist)
<h2 class="dark-blue">{{ $wishlist->getName() }}</h2>

@forelse ($wishlist->getProducts() as $product)
<div class="product-container flex">
  <img src="{{ $product->getImage() }}" alt="{{ $product->getName() }}">
  <p class="product-name">{{ $product->getName() }}</p>
  <form action="{{ route('wishlist.deleteProduct') }}" method="POST" class="flex center">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-remove-product flex center">
      <input type="hidden" name="wishlistId" value="{{ $wishlist->getId() }}">
      <input type="hidden" name="productId" value="{{ $product->getId() }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
        <path d="M4.75 9.5H7.91667H33.25" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M30.0832 9.49984V31.6665C30.0832 32.5064 29.7495 33.3118 29.1557 33.9057C28.5618 34.4995 27.7564 34.8332 26.9165 34.8332H11.0832C10.2433 34.8332 9.43786 34.4995 8.844 33.9057C8.25013 33.3118 7.9165 32.5064 7.9165 31.6665V9.49984M12.6665 9.49984V6.33317C12.6665 5.49332 13.0001 4.68786 13.594 4.094C14.1879 3.50013 14.9933 3.1665 15.8332 3.1665H22.1665C23.0064 3.1665 23.8118 3.50013 24.4057 4.094C24.9995 4.68786 25.3332 5.49332 25.3332 6.33317V9.49984" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M15.8335 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M22.1665 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <p class="brown">{{ __('wishlist/index.remove') }}</p>
    </button>
  </form>

</div>
@empty
<div class="product-container flex center">
  <div class="guest flex column center light-blue">
    <h3>{{ __('wishlist/index.emptyProducts') }}</h3>
    <a href="{{ route('product.index') }}" class="btn-dark-blue">
      {{ __('wishlist/index.emptyProductsButton') }}
    </a>
  </div>
</div>
@endforelse

<div class="end-options flex center">
  @if ($wishlist->getProducts()->count())
  <a href="#" class="btn-dark-blue flex center">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
      <path d="M24.9998 45.8332C36.5058 45.8332 45.8332 36.5058 45.8332 24.9998C45.8332 13.4939 36.5058 4.1665 24.9998 4.1665C13.4939 4.1665 4.1665 13.4939 4.1665 24.9998C4.1665 36.5058 13.4939 45.8332 24.9998 45.8332Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M25 16.6665V33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M16.6665 25H33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    {{ __('wishlist/index.add') }}
  </a>

  <form action="{{ route('wishlist.delete', $wishlist->getId()) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-delete brown-bg white">{{ __('wishlist/index.delete') }}</button>
  </form>
  @else
  <form action="{{ route('wishlist.delete', $wishlist->getId()) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-delete brown-bg white">{{ __('wishlist/index.delete') }}</button>
  </form>
  @endif
</div>
@empty
<div class="guest flex center light-blue">
  <h3>{{ __('wishlist/index.emptyWishlists') }}</h3>
</div>
@endforelse
@endguest
@endsection