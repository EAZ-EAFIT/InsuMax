@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/notification/index.css') }}">
@endsection
@section('title', __('notification/index.title'))
@section('content')
<h1 class="dark-blue">{{ __('notification/index.subtitle') }}</h1>

@guest
<div class="flex center light-blue">
  <h3>{{ __('notification/index.guest') }}</h3>
</div>
@else
<div class="flex column">
  @forelse ($viewData['notifications'] as $notification)
  <div class="title-container grid">
    <p class="dark-blue bold">{{ __('notification/index.product') }}</p>
    <p class="dark-blue bold">{{ __('notification/index.quantity') }}</p>
    <p class="dark-blue bold">{{ __('notification/index.interval') }}</p>
    <p class="dark-blue bold">{{ __('notification/index.date') }}</p>
  </div>

  <div class="notification-container flex column">
    <div class="grid">
      <div class="product-container flex column center">
        <img src="{{ $notification['product']->getImage() }}" alt="{{ $notification['product']->getName() }}">
        <p class="light-blue semibold">{{ $notification['product']->getName() }}</p>
      </div>

      <span class="light-blue">{{ $notification['quantity'] }}</span>

      <p class="light-blue">{{ __('notification/index.every') }} {{ $notification->getTimeInterval() }} {{ __('notification/index.days') }}</p>

      <p class="light-blue">{{ $notification->getDate() }}</p>
    </div>

    <div class="actions-wrapper flex ">
      <form action="{{ route('cart.add', ['id'=> $notification['product']->getId()]) }}" method="post" class="add-cart-form">
        @csrf
        @method('POST')
        <input type="hidden" name="quantity" value="{{ $notification->getQuantity() }}">
        <button type="submit" class="add-cart-btn btn-dark-blue flex center">
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
            <path d="M24.9998 45.8332C36.5058 45.8332 45.8332 36.5058 45.8332 24.9998C45.8332 13.4939 36.5058 4.1665 24.9998 4.1665C13.4939 4.1665 4.1665 13.4939 4.1665 24.9998C4.1665 36.5058 13.4939 45.8332 24.9998 45.8332Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M25 16.6665V33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M16.6665 25H33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{ __('notification/index.addCart') }}
        </button>
        @if(session('success'))
        <p class="success-message brown">
          {{ session('success') }}
        </p>
        @endif
      </form>

      <div class="actions-container flex">
        <a href="{{ route('notification.edit', $notification->getId()) }}" class="light-blue flex center">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
            <path d="M24.792 4.37499C25.175 3.99197 25.6297 3.68814 26.1302 3.48085C26.6306 3.27356 27.167 3.16687 27.7087 3.16687C28.2503 3.16687 28.7867 3.27356 29.2871 3.48085C29.7876 3.68814 30.2423 3.99197 30.6253 4.37499C31.0083 4.75801 31.3122 5.21273 31.5195 5.71317C31.7268 6.21361 31.8334 6.74998 31.8334 7.29166C31.8334 7.83333 31.7268 8.36971 31.5195 8.87015C31.3122 9.37059 31.0083 9.8253 30.6253 10.2083L10.9378 29.8958L2.91699 32.0833L5.10449 24.0625L24.792 4.37499Z" stroke="#1B2632" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{ __('notification/index.edit') }}
        </a>

        <form action="{{ route('notification.delete', $notification->getId()) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="delete-btn brown flex center">
            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
              <path d="M4.75 9.5H7.91667H33.25" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M30.0832 9.49984V31.6665C30.0832 32.5064 29.7495 33.3118 29.1557 33.9057C28.5618 34.4995 27.7564 34.8332 26.9165 34.8332H11.0832C10.2433 34.8332 9.43786 34.4995 8.844 33.9057C8.25013 33.3118 7.9165 32.5064 7.9165 31.6665V9.49984M12.6665 9.49984V6.33317C12.6665 5.49332 13.0001 4.68786 13.594 4.094C14.1879 3.50013 14.9933 3.1665 15.8332 3.1665H22.1665C23.0064 3.1665 23.8118 3.50013 24.4057 4.094C24.9995 4.68786 25.3332 5.49332 25.3332 6.33317V9.49984" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M15.8335 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M22.1665 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            {{ __('notification/index.remove') }}
          </button>
        </form>
      </div>
    </div>
  </div>
  @empty
  <div class="flex center light-blue">
    <h3>{{ __('notification/index.empty') }}</h3>
  </div>
  @endforelse

  <a href="{{ route('notification.selectProduct') }}" class="add-notification-btn btn-dark-blue flex center">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
      <path d="M24.9998 45.8332C36.5058 45.8332 45.8332 36.5058 45.8332 24.9998C45.8332 13.4939 36.5058 4.1665 24.9998 4.1665C13.4939 4.1665 4.1665 13.4939 4.1665 24.9998C4.1665 36.5058 13.4939 45.8332 24.9998 45.8332Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M25 16.6665V33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      <path d="M16.6665 25H33.3332" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    {{ __('notification/index.addNotification') }}
  </a>
</div>
@endguest
@endsection