@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Horaire</h1>
        <h1 class="pull-right">
           <a  data-toggle="modal" data-target="#add-classScheduling-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i class="fa fa-plus-circle">Ajouter dans horaire</i></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('class_schedulings.table')
                    {!! Form::open(['route' => 'classSchedulings.store']) !!}

                    @include('class_schedulings.fields')
                    {!! Form::close() !!}
                    
                    @include('class_schedulings.edit')

               
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

