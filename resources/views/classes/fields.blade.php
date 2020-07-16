
  <!-- Modal -->
  <div class="modal fade" id="add-class-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nouvelle classe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
<!-- Class Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_name', 'Nom de la classe:') !!}
    {!! Form::text('class_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Class Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_code', 'Code:') !!}
    {!! Form::text('class_code', null, ['class' => 'form-control']) !!}
</div>



</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Save Class', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>