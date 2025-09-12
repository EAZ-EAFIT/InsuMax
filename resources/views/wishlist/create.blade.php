@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/wishlist/create.css') }}">
@endsection
@section('title', 'Create Wishlist')
@section('content')
<h1 class="title dark-blue">Create Wishlist</h1>
<div class="form-container flex center">
  <form action="{{ route('wishlist.save', $viewData['customer']->getId()) }}" method="POST" class="flex column center dark-blue">
    @csrf
    @method('POST')
    <label for="name">Wishlist Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit" class="btn-dark-blue">Add Wishlist</button>
  </form>
</div>
@endsection