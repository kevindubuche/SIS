<!-- Titre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', 'Titre:') !!}
    {!! Form::text('titre', null, ['class' => 'form-control']) !!}
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    <label>Selectionner classe</label>
    <select class="form-control" name="class_id" id="" required>
    <option value="0" selected="true" disabled="true"> Selectionner classe</option>
      @foreach($allClasses as $class)
      <option value="{{$class->class_id}}">{{$class->class_name}}</option>
      @endforeach
  </select>
</div>
<!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_questions', 'Nombre de questions:') !!}
    {!! Form::number('nombre_questions', null, ['class' => 'form-control']) !!}
</div>

<!-- Duree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duree', 'Duree:') !!}
    {!! Form::number('duree', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorie Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('categorie', 'Categorie:') !!}
    {!! Form::text('categorie', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-6">
    <label>Selectionner categorie</label>
    <select class="form-control" name="categorie" id="" required>
    <option value="0" selected="true" disabled="true"> Selectionner categorie</option>
      @foreach($allCategories as $cat)
      <option value="{{$cat->categorie}}">{{$cat->categorie}}</option>
      @endforeach
  </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quizzes.index') }}" class="btn btn-default">Annuler</a>
</div>
