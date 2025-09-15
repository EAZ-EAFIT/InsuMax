@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/notification/create.css') }}">
<link rel="stylesheet" href="{{ asset('/css/notification/set.css') }}">
<link rel="stylesheet" href="{{ asset('/css/notification/edit.css') }}">
@endsection
@section('title', __('notification/edit.title'))
@section('content')
<div class="content-wrapper flex center">
  <div class="content-container flex column">
    <h1 class="light-blue">{{ __('notification/edit.subtitle') }}</h1>

    <div class="product-container flex column center">
      <img src="{{ $viewData['notification']['product']->getImage() }}" alt="{{ $viewData['notification']['product']->getName() }}">
      <p class="light-blue bold">{{ $viewData['notification']['product']->getName() }}</p>
    </div>

    <form action="" method="POST" id="notification-form" class="form-box flex column center light-blue">
      @csrf
      @method('PUT')
      <label for="quantity">{{ __('notification/edit.quantity') }}</label>
      <input type="number" id="quantity" name="quantity" min="1" value="{{ old('quantity') }}" class="quantity" required>

      <p>{{ __('notification/edit.frequency') }}</p>

      <div class="frequency flex center">
        <label for="frequency">{{ __('notification/edit.every') }}</label>
        <input type="number" id="frequency" name="frequency" min="1" value="{{ old('frequency') }}" class="quantity" required>
        <span>{{ __('notification/edit.days') }}</span>
      </div>
    </form>

    <button type="submit" form="notification-form" class="brown-bg white">
      {!! __('notification/edit.edit') !!}
    </button>

    <a href="{{ url()->previous() }}" class="btn-dark-blue">{!! __('notification/edit.return') !!}</a>
  </div>
</div>
@endsection