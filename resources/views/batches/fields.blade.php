  <!-- Modal -->
  <div class="modal fade" id="add-batch-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<input type="hidden" name="username" id="username" >
<input type="hidden" name="password" id="password" >
<input type="hidden"  value="{{Auth::id()}}" name="user_id" id="user_id" >
<input type="hidden" value="{{date('Y-m-d')}}" name="dateregistered" id="dateregistered" >

<!-- Batch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('batch', 'Batch:') !!}
    {!! Form::text('batch', null, ['class' => 'form-control']) !!}
</div>



</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Save Batch', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>