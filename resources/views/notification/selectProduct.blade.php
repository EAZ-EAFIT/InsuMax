@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/notification/selectProduct.css') }}">
@endsection
@section('title', __('notification/create.title'))
@section('content')
<div class="content-wrapper flex center">
  <div class="content-container flex column">
    <div class="steps-container flex center">
      <div class="step flex column center">
        <span class="dark-blue-bg white flex center">{{ __('notification/create.one') }}</span>
        <p class="dark-blue">{{ __('notification/create.stepOne') }}</p>
      </div>

      <div class="separation"></div>

      <div class="step flex column center">
        <span class="gray-bg dark-blue flex center">{{ __('notification/create.two') }}</span>
        <p class="dark-blue">{{ __('notification/create.stepTwo') }}</p>
      </div>

      <div class="separation"></div>

      <div class="step flex column center">
        <span class="gray-bg dark-blue flex center">{{ __('notification/create.three') }}</span>
        <p class="dark-blue">{{ __('notification/create.stepThree') }}</p>
      </div>
    </div>

    <form action="{{ route('notification.searchProduct') }}" method="get" class="search-box gray-bg light-blue flex center">
      @csrf
      <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
        <path d="M19.25 33.25C26.982 33.25 33.25 26.982 33.25 19.25C33.25 11.518 26.982 5.25 19.25 5.25C11.518 5.25 5.25 11.518 5.25 19.25C5.25 26.982 11.518 33.25 19.25 33.25Z" stroke="#2C3B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M36.75 36.75L29.1375 29.1375" stroke="#2C3B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
      <input type="text" name="query" placeholder="{{ __('notification/create.placeholder') }}">
      <input type="hidden" name="naturalLanguageProcessing" value="0">
    </form>

    <div class="grid">
      @forelse ($viewData['products'] as $product)
      <a href="{{ route('notification.setDetails', $product->getId()) }}" class="light-blue flex column center">
        <img src="{{ $product->getImage() }}" alt="{{ $product->getName() }}">
        <p>{{ $product->getName() }}</p>
      </a>
      @empty
      <div class="flex center light-blue">
        <h3>{{ __('notification/create.empty') }}</h3>
      </div>
      @endforelse
    </div>

    {{ $viewData['products']->links() }}
  </div>
</div>
@endsection