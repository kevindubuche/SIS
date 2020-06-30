  <!-- Modal -->
  <div class="modal fade" id="add-faculty-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">







<!-- Faculty Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_name', 'Faculty Name:') !!}
    {!! Form::text('faculty_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Faculty Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_code', 'Faculty Code:') !!}
    {!! Form::text('faculty_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Faculty Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_description', 'Faculty Description:') !!}
    {!! Form::text('faculty_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>







</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Save Faculty', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>