<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'InsuMax Online Store')</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('product.index') }}">Products</a></li>
            <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
            <li><a href="#">{{ $viewData['customer']->getName() }}</a></li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>
