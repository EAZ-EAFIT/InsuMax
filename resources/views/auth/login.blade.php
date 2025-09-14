@extends('layouts.home')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/auth/login-register.css') }}">
<link rel="stylesheet" href="{{ asset('/css/auth/bg-login.css') }}">
@endsection
@section('title', __('auth/login.title'))
@section('content')
<main class="flex column">
  <h1 class="white semibold">{{ __('auth/login.welcome') }}</h1>

  <form method="POST" action="{{ route('login') }}" class="form-container flex column">
    @csrf
    <label for="email" class="white">{{ __('Email Address') }}</label>

    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong class="yellow">{{ $message }}</strong>
    </span>
    @enderror

    <label for="password" class="white">{{ __('Password') }}</label>

    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong class="yellow">{{ $message }}</strong>
    </span>
    @enderror

    <div class="remember-me flex">
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label class="white form-check-label" for="remember">
        {{ __('Remember Me') }}
      </label>
    </div>

    <button type="submit" class="login-btn brown-bg white">
      {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
    <a class="forgot-pwd white" href="{{ route('password.request') }}">
      {{ __('Forgot Your Password?') }}
    </a>
    @endif
  </form>

  <small class="register white">{{ __('auth/login.noAccount') }} <a href="{{ route('register') }}" class="register-link yellow">{{ __('auth/login.register') }}</a></small>
</main>
@endsection