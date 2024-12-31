<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_link', 'Image Link:') !!}
    {!! Form::text('image_link', null, [
        'class' => 'form-control',
        'required',
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- Short Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_description', 'Short Description:') !!}
    {!! Form::text('short_description', null, [
        'class' => 'form-control',
        'required',
        'maxlength' => 255,
        'maxlength' => 255,
    ]) !!}
</div>

<!-- Full Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('full_description', 'Full Description:') !!}
    {!! Form::textarea('full_description', null, [
        'class' => 'form-control',
        'id' => 'editor'
    ]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Original Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('original_price', 'Original Price:') !!}
    {!! Form::number('original_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Download Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('download_url', 'Download Url:') !!}
    {!! Form::text('download_url', null, ['class' => 'form-control', 'required', 'maxlength' => 500, 'maxlength' => 500]) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_hot', 'Sản phẩm hot:') !!}
    {!! Form::select('is_hot', [0 => 'Inactive', 1 => 'Active'], 
        isset($product) ? $product->is_hot : null
        , ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('is_active_voucher', 'Active Voucher:') !!}
    {!! Form::select('is_active_voucher', [0 => 'Inactive', 1 => 'Active'], 
        isset($product) ? $product->is_active_voucher : null
        , ['class' => 'form-control']) !!}
</div>
