<div class="modal fade" id="edit-classScheduling-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">







{{-- 
                   {!! Form::model($classScheduling, ['route' => ['classSchedulings.update', $classScheduling->schedule_id], 'method' => 'patch']) !!} --}}

               
               <form action="{{route('classSchedulings.update', 'schedule_id3')}}" method="post">    

                @csrf
                @method('PUT')
<!-- Course Id Field -->
<input type="text" name="schedule_id3" id="schedule_id3">
<div class="form-group col-sm-6">
    <select class="form-control" name="course_id3" id="course_id3">
        <option value="">Select Course</option>
        @foreach ($allCourses as $course)
            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
        @endforeach
    </select>
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="class_id3" id="class_id3">
        <option value="">Select CLass</option>
        @foreach ($allClasses as $class)
            <option value="{{$class->class_id}}">{{$class->class_name}}</option>
        @endforeach
    </select>
</div>


<!-- Level Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="level_id3" id="level_id3">
        <option value="">Select Level</option>
        @foreach ($allLevels as $level)
            <option value="{{$level->level_id}}">{{$level->level}}</option>
        @endforeach
    </select>
</div>

<!-- Shift Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="shift_id3" id="shift_id3">
        <option value="">Select Shift</option>
        @foreach ($allShifts as $shift)
            <option value="{{$shift->shift_id}}">{{$shift->shift}}</option>
        @endforeach
    </select>
</div>


<!-- Classwoom Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="classroom_id3" id="classroom_id3">
        <option value="">Select Classroom</option>
        @foreach ($allClassrooms as $classroom)
            <option value="{{$classroom->classroom_id}}">{{$classroom->classroom_name}}__{{$classroom->classroom_code}}</option>
        @endforeach
    </select>
</div>


<!-- Batch Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="batch_id3" id="batch_id3">
        <option value="">Select Batch</option>
        @foreach ($allBatches as $batch)
            <option value="{{$batch->batch_id}}">{{$batch->batch}}</option>
        @endforeach
    </select>
</div>


<!-- Day Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="day_id3" id="day_id3">
        <option value="">Select Day</option>
        @foreach ($allDays as $day)
            <option value="{{$day->day_id}}">{{$day->name}}</option>
        @endforeach
    </select>
</div>

<!-- Time Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="time_id3" id="time_id3">
        <option value="">Select Time</option>
        @foreach ($allTimes as $time)
            <option value="{{$time->time_id}}">{{$time->time}}</option>
        @endforeach
    </select>
</div>

<!-- Semester Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="semester_id3" id="semester_id3">
        <option value="">Select Semester</option>
        @foreach ($allSemesters as $semester)
            <option value="{{$semester->semester_id}}">{{$semester->semester_name}}</option>
        @endforeach
    </select>
</div>


<!-- Start Time Field -->
<div class="form-group col-sm-6">
    <label>Start Date</label>
    <input type="text"
        class="form-control"
        name="start_time3"
        id="start_time3"
        >
</div>

<!-- End Time Field -->
<div class="form-group col-sm-6">
    <label>End Date</label>
    <input type="text"
        class="form-control"
        name="end_time3"
        id="end_time3"
        >
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status3', 0) !!}
        {!! Form::checkbox('status3', '1', null) !!}
    </label>
</div>




</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-secondary">Update</button>
</div>
</form>
</div>
</div>

</div>






@push('scripts')
    <script>
         $('#start_time3').datetimepicker({
       format:'YYYY-MM-DD',
       useCurrent: false
   });

   $('#end_time3').datetimepicker({
       format:'YYYY-MM-DD',
       useCurrent: false
   });


   $('#course_id3').on('change', function(e){
            console.log(e);
            var course_id = e.target.value;
            // alert(course_id);
            $('#level_id3').empty();
            //get related levels to the specific course with ajax
            $.get('dynamicLevel?course_id=' + course_id, function(data){
                // alert(data[0]); 

                $.each(data, function(index, lev){
                    $('#level_id3').append($('<option/>',{
                        value: lev.level_id,
                         text:  lev.level
                         }))
                });
            });
        });

        $(document).on('click', '#Edit', function(data){
            var id = $(this).data('id');
            //alert(id)
            $.get("{{ route('edit')}}", {id:id}, function(data){
                console.log(data)
                $('#schedule_id3').val(data.schedule_id);
                $("#class_id3").val(data.class_id);
                $("#course_id3").val(data.course_id);
                $("#level_id3").val(data.level_id);
                $("#shift_id3").val(data.shift_id);
                $("#time_id3").val(data.time_id);
                $("#day_id3").val(data.day_id);
                $("#classroom_id3").val(data.classroom_id);
                $("#semester_id3").val(data.semester_id);
                $("#start_time3").val(data.start_time);
                $("#end_time3").val(data.end_time);
                $("#status").val(data.status);
               
            
            })
        })
        // $('#course_id2').on('change', function(e){
        //     console.log(e);
        //     var course_id = e.target.value;
        //     // alert(course_id);
        //     $('#level_id2').empty();
        //     //get related levels to the specific course with ajax
        //     $.get('dynamicLevel?course_id=' + course_id, function(data){
        //         // alert(data[0]); 

        //         $.each(data, function(index, lev){
        //             $('#level_id2').append('<option value"'+lev.level_id+'">'+lev.level+'</option>')
        //         });
        //     });
        // });
    </script>
@endpush