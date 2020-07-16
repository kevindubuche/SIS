@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Affectations</h1>
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#add-class_ass-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i class="fa fa-plus-circle">Ajouter affectation</i></a>
        </h1>

        {{-- Bouton PDF --}}
        <div class="btn btn-group" style="margin-top:20px, float:left; margin-right:25px">
            <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o" style="color:white"></i> PDF</button>
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu" id="export-menu">
                <li id="export-to-pdf">
                    <a href="{{url('pdf-download-class-assign')}}" class="btn btn">Telecharger PDF</a>
                </li>
                <li role="separator" class="divider"></li>
                <li id="import-to-pdf">
                    <a href="">Importer PDF</a>
                </li>
            </ul>
        </div>
        {{-- Fin Bouton PDF --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('class_assignings.table')
                    
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

