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
        
        @foreach($allCourses as $course)
        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
        @endforeach
    </select>
</div>

<!-- Level Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="level_id" id="level_id">
        
    </select>
</div>

<!-- Shift Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="shift_id" id="shift_id">
        @foreach($allShifts as $shift)
        <option value="{{$shift->shift_id}}">{{$shift->shift}}</option>
        @endforeach
    </select>
 </div>

<!-- Classwoom Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="classwoom_id" id="classwoom_id">
        @foreach($allClassrooms as $classroom)
        <option value="{{$classroom->classroom_id}}">{{$classroom->classroom_name}}</option>
        @endforeach
    </select>
</div>

<!-- Batch Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="batch_id" id="batch_id">
        @foreach($allBatches as $batch)
        <option value="{{$batch->batch_id}}">{{$batch->batch}}</option>
        @endforeach
    </select>
</div>

<!-- Day Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="day_id" id="day_id">
        @foreach($allDays as $day)
        <option value="{{$day->day_id}}">{{$day->name}}</option>
        @endforeach
    </select>
 </div>

<!-- Time Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="time_id" id="time_id">
        @foreach($allTimes as $time)
        <option value="{{$time->time_id}}">{{$time->time}}</option>
        @endforeach
    </select>
</div>



<!-- Start Time Field -->

    <div class="form-group col-sm-6">
        {!! Form::label('start_time', 'Start time:') !!}
        <input type="text" name="start_time" id="start_time" >
    </div>


<!-- End Time Field -->

<div class="form-group col-sm-6">
    {!! Form::label('end_time', 'end time:') !!}
    <input type="text" name="end_time" id="end_time" >
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

@push('scripts')
    <script>
        $('#course_id').on('change', function(e){
            console.log(e);
            var course_id = e.target.value;
            // alert(course_id);
            $('#level_id').empty();
            //get related levels to the specific course with ajax
            $.get('dynamicLevel?course_id=' + course_id, function(data){
                // alert(data[0]); 

                $.each(data, function(index, lev){
                    $('#level_id').append('<option value="'+lev.level_id+'">'+lev.level+'</option>')
                });
            });
        });
    </script>
@endpush