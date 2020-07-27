
{{-- <!-- Faculty Id Field -->
<div class="form-group col-sm-4">
  {!! Form::label('faculty_id', 'Faculty Id:') !!}
  <select class="form-control" name="faculty_id" id="faculty_id">

      @foreach($faculties as $faculty)
      <option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
      @endforeach
  </select>
</div> --}}

<!-- Departement Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departement_name', 'Nom du Département:') !!}
    {!! Form::text('departement_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Departement Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departement_code', 'Code du Département:') !!}
    {!! Form::text('departement_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Departement Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departement_description', 'Description:') !!}
    {!! Form::text('departement_description', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('departements.index') }}" class="btn btn-default">Annuler</a>
</div>





