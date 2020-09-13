@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quiz
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quiz, ['route' => ['quizzes.update', $quiz->quiz_id], 'method' => 'patch']) !!}

                        @include('quizzes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection