<div class="table-responsive">
    <table class="table" id="classSchedulings-table">
        <thead>
            <tr>
         <th>Course </th>
         <th>Class</th>
        <th>Level </th>
        <th>Shift </th>
        <th>Classroom </th>
        <th>Batch </th>
        <th>Day </th>
        <th>Time </th>
        <th>Semester</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($classSchedule as $classScheduling)
            <tr>
            <td>{{ $classScheduling->course_name }}</td>
            <td>{{ $classScheduling->class_name }}</td>
            <td>{{ $classScheduling->level }}</td>
            <td>{{ $classScheduling->shift }}</td>
            <td>{{ $classScheduling->classroom_name }}</td>
            <td>{{ $classScheduling->batch }}</td>
            <td>{{ $classScheduling->name }}</td>
            <td>{{ $classScheduling->time}}</td>
            <td>{{ $classScheduling->semester_name}}</td>
            {{-- <td>{{ $classScheduling->teacher_id }}</td> --}}
            <td>{{ $classScheduling->start_time }}</td>
            <td>{{ $classScheduling->end_time }}</td> 
            <td>@if( $classScheduling->status == 1)
                    <div style="color:green">Active</div>
                    @else
                    <div style="color:red">In Active</div>
                @endif
            </td>
                <td>
                    {!! Form::open(['route' => ['classSchedulings.destroy', $classScheduling->schedule_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#view-classScheduling-modal" 
                            data-schedule_id="{{ $classScheduling->schedule_id }}"
                            data-course_id="{{ $classScheduling->course_id }}"
                            data-level_id="{{ $classScheduling->level_id }}"
                            data-shift_id="{{ $classScheduling->shift_id }}"
                            data-classwoom_id="{{ $classScheduling->classroom_id }}"
                            data-batch_id="{{ $classScheduling->batch_id }}"
                            data-day_id="{{ $classScheduling->day_id }}"
                            data-time_id="{{ $classScheduling->time }}"
                            {{-- data-teacher_id="{{ $classScheduling->teacher_id }}" --}}
                            {{-- data-start_time="{{ $classScheduling->start_time }}"
                            data-end_time="{{ $classScheduling->end_time }}" --}}
                            data-status="{{ $classScheduling->status }}"
                             data-created_at="{{ $classScheduling->created_at }}"
                            data-updated_at="{{ $classScheduling->updated_at }}"
                         class='btn btn-default btn-xs'>
                         <i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('classSchedulings.edit', [$classScheduling->schedule_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


{{-- THE MODAL FOR THE VIEW --}}
  <!-- Modal -->
  <div class="modal fade" id="view-classScheduling-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input type="hidden" name="schedule_id" id="schedule_id">
                            
                <!-- Course Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('course_id', 'Course Id:') !!}
                    <input type="text" name="course_id" id="course_id" readonly>
                </div>

                <!-- Level Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('level_id', 'Level Id:') !!}
                    <input type="text" name="level_id" id="level_id" readonly>
                </div>

                <!-- Shift Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('shift_id', 'Shift Id:') !!}
                    <input type="text" name="shift_id" id="shift_id" readonly>
                </div>

                <!-- Classwoom Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('classwoom_id', 'Classwoom Id:') !!}
                    <input type="text" name="classwoom_id" id="classwoom_id" readonly>
                </div>

                <!-- Batch Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('batch_id', 'Batch Id:') !!}
                    <input type="text" name="batch_id" id="batch_id" readonly>
                </div>

                <!-- Day Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('day_id', 'Day Id:') !!}
                    <input type="text" name="day_id" id="day_id" readonly>
                </div>

                <!-- Time Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('time_id', 'Time Id:') !!}
                    <input type="text" name="time_id" id="time_id" readonly>
                </div>

                <!-- Teacher Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('teacher_id', 'Teacher Id:') !!}
                    <input type="text" name="teacher_id" id="teacher_id" readonly>
                 </div>

                <!-- Start Time Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('start_time', 'Start Time:') !!}
                    <input type="text" name="start_time" id="start_time" readonly>
                </div>

                <!-- End Time Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('end_time', 'End Time:') !!}
                    <input type="text" name="start_time" id="start_time" readonly>
               </div>

                <!-- Status Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('status', 'Status:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('status', 0) !!}
                        {!! Form::checkbox('status', '1', null) !!}
                    </label>
                </div>



                  <div class="form-group">
                    {!! Form::label('created_at', 'Created At:') !!}
                   <input type="text" name="created_at" id="created_at" readonly>
                  </div>

                  <div class="form-group">
                    {!! Form::label('updated_at', 'Updated At:') !!}
                   <input type="text" name="updated_at" id="updated_at" readonly>
                  </div>
                  


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Save Classscheduling', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>

</div>


@section('scripts')
 <script>
        // {{-------batch view side--------}}
        $('#view-classScheduling-modal').on('show.bs.modal', function(event){
    
            var button = $(event.relatedTarget)
            var course_id = button.data('course_id')
            var level_id = button.data('level_id')
            var shift_id = button.data('shift_id')
            var classwoom_id = button.data('classwoom_id')
            var batch_id = button.data('batch_id')
            var day_id = button.data('day_id')
            var time_id = button.data('time_id')
            var teacher_id = button.data('teacher_id')
            var start_time = button.data('start_time')
            var end_time = button.data('end_time')
            var status = button.data('status')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var schedule_id = button.data('schedule_id')

            var modal =$(this)

            modal.find('.modal-title').text('VIEW BATCH INFORMATION');
            modal.find('.modal-body #course_id').val(course_id);
            modal.find('.modal-body #level_id').val(level_id);
            modal.find('.modal-body #shift_id').val(shift_id);
            modal.find('.modal-body #classwoom_id').val(classwoom_id);
            modal.find('.modal-body #batch_id').val(batch_id);
            modal.find('.modal-body #day_id').val(day_id);
            modal.find('.modal-body #time_id').val(time_id);
            modal.find('.modal-body #teacher_id').val(teacher_id);
            modal.find('.modal-body #start_time').val(start_time);
            modal.find('.modal-body #end_time').val(end_time);
            modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #created_at').val(created_at);
            modal.find('.modal-body #updated_at').val(updated_at);
            modal.find('.modal-body #schedule_id').val(schedule_id);

        });


    </script>
@endsection