@extends('layouts.app-2')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endpush
@section('title', 'Danh sách sản phẩm')
@section('content')
    <section class="products mw-1220 m-auto">
        <div class="list-product-header ">
            <a href="{{ route('home-page') }}" class="back-link">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 3.5L5.25 7L8.75 10.5" stroke="#767676" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <div>
                    Quay lại
                </div>
            </a>
            <h1>
                Cửa hàng
            </h1>
        </div>
        <div class="content">
            @foreach ($products as $product)
                <a href="{{ route('products.detail', ['id' => $product->id]) }}" class="product-item">
                    <div class="product-item__img"><img src="{{ $product->image_link }}"
                            alt=""></div>
                    <h2 class="product-item__title">{{ $product->name }}</h2>
                    <div class="group-price">
                        @if (!empty($product->original_price))
                            <div class="price-original">{{ number_format($product->original_price, 0, '.', '.') }}</div>
                            <div class="divier"></div>
                        @endif
                        <div class="price-discount">{{ number_format($product->price, 0, '.', '.') }}</div>
                    </div>
                </a>
            @endforeach

        </div>
    </section>
@endsection
