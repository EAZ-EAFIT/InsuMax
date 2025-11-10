@extends('layouts.home')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/auth/login-register.css') }}">
<link rel="stylesheet" href="{{ asset('/css/auth/bg-register.css') }}">
@endsection
@section('title', __('auth/register.title'))
@section('content')
<main class="flex column">
	<h1 class="white semibold">{{ __('auth/register.subtitle') }}</h1>

	<form method="POST" action="{{ route('register') }}" class="form-container flex column">
		@csrf
		<label for="name" class="white">{{ __('auth/register.name') }}</label>

		<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

		@error('name')
		<span class="invalid-feedback" role="alert">
			<strong class="yellow">{{ $message }}</strong>
		</span>
		@enderror

		<label for="address" class="white">{{ __('auth/register.address') }}</label>

		<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

		@error('address')
		<span class="invalid-feedback" role="alert">
			<strong class="yellow">{{ $message }}</strong>
		</span>
		@enderror

		<label for="email" class="white">{{ __('auth/register.email') }}</label>

		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

		@error('email')
		<span class="invalid-feedback" role="alert">
			<strong class="yellow">{{ $message }}</strong>
		</span>
		@enderror

		<label for="password" class="white">{{ __('auth/register.password') }}</label>

		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

		@error('password')
		<span class="invalid-feedback" role="alert">
			<strong class="yellow">{{ $message }}</strong>
		</span>
		@enderror
		</div>
		</div>

		<label for="password-confirm" class="white">{{ __('auth/register.confirm') }}</label>

		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

		<button type="submit" class="register-btn brown-bg white">
			{{ __('auth/register.register') }}
		</button>
	</form>

	<small class="login white">{{ __('auth/register.existingAccount') }} <a href="{{ route('login') }}" class="login-link yellow">{{ __('auth/register.login') }}</a></small>
</main>
@endsection