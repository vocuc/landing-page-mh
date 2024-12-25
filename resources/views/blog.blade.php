@extends('layouts.app-2')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}?v={{ filemtime(public_path('css/shop.css')) }}">
@endpush
@section('title', 'Chính Sách Bảo Mật')
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
            <h1>Blogs</h1>
        </div>
        <div class="content" style="min-height: 30px;">
            @foreach ($blogs as $blog)
                <!-- <a href="{{ route('blogs.userDetail', ['id' => $blog->id]) }}" class="product-item">
                    <img src="{{$blog->default_img_url}}" style="max-width: 100%;">
                    <h2 class="product-item__title mb-3">{{ $blog->title }}</h2>
                    <div class="blog-item-view-more">Chi tiết hướng dẫn > </div>
                </a> -->

                <a href="{{ route('blogs.userDetail', ['id' => $blog->id]) }}" class="product-item">
                    <div class="product-item__img">
                        <img src="{{$blog->default_img_url}}" alt="">
                    </div>
                    <h2 class="product-item__title mb-3">{{ $blog->title }}</h2>
                    <div class="blog-item-view-more">Chi tiết hướng dẫn > </div>
                </a>
            @endforeach
        </div>
    </section>
    <style>
        .blog-item-view-more{
            font-size: 13px;
            color: white;
        }
    </style>
@endsection
@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
</script>
<script src="{{ asset('js/index.js') }}"></script>
@endpush