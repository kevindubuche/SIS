@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{$course->course_name}}
        </h1>
        @if(Auth::user()->role == 2)
        <div class="pull-right" style="padding-top: -300px;">
            {!! Form::open(['route' => ['courses.destroy', $course->course_id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{{ route('courses.edit', [$course->course_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Vous etes sur?')"]) !!}
            </div>
            {!! Form::close() !!} 
        </div>
        @endif
    </section>
   
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('courses.show_fields')
                 
                </div>
            </div>
        </div>
    </div>
@endsection
