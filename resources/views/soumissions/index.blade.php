@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Soumissions</h1>
        {{-- @if (Auth::user()->role == 3) --}}
        <h1 class="pull-right">
            <a data-toggle="modal" data-target="#add-soumission-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i class="fa fa-plus-circle">Ajouter une soumission</i></a> 
        </h1>
        {{-- @endif --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('soumissions.table')

                    <form action="{{route('soumissions.store')}}"
                       method="post"
                      enctype="multipart/form-data">
                     @csrf

                   @include('soumissions.fields')
               </form>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

