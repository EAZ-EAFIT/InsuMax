@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/admin/general/create.css') }}">
@endsection
@section('title', __('admin/product/edit.title'))
@section('content')
<main class="flex column center">
  <h1 class="dark-blue">{{ __('admin/wishlist/edit.subtitle') }}</h1>

  <div>
    @if($errors->any())
    <ul class="flex colum">
      @foreach($errors->all() as $error)
      <li class="brown">{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>

  <form class="flex column center" action="{{ route('admin.wishlist.update', ['id' => $viewData['wishlist']->getId(), 'userId' => $viewData['wishlist']->getUserId()]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">{{ __('admin/wishlist/create.name') }}</label>
    <input type="text" id="name" name="name" value="{{ $viewData['wishlist']->getName() }}" required>
    <input type="text" id="userId" name="userId" value="{{ $viewData['wishlist']->getUser()->getId() }}" required>
    <button class="btn-dark-blue" type="submit" class="btn btn-primary">
      {{ __('admin/wishlist/edit.submit') }}
    </button>
  </form>
</main>
@endsection