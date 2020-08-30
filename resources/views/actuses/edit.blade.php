@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Message
        </h1>
        <p class="{{ Request::is('actuAssignings*') ? 'active' : '' }}">
            <a href="{{ route('actuAssignings.index') }}"><i class="fa fa-cogs"></i><span>Visibilité</span></a>
        </p>
        
   </section>
   <div class="content">
    @include('flash::message')
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