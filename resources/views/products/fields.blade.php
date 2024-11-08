<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Original Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('original_price', 'Original Price:') !!}
    {!! Form::number('original_price', null, ['class' => 'form-control', 'required']) !!}
</div>