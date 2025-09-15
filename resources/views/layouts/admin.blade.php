<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/general.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/layout/admin.css') }}">
  @yield('styles')
  <title>@yield('title')</title>
</head>

<body>
  <div class="nav-container">
    <nav class="nav-grid white">
      <h1 class="regular">{{ __('layout/admin.subtitle') }}</h1>
      <div class="links-container flex column">
        <a href="{{ route('admin.home.index') }}">{{ __('layout/admin.home') }}</a>
        <a href="{{ route('admin.product.index') }}">{{ __('layout/admin.products') }}</a>
      </div>
      <form id="logout" action="{{ route('logout') }}" method="POST" class="logout-btn flex center">
          @csrf
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
          <path d="M26.7755 9.68335C28.6106 11.5191 29.8602 13.8577 30.3663 16.4036C30.8724 18.9495 30.6122 21.5883 29.6187 23.9863C28.6252 26.3844 26.9429 28.4339 24.7846 29.8759C22.6263 31.318 20.0889 32.0876 17.4932 32.0876C14.8975 32.0876 12.3601 31.318 10.2018 29.8759C8.04345 28.4339 6.36119 26.3844 5.36766 23.9863C4.37414 21.5883 4.11397 18.9495 4.62005 16.4036C5.12613 13.8577 6.37574 11.5191 8.21088 9.68335" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M17.5 2.91675V17.5001" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
          <a onclick="document.getElementById('logout').submit();">
            {{ __('layout/admin.logout') }}
          </a>
        </form>
    </nav>
  </div>

  @yield('content')
</body>
</html>