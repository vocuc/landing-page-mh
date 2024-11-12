<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_link', 'Image Link:') !!}
    {!! Form::text('image_link', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
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
        'required',
        'maxlength' => 65535,
        'maxlength' => 65535,
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
    {!! Form::label('download_url', 'File Upload:') !!}
    @if ($product->download_url)
        <p>Current file: {{ $product->download_url }}</p>
    @endif
    {!! Form::file('download_url', ['class' => 'form-control']) !!}
</div>
<script src="{{ asset('js/ckeditor.js') }}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#full_description'))
        .catch(error => {
            console.error(error);
        });
</script>