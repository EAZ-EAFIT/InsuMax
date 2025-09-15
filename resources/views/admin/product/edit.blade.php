@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/admin/general/create.css') }}">
@endsection
@section('title', __('admin/product/edit.title'))
@section('content')
<main class="flex column center">
  <h1 class="dark-blue">{{ __('admin/product/edit.subtitle') }}</h1>

  <div>
    @if($errors->any())
    <ul class="flex colum">
      @foreach($errors->all() as $error)
      <li class="brown">{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>

  <form class="flex column center" action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">{{ __('admin/product/create.name') }}</label>
    <input type="text" id="name" name="name" value="{{ $viewData['product']->getName() }}" required>

    <label for="description">{{ __('admin/product/create.description') }}</label>
    <textarea id="description" name="description" rows="3" required>{{ $viewData['product']->getDescription() }}</textarea>

    <label for="keywords">{{ __('admin/product/create.keywords') }}</label>
    <input type="text" id="keywords" name="keywords" value="{{ $viewData['product']->getKeywords() }}"></input>

    <label for="image">{{ __('admin/product/create.image') }}</label>
    <input type="file" id="image" name="image">

    <label for="inventory">{{ __('admin/product/create.inventory') }}</label>
    <input type="number" id="inventory" name="inventory" value="{{ $viewData['product']->getInventory() }}" min="0" required>

    <label for="price">{{ __('admin/product/create.price') }}</label>
    <input type="number" id="price" name="price" value="{{ $viewData['product']->getPrice() }}" min="1" required>

    <button class="btn-dark-blue" type="submit" class="btn btn-primary">
      {{ __('admin/product/edit.submit') }}
    </button>
  </form>
</main>
@endsection