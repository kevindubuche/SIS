
  <!-- Modal -->
  <div class="modal fade" id="add-class_ass-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" 
    style="width:90%"
    role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Assigner un professeur a un coure</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">





          {!! Form::open(array('route'=>'insert', 'id'=>'mult', 'method'=>'post')) !!}
<form action="{{route('classAssignings.store')}}" method="post">
  @csrf

<div class="table-responsive">
  {{-- @include('class_assignings.fields') --}}
  <div class="form-group col-sm-12">
    <input type="hidden" name="class_assign_id" id="">
    <select class="form-control" name="teacher_id" id="">
    <option value="0" selected="true" disabled="true"> Selectionner professeur<option>

      @foreach($allTeacher as $teacher)
      <option value="{{$teacher->teacher_id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
      @endforeach
  </select>
  <br><br><br>
  
 
</div>

    {{-- <div class="form-group col-sm-6">
        <select class="form-control" name="shift_id" id="shift_id">
            @foreach($allTeacher as $teacher)
            <option value="{{$teacher->teacher_id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
            @endforeach
        </select>
     </div> --}}
  
    <table class="table" id="classAssignings-table">
        <thead>
            <tr>
              <td></td>
        <th>Cours</th>
        {{-- <th>Level Id</th>
        <th>Shift Id</th>
        <th>Classwoom Id</th>
        <th>Batch Id</th> --}}
        <th>Day Id</th>
        <th>Time Id</th>
            </tr>
        </thead>
        <tbody>
        @foreach($classSchedules as $classSchedule)
            <tr>
            <td><input type="checkbox" name="multiclass[]" value="{{$classSchedule->schedule_id}}">
              {{-- {{dd($classSchedule->InfoCourse())}} --}}
            <td>{{ $classSchedule->InfoCourse['course_name']}}</td>
            {{-- <td>{{ $classSchedule->level_id }}</td>
            <td>{{ $classSchedule->shift_id }}</td>
            <td>{{ $classSchedule->classwoom_id }}</td>
            <td>{{ $classSchedule->batch_id }}</td> --}}
            <td>{{ $classSchedule->day_id }}</td>
            <td>{{ $classSchedule->time_id }}</td>
             
            </tr>
        @endforeach
        </tbody>
    </table> 
    
</div>
    
<div class="clearfix"></div>
<div class="modal-footer">
    <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer<button>
    <button type="submit" class="btn btn-info" >Assigner<button>
</div>
</div>
</form>

</div>
{{-- <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Assigner', ['class' => 'btn btn-primary']) !!}
</div> --}}



</div>
</div>
</div>


{{-- Fin modal --}}

<div class="table-responsive">
  <table class="table" id="departements-table">
      <thead>
          <tr>
      <th>Professeur</th>
      <th>Semestre</th>
      <th>Cours</th>
      <th>Datails du cours</th>
      <th>Actions</th>
          </tr>
      </thead>
      <tbody>
      @foreach($classAssignings as $classAssigning)
          <tr>
          <td>{{ $classAssigning->InfoTeacher->first_name }} {{ $classAssigning->InfoTeacher->last_name }}</td>
          <td>{{ $classAssigning->InfoClassSchedule->InfoSemester['semester_name'] }}</td>
          <td>{{ $classAssigning->InfoClassSchedule->InfoCourse['course_name']}}  </td>
          <td>
            {{-- {{ $classAssigning->InfoLevel()->level }} |  {{ $classAssigning->name }} --}}
            {{ $classAssigning->InfoClassSchedule->InfoClass['class_name'] }} |  {{ $classAssigning->course_name }}
          </td>
    
              <td>
                  {!! Form::open(['route' => ['classAssignings.destroy', $classAssigning->class_assign_id], 'method' => 'delete']) !!}
                  <div class='btn-group'>
                      <a href="{{ route('departements.show', [$classAssigning->class_assign_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="{{ route('classAssignings.edit', [$classAssigning->class_assign_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                  </div>
                  {!! Form::close() !!}
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
</div>
