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
    @if (@$product->download_url)
        <p>Current file: {{ @$product->download_url }}</p>
    @endif
    {!! Form::file('download_url', ['class' => 'form-control']) !!}
</div>
<link rel="stylesheet" href="{{ asset('css/ckeditor5.css') }}" />
<script src="{{ asset('js/ckeditor5.umd.js') }}"></script>

<script type="module">
    const {
        ClassicEditor,
        Heading, // Thêm plugin Heading
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph,
        Image,
        ImageInsert,
        ImageToolbar,
        ImageCaption,
        ImageStyle,
        ImageResizeEditing,
        ImageResizeHandles
    } = CKEDITOR;
    ClassicEditor
        .create(document.querySelector('#full_description'), {
            plugins: [
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph,
                Image,
                ImageToolbar,
                ImageCaption,
                ImageStyle,
                ImageInsert,
                ImageResizeEditing, ImageResizeHandles, Heading
            ],
            toolbar: ['heading', '|',
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'imageInsert', 'link'
            ],
            image: {
                toolbar: ['imageTextAlternative',  'imageStyle:alignBlockLeft','imageStyle:alignCenter', 'imageStyle:alignBlockRight', ],
                insert: {
                    // This is the default configuration, you do not need to provide
                    // this configuration key if the list content and order reflects your needs.
                    integrations: ['url']
                }
            },

        })
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
