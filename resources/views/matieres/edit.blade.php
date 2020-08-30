@extends('layouts.app')
@if (Auth::user()->role == 1) 
@section('content')
    <section class="content-header">
        <h1>
            Matière
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($matiere, ['route' => ['matieres.update', $matiere->matiere_id], 'method' => 'patch']) !!}
                        @include('matieres.fieldsEdit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@endif