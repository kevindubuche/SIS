<!-- Id Student Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_student', 'Id Student:') !!}
    {!! Form::number('id_student', null, ['class' => 'form-control']) !!}
</div>

<!-- Quiz Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quiz_id', 'Quiz Id:') !!}
    {!! Form::number('quiz_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Score Field -->
<div class="form-group col-sm-6">
    {!! Form::label('score', 'Score:') !!}
    {!! Form::text('score', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('noteQuizzes.index') }}" class="btn btn-default">Cancel</a>
</div>
