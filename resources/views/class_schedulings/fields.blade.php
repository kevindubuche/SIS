  <!-- Modal -->
  <div class="modal fade" id="add-classScheduling-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter nouvel horaire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input type="hidden" value="{{Auth::user()->id}}" id="created_by" name="created_by">
<!-- Course Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="course_id" id="course_id" required>
        <option value="0" selected="false" disabled="true">Cours</option>
        @foreach($allCourses as $course)
        {{-- lap we only cours kel te creer yo sauf adm kap we tout cours yo --}}
        @if ($course->created_by == Auth::user()->id || Auth::user()->role==1)
              <option value="{{$course->course_id}}">{{$course->course_name}}</option>
        @endif
      
        @endforeach
    </select>
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="class_id" id="class_id" required>
        <option value="0" selected="false" disabled="true">Classe</option>
        @foreach($allClassAssignins as $class)
        @if ($class->teacher_id == Auth::user()->id || Auth::user()->role==1)
        <option value="{{$class->InfoClass->class_id}}">{{$class->InfoClass->class_name}}</option>
        @endif
        @endforeach
    </select>
</div>

<!-- Semester Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="semester_id" id="semester_id" required>
        <option value="0" selected="false" disabled="true">Semestre</option>
        @foreach($allSemesters as $semester)
        <option value="{{$semester->semester_id}}">{{$semester->semester_name}}</option>
        @endforeach
    </select>
</div>



<!-- Start Time Field -->

    <div class="form-group col-sm-6">
        <label>Date debut</label>
        {{-- {!! Form::label('start_time', 'Start time:') !!} --}}
        <input type="text" autocomplete="off" name="start_time" id="start_time" required>
    </div>


<!-- End Time Field -->

<div class="form-group col-sm-6">
    <label>Date fin</label>
    {{-- {!! Form::label('end_time', 'end time:') !!} --}}
    <input type="text"  autocomplete="off" name="end_time" id="end_time" required>
</div>


{{-- 
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div> --}}


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Enregisstrer horaire', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>

{{-- @push('scripts')
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
@endpush --}}