@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Examens</h1>
        @if(Auth::user()->role == 2)
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#add-exam-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i class="fa fa-plus-circle">Ajouter un examen</i></a>
        </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

    
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('exams.table')

                    <form action="{{route('exams.store')}}"
                    method="post"
                    enctype="multipart/form-data">
                       @csrf
    
                       @include('exams.fields')
                   </form>

                   @include('exams.edit')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

