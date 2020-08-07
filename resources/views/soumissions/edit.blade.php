@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Soumission
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($soumission, ['route' => ['soumissions.update', $soumission->soumission_id], 'method' => 'patch']) !!}
                    @csrf
                    <input type="hidden" name="created_by" id="created_by" value=" {{ Auth::user()->id }}" >

                    <!-- Course Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('course_id', 'Course Id:') !!}
                        {!! Form::number('course_id', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <!-- Class Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('class_id', 'Class Id:') !!}
                        {!! Form::number('class_id', null, ['class' => 'form-control']) !!}
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
                    <input type="file" name="filename" id="filename" required>
                    


                    
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Modifier Soumission', ['class' => 'btn btn-primary']) !!}
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