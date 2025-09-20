@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/order/index.css') }}">
@endsection
@section('title', __('order/index.title'))
@section('content')
<h1 class="dark-blue">{{ __('order/index.subtitle') }}</h1>

@forelse ($viewData['orders'] as $order)
<div>
  <div class="order-details flex column">
    <h2 class="dark-blue">{{ __('order/index.orderNumber') }}{{ $order->getId() }}</h2>
    <p class="light-blue semibold">{{ __('order/index.date') }} <span class="regular">{{ $order->getCreatedAt() }}</span></p>
    <p class="light-blue semibold">{{ __('order/index.total') }} <span class="regular">{{ $order->getTotal() }}</span></p>
  </div>

  <div class="order-header grid">
    <p class="dark-blue bold">{{ __('order/index.itemId') }}</p>
    <p class="dark-blue bold">{{ __('order/index.productName') }}</p>
    <p class="dark-blue bold">{{ __('order/index.price') }}</p>
    <p class="dark-blue bold">{{ __('order/index.quantity') }}</p>
  </div>
  @foreach ($order->getItems() as $item)
  <div class="item-wrapper flex column">
    <div class="grid">
      <span class="light-blue">{{ $item->getId() }}</span>

      <a href="{{ route('product.show', ['id'=> $item->getProduct()->getId()])}}" class="brown">
        {{ $item->getProduct()->getName() }}
      </a>

      <span class="light-blue">{{ __('order/index.currency') }}{{ $item->getPrice() }}</span>

      <span class="light-blue">{{ $item->getQuantity() }}</span>
    </div>
  </div>
  @endforeach
</div>
@empty
<div class="flex center light-blue">
  <h3>{{ __('order/index.empty') }}</h3>
</div>
@endforelse
@endsection