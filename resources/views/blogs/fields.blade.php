<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Short Desc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_desc', 'Short Desc:') !!}
    {!! Form::text('short_desc', null, ['class' => 'form-control', 'required', 'maxlength' => 500, 'maxlength' => 500]) !!}
</div>

<!-- Default Img Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default_img_url', 'Default Img Url:') !!}
    {!! Form::text('default_img_url', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', \App\Models\blog::$categories, isset($coinPackage->coin_id) ? $coinPackage->coin_id : null, ['class' => 'form-control', 'required']) !!}
</div>
<!-- Meta Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_title', 'Meta Title:') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Meta Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    {!! Form::text('meta_description', null, ['class' => 'form-control', 'required', 'maxlength' => 500, 'maxlength' => 500]) !!}
</div>

<!-- Meta Keyword Field -->
<div class="form-group col-sm-6">
    {!! Form::label('meta_keyword', 'Meta Keyword:') !!}
    {!! Form::text('meta_keyword', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', \App\Models\blog::$status, isset($coinPackage->coin_id) ? $coinPackage->coin_id : null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['id' => 'editor', 'class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>