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
  <link rel="stylesheet" href="{{ asset('/css/home/home.css') }}">
  <title>{{ __('home/index.title') }}</title>
</head>
<body class="flex column">
  <header class="flex">
    <h1 class="logo dark-blue">
      {{ __('home/index.logoStart') }}<span class="logo-span">{{ __('home/index.logoEnd') }}</span>
    </h1>

    <a href="" class="btn-dark-blue login-btn">{!! __('home/index.login') !!}</a>
  </header>

  <main class="flex">
    <div class="home-container flex column">
      <h2 class="white slogan">{{ __('home/index.slogan') }}</h2>
      <p class="white cta">{{ __('home/index.callToAction') }}</p>
      <a href="{{ route('product.index') }}" class="btn-dark-blue cta-btn">{{ __('home/index.callToActionButton') }}</a>
    </div>
  </main>
</body>
</html>
