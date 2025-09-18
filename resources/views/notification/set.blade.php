@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/notification/create.css') }}">
<link rel="stylesheet" href="{{ asset('/css/notification/set.css') }}">
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

      <div class="separation"></div>

      <div class="step flex column center">
        <span class="gray-bg dark-blue flex center">{{ __('notification/create.three') }}</span>
        <p class="dark-blue">{{ __('notification/create.stepThree') }}</p>
      </div>
    </div>

    <div class="product-container flex column center">
      <img src="{{ $viewData['product']->getImage() }}" alt="{{ $viewData['product']->getName() }}">
      <p class="light-blue bold">{{ $viewData['product']->getName() }}</p>
    </div>

    <div>
      @if($errors->any())
      <ul class="flex column center">
        @foreach($errors->all() as $error)
        <li class="brown">{{ $error }}</li>
        @endforeach
      </ul>
      @endif
    </div>

    <form action="{{ route('notification.save') }}" method="POST" id="notification-form" class="form-box flex column center light-blue">
      @csrf
      @method('POST')
      <label for="quantity">{{ __('notification/set.quantity') }}</label>
      <input type="number" id="quantity" name="quantity" min="1" value="{{ old('quantity') }}" class="quantity" required>

      <label for="date">{{ __('notification/set.date') }}</label>
      <input type="date" id="date" name="date" value="{{ old('date') }}" required>

      <p>{{ __('notification/set.frequency') }}</p>

      <div class="frequency flex center">
        <label for="timeInterval">{{ __('notification/set.every') }}</label>
        <input type="number" id="timeInterval" name="timeInterval" min="1" value="{{ old('timeInterval') }}" class="quantity" required>
        <span>{{ __('notification/set.days') }}</span>
      </div>

      <input type="hidden" name="productId" value="{{ $viewData['product']->getId() }}">
    </form>

    <button type="submit" form="notification-form" class="brown-bg white">
      {!! __('notification/set.create') !!}
    </button>

    <a href="{{ url()->previous() }}" class="btn-dark-blue">{!! __('notification/set.back') !!}</a>
  </div>
</div>
</div>
@endsection