
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
    {!! Form::text('departement_name', null, ['class' => 'form-control', 'required']) !!}
</div>


<!-- Departement Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departement_description', 'Description:') !!}
    {!! Form::text('departement_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
  {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('departements.index') }}" class="btn btn-default">Annuler</a>
</div>





