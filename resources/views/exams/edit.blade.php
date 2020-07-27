
<div class="modal fade" id="edit-exam-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modifier examen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">



            <form action="{{route('exams.update', 'exam_id2')}}" 
            method="post"
            enctype="multipart/form-data">   

                @csrf
                @method('PUT')

                <input type="hidden" id="exam_id2" name="exam_id2">
<div class="form-group col-sm-6">
    <select class="form-control" name="course_id2" id="course_id2">
    <option value="0" selected="true" disabled="true">Cours <option>

      @foreach($allCourses as $cours)
      <option value="{{$cours->course_id}}">{{$cours->course_name}}</option>
      @endforeach
  </select>
</div>

<div class="form-group col-sm-6">
    <select class="form-control" name="class_id2" id="class_id2">
    <option value="0" selected="true" disabled="true">Classe <option>

      @foreach($allClasses as $class)
      <option value="{{$class->class_id}}">{{$class->class_name}}</option>
      @endforeach
  </select>
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title2', 'Titre:') !!}
    {!! Form::text('title2', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description2', 'Description:') !!}
    {!! Form::textarea('description2', null, ['class' => 'form-control']) !!}
</div>

<input type="file" name="filename" id="filename" required>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Modifier</button>
</div>
        </form>





</div>

</form>
</div>
</div>

</div>

































{{-- @extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Exam
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($exam, ['route' => ['exams.update', $exam->exam_id], 'method' => 'patch']) !!}

                        @include('exams.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection --}}