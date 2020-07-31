@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Etudiants</h1>
        <h1 class="pull-right">
      @if(Auth::user()->role == 1)
           <a data-toggle="modal" data-target="#add-admission-modal"  class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i class="fa fa-plus-circle">Ajouter un etudiant</i></a>
      @endif
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admissions.table')
                    
            </div>
        <form action="{{route('admissions.store')}}"
                     method="post"
                     enctype="multipart/form-data">
                        @csrf

                        @include('admissions.fields')
                    </form>
        </div>
                    
               
            </div>
        </div>
       
    </div>
@endsection

