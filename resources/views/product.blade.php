@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endpush
@section('content')
    <section class="products w-1220 m-auto">
        <div class="list-product-header ">
            <a href="{{ route('home') }}" class="back-link">
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
            <a href="{{ route('detail') }}" class="product-item">
                <div class="product-item__img"><img src="{{ asset('images/d831ffea8ef2ca0e08a3df1d172c5170.png') }}"
                        alt=""></div>
                <h2 class="product-item__title">Tinh thông AI
                    làm giàu đơn giản</h2>
                <div class="group-price">
                    <div class="price-original">150.000đ</div>
                    <div class="divier"></div>
                    <div class="price-discount">98.000đ</div>
                </div>
            </a>
        </div>
    </section>
@endsection
