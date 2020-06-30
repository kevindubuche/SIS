  <!-- Modal -->
  <div class="modal fade" id="add-departement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">





<!-- Faculty Id Field -->
<div class="form-group col-sm-4">
  {!! Form::label('faculty_id', 'Faculty Id:') !!}
  <select class="form-control" name="faculty_id" id="faculty_id">

      @foreach($faculties as $faculty)
      <option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
      @endforeach
  </select>
</div>

<!-- Departement Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departement_name', 'Departement Name:') !!}
    {!! Form::text('departement_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Departement Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departement_code', 'Departement Code:') !!}
    {!! Form::text('departement_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Departement Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departement_description', 'Departement Description:') !!}
    {!! Form::text('departement_description', null, ['class' => 'form-control']) !!}
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
  {!! Form::submit('Save Departement', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>