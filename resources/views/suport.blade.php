@extends('layouts.app-2')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/form1.css') }}">
<link rel="stylesheet" href="{{ asset('css/form2.css') }}">
<link rel="stylesheet" href="{{ asset('css/form3.css') }}">
@endpush
@section('title', 'Chính Sách Bảo Mật')
@section('content')
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
@endsection
@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js">
</script>
<script src="{{ asset('js/index.js') }}"></script>
@endpush