@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cours</h1>
        <h1 class="pull-right">
            @if (Auth::user()->role == 2)
            <a data-toggle="modal" data-target="#add-course-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i class="fa fa-plus-circle">Ajouter un cours</i></a> 
            @endif
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-bodyKEVIN">
                    @include('courses.table')
                    {{-- {!! Form::open(['route' => 'courses.store' ,'enctype'=>'multipart/form-data']) !!}

                    @include('courses.fields')

                {!! Form::close() !!} --}}

                <form action="{{route('courses.store')}}"
                method="post"
                enctype="multipart/form-data">
                   @csrf

                   @include('courses.fields')
               </form>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

