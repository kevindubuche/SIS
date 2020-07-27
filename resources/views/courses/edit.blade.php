@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cours
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($course, ['route' => ['courses.update', $course->course_id], 'method' => 'patch']) !!}

                        <!-- Course Name Field -->
                        <input type="hidden" id="created_by" name="created_by" value="{{$course->created_by}}">
<div class="form-group col-md-6 ">
    {!! Form::label('course_name', 'Nom du cours:') !!}
    {!! Form::text('course_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Code Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('course_code', 'Code du cours:') !!}
    {!! Form::text('course_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-md-6 ">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'cols'=>40, 'rows'=>2]) !!}
</div>

<!-- Status Field -->
{{-- <div class="form-group col-md-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div> --}}
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Modifier Cours', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection