
  <!-- Modal -->
  <div class="modal fade" id="add-exam-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau examen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input type="hidden" name="created_by" id="created_by" value=" {{ Auth::user()->id }}" >
{{-- <!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('course_id', 'Course Id:') !!}
    {!! Form::number('course_id', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-6">
    <select class="form-control" name="course_id" id="course_id" required>
    <option value="0" selected="false" disabled="true">Cours </option>
      @foreach($allCourses as $course)
     {{-- lap we only cours kel te creer yo sauf adm kap we tout cours yo --}}
     @if ($course->created_by == Auth::user()->id || Auth::user()->role==1)
     <option value="{{$course->course_id}}">{{$course->course_name}}</option>
@endif
@endforeach
  </select>
</div>

{{-- <div class="form-group col-sm-6">
    <select class="form-control" name="class_id" id="class_id">
    <option value="0" selected="true" disabled="true">Classe <option>

      @foreach($allClasses as $class)
      <option value="{{$class->class_id}}">{{$class->class_name}}</option>
      @endforeach
  </select>
</div> --}}
<div class="form-group col-sm-6">
  <select class="form-control" name="class_id" id="class_id" required>
      <option value="0" selected="false" disabled="true">Classe</option>
      @foreach($allClassAssignins as $class)
      @if ($class->teacher_id == Auth::user()->id || Auth::user()->role==1)
      <option value="{{$class->InfoClass->class_id}}">{{$class->InfoClass->class_name}}</option>
      @endif
      @endforeach
  </select>
</div>
{{-- <!-- Class Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_id', 'Class Id:') !!}
    {!! Form::number('class_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Filename Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filename', 'Filename:') !!}
    {!! Form::text('filename', null, ['class' => 'form-control']) !!}
</div> --}}

{{-- <!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div> --}}


<input type="file" name="filename" id="filename" required>


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Enregistrer le examen', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>
