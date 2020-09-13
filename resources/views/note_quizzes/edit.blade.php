@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Note Quiz
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($noteQuiz, ['route' => ['noteQuizzes.update', $noteQuiz->id], 'method' => 'patch']) !!}

                        @include('note_quizzes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection