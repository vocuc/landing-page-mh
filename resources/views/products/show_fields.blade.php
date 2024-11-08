<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Short Description Field -->
<div class="col-sm-12">
    {!! Form::label('short_description', 'Short Description:') !!}
    <p>{{ $product->short_description }}</p>
</div>

<!-- Full Description Field -->
<div class="col-sm-12">
    {!! Form::label('full_description', 'Full Description:') !!}
    <p>{{ $product->full_description }}</p>
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

