@extends('layouts.home')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/home/home.css') }}">
@endsection
@section('title', __('home/index.title'))
@section('content')
<header class="flex">
  <h1 class="logo dark-blue">
    {{ __('home/index.logoStart') }}<span class="logo-span">{{ __('home/index.logoEnd') }}</span>
  </h1>

  <a href="{{ route('login') }}" class="btn-dark-blue login-btn">{!! __('home/index.login') !!}</a>
</header>

<main class="flex">
  <div class="home-container flex column">
    <h2 class="white slogan">{{ __('home/index.slogan') }}</h2>
    <p class="white cta">{{ __('home/index.callToAction') }}</p>
    <a href="{{ route('product.index') }}" class="btn-dark-blue cta-btn">{{ __('home/index.callToActionButton') }}</a>
  </div>
</main>
@endsection
