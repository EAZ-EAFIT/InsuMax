@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/admin/general/create.css') }}">
@endsection
@section('title', __('admin/wishlist/create.title'))
@section('content')
<main class="flex column center">
  <h1 class="dark-blue">{{ __('admin/wishlist/create.subtitle') }}</h1>

  <div>
    @if($errors->any())
    <ul class="flex column">
      @foreach($errors->all() as $error)
      <li class="brown">{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>

  <form class="flex column center" action="{{ route('admin.wishlist.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="name">{{ __('admin/wishlist/create.name') }}</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <label for="userId">{{ __('admin/wishlist/create.userId') }}</label>
    <input type="text" id="userId" name="userId" value="{{ old('userId') }}" required>

    <button class="btn-dark-blue" type="submit" class="btn btn-primary">
      {{ __('admin/wishlist/create.submit') }}
    </button>
  </form>
</main>
@endsection