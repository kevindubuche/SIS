

  <!-- Modal -->
  <div class="modal fade" id="add-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau cours</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <input type="hidden" name="created_by" id="created_by" value=" {{ Auth::user()->id }}" >
<!-- Course Name Field -->
<div class="form-group ">
    {!! Form::label('course_name', 'Nom du cours:') !!}
    {!! Form::text('course_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Code Field -->
<div class="form-group ">
    {!! Form::label('course_code', 'Code du cours:') !!}
    {!! Form::text('course_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group ">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'cols'=>40, 'rows'=>2]) !!}
</div>

<!-- Status Field -->
<div class="form-group ">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>


<input type="file" name="filename" id="filename">


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Enregistrer le cours', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>





