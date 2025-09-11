@extends('layouts.app')
@section('title', 'Wishlist')
@section('content')
    <header>
        <h1>{{ $viewData['wishlist']->getName() }}</h1>
    </header>
    <div>
        <ul>
            @foreach ($viewData['wishlist']->getProducts() as $product)
                <li>
                    <a href="{{ route('product.show', $product->getId()) }}">{{ $product->getName() }}</a>
                </li>
                <form action="{{ route('wishlist.deleteProduct') }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="wishlistId" value="{{ $viewData['wishlist']->getId() }}">
                    <input type="hidden" name="productId" value="{{ $product->getId() }}">
                    <button type="submit">Remove</button>
                </form>
            @endforeach
        </ul>
        <a href="{{ route('wishlist.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection