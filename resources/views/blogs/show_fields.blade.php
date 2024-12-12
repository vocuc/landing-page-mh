<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $blog->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $blog->slug }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $blog->content }}</p>
</div>

<!-- Short Desc Field -->
<div class="col-sm-12">
    {!! Form::label('short_desc', 'Short Desc:') !!}
    <p>{{ $blog->short_desc }}</p>
</div>

<!-- Default Img Url Field -->
<div class="col-sm-12">
    {!! Form::label('default_img_url', 'Default Img Url:') !!}
    <p>{{ $blog->default_img_url }}</p>
</div>

<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $blog->category_id }}</p>
</div>

<!-- Meta Title Field -->
<div class="col-sm-12">
    {!! Form::label('meta_title', 'Meta Title:') !!}
    <p>{{ $blog->meta_title }}</p>
</div>

<!-- Meta Description Field -->
<div class="col-sm-12">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    <p>{{ $blog->meta_description }}</p>
</div>

<!-- Meta Keyword Field -->
<div class="col-sm-12">
    {!! Form::label('meta_keyword', 'Meta Keyword:') !!}
    <p>{{ $blog->meta_keyword }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $blog->status }}</p>
</div>

