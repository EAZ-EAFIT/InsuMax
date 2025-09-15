@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/admin/index.css') }}">
@endsection
@section('title', __('admin/home/index.title'))
@section('content')
  <main class="flex column center">
    <h1 class="dark-blue">{{ __('admin/home/index.welcome') }}</h1>
    <p class="dark-blue">{{ __('admin/home/index.navigate') }}</p>
  </main>
@endsection