@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Actus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($actus, ['route' => ['actuses.update', $actus->actu_id], 'method' => 'patch']) !!}

                        @include('actuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection