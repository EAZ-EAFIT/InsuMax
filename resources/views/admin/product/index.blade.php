@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('/css/admin/general/index.css') }}">
@endsection
@section('title', __('admin/product/index.title'))
@section('content')
<main class="flex column center">
  <h1 class="dark-blue">{{ __('admin/product/index.subtitle') }}</h1>

  <div class="table-wrapper">
    <table>
      <thead>
        <tr>
          <th scope="col">{{ __('admin/product/index.id') }}</th>
          <th scope="col">{{ __('admin/product/index.name') }}</th>
          <th scope="col">{{ __('admin/product/index.edit') }}</th>
          <th scope="col">{{ __('admin/product/index.delete') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData['products'] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>
            <a href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}" class="btn-action">
              <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                <path d="M24.792 4.37499C25.175 3.99197 25.6297 3.68814 26.1302 3.48085C26.6306 3.27356 27.167 3.16687 27.7087 3.16687C28.2503 3.16687 28.7867 3.27356 29.2871 3.48085C29.7876 3.68814 30.2423 3.99197 30.6253 4.37499C31.0083 4.75801 31.3122 5.21273 31.5195 5.71317C31.7268 6.21361 31.8334 6.74998 31.8334 7.29166C31.8334 7.83333 31.7268 8.36971 31.5195 8.87015C31.3122 9.37059 31.0083 9.8253 30.6253 10.2083L10.9378 29.8958L2.91699 32.0833L5.10449 24.0625L24.792 4.37499Z" stroke="#1B2632" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.product.delete', $product->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                  <path d="M4.75 9.5H7.91667H33.25" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M30.0832 9.49984V31.6665C30.0832 32.5064 29.7495 33.3118 29.1557 33.9057C28.5618 34.4995 27.7564 34.8332 26.9165 34.8332H11.0832C10.2433 34.8332 9.43786 34.4995 8.844 33.9057C8.25013 33.3118 7.9165 32.5064 7.9165 31.6665V9.49984M12.6665 9.49984V6.33317C12.6665 5.49332 13.0001 4.68786 13.594 4.094C14.1879 3.50013 14.9933 3.1665 15.8332 3.1665H22.1665C23.0064 3.1665 23.8118 3.50013 24.4057 4.094C24.9995 4.68786 25.3332 5.49332 25.3332 6.33317V9.49984" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M15.8335 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M22.1665 17.4165V26.9165" stroke="#A35139" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div>{{ $viewData['products']->links() }}</div>
  <div>
    <a href="{{ route('admin.product.create') }}" class="btn-dark-blue">
      {{ __('admin/product/index.create') }}
    </a>
  </div>
</main>
@endsection