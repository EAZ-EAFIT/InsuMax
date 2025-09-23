@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/product/index.css') }}">
@endsection
@section('title', __('product/index.title'))
@section('content')
@if (!empty($viewData['expiringNotifications']))
<div class="notification-banner">
	@foreach ($viewData['expiringNotifications'] as $productName => $remainingDays)
	<p class="white brown-bg">
		{{ __('product/index.reminder') }}
		<span class="semibold">{{ $productName }}</span>
		{{ __('product/index.in') }}
		<span class="semibold">{{ $remainingDays }}</span>
		{{ __('product/index.days') }}
	</p>
	@endforeach
</div>
@endif

<div class="search-container flex column">
	<h1 class="light-blue semibold">{{ __('product/index.subtitle') }}</h1>
	<form action="{{ route('product.search') }}" method="get" class="search-box white-bg brown flex center">
		@csrf
		<svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
			<path d="M19.25 33.25C26.982 33.25 33.25 26.982 33.25 19.25C33.25 11.518 26.982 5.25 19.25 5.25C11.518 5.25 5.25 11.518 5.25 19.25C5.25 26.982 11.518 33.25 19.25 33.25Z" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			<path d="M36.75 36.75L29.1375 29.1375" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<input type="text" name="query" placeholder="{{ __('product/index.placeholder') }}">
	</form>
</div>

<div class="filters flex">
	<p class="dark-blue">{{ __('product/index.order') }}</p>
	<a href="{{ route('product.sortPrice') }}" class="filter-btn">
		{!! __('product/index.sortPrice') !!}
	</a>
	<a href="{{ route('product.sortName') }}" class="filter-btn">
		{!! __('product/index.sortName') !!}
	</a>
	<a href="{{ route('product.sortInventory') }}" class="filter-btn">
		{!! __('product/index.sortInventory') !!}
	</a>
	<a href="{{ route('product.sortRecentlyAdded') }}" class="filter-btn">
		{{ __('product/index.sortRecent') }}
	</a>
</div>

<div class="products-container grid">
	@forelse ($viewData['products'] as $product)
	<div class="product-card dark-blue-bg">
		<div class="product-card-img">
			<img src="{{ $product->getImage() }}" alt="{{ $product->getName() }}">
		</div>
		<div class="product-card-details flex center">
			<div class="product-text flex column">
				<p class="yellow">{{ $product->getName() }}</p>
				<p class="white">{{ __('product/index.currency') }}{{ $product->getDollarPrice() }}</p>
			</div>
			<a href="{{ route('product.show', $product->getId()) }}" class="gray-bg dark-blue btn">{{ __('product/index.shop') }}</a>
		</div>
	</div>
	@empty
	<div class="flex center light-blue">
		<h3>{{ __('product/index.empty') }}</h3>
	</div>
	@endforelse
</div>
{{ $viewData['products']->links() }}
<script src="{{ asset('/js/product/index.js') }}"></script>
@endsection