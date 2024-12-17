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
            <h1>
                {{$blog->title}}
            </h1>
        </div>
        <div class="content" style="min-height: 30px; color:white">
        {!! $blog->content !!}
        </div>
    </section>
    <style>
        .blog-item-view-more{
            font-size: 13px;
            color: white;
        }

        .content {
            font-size: 16px;
        }

        .content img {
            max-width: 100% !important;
        }
    </style>
@endsection
@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
</script>
<script src="{{ asset('js/index.js') }}"></script>
@endpush