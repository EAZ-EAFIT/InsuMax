@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/admin/general/create.css') }}">
@endsection
@section('title', __('admin/product/create.title'))
@section('content')
<main class="flex column center">
  <h1 class="dark-blue">{{ __('admin/product/create.subtitle') }}</h1>

  <div>
    @if($errors->any())
    <ul class="flex column">
      @foreach($errors->all() as $error)
      <li class="brown">{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>

  <form class="flex column center" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="name">{{ __('admin/product/create.name') }}</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <label for="description">{{ __('admin/product/create.description') }}</label>
    <textarea id="description" name="description" rows="3" required>{{ old('description') }}</textarea>

    <label for="keywords">{{ __('admin/product/create.keywords') }}</label>
    <input type="text" id="keywords" name="keywords" value="{{ old('keywords') }}"></input>

    <label for="image">{{ __('admin/product/create.image') }}</label>
    <input type="file" id="image" name="image">

    <label for="inventory">{{ __('admin/product/create.inventory') }}</label>
    <input type="number" id="inventory" name="inventory" value="{{ old('inventory') }}" min="0" required>

    <label for="price">{{ __('admin/product/create.price') }}</label>
    <input type="number" id="price" name="price" value="{{ old('price') }}" min="1" required>

    <button class="btn-dark-blue" type="submit" class="btn btn-primary">
      {{ __('admin/product/create.submit') }}
    </button>
  </form>
</main>
@endsection