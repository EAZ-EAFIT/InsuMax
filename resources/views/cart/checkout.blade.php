@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/cart/checkout.css') }}">
@endsection
@section('title', __('cart/checkout.title'))
@section('content')
<h1 class="dark-blue">{{ __('cart/checkout.subtitle') }}</h1>
<div class="container flex column center">
  <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 300 300" fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M150 262.5C164.774 262.5 179.403 259.59 193.052 253.936C206.701 248.283 219.103 239.996 229.55 229.55C239.996 219.103 248.283 206.701 253.936 193.052C259.59 179.403 262.5 164.774 262.5 150C262.5 135.226 259.59 120.597 253.936 106.948C248.283 93.299 239.996 80.8971 229.55 70.4505C219.103 60.0039 206.701 51.7172 193.052 46.0636C179.403 40.4099 164.774 37.5 150 37.5C120.163 37.5 91.5483 49.3526 70.4505 70.4505C49.3526 91.5483 37.5 120.163 37.5 150C37.5 179.837 49.3526 208.452 70.4505 229.55C91.5483 250.647 120.163 262.5 150 262.5ZM147.1 195.5L209.6 120.5L190.4 104.5L136.65 168.987L108.837 141.162L91.1625 158.837L128.662 196.337L138.337 206.013L147.1 195.5Z" fill="#5C8D59" />
  </svg>
  <h3 class="dark-blue">{{ __('cart/checkout.success') }}</h3>
  <p class="light-blue">
    {{ __('cart/checkout.order') }}
    <span class="semibold">
      {{ __('cart/checkout.number') }}{{ $viewData["order"]->getId()}}
    </span>
  </p>
</div>
@endsection