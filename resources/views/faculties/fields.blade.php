


<!-- Faculty Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_name', 'Nom de la Faculté:') !!}
    {!! Form::text('faculty_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Faculty Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_code', 'Code de la faculté:') !!}
    {!! Form::text('faculty_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Faculty Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_description', 'Description:') !!}
    {!! Form::text('faculty_description', null, ['class' => 'form-control']) !!}
</div>
{{-- 
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>
 --}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Ennegistrer', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('faculties.index') }}" class="btn btn-default">Annuler</a>
</div>


