<!-- Created By Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div> --}}
<input type="hidden" name="created_by" id="created_by" 
value="{{Auth::id()}}" required>

<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title', 'Titre:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-4">
    {!! Form::label('body', 'Contenu:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'required']) !!}
</div>


{{-- assigner a une classe --}}
<div class="form-group col-sm-4">
    <table class="table" id="classAssignings-table">
        <thead>
            <tr>
              <td></td>
        <td>Classes</td>
            </tr>
        </thead>
        <tbody>
            <label>Visible pour :</label>
          @foreach($classes as $classe)
              <tr>
                <td><input type="checkbox" name="multiclass[]" value="{{$classe->class_id}}" ></td>
                <td>{{ $classe->class_name }}</td>
              </tr>
          @endforeach
        </tbody>
    </table> 
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Publier', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('actuses.index') }}" class="btn btn-default">Annuler</a>
</div>
