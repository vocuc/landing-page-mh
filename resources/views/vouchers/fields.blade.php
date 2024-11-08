@php
    use App\Enums\Vouchers\VoucherType;
@endphp
<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Loại giảm giá:') !!}
    {!! Form::select('type', [VoucherType::AMOUNT->value => 'Giá tiền', VoucherType::PERCENT->value => 'Phần trăm'], null, ['class' => 'form-control']) !!}
</div>
<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control', 'required']) !!}
</div>