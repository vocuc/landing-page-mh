@extends('layouts.app-2')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/main.css') }}?v={{ filemtime(public_path('css/main.css')) }}">
<link rel="stylesheet" href="{{ asset('css/shop.css') }}?v={{ filemtime(public_path('css/shop.css')) }}">
@endpush
@section('title', 'Trang Chủ')
@section('content')

<section class="banner-group mw-1220 m-auto">
    <div class="banner-group__item">
        <div class="banner__right">
            <div class="banner__title banner__title--type_1">
                Tinh thông <span class="banner__title--AI"><svg width="83" height="48" viewBox="0 0 83 48"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.347078 47.6001L30.7216 0.245542H43.9133L55.346 47.6001H42.0191L33.5629 6.60458H38.8396L14.4858 47.6001H0.347078ZM13.6064 38.3998L19.0183 28.523H42.1544L43.6427 38.3998H13.6064ZM59.211 47.6001L68.6819 0.245542H82.0765L72.6056 47.6001H59.211Z"
                            fill="url(#paint0_linear_8_34)" />
                        <defs>
                            <linearGradient id="paint0_linear_8_34" x1="43" y1="-17.3999" x2="43"
                                y2="64.6001" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FEF1FD" />
                                <stop offset="0.38" stop-color="#FA97FF" />
                                <stop offset="1" stop-color="#6F48FD" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span><br>
                kiếm tiền đơn giản
            </div>
            <div class="banner__sub-title">
                Con đường tự do tài chính từ AI đơn giản dễ hiểu hướng dẫn chi tiết được tiết lộ trong khóa
                học
            </div>
            <div class="group-btn-action">
                <a href="{{ route('products') }}" class="btn-custom btn-type-1">
                    <div>Tải Tài Liệu Ngay</div>
                    <div class="btn-type-1__icon"><svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white" stroke-width="1.6"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg></div>
                </a>
                <!--<div class="btn-custom btn-type-2">Tham gia cộng đồng</div> -->
            </div>
        </div>
        <div class="banner__left">
            <!-- <div class="banner__image">
                <div class="banner_bg"></div>
                @if(empty($product))
                <img src="{{ asset('images/book-ai.png') }}" alt="">
                @else
                <img src="{{ $product->image_link }}" alt="">
                @endif
            </div> -->
            <section class="products mw-1220 m-auto">
    <div class="list-product-header ">
        <h1 style="font-size: 40px;">Sản phẩm bán chạy</h1>
    </div>
    <div class="content" style="margin-top: 20px;">
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
        </div>
    </div>
</section>

<section class="content">
    <div class="title">
        <div class="title__group--sologan mw-1220 m-auto">
            <h2 class="title__group--sologan-content">4 BƯỚC "BẤT BẠI" GIÚP TÔI KIẾM THU NHẬP 9 - 10 CHỮ
                SỐ ONLINE VỚI AI
            </h2>
            <div class="line-title"></div>
        </div>
    </div>

    <div class="w-834 m-auto content__detail">

        <div class="img-1"><img src="{{ asset('images/image13.png') }}" alt="">
        </div>
        <div class="text">
            <p class="sub-text">
                Có thể kiếm tiền online mà không cần lộ mặt hay chia sẻ thông tin cá nhân không? Chắc chắn có!
            </p>

            <p>Thiên Nhai đã khám phá một phương pháp đơn giản và hiệu quả hơn nhiều.</p>

            <p>Tại đây, Thiên Nhai sẽ hướng dẫn bạn cách tạo sản phẩm và video bán hàng mà danh tính vẫn được bảo vệ hoàn toàn.</p>

            <p>Chỉ cần sử dụng Bộ kỹ năng chỉnh sửa video đặc biệt, kết hợp với giọng nói AI độc đáo,</p>

            <p>Bạn sẽ có thể tạo ra một cỗ máy in tiền tự động trong năm 2024.<br>
                Cách thức thực hiện ư?<br>
                Hãy xem và sở hữu ngay những video triệu view như Thiên Nhai, nhờ khóa học này.
            </p>
        </div>
        <div class="text" style="text-align: center;">
            <p class="sub-text">
                <b>Doanh Thu Ấn Tượng Từ Kênh Thiên Nhai Tianya </b>
            </p>
        </div>
        <div class="img-2">
            <img src="{{ asset('images/gmv1.png') }}" alt="">
        </div>
        <div class="text" style="text-align: center;">
            <p class="sub-text">
                <b>Kỹ Năng Kiếm Tiền Online Mà Không Cần Lộ Diện </b>
            </p>
        </div>
        <div class="img-2">
            <img src="{{ asset('images/gmv2.png') }}" alt="">
        </div>
        <div class="text" style="text-align: center;">
            <p class="sub-text">
                <b>Chủ Động Thời Gian, Chinh Phục Tự Do Tài Chính </b>
            </p>
        </div>
        <div class="img-2">
            <img src="{{ asset('images/a1.jpg') }}" alt="">
        </div>
        <div class="text" style="text-align: center;">
            <p class="sub-text">
                <b>Bán Hàng Hiệu Quả Mà Không Cần Xuất Hiện Trước Camera </b>
            </p>
        </div>
        <div class="img-2"><img src="{{ asset('images/listsach.png') }}" alt="">
        </div>
    </div>
    <img src="images/bg-icon-2.png" class="bg-icon-1" alt="">

</section>
<div class="group-btn-action">
    <a href="{{ route('products') }}" class="btn-custom btn-type-1">
        <div>Tải Tài Liệu Ngay</div>
        <div class="btn-type-1__icon"><svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white" stroke-width="1.6"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg></div>
    </a>
    <!--<div class="btn-custom btn-type-2">Tham gia cộng đồng</div> -->
</div>
<section class="contact">
    <div class="title">
        <div class="title__group--sologan mw-1220 m-auto">
            <h2 class="title__group--sologan-content">
                Hỗ Trợ
            </h2>
            <div class="title__group--sologan-sub-content">
                Hãy để lại thông tin để ThienNhai hỗ trợ bạn sớm nhé!
            </div>
            <div class="line-title"></div>
        </div>
    </div>
    <div class="contact-form">
        <form action="{{ route('contact-form.store') }}" class="form m-auto" id="contactForm">
            @csrf
            <div class="d-flex gap-12px ">
                <div class="flex-grow-1 d-flex flex-column f-w-12px">
                    <input type="text" class=" input-custom" name="name" placeholder="Tên của bạn">
                </div>
                <div class="flex-grow-1 d-flex flex-column f-w-12px">
                    <input type="text" class=" input-custom" name="email" placeholder="Địa chỉ email của bạn">

                </div>
            </div>
            <div>
                <textarea name="note" class="input-custom col-12" placeholder="Lời nhắn của bạn"></textarea>
            </div>
            <div>
                <button class="btn-custom btn-type-3">
                    Gửi ngay
                </button>
            </div>
        </form>
    </div>
</section>
<div class="loading-wrapper-bg loading-wrapper-bg__fixed">
    <div class="spinner-grow text-danger" role="status">
        <span class="sr-only"></span>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
</script>
<script src="{{ asset('js/index.js') }}"></script>
@endpush