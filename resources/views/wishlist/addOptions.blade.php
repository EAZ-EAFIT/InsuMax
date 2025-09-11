@extends('layouts.app')
@section('title', 'Add Product to Wishlist')
@section('content')
    <header>
        <h1>Add Product to Wishlist</h1>
    </header>
    <div>
        <p>Select a wishlist to add the product to:</p>
        <p>{{ $viewData['product']->getName() }}</p>
        @foreach ($viewData['wishlists'] as $wishlist)
            <div>
                <p>{{ $wishlist->getName() }}</p>
                <form action="{{ route('wishlist.addProduct') }}" method="POST">
                    @csrf
                    <input type="hidden" name="wishlistId" value="{{ $wishlist->getId() }}">
                    <input type="hidden" name="productId" value="{{ $viewData['product']->getId() }}">
                    <button type="submit">Add</button>
                </form>


            </div>
        @endforeach
    </div>
@endsection
