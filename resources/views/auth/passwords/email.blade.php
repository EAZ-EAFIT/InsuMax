@extends('layouts.home')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/auth/login-register.css') }}">
<link rel="stylesheet" href="{{ asset('/css/auth/bg-email.css') }}">
@endsection
@section('title', __('auth/email.title'))
@section('content')
<main class="flex column">
  <h1 class="white semibold">{{ __('Reset Password') }}</h1>

  @if (session('status'))
  <div class="yellow" role="alert">
    {{ session('status') }}
  </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}" class="form-container flex column">
    @csrf
    <label for="email" class="white">{{ __('Email Address') }}</label>

    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong class="yellow">{{ $message }}</strong>
    </span>
    @enderror

    <button type="submit" class="login-btn brown-bg white">
      {{ __('Send Password Reset Link') }}
    </button>
  </form>

  <small class="login"><a href="{{ route('login') }}" class="register-link yellow">{{ __('auth/email.back') }}</a></small>
</main>
@endsection