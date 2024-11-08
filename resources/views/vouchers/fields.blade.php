<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('type', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('type', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('type', 'Type', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control', 'required']) !!}
</div>