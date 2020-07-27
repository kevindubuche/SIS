<div class="container table-responsive">
    <table class="table display   table table-bordered table-striped table-condensed" 
    {{-- id="classSchedulings-table" --}}
    id='myTable'>
        <thead>
            <tr>
         <th>Cours </th>
         <th>Classe</th>
        <th>Semestre</th>
        <th>Date début</th>
        <th>Date fin</th>
        <th >Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($classSchedule as $classScheduling)
            <tr>
            <td>{{ $classScheduling->InfoCourse->course_name }}</td>
            <td>{{ $classScheduling->InfoClass->class_name}}</td>
            <td>{{ $classScheduling->InfoSemester->semester_name}}</td>
            <td>{{ $classScheduling->start_time->format('D. m Y H:m') }}</td>
            <td>{{ $classScheduling->end_time->format('D. m Y H:m') }}</td> 
             <td>
                    
                    {!! Form::open(['route' => ['classSchedulings.destroy', $classScheduling->schedule_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#view-classScheduling-modal" 
                            data-schedule_id="{{ $classScheduling->schedule_id }}"
                            data-course_id="{{ $classScheduling->course_id }}"
                            {{-- data-level_id="{{ $classScheduling->level_id }}" --}}
                            {{-- data-shift_id="{{ $classScheduling->shift_id }}"
                            data-classwoom_id="{{ $classScheduling->classroom_id }}"
                            data-batch_id="{{ $classScheduling->batch_id }}"
                            data-day_id="{{ $classScheduling->day_id }}"
                            data-time_id="{{ $classScheduling->time }}" --}}
                            {{-- data-teacher_id="{{ $classScheduling->teacher_id }}" --}}
                          
                            data-start_time="{{ $classScheduling->start_time }}"
                            data-end_time="{{ $classScheduling->end_time }}"
                            {{-- data-status="{{ $classScheduling->status }}" --}}
                             data-created_at="{{ $classScheduling->created_at }}"
                            data-updated_at="{{ $classScheduling->updated_at }}"
                         class='btn btn-default btn-xs'>
                        
                         <i class="glyphicon glyphicon-eye-open"></i></a>
                         @if ($classScheduling->created_by == Auth::user()->id || Auth::user()->role==1)
                        <a data-toggle="modal"
                         data-target="#edit-classScheduling-modal" 
                         id="Edit"
                    data-id="{{$classScheduling->schedule_id }}"
                         class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                   @endif
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
          <h5 class="modal-title" id="exampleModalLongTitle">Horaire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input type="hidden" name="schedule_id" id="schedule_id">
                            
                <!-- Course Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('course_id2', 'Course Id:') !!}
                    <input type="text" name="course_id2" id="course_id2" readonly>
                </div>


                <!-- Start Time Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('start_time2', 'Start Time:') !!}
                    <input type="text" name="start_time2" id="start_time2" readonly>
                </div>

                <!-- End Time Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('end_time2', 'End Time:') !!}
                    <input type="text" name="end_time2" id="end_time2" readonly>
               </div>

                <!-- Status Field -->
                {{-- <div class="form-group col-sm-6">
                    {!! Form::label('status', 'Status:') !!}
                    <label class="checkbox-inline">
                        {!! Form::hidden('status', 0) !!}
                        {!! Form::checkbox('status', '1', null) !!}
                    </label>
                </div> --}}



                  <div class="form-group">
                    {!! Form::label('created_at2', 'Created At:') !!}
                   <input type="text" name="created_at2" id="created_at2" readonly>
                  </div>

                  <div class="form-group">
                    {!! Form::label('updated_at2', 'Updated At:') !!}
                   <input type="text" name="updated_at2" id="updated_at2" readonly>
                  </div>
                  


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
</div>
</div>
</div>

</div>


@section('scripts')
 <script>

$(document).ready(function()
    {
        
        $('#myTable').DataTable({  
            // alert('okokok');
            select:true,
            "language": {
            "lengthMenu": "Voir _MENU_ lignes par page",
            "zeroRecords": "Aucune information - desole",
            "info": "_PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun resultat trouve",
            "infoFiltered": "(filtre de _MAX_ total resultats)",
            "search": "Rechercher",
            "paginate":{
            "previous":"Precedent",
            "next":"Suivant"
            }


        },
        buttons:['selectRows']
    }

        );
    });





$('#start_time').datetimepicker({
       format:'YYYY-MM-DD HH:mm:ss',
       useCurrent: false
   });

   $('#end_time').datetimepicker({
       format:'YYYY-MM-DD HH:mm:ss',
       useCurrent: false
   });

        // {{-------batch view side--------}}
        $('#view-classScheduling-modal').on('show.bs.modal', function(event){
    
            var button = $(event.relatedTarget)
            var course_id = button.data('course_id')
            // var level_id = button.data('level_id')
            // var shift_id = button.data('shift_id')
            // var classwoom_id = button.data('classwoom_id')
            // var batch_id = button.data('batch_id')
            // var day_id = button.data('day_id')
            // var time_id = button.data('time_id')
            // var teacher_id = button.data('teacher_id')
            var start_time = button.data('start_time')
            var end_time = button.data('end_time')
            // var status = button.data('status')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var schedule_id = button.data('schedule_id')

            var modal =$(this)

            modal.find('.modal-title').text('DETAILS DE L\'HORAIRE');
            modal.find('.modal-body #course_id2').val(course_id);
            // modal.find('.modal-body #level_id2').val(level_id);
            // modal.find('.modal-body #shift_id2').val(shift_id);
            // modal.find('.modal-body #classwoom_id2').val(classwoom_id);
            // modal.find('.modal-body #batch_id2').val(batch_id);
            // modal.find('.modal-body #day_id2').val(day_id);
            // modal.find('.modal-body #time_id2').val(time_id);
            // modal.find('.modal-body #teacher_id2').val(teacher_id);
            modal.find('.modal-body #start_time2').val(start_time);
            modal.find('.modal-body #end_time2').val(end_time);
            // modal.find('.modal-body #status2').val(status);
            modal.find('.modal-body #created_at2').val(created_at);
            modal.find('.modal-body #updated_at2').val(updated_at);
            modal.find('.modal-body #schedule_id2').val(schedule_id);

        });




    </script>
@endsection