@extends('layouts.app-2')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <iframe allowfullscreen="" style="width: 100%; height: 500px;"
        src="https://heyzine.com/api1?pdf={{ route('products.get-book', ['code' => $code]) }}&k={{ config('heyzine.client_key') }}"></iframe>
@endsection

@push('scripts')
@endpush
