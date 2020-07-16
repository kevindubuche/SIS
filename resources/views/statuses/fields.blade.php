<!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    {!! Form::number('teacher_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('statuses.index') }}" class="btn btn-default">Cancel</a>
</div>
