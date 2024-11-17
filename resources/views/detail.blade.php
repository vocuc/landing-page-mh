@extends('layouts.app-2')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/ckeditor5.css') }}?v={{ filemtime(public_path('css/ckeditor5.css')) }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}?v={{ filemtime(public_path('css/detail.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/form1.css') }}?v={{ filemtime(public_path('css/form1.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/form2.css') }}?v={{ filemtime(public_path('css/form2.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/form3.css') }}?v={{ filemtime(public_path('css/form3.css')) }}">
@endpush
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <section class="product mw-1220 m-auto">
        <div class="detail-header ">
            <a href="{{ route('products') }}" class="back-link">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 3.5L5.25 7L8.75 10.5" stroke="#767676" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <div>
                    Quay lại
                </div>
            </a>

            <!--<div class="title">
                                                                    Chi tiết tài nguyên
                                                                </div>-->
        </div>
        <div class="content w-963 m-auto">
            <div class="group-info-product">
                @if (is_mobile())
                    <div class="group-info-content">
                        <div class="tags">
                            <div class="tag">Digital Book</div>
                        </div>
                        <div class="group-title">
                            <h1 class="name-product">{{ $product->name }}</h1>
                        </div>
                    </div>
                @endif

                <div>
                    <div class="banner__image">
                        <div class="banner_bg"></div>
                        <img src="{{ $product->image_link }}" alt="">
                    </div>
                    <div class="group-price">
                        <div>Giá: </div>
                        @if (!empty($product->original_price))
                            <div class="price-original">{{ number_format($product->original_price, 0, '.', '.') }}đ
                            </div>
                            <div class="divier"></div>
                        @endif
                        <div class="price-discount">{{ number_format($product->price, 0, '.', '.') }}đ</div>
                    </div>

                    <div class="group-btn-action"
                        style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
                        <div class="btn-custom btn-type-1" data-bs-toggle="modal" data-bs-target="#modalContactPay1">
                            <div>Mua ngay</div>
                            <div class="btn-type-1__icon">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>

                        <div class="btn-custom btn-type-1" data-bs-toggle="modal" data-bs-target="#modalContactPay4">
                            <div>Đọc ngay</div>
                            <div class="btn-type-1__icon">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <!--<div class="btn-custom btn-type-2">Liên hệ tư vấn</div>-->
                    </div>
                </div>
                <div class="group-info-content">
                    @if (!is_mobile())
                        <div class="tags">
                            <div class="tag">Digital Book</div>
                        </div>
                    @endif

                    <div class="group-title">
                        @if (!is_mobile())
                            <h1 class="name-product">{{ $product->name }}</h1>
                        @endif
                        <div class="short-description">{{ $product->short_description }}</div>
                    </div>
                    <!--<div class="group-btn-action">
                                                                            <div class="btn-custom btn-type-1" data-bs-toggle="modal" data-bs-target="#modalContactPay1">
                                                                                <div>Mua ngay</div>
                                                                                <div class="btn-type-1__icon"><svg width="24" height="25" viewBox="0 0 24 25"
                                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                        <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white" stroke-width="1.6"
                                                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                                                    </svg></div>
                                                                            </div>
                                                                            <div class="btn-custom btn-type-2">Liên hệ tư vấn</div>
                                                                        </div>-->
                </div>

            </div>
            <div class="description">
                <h2>Giới thiệu nội dung</h2>
                <div class="value ck ck-editor__editable ck-content">
                    {!! $product->full_description !!}
                </div>
            </div>
        </div>
    </section>
    <div class="group-btn-action btn-footer" style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
        <div class="btn-custom btn-type-1" data-bs-toggle="modal" data-bs-target="#modalContactPay1">
            <div>Mua ngay</div>
            <div class="btn-type-1__icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white" stroke-width="1.6"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <!--<div class="btn-custom btn-type-2">Liên hệ tư vấn</div>-->
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
    <!-- Modal -->
    <div class="modal fade" id="modalContactPay1" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="modalContactPayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('product-payment.store') }}" id="formPay1" class="modal-form">
                        <div class="close-modal btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="16" fill="white" />
                                <path d="M9.59961 9.6001L22.3993 22.3997" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.60074 22.3997L22.4004 9.6001" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="form-header">
                            <div class="title">Thông tin của bạn</div>
                            <div class="sub-title">Nhập thông tin của bạn để nhận được mã code</div>
                        </div>
                        <div class="position-relative">
                            <input type="text" class="col-12 input-custom" name="user_name"
                                placeholder="Tên của bạn">

                        </div>
                        <div class="position-relative">
                            <input type="text" class="col-12 input-custom" name="email"
                                placeholder="Email của bạn">

                        </div>
                        <div class="position-relative">
                            <input type="text" class="col-12 input-custom" name="phone"
                                placeholder="Số điện thoại của bạn">
                        </div>
                        <div class="position-relative">
                            <input type="text" class="col-12 input-custom" name="voucher_code"
                                placeholder="Mã giảm giá">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>
                        <div class="notify">
                            Đảm bảo các thông tin trên của bạn là chính xác
                        </div>
                        <div class="group-btn-action form-footer">
                            <button class="btn-custom btn-type-1">
                                <div>Tiếp tục</div>
                                <div class="btn-type-1__icon"><svg width="24" height="25" viewBox="0 0 24 25"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white"
                                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></div>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalContactPay2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalContactPayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">

                    <form action="" class="modal-form">
                        <div class="close-modal btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="16" fill="white" />
                                <path d="M9.59961 9.6001L22.3993 22.3997" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.60074 22.3997L22.4004 9.6001" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="form-header">
                            <div class="title">Quét để thanh toán</div>
                            <div class="sub-title">Quét mã QR để thanh toán, mã để tải sẽ được gửi đến số của bạn</div>
                        </div>

                        <div class="payment-info">
                            <div class="qr"><img src="" alt=""></div>
                            <div class="info">
                                <div class="payment-list">
                                    <div class="payment-item">
                                        <div class="title">Tài nguyên</div>
                                        <div class="value">{{ $product->name }}</div>
                                    </div>
                                    <div class="payment-item">
                                        <div class="title">Giá gốc</div>
                                        <div class="value" id='original-price'></div>
                                    </div>
                                    <div class="payment-item">
                                        <div class="title">Giảm giá</div>
                                        <div class="value" id='discount-price'></div>
                                    </div>
                                </div>
                                <div class="info-total">
                                    <div class="title">Tổng tiền</div>
                                    <div class="value" id='final-price'></div>
                                </div>
                            </div>
                        </div>
                        <div class="group-btn-action form-footer">

                            <div class="btn-custom btn-type-1" id="button-open-step3">
                                <div>Tôi đã thanh toán</div>
                                <div class="btn-type-1__icon"><svg width="24" height="25" viewBox="0 0 24 25"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 12.5H18M18 12.5L14 16.5M18 12.5L14 8.5" stroke="white"
                                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modalContactPay3" id="modalContactPay3" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalContactPayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('product-payment.download') }}" class="modal-form" id="formPay3">
                        <input type="hidden" id="code-id" name="id">
                        <div class="close-modal btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="16" fill="white" />
                                <path d="M9.59961 9.6001L22.3993 22.3997" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.60074 22.3997L22.4004 9.6001" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="form-header">
                            <div class="title">Mã code của bạn</div>
                            <div class="sub-title">Mã code được gửi tới email <span id="email-send-code"></span></div>
                        </div>
                        <div class="position-relative">
                            <input type="text" class="col-12 input-custom" name="code"
                                placeholder="Mã code của bạn">
                        </div>
                        <div class="group-btn-action form-footer">
                            <button type="submit" class="btn-custom btn-type-1">

                                <div>Tải xuống</div>
                                <div class="btn-type-1__icon"><svg width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L12 18M12 18L8 14M12 18L16 14" stroke="white" stroke-width="1.6"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></div>
                                <div class="spinner-border" style="display: none;width:30px;height:30px;" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modalContactPay3" id="modalContactPay4" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalContactPayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('product-payment.download') }}" class="modal-form" id="formPay4">
                        <input type="hidden" id="code-id" name="id">
                        <div class="close-modal btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="16" fill="white" />
                                <path d="M9.59961 9.6001L22.3993 22.3997" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.60074 22.3997L22.4004 9.6001" stroke="#51545F" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="form-header">
                            <div class="title">Mã code của bạn</div>
                        </div>
                        <div class="position-relative">
                            <input type="text" class="col-12 input-custom" name="code"
                                placeholder="Mã code của bạn">
                        </div>
                        <div class="group-btn-action form-footer">
                            <button type="submit" class="btn-custom btn-type-1">

                                <div>Đọc ebook</div>
                                <div class="btn-type-1__icon"><svg width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L12 18M12 18L8 14M12 18L16 14" stroke="white" stroke-width="1.6"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></div>
                                <div class="spinner-border" style="display: none;width:30px;height:30px;" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="loading-wrapper-bg">
        <div class="spinner-grow text-danger" role="status">
            <span class="sr-only"></span>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
    </script>
    <script src="{{ asset('js/detail.js') }}?v={{ filemtime(public_path('js/detail.js')) }}"></script>
@endpush
