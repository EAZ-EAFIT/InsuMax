@extends('layouts.app')
@section('title', 'Create Wishlist')
@section('content')
    <header>
        <h1>Create Wishlist</h1>
    </header>
    <div>
        <form action="{{ route('wishlist.save', $viewData['customer']->getId()) }}" method="POST">
            @csrf
            @method('POST')
            <label for="name">Wishlist Name:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Add Wishlist</button>
        </form>
    </div>
@endsection