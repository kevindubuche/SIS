  <!-- Modal -->
  <div class="modal fade" id="add-classScheduling-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<!-- Course Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="course_id" id="course_id">
        <option value="">Select course</option>
        <option value=""></option>
    </select>
</div>

<!-- Level Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="level_id" id="level_id">
        <option value="">Select level</option>
        <option value=""></option>
    </select>
</div>

<!-- Shift Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="shift_id" id="shift_id">
        <option value="">Select shift</option>
        <option value=""></option>
    </select>
 </div>

<!-- Classwoom Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="classwoom_id" id="classwoom_id">
        <option value="">Select classwoom</option>
        <option value=""></option>
    </select>
</div>

<!-- Batch Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="batch_id" id="batch_id">
        <option value="">Select batch</option>
        <option value=""></option>
    </select>
</div>

<!-- Day Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="day_id" id="day_id">
        <option value="">Select day</option>
        <option value=""></option>
    </select>
 </div>

<!-- Time Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="time_id" id="time_id">
        <option value="">Select time</option>
        <option value=""></option>
    </select>
</div>

<!-- Teacher Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="teacher_id" id="teacher_id">
        <option value="">Select teacher</option>
        <option value=""></option>
    </select>
</div>

<!-- Start Time Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="start_time" id="start_time">
        <option value="">Select start time</option>
        <option value=""></option>
    </select>
</div>

<!-- End Time Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="end_time" id="end_time">
        <option value="">Select start end time</option>
        <option value=""></option>
    </select>
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
  {!! Form::submit('Save ClassScheduling', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>

@section('script')
    <script>
        $('#course_id').on('change', function(e){
            console.log(e);
            var course_id = e.target.value;

            $('#level').empty();
            $.get('dynamicLevel?course_id' + course_id, function(data){
                console.log(data); 

                $.each(data, function(index, lev){
                    $('#level_id').append('<option value='+lev.level_id+'>'+lev.level+'</option>')
                })
            })
        })
    </script>
@endsection