@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/wishlist/addOptions.css') }}">
@endsection
@section('title', __('wishlist/addOptions.title'))
@section('content')
<h1 class="dark-blue semibold">{{ __('wishlist/addOptions.subtitle') }}</h1>

<div class="product-container flex">
  <img src="{{ $viewData['product']->getImage() }}" alt="{{ $viewData['product']->getName() }}">
  <p class="dark-blue semibold">{{ $viewData['product']->getName() }}</p>
</div>

@guest
<div class="guest flex center light-blue">
  <h3>{{ __('wishlist/addOptions.guest') }}</h3>
</div>
@else
<div class="grid">
  @forelse($viewData['wishlists'] as $wishlist)
    <div class="wishlist-container flex">
      <p class="white">{{ $wishlist->getName() }}</p>
      <form action="{{ route('wishlist.addProduct') }}" method="POST">
        @csrf
        <input type="hidden" name="wishlistId" value="{{ $wishlist->getId() }}">
        <input type="hidden" name="productId" value="{{ $viewData['product']->getId() }}">
        <button type="submit" class="btn-add btn-dark-blue flex center">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
            <path d="M24.9998 45.8332C36.5058 45.8332 45.8332 36.5058 45.8332 24.9998C45.8332 13.4939 36.5058 4.1665 24.9998 4.1665C13.4939 4.1665 4.1665 13.4939 4.1665 24.9998C4.1665 36.5058 13.4939 45.8332 24.9998 45.8332Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M25 16.6665V33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.6665 25H33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          {{ __('wishlist/addOptions.add') }}
        </button>
      </form>
    </div>

  @empty
  <a href="{{ route('wishlist.create') }}" class="btn btn-dark-blue flex center">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
      <path d="M24.9998 45.8332C36.5058 45.8332 45.8332 36.5058 45.8332 24.9998C45.8332 13.4939 36.5058 4.1665 24.9998 4.1665C13.4939 4.1665 4.1665 13.4939 4.1665 24.9998C4.1665 36.5058 13.4939 45.8332 24.9998 45.8332Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M25 16.6665V33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M16.6665 25H33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    {{ __('wishlist/addOptions.create') }}
  </a>
</div>
@endforelse
@endguest
@endsection
