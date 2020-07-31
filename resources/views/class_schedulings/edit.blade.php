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
<input type="hidden" name="schedule_id3" id="schedule_id3">
<div class="form-group col-sm-6">
    <select class="form-control" name="course_id3" id="course_id3">
        <option  disabled="true" selected="false" value="">Cours</option>
        @foreach ($allCourses as $course)
        @if ($course->created_by == Auth::user()->id || Auth::user()->role==1)
        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
  @endif
 @endforeach
    </select>
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="class_id3" id="class_id3">
        <option disabled="true" selected="false" value="">Classe</option>
        @foreach ($allClassAssignins as $class)
        @if ($class->teacher_id == Auth::user()->id || Auth::user()->role==1)
        <option value="{{$class->InfoClass->class_id}}">{{$class->InfoClass->class_name}}</option>
        @endif
        @endforeach
    </select>
</div>



<!-- Semester Id Field -->
<div class="form-group col-sm-6">
    <select class="form-control" name="semester_id3" id="semester_id3">
        <option disabled="true" selected="false" value="">Semestre</option>
        @foreach ($allSemesters as $semester)
            <option value="{{$semester->semester_id}}">{{$semester->semester_name}}</option>
        @endforeach
    </select>
</div>


<!-- Start Time Field -->
<div class="form-group col-sm-6">
    <label>Date debut</label>
    <input type="text"
        class="form-control"
        name="start_time3"
        id="start_time3"
        >
</div>

<!-- End Time Field -->
<div class="form-group col-sm-6">
    <label>Date fin</label>
    <input type="text"
        class="form-control"
        name="end_time3"
        id="end_time3"
        >
</div>



</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-secondary">Modifier</button>
</div>
</form>
</div>
</div>

</div>






@push('scripts')
    <script>
         $('#start_time3').datetimepicker({
       format:'YYYY-MM-DD HH:mm:ss',
       useCurrent: false
   });

   $('#end_time3').datetimepicker({
       format:'YYYY-MM-DD HH:mm:ss',
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