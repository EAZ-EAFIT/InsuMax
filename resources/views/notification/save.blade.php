@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/notification/create.css') }}">
<link rel="stylesheet" href="{{ asset('/css/notification/save.css') }}">
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

      <div class="separation-blue"></div>

      <div class="step flex column center">
        <span class="dark-blue-bg white flex center">{{ __('notification/create.two') }}</span>
        <p class="dark-blue">{{ __('notification/create.stepTwo') }}</p>
      </div>

      <div class="separation-blue"></div>

      <div class="step flex column center">
        <span class="dark-blue-bg white flex center">{{ __('notification/create.three') }}</span>
        <p class="dark-blue">{{ __('notification/create.stepThree') }}</p>
      </div>
    </div>

    <div class="confirmation flex column center">
      <h1 class="light-blue">{{ __('notification/save.success') }}</h1>

      <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 300 300" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M150 262.5C164.774 262.5 179.403 259.59 193.052 253.936C206.701 248.283 219.103 239.996 229.55 229.55C239.996 219.103 248.283 206.701 253.936 193.052C259.59 179.403 262.5 164.774 262.5 150C262.5 135.226 259.59 120.597 253.936 106.948C248.283 93.299 239.996 80.8971 229.55 70.4505C219.103 60.0039 206.701 51.7172 193.052 46.0636C179.403 40.4099 164.774 37.5 150 37.5C120.163 37.5 91.5483 49.3526 70.4505 70.4505C49.3526 91.5483 37.5 120.163 37.5 150C37.5 179.837 49.3526 208.452 70.4505 229.55C91.5483 250.647 120.163 262.5 150 262.5ZM147.1 195.5L209.6 120.5L190.4 104.5L136.65 168.987L108.837 141.162L91.1625 158.837L128.662 196.337L138.337 206.013L147.1 195.5Z" fill="#5C8D59" />
      </svg>

      <div class="product-container flex column center">
        <img src="{{ $viewData['product']->getImage() }}" alt="{{ $viewData['product']->getName() }}">
        <p class="light-blue bold">{{ $viewData['product']->getName() }}</p>
      </div>

      <div class="grid">
        <p class="light-blue">{{ __('notification/save.quantity') }}</p>
        <p class="light-blue semibold">{{ $viewData['quantity'] }}</p>

        <p class="light-blue">{{ __('notification/save.date') }}</p>
        <p class="light-blue semibold">{{ $viewData['date'] }}</p>

        <p class="light-blue">{{ __('notification/save.frequency') }}</p>
        <p class="light-blue semibold">{{ $viewData['timeInterval'] }} {{ __('notification/save.days') }}</p>
      </div>

      <a href="{{ route('notification.index') }}" class="btn-dark-blue">{{ __('notification/save.notifications') }}</a>
    </div>
  </div>
</div>
</div>
@endsection