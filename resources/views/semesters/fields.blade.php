<!-- Semester Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester_name', 'Nom du semestre:') !!}
    {!! Form::text('semester_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Semester Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester_code', 'Code du semestre:') !!}
    {!! Form::text('semester_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Semester Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('semester_duration', 'Duree:') !!}
    {!! Form::text('semester_duration', null, ['class' => 'form-control']) !!}
</div>

<!-- Semester Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('semester_description', 'Description:') !!}
    {!! Form::textarea('semester_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Engistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('semesters.index') }}" class="btn btn-default">Annuler</a>
</div>
