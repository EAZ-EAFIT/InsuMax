@extends('layouts.app')
@section('title', 'Wishlists')
@section('content')
    <header>
        <h1>Wishlists</h1>
    </header>
    <div>
        <a href="{{ route('wishlist.create', $viewData['customer']->getId()) }}">Create Wishlist</a>

        @foreach ($viewData['wishlists'] as $wishlist)
            <div>
                <a href="{{ route('wishlist.show', $wishlist->getId()) }}">{{ $wishlist->getName() }}</a>
                <form action="{{ route('wishlist.delete', $wishlist->getId()) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
