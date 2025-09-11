@extends('layouts.app')
@section('title', 'Product Details')
@section('content')
    <header>
        <h1>{{ $viewData['product']->getName() }}</h1>
    </header>
    <div>
        <img src="{{ $viewData['product']->getImage() }}" alt="{{ $viewData['product']->getName() }}" style="width:100px;height:100px;">
        <span>{{ $viewData['product']->getPrice() }}</span>
        <p>{{ $viewData['product']->getDescription() }}</p>
        {{-- <a href="{{ route('wishlist.add', viewData['product']->getId()) }}">Add to Wishlist</a> --}}
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection