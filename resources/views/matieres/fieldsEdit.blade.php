{{-- <!-- Class Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_id', 'Class Id:') !!}
    {!! Form::number('class_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_id', 'Teacher Id:') !!}
    {!! Form::number('teacher_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Departement Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', 'Titre de la matiere:') !!}
    {!! Form::text('titre', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-6">
    <label>Selectionner classe</label>
    <select class="form-control" name="class_id" id="" required>
    <option value="0" selected="true" disabled="true"> Selectionner classe</option>
      @foreach($allClasses as $class)
      <option value="{{$class->class_id}}" @if($matiere->class_id == $class->class_id) selected="true" @endif>{{$class->class_name}}</option>
      @endforeach
  </select>
</div>

<div class="form-group col-sm-6">
      <label>Selectionner professeur</label>
      <select class="form-control" name="teacher_id" id="" required>
      <option value="0" selected="true" disabled="true"> Selectionner professeur</option>
        @foreach($allTeachers as $teacher)
        <option value="{{$teacher->user_id}}" @if($matiere->teacher_id == $teacher->user_id) selected="true" @endif>{{$teacher->first_name}} {{$teacher->last_name}}</option>
        @endforeach
    </select>
  </div>

  <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('matieres.index') }}" class="btn btn-default">Annuler</a>
</div>