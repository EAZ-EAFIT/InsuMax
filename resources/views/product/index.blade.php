@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/product/index.css') }}">
@endsection
@section('title', __('product/index.title'))
@section('content')
<div class="search-container flex column">
	<h1 class="light-blue semibold">{{ __('product/index.subtitle') }}</h1>
	<div class="search-box white-bg brown flex center">
		<svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
			<path d="M19.25 33.25C26.982 33.25 33.25 26.982 33.25 19.25C33.25 11.518 26.982 5.25 19.25 5.25C11.518 5.25 5.25 11.518 5.25 19.25C5.25 26.982 11.518 33.25 19.25 33.25Z" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			<path d="M36.75 36.75L29.1375 29.1375" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
		<input type="text" placeholder="{{ __('product/index.placeholder') }}">
	</div>
</div>

<div class="products-container grid">
	@foreach ($viewData['products'] as $product)
	<div class="product-card dark-blue-bg flex column">
		<div class="product-card-img">
			<img src="{{ $product->getImage() }}" alt="{{ $product->getName() }}">
		</div>
		<div class="product-card-details flex center">
			<div class="product-text flex column">
				<p class="yellow">{{ $product->getName() }}</p>
				<p class="white">{{ __('product/index.currency') }}{{ $product->getPrice() }}</p>
			</div>
			<a href="{{ route('product.show', $product->getId()) }}" class="gray-bg dark-blue btn">{{ __('product/index.shop') }}</a>
		</div>
	</div>
	@endforeach
</div>
@endsection
