@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/notification/create.css') }}">
@endsection
@section('title', __('notification/create.title'))
@section('content')
<div>
  <p>{{ __('notification/create.one') }}</p>
  <p>{{ __('notification/create.stepOne') }}</p>
  <p>{{ __('notification/create.two') }}</p>
  <p>{{ __('notification/create.stepTwo') }}</p>
  <p>{{ __('notification/create.three') }}</p>
  <p>{{ __('notification/create.stepThree') }}</p>
</div>

<div class="search-box gray-bg light-blue flex center">
  <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
    <path d="M19.25 33.25C26.982 33.25 33.25 26.982 33.25 19.25C33.25 11.518 26.982 5.25 19.25 5.25C11.518 5.25 5.25 11.518 5.25 19.25C5.25 26.982 11.518 33.25 19.25 33.25Z" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M36.75 36.75L29.1375 29.1375" stroke="#2C3B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
  <input type="text" placeholder="{{ __('notification/create.placeholder') }}">
</div>

<div>
  @foreach ($viewData['products'] as $product)
  @endforeach
  {{ $viewData['products']->links() }}
</div>

<button>
  {{ __('notification/create.next') }}
</button>
@endsection