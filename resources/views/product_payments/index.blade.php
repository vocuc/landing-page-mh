@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Payments</h1>
            </div>
        </div>
    </div>
</section>
<div class="content px-3">
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <div>Tổng số đơn/Doanh thu</div>
                    <h3>{{$dataReport[1]['total_orders']}}</h3>
                    <h3>{{number_format($dataReport[1]['total_revenue'], 0, '.', ',')}}</h3>
                    <p>Đã thanh toán</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <div>Tổng số đơn/Doanh thu</div>
                    <h3>{{$dataReport[0]['total_orders']}}</h3>
                    <h3>{{number_format($dataReport[0]['total_revenue'], 0, '.', ',')}}</h3>
                    <p>Chưa thanh toán</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content px-3">
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="col-sm-12" style="margin-bottom: 20px;">
        <div class="dt-buttons btn-group flex-wrap">
            <!-- <button id="all" class="filter-day btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button">
                <span>Tất cả</span>
            </button> -->
            <!-- <button id="today" class="filter-day btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button">
                <span>Hôm nay</span>
            </button>
            <button id="yesterday" class="filter-day btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button">
                <span>Hôm qua</span>
            </button>
            <button id="7day" class="filter-day btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button">
                <span>7 ngày qua</span>
            </button>
            <button id="30day" class="filter-day btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button">
                <span>30 ngày qua</span>
            </button> -->

            <div class="btn-group" style="line-height: 35px;">
                Filter: 
            </div>
            <div class="btn-group" style="margin-left: 20px;">
                <input name="start_time" value="" class="form-control start_time"  placeholder="Từ ngày">
            </div>
            <div class="btn-group" style="margin-left: 20px;">
                <input name="end_time" value="" class="form-control end_time"  placeholder="Đến ngày">
            </div>
            <div class="btn-group" style="margin-left: 20px;">
                <select class="form-control page-size">
                    <option value="10">Hiển thị 10/page</option>
                    <option value="50">Hiển thị 50/page</option>
                    <option value="100">Hiển thị 100/page</option>
                </select>
            </div>
            <div class="btn-group" style="margin-left: 20px;">
                <a href="{{route('export')}}?{{http_build_query(request()->all())}}">
                    <button class="form-control excel">Xuất excel</button>
                </a>
            </div>
            <div class="btn-group" style="margin-left: 20px;">
                <a href="{{ route('product-payments.index') }}">
                    <button class="form-control excel">Bỏ Lọc</button>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        @include('product_payments.table')
    </div>
</div>
<style>
    .btn-secondary.active {
        color: #fff;
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(".start_time").flatpickr();
    $(".end_time").flatpickr();

    // Lấy tất cả các nút có class "filter-day"
    const buttons = document.querySelectorAll('.filter-day');
    const currentUrl = new URL(window.location.href);
    const currentdate = currentUrl.searchParams.get('d');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Lấy ID của nút được nhấn
            const id = this.id;

            // Lấy URL hiện tại
            const currentUrl = new URL(window.location.href);

            // Lấy các tham số hiện tại
            const params = currentUrl.searchParams;

            // Cập nhật hoặc thêm tham số 'filter'
            params.set('d', id);

            // Cập nhật URL với tham số mới
            currentUrl.search = params.toString();

            // Điều hướng đến URL mới
            window.location.href = currentUrl.toString();
        });

        if (button.id === currentdate) {
            button.classList.remove('active');
            button.classList.add('active'); // Thêm class 'active' cho nút
        }
    });

    // Lấy phần tử <select>
    const selectElement = document.querySelector('.page-size');
    const perPageValue = currentUrl.searchParams.get('per_page');

    if (perPageValue) {
        const optionToSelect = selectElement.querySelector(`option[value="${perPageValue}"]`);
        if (optionToSelect) {
            optionToSelect.selected = true; // Đặt tùy chọn là selected
        }
    }

    // Thêm sự kiện thay đổi (change) cho <select>
    selectElement.addEventListener('change', function() {
        // Lấy giá trị được chọn
        const selectedValue = this.value;

        // Lấy URL hiện tại
        const currentUrl = new URL(window.location.href);

        // Thêm hoặc cập nhật tham số 'itemsPerPage'
        currentUrl.searchParams.set('per_page', selectedValue);

        // Điều hướng đến URL mới
        window.location.href = currentUrl.toString();
    });

     // Lấy phần tử <select>
    const startTime = document.querySelector('.start_time');
    const startTimeValue = currentUrl.searchParams.get('start_time');
    if (startTimeValue) {
        startTime.value = startTimeValue;
    }
    startTime.addEventListener('change', function() {
        // Lấy giá trị được chọn
        const selectedValue = this.value;

        // Lấy URL hiện tại
        const currentUrl = new URL(window.location.href);

        // Thêm hoặc cập nhật tham số 'itemsPerPage'
        currentUrl.searchParams.set('start_time', selectedValue);

        // Điều hướng đến URL mới
        window.location.href = currentUrl.toString();
    });

    const endTime = document.querySelector('.end_time');
    const endTimeValue = currentUrl.searchParams.get('end_time');
    if (endTimeValue) {
        endTime.value = endTimeValue;
    }
    endTime.addEventListener('change', function() {
        // Lấy giá trị được chọn
        const selectedValue = this.value;

        // Lấy URL hiện tại
        const currentUrl = new URL(window.location.href);

        // Thêm hoặc cập nhật tham số 'itemsPerPage'
        currentUrl.searchParams.set('end_time', selectedValue);

        // Điều hướng đến URL mới
        window.location.href = currentUrl.toString();
    });
</script>
@endsection