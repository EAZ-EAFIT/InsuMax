@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/wishlist/create.css') }}">
@endsection
@section('title', __('wishlist/create.title'))
@section('content')
<h1 class="title dark-blue">{{ __('wishlist/create.title') }}</h1>
<div class="form-container flex center">
  <form action="{{ route('wishlist.save', $viewData['user']->getId()) }}" method="POST" class="form-box flex column center dark-blue">
    @csrf
    @method('POST')
    <label for="name">{{ __('wishlist/create.name') }}</label>
    <input type="text" id="name" name="name" required>
    <button type="submit" class="btn-dark-blue">{{ __('wishlist/create.add') }}</button>
  </form>
</div>
@endsection