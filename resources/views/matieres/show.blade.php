@extends('layouts.app')

@section('content')
@include('flash::message')
 @include('adminlte-templates::common.errors')
    <section class="content-header">
        <h1>
            {{$matiere->titre}}
            @if (Auth::user()->role == 2) 
            <a data-toggle="modal" data-target="#add-course-modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" ><i class="fa fa-plus-circle">Ajouter un cours</i></a> 
            @endif
        </h1>
       
    </section>
    <div class="content">
        <div class="box box-primary">
            
            <div class="box-body">              
              
                    @include('matieres.show_fields')
                    {{-- <a href="{{ route('matieres.index') }}" class="btn btn-default">Retour</a> --}}
                
                     {{--ajouter un cours  --}}
                     <form action="{{route('courses.store')}}"
                     method="post"
                     enctype="multipart/form-data">
                        @csrf
     
                        @include('matieres.coursesfields')
                    </form>
                    {{-- fin ajouter un cours --}}
            </div>
        </div>
    </div>
@endsection
