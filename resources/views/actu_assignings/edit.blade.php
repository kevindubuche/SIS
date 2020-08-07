@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Actu Assigning
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($actuAssigning, ['route' => ['actuAssignings.update', $actuAssigning->id], 'method' => 'patch']) !!}

                        @include('actu_assignings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection