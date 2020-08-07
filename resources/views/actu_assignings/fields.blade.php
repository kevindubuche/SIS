<!-- Actu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actu_id', 'Actu Id:') !!}
    {!! Form::number('actu_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_id', 'Class Id:') !!}
    {!! Form::number('class_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('actuAssignings.index') }}" class="btn btn-default">Cancel</a>
</div>
