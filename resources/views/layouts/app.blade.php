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
  <link rel="stylesheet" href="{{ asset('/css/layout/app.css') }}">
  @yield('styles')
  <title>@yield('title')</title>
</head>

<body>
  <header class="flex center light-blue-bg white">
    <a href="{{ route('product.index') }}">
      <h1 class="logo white">
        {{ __('home/index.logoStart') }}<span class="logo-span">{{ __('home/index.logoEnd') }}</span>
      </h1>
    </a>

    <button class="hamburger" id="hamburger-btn" aria-label="Toggle menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <nav class="nav-wrapper flex center" id="nav-menu">
      <div class="nav-container flex center">
        <a href="{{ route('product.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
            <path d="M7.25 2.41669L3.625 7.25002V24.1667C3.625 24.8076 3.87961 25.4223 4.33283 25.8755C4.78604 26.3287 5.40073 26.5834 6.04167 26.5834H22.9583C23.5993 26.5834 24.214 26.3287 24.6672 25.8755C25.1204 25.4223 25.375 24.8076 25.375 24.1667V7.25002L21.75 2.41669H7.25Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M3.625 7.25H25.375" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M19.3334 12.0833C19.3334 13.3652 18.8242 14.5946 17.9178 15.501C17.0113 16.4074 15.782 16.9166 14.5001 16.9166C13.2182 16.9166 11.9888 16.4074 11.0824 15.501C10.176 14.5946 9.66675 13.3652 9.66675 12.0833" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{ __('layout/app.products') }}
        </a>

        <a href="{{ route('order.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
            <path d="M19.3333 4.8335H21.75C22.3909 4.8335 23.0056 5.08811 23.4588 5.54132C23.9121 5.99453 24.1667 6.60922 24.1667 7.25016V24.1668C24.1667 24.8078 23.9121 25.4225 23.4588 25.8757C23.0056 26.3289 22.3909 26.5835 21.75 26.5835H7.25C6.60906 26.5835 5.99437 26.3289 5.54116 25.8757C5.08794 25.4225 4.83333 24.8078 4.83333 24.1668V7.25016C4.83333 6.60922 5.08794 5.99453 5.54116 5.54132C5.99437 5.08811 6.60906 4.8335 7.25 4.8335H9.66667" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M18.125 2.4165H10.875C10.2077 2.4165 9.66667 2.95749 9.66667 3.62484V6.0415C9.66667 6.70885 10.2077 7.24984 10.875 7.24984H18.125C18.7923 7.24984 19.3333 6.70885 19.3333 6.0415V3.62484C19.3333 2.95749 18.7923 2.4165 18.125 2.4165Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{ __('layout/app.orders') }}
        </a>

        <a href="{{ route('notification.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
            <path d="M21.75 9.66669C21.75 7.74387 20.9862 5.8998 19.6265 4.54016C18.2669 3.18052 16.4228 2.41669 14.5 2.41669C12.5772 2.41669 10.7331 3.18052 9.37348 4.54016C8.01384 5.8998 7.25 7.74387 7.25 9.66669C7.25 18.125 3.625 20.5417 3.625 20.5417H25.375C25.375 20.5417 21.75 18.125 21.75 9.66669Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M16.5905 25.375C16.3781 25.7412 16.0731 26.0452 15.7063 26.2565C15.3394 26.4678 14.9235 26.5791 14.5001 26.5791C14.0767 26.5791 13.6608 26.4678 13.2939 26.2565C12.927 26.0452 12.6221 25.7412 12.4097 25.375" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{ __('layout/app.notifications') }}
        </a>

        <a href="{{ route('cart.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
            <path d="M10.8751 26.5834C11.5424 26.5834 12.0834 26.0424 12.0834 25.375C12.0834 24.7077 11.5424 24.1667 10.8751 24.1667C10.2077 24.1667 9.66675 24.7077 9.66675 25.375C9.66675 26.0424 10.2077 26.5834 10.8751 26.5834Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M24.1666 26.5834C24.8339 26.5834 25.3749 26.0424 25.3749 25.375C25.3749 24.7077 24.8339 24.1667 24.1666 24.1667C23.4992 24.1667 22.9583 24.7077 22.9583 25.375C22.9583 26.0424 23.4992 26.5834 24.1666 26.5834Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M1.20825 1.20831H6.04159L9.27992 17.3879C9.39041 17.9442 9.69306 18.4439 10.1349 18.7996C10.5767 19.1552 11.1295 19.3442 11.6966 19.3333H23.4416C24.0087 19.3442 24.5615 19.1552 25.0033 18.7996C25.4451 18.4439 25.7478 17.9442 25.8583 17.3879L27.7916 7.24998H7.24992" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{ __('layout/app.cart') }}
        </a>

        <a href="{{ route('wishlist.index') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
            <path d="M25.1816 5.57043C24.5645 4.95297 23.8317 4.46316 23.0252 4.12899C22.2187 3.79481 21.3542 3.6228 20.4812 3.6228C19.6082 3.6228 18.7438 3.79481 17.9373 4.12899C17.1307 4.46316 16.398 4.95297 15.7808 5.57043L14.5 6.85126L13.2191 5.57043C11.9725 4.3238 10.2817 3.62345 8.51873 3.62345C6.75573 3.62345 5.06494 4.3238 3.81831 5.57043C2.57169 6.81705 1.87134 8.50784 1.87134 10.2708C1.87134 12.0338 2.57169 13.7246 3.81831 14.9713L5.09915 16.2521L14.5 25.6529L23.9008 16.2521L25.1816 14.9713C25.7991 14.3541 26.2889 13.6213 26.6231 12.8148C26.9573 12.0083 27.1293 11.1438 27.1293 10.2708C27.1293 9.39784 26.9573 8.53338 26.6231 7.72687C26.2889 6.92036 25.7991 6.18759 25.1816 5.57043Z" stroke="#EEE9DF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{ __('layout/app.wishlists') }}
        </a>
      </div>

      <div class="login-container flex">
        @guest
        <a class="nav-link active" href="{{ route('login') }}">{{ __('layout/app.login') }}</a>
        <a class="nav-link active" href="{{ route('register') }}">{{ __('layout/app.register') }}</a>
        @else
        <form id="logout" action="{{ route('logout') }}" method="POST">
          @csrf
          <a class="logout-btn" onclick="document.getElementById('logout').submit();">
            {{ __('layout/app.logout') }}
          </a>
        </form>
        @endguest
      </div>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="light-blue-bg white flex center">
    <small>{!! __('layout/app.footer') !!}</small>
  </footer>

  <script src="{{ asset('/js/layout/hamburguer-menu.js') }}"></script>
  @yield('scripts')
</body>

</html>