<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $product->price }}</p>
</div>

<!-- Original Price Field -->
<div class="col-sm-12">
    {!! Form::label('original_price', 'Original Price:') !!}
    <p>{{ $product->original_price }}</p>
</div>

